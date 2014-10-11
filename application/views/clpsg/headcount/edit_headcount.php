	<div class="main-content"">
		<h1 class="block">修改到訪內容</h1>
		<h1 class="block"></h1>
		
        <div class="column1-unit">
          <div class="contactform">
            <form action="<?php echo base_url('headcount/edit_db_headcount');?>" id="headcount_form" method="post" >
              <fieldset><legend>&nbsp;修改資料&nbsp;</legend>
                <p><label for="unit" class="left">到訪單位:</label>
                   <input type="text" name="unit" id="unit" class="field" value="<?php echo $edit['unit'];?>" tabindex="1" /></p>
                <p><label for="region" class="left">地區:</label>
                   <input type="radio" name="region" id="region"  value="縣內" tabindex="1" <?php if($edit['region']=="縣內"):?>checked<?php endif;?> />縣內
                   <input type="radio" name="region" id="region"  value="縣外" tabindex="1" <?php if($edit['region']=="縣外"):?>checked<?php endif;?> />縣外
                   </p>                   
                <p><label for="date" class="left">日期:</label>
                   <input type="text" name="date" id="datepicker" class="field" value="<?php echo $edit['date'];?>" tabindex="1" /></p>
                <p><label for="reason_private" class="left">事由:</label>
                   <select name="reason_private" id="reason_private" class="combo" />
                   	<option selected value="<?php echo $edit['reason_private'];?>"><?php echo $edit['reason_private'];?></option>
                   </select></p>	
                <p><label for="entry_time" class="left">進入時間:</label>
                   <input type="text" name="entry_time" id="timepicker1" class="field" value="<?php echo $edit['entry_time'];?>" tabindex="1" /></p>
                <p><label for="departure_time" class="left">離開時間:</label>
                   <input type="text" name="departure_time" id="timepicker2" class="field" value="<?php echo $edit['departure_time'];?>" tabindex="1" /></p>
                <p><label for="headcount" class="left">到訪人數:</label>
                   <input type="text" name="headcount" id="headcount" class="field" value="<?php echo $edit['headcount'];?>" tabindex="1" />
                   <div id="headcount_slider" class="slider"></div></p>             
                <input type="hidden" name="username" id="username" value="<?php echo $this->session->userdata('name');?>">      
                <input type="hidden" name="no" id="no" value="<?php echo $edit['no'];?>">    
                <p><input type="button" id="submit1" class="button" value="修改資料" tabindex="6" /></p>
              </fieldset>
            </form>
          </div>              
        </div>   
	</div>
	
