<script src="//js.pusher.com/3.0/pusher.min.js"></script>
<script>

Pusher.log = function(message) {
	if (window.console && window.console.log) {
	  window.console.log(message);
	}
};

var pusher = new Pusher("2f7802716418c43a380a");
var channel = pusher.subscribe('test-channel');
channel.bind('test-event', function(data) {
  alert(data.text);
});
</script>