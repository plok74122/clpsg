	<div class="main-content"">
		<h1 class="pagetitle">綠苑行事曆</h1>
<!--		<h1 class="block"></h1>-->
		<div class="contactform">
			<form action="" method="post" id="add_calendar_form">
			<fieldset><legend>&nbsp;新增行事曆&nbsp;</legend>
				<p><label for="contact_title" class="left">活動名稱:</label>
					 <input type="text" name="title" id="title" class="field" value="" tabindex="1" /></p>
				<p><label for="contact_title" class="left">開始日期:</label>
					 <input type="text" name="start" id="start"  value="" tabindex="1" size="8"/></p>
				<p><label for="contact_title" class="left">開始時間:</label>
					 <input type="text" name="start_time" id="start_time"  value="" tabindex="1" size="10"/>
				<p><label for="contact_title" class="left">結束日期:</label>
					 <input type="text" name="end" id="end"  value="" tabindex="1" size="8"/>
				<p><label for="contact_title" class="left">結束時間:</label>
					 <input type="text" name="end_time" id="end_time"  value="" tabindex="1" size="10"/>
					 <div class="checkbox" style="padding-left: 110px;">
					 	<label><input type="checkbox" id="all_day" >全日</label>
					 </div>
				
				<p><label for="contact_title" class="left">地點:</label>
					 <input type="text" name="location" id="location" class="field" value="" tabindex="1" /></p>
				<p><label for="contact_title" class="left">說明:</label>
					 <textarea name="content" id="content" cols="45" rows="10"tabindex="5"></textarea></p>					
				<p><input type="submit" name="submit" id="submit" class="button" value="Send message" tabindex="6" /></p>
			</form>
		</div>
	</div>
	<script>
	$(document).ready(function() {
		$("#add_calendar_form").validate({
			rules: {
				title: {
					required: true,
					minlength: 4
				},
				start: {
					dateISO: true
				},
				end: {
					dateISO: true
				},
				location: {
					required: true
				},
				content: {
					required: true,
					minlength: 20
				}			
			}		
		});
//		var all_day = $("input[id='all_day']:checked").length;
		$("#all_day").change(function(){
			alert($("input[id='all_day']:checked").length);
			})
	})
	</script>