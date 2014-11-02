
		<div id='calendar'></div>
	
<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},			
			lang:'zh-tw',
			defaultDate: '2014-11-01',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events:{url:'<?php echo base_url('calendar/ajax_calendar');?>'},
//			events: [
//				{
//					title: 'All Day Event1111111111111111111111111111111111111111111111',
//					start: '2014-09-01'
//				},
//				{
//					title: 'Long Event',
//					start: '2014-09-07',
//					end: '2014-09-10'
//				},
//				{
//					id: 999,
//					title: 'Repeating Event',
//					start: '2014-09-09T16:00:00'
//				},
//				{
//					id: 999,
//					title: 'Repeating Event',
//					start: '2014-09-16T16:00:00'
//				},
//				{
//					title: 'Conference',
//					start: '2014-09-11 16:00:00',
//					end: '2014-09-13 16:00:00'
//				},
//				{
//					title: 'Meeting',
//					start: '2014-09-12T10:30:00',
//					end: '2014-09-12T12:30:00'
//				},
//				{
//					title: 'Lunch',
//					start: '2014-09-12T12:00:00'
//				},
//				{
//					title: 'Meeting',
//					start: '2014-09-12T14:30:00'
//				},
//				{
//					title: 'Happy Hour',
//					start: '2014-09-12T17:30:00'
//				},
//				{
//					title: 'Dinner',
//					start: '2014-09-12T20:00:00'
//				},
//				{
//					title: '做肥皂的活動',
//					start: '2014-09-13T07:00:00',
//					content: '這個活動很簡單 就是做肥皂 減肥皂 做肥皂 減肥皂  很激烈 所以說三次<iframe width="560" height="315" src="//www.youtube.com/embed/qWJqiGGIma4" frameborder="0" allowfullscreen></iframe>'
//				},
//				{
//					title: 'Click for Google',
//					url: 'http://google.com/',
//					start: '2014-09-28'
//				}
//			],
			color:'black',
			textColor:'yellow',
	    eventClick: function(calEvent, jsEvent, view) {
	
//	        alert('Event: ' + calEvent.title);
//	        alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
//	        alert('View: ' + view.name);
//	        alert('content: ' + calEvent.content);
//	        var block_title = calEvent.title;
//	        var block_content = calEvent.content;
//	        alert(block_title);
        	$.blockUI({
        		theme:     true, 
        		title:    calEvent.title,
        		message:    calEvent.content,
        		themedCSS:{width:'95%',top:'0px',left:'0px'},
        		onOverlayClick: $.unblockUI
        		}); 	
	        // change the border color just for fun
	        $(this).css('border-color', 'red');
	
	    }
		});
	});

</script>