<?php

class RedLock
{
	protected $retryDelay;
	protected $retryCount;
	protected $clockDriftFactor = 0.01;

	protected $quorum;

	protected $servers = array();
	protected $instances = array();

	public static function test() {
	    return 'hello';
    }

	/**
	 * Create a new RedLock instance
	 *
	 * @param array   $servers    An array of Redis servers
	 * @param integer $retryDelay [description]
	 * @param integer $retryCount [description]
	 */
	public function __construct(array $servers, $retryDelay = 200, $retryCount = 3)
	{
		$this->servers = $servers;

		$this->retryDelay = $retryDelay;
		$this->retryCount = $retryCount;

		$this->quorum  = min(count($servers), (count($servers) / 2 + 1));
	}

	/**
	 * Attempt to lock a resource
	 *
	 * @param  string  $resource A string defining the resource
	 * @param  integer $ttl      The maximum number of seconds the lock should be valid for
	 * @return mixed             An array if we locked the resource successfully, or false on failure
	 */
	public function lock($resource, $ttl)
	{
		$this->initInstances();

		$token = uniqid();
		$retry = $this->retryCount;

		do {
			$n = 0;

			$startTime = microtime(true) * 1000;

			foreach ($this->instances as $instance)
			{
				if ($this->lockInstance($instance, $resource, $token, $ttl))
				{
					$n++;
				}
			}

			# Add 2 milliseconds to the drift to account for Redis expires
			# precision, which is 1 millisecond, plus 1 millisecond min drift
			# for small TTLs.
			$drift = ($ttl * $this->clockDriftFactor) + 2;

			$validityTime = $ttl - (microtime(true) * 1000 - $startTime) - $drift;

			if ($n >= $this->quorum && $validityTime > 0)
			{
				return [
					'validity' => $validityTime,
					'resource' => $resource,
					'token'    => $token,
				];

			}
			else
			{
				foreach ($this->instances as $instance)
				{
					$this->unlockInstance($instance, $resource, $token);
				}
			}

			// Wait a random delay before to retry
			$delay = mt_rand(floor($this->retryDelay / 2), $this->retryDelay);
			usleep($delay * 1000);

			$retry--;

		}
		while ($retry > 0);

		return false;
	}

	/**
	 * Release a lock
	 *
	 * @param  array  $lock    The lock to release
	 * @return null
	 */
	public function unlock(array $lock)
	{
		$this->initInstances();
		$resource = $lock['resource'];
		$token    = $lock['token'];

		foreach ($this->instances as $instance)
		{
			$this->unlockInstance($instance, $resource, $token);
		}
	}

	/**
	 * Initialize connections to Redis servers
	 *
	 * @return [type] [description]
	 */
	protected function initInstances()
	{
		if (empty($this->instances))
		{
			foreach ($this->servers as $server)
			{
				list($host, $port, $timeout) = $server;

				$redis = new Credis_Client($host, $port, $timeout);
				//$redis->connect();

				$this->instances[] = $redis;
			}
		}
	}

	/**
	 * Attempt to lock a particular Redis server
	 *
	 * @param  [type] $instance [description]
	 * @param  [type] $resource [description]
	 * @param  [type] $token    [description]
	 * @param  [type] $ttl      [description]
	 * @return [type]           [description]
	 */
	protected function lockInstance($instance, $resource, $token, $ttl)
	{
		try
		{
			$instance->connect();
		}
		catch (\Exception $ex)
		{
			// Try to reconnect
			$instance->close();
			$instance->connect();
		}

		try
		{
			$ret = $instance->set($resource, $token, ['NX', 'PX' => $ttl]);
		}
		catch (\Exception $ex)
		{
			// Try to reconnect
			$instance->close();
			$instance->connect();

			try
			{
				$ret = $instance->set($resource, $token, ['NX', 'PX' => $ttl]);
			}
			catch (\Exception $ex2)
			{
				$ret = false;
			}
		}

		$instance->close();

		return $ret;
	}

	/**
	 * Release the lock on a particular Redis server
	 *
	 * @param  [type] $instance [description]
	 * @param  [type] $resource [description]
	 * @param  [type] $token    [description]
	 * @return [type]           [description]
	 */
	protected function unlockInstance($instance, $resource, $token)
	{
		$script = '
			if redis.call("GET", KEYS[1]) == ARGV[1] then
				return redis.call("DEL", KEYS[1])
			else
				return 0
			end
		';

		try
		{
			$instance->connect();
			$ret = $instance->eval($script, [$resource], [$token]);
			$instance->close();

			return $ret;
		}
		catch (Exception $ex)
		{
			// Try again...
			$instance->close();

			try
			{
				$instance->connect();
				$ret = $instance->eval($script, [$resource], [$token]);
				$instance->close();

				return $ret;
			}
			catch (Exception $ex)
			{
				;
			}
		}

		return false;
	}
}
