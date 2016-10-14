<?php

namespace Event;

class Trigger extends \Event\Events {
	
	public static function fire($name) {
		if (isset(self::$events[$name])) {
			foreach (self::$events[$name] as $call) {
				call_user_func_array($call['callable'], $call['params']);
			}
		}
	}
}

