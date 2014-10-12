	<div class="main-content"">
		<h1 class="block">新增到訪人數</h1>
		<h1 class="block"></h1>
		
        <div class="column1-unit">
          <div class="contactform">
            <form action="<?php echo base_url('headcount/insert_headcount');?>" id="headcount_form" method="post" >
              <fieldset><legend>&nbsp;新增資料&nbsp;</legend>
                <p><label for="unit" class="left">到訪單位:</label>
                   <input type="text" name="unit" id="unit" class="field" value="" tabindex="1" /></p>
                <p><label for="region" class="left">地區:</label>
                   <input type="radio" name="region" id="region"  value="縣內" tabindex="1" />縣內
                   <input type="radio" name="region" id="region"  value="縣外" tabindex="1" />縣外
                   <input type="radio" name="region" id="region"  value="海外" tabindex="1" />海外
                   </p>                   
                <p><label for="date" class="left">日期:</label>
                   <input type="text" name="date" id="datepicker" class="field" value="" tabindex="1" /></p>
                <p><label for="reason_private" class="left">事由:</label>
                   <select name="reason_private" id="reason_private" class="combo" />
                   </select></p>
                <p><label for="no_group" class="left">新建或關聯:</label>
                   <select name="no_group" id="no_group" class="combo" />
                   </select></p>
                <p><label for="entry_time" class="left">進入時間:</label>
                   <input type="text" name="entry_time" id="timepicker1" class="field" value="" tabindex="1" /></p>
                <p><label for="departure_time" class="left">離開時間:</label>
                   <input type="text" name="departure_time" id="timepicker2" class="field" value="" tabindex="1" /></p>
                <p><label for="headcount" class="left">到訪人數:</label>
                   <input type="text" name="headcount" id="headcount" class="field" value="" tabindex="1" />
                   <div id="headcount_slider" class="slider"></div></p>             
                <input type="hidden" name="username" id="username" value="<?php echo $this->session->userdata('name');?>">      
                <p><input type="button" id="submit1" class="button" value="送出資料" tabindex="6" /></p>
              </fieldset>
            </form>
          </div>              
        </div>   
	</div>
	
