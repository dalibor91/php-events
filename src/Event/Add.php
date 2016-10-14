<?php

namespace Event;

class Add extends \Event\Events {

	public static function on($name, \Closure $fire, array $params = []) {
		is_string($name) ? self::setEvent($name, $fire, $params) : null;
	}
	
	public static function onMultiple(array $names, \Closure $fire, array $params = []) {
		foreach ($names as $name) {
			if (is_string($name)) {
				self::on($name, $fire, $params);
			}
		}
	}
	
	public static function multipleEvent($name, array $events, array $params = []) {
		foreach ($events as $key => $e) {
			if ($e instanceof \Closure) {
				$param = isset($params[$key]) && is_array($params[$key]) ? 
						$params[$key] : [];
				self::on($name, $e, $param);
			}
		}
	}
	
	public static function multiple(array $names, array $events, array $params = []) {
		foreach ($names as $key => $name) {
			if (is_string($name) && isset($events[$key]) && ($events[$key] instanceof \Closure)) {
				$param = isset($params[$key]) && is_array($params[$key]) ? 
						$params[$key] : [];
				self::on($name, $events[$key], $param);
			}
		}
	}
	
}
