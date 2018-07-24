<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/24
 * Time: 下午5:55
 *
 * @see https://www.php-fig.org/psr/psr-11/
 */

/* --------- Psr11 正常用的话直接 composer require psr11 就好 ----------- */
interface ContainerInterface
{
    public function get($id);
    public function has($id);
}
interface ContainerExceptionInterface {}
interface NotFoundExceptionInterface extends ContainerExceptionInterface {}

/* --------- 容器 ----------- */
class ContainerException extends Exception implements ContainerExceptionInterface {}
class NotFoundException extends ContainerException {}

/**
 * @property CacheAdapterInterface $cache
 * @property Redis $redis
 *
 * Class Container
 */
class Container implements ContainerInterface {

    protected $services = [];
    protected $instances = [];

    public function __get($name)
    {
        return $this->get($name);
    }

    /**
     * @param $id
     * @param callable $def
     */
    public function set($id, $def) {
        if ($this->has($id)) {
            throw new ContainerException("service ".$id." has been registered.");
        }
        $this->services[$id] = $def;
    }

    /**
     * @param $id
     * @return mixed
     * @throws NotFoundException
     */
    public function get($id) {
        $def = null;
        if (self::has($id)) {
            $def = $this->services[$id];
        } else {
            throw new NotFoundException("Service Not Found " . $id);
        }

        if (!isset($this->instances[$id])) {
            $res = call_user_func($def);
            $this->instances[$id] = $res;
        }

        return $this->instances[$id];
    }

    /**
     * @param $id
     * @return bool
     */
    public function has($id) {
        return isset($this->services[$id]);
    }
}


interface CacheAdapterInterface
{
    public function set($key, $value);
    public function get($key, $default = null);
    public function expire($key, $ttl);
    public function delete($key);
}

class ArrayCacheAdapter implements CacheAdapterInterface
{
    private $data;

    public function set($key, $value)
    {
        $this->data[$key] = $value;
        return true;
    }

    public function get($key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }

    public function expire($key, $ttl)
    {
        return false;
    }

    public function delete($key)
    {
        unset($this->data[$key]);
        return true;
    }
}

class RedisCacheAdapter implements CacheAdapterInterface {
    private $di;
    public function __construct(Container $di)
    {
        if (!$di->has("redis")) {
            throw new Exception("service redis is required by RedisCacheAdapter");
        }

        $this->di = $di;
    }

    public function set($key, $value)
    {
        $this->di->redis->set($key, $value);
        return true;
    }

    public function get($key, $default = null)
    {
        return $this->di->redis->get($key);
    }

    public function expire($key, $ttl)
    {
        $this->di->redis->expire($key, $ttl);
        return false;
    }

    public function delete($key)
    {
        $this->di->redis->delete($key);
        return true;
    }


}

$di = new Container();

$di->set("redis", function () {
    return new Redis();
});

$di->set("cache", function() use ($di) {
   return new ArrayCacheAdapter();
});

//$di->set("cache", function() use ($di) {
//   return new RedisCacheAdapter($di);
//});

$di->cache->set("foo", "bar");
var_dump($di->cache->get("foo"));
var_dump($di->cache->get("h"));
var_dump($di->cache->get("h", 'e'));

