	<div class="main-content"">
		<h1 class="block">綠苑課程</h1>
		<iframe id="calendar_iframe" src="<?php echo base_url('Calendar/main_calendar')?>" width="100%"  marginwidth="0" #marginheight="0" scrolling="no" frameborder="0" align="center"></iframe>
	</div>
	<script>
		$(document).ready(function() {
			$('#calendar_iframe').attr('height','622px');
			});
	</script>