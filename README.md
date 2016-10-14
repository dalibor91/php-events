# php-events

adding events in php and triggering them

Example:
<pre>
Event\Add::on('test', function() {
	print "Test fired".PHP_EOL;;
});

Event\Add::on('test', function($a) {
	print "Test fired with ".$a.PHP_EOL;;
}, [ 'param' ]);

Event\Add::multipleEvent('test', [
	function () {
		print "multiple 1".PHP_EOL;;
	}, 
	function ($param) {
		print "multiple 2 param.".$param.PHP_EOL;
	}
], [ [], ['param multiple'] ]);

Event\Trigger::fire('test');
</pre>

print out 

<pre>
Test fired
Test fired with param
multiple 1
multiple 2 param.param multiple
</pre>
