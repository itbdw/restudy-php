<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/24
 * Time: 下午2:37
 */

//依赖注入，根据interface做标准。手动注入。

class Cache {
    protected $adapter;

    public function __construct(CacheAdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function config($params) {
        $this->adapter->config($params);
    }
    public function set($key, $value) {
        return $this->adapter->set($key, $value);
    }
    public function get($key) {
        return $this->adapter->get($key);
    }
    public function expire($key, $ttl) {
        return $this->adapter->expire($key, $ttl);
    }
    public function delete($key) {
        return $this->adapter->delete($key);
    }
    public function flush() {
        return $this->adapter->flush();
    }

    public function getAdapter() {
        return $this->adapter;
    }
}

interface CacheAdapterInterface {
    public function config($params);
    public function set($key, $value);
    public function get($key);
    public function expire($key, $ttl);
    public function delete($key);
    public function flush();
}


class RedisCacheAdapter implements CacheAdapterInterface {
    public function config($params) { return [__METHOD__, func_get_args()] ; }
    public function set($key, $value) { return [__METHOD__, func_get_args()] ; }
    public function get($key) { return [__METHOD__, func_get_args()] ; }
    public function expire($key, $ttl) { return [__METHOD__, func_get_args()] ; }
    public function delete($key) { return [__METHOD__, func_get_args()] ; }
    public function flush() { return [__METHOD__, func_get_args()] ; }
}

class FileCacheAdapter implements CacheAdapterInterface {
    public function config($params) { return [__METHOD__, func_get_args()] ; }
    public function set($key, $value) { return [__METHOD__, func_get_args()] ; }
    public function get($key) { return [__METHOD__, func_get_args()] ; }
    public function expire($key, $ttl) { return [__METHOD__, func_get_args()] ; }
    public function delete($key) { return [__METHOD__, func_get_args()] ; }
    public function flush() { return [__METHOD__, func_get_args()] ; }
}

$cache1 = new Cache(new RedisCacheAdapter());
$cache2 = new Cache(new FileCacheAdapter());

var_dump($cache1->get('hello'));
var_dump($cache2->get('world'));
var_dump($cache2->getAdapter()->get('!'));