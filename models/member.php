<?php 
$incHeader = "<link href='calendar/fullcalendar.css' rel='stylesheet' />
	<link href='calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
	<script src='calendar/lib/moment.min.js'></script>
	<script src='calendar/lib/jquery.min.js'></script>
	<script src='calendar/fullcalendar.min.js'></script>
	<script>

		$(document).ready(function() {
			
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				defaultDate: '2014-11-12',
				selectable: true,
				selectHelper: true,
				select: function(start, end) {
					var title = prompt('Event Title:');
					var eventData;
					if (title) {
						eventData = {
							title: title,
							start: start,
							end: end
						};
						$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
					}
					$('#calendar').fullCalendar('unselect');
				},
				editable: true,
				eventLimit: true, 
				// down vote accepted
	

		
				events: [
					{
						title: 'All Day Event',
						start: '2014-11-01'
					},
					{
						title: 'Long Event',
						start: '2014-11-07',
						end: '2014-11-10',
						color: 'red'
					},
					{
						id: 999,
						title: 'Repeating Event',
						start: '2014-11-09T16:00:00',
						color: 'blue'
					},
					{
						id: 999,
						title: 'Repeating Event',
						start: '2014-11-16T16:00:00',
						color: 'blue'
					},
					{
						title: 'Conference',
						start: '2014-11-11',
						end: '2014-11-13',
						color: 'green'
					},
					{
						title: 'Meeting',
						start: '2014-11-12T10:30:00',
						end: '2014-11-12T12:30:00'
					},
					{
						title: 'Lunch',
						start: '2014-11-12T12:00:00',
						color: 'pink'
					},
					{
						title: 'Meeting',
						start: '2014-11-12T14:30:00'
					},
					{
						title: 'Happy Hour',
						start: '2014-11-12T17:30:00',
						color: 'pink'
					},
					{
						title: 'Dinner',
						start: '2014-11-12T20:00:00',
						color: 'red'
					},
					{
						title: 'Birthday Party',
						start: '2014-11-13T07:00:00'
					}
				]
			});
			
		});

	</script>";
						$isLogin = 1;