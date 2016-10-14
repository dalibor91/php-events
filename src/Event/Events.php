<?php

namespace Event;

class Events {
	
	protected static $events;
	
	private function __construct() {
		;
	}
	
	protected static function getEvents($name) {
		return isset(self::$events[$name]) ? self::$events[$name] : [];
	}
	
	protected static function setEvent($name, \Closure $run, array $params = []) {
		if (!isset(self::$events[$name])) {
			self::$events[$name] = [];
		}
		
		self::$events[$name][] = [
			'callable' => $run, 
			'params' => $params
		];
	}
	
	protected static function removeEvents($name) {
		if (isset(self::$events[$name])) {
			self::$events[$name] = [];
		}
	}
	
}
