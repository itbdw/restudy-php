<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/22
 * Time: 下午11:57
 */


class XXSystem {
    public function before() {
        XXSystem_Event::trigger("XXSystem::before", func_get_args());
        sleep(1);
    }
    public function fire(...$params) {
        self::before($params);
        XXSystem_Event::trigger("XXSystem::fire", func_get_args());

        sleep(1);

        self::after($params);
    }
    public function after() {
        XXSystem_Event::trigger("XXSystem::after", func_get_args());
        sleep(1);
    }
}

class XXSystem_Event {
    private static $events = [];

    public static function listen($action, $callableMethod) {
        self::$events[$action][] = $callableMethod;
    }

    public static function trigger($action, $args=[]) {
        if (isset(self::$events[$action])) {
            foreach (self::$events[$action] as $callableMethod) {
                call_user_func_array($callableMethod, [$action, $args]);
            }
        }
    }
}


class XXDebugPlugin {
    public static function debug() {
        $params = func_get_args();
        $action = $params[0];

        echo date("[Y-m-d H:i:s] ") . "received event " . $action. ' with params ' . json_encode($params[1]) . "\n";
    }
}

XXSystem_Event::listen("XXSystem::before", [XXDebugPlugin::class, 'debug']);
XXSystem_Event::listen("XXSystem::fire", [XXDebugPlugin::class, 'debug']);
XXSystem_Event::listen("XXSystem::after", [XXDebugPlugin::class, 'debug']);

$system = new XXSystem();

$system->fire("hello", "world");