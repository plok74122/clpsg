	<div class="main-content"">
		<h1 class="block">新增到訪人數</h1>
		<h1 class="block"></h1>
		
        <div class="column1-unit">
          <div class="contactform">
            <form action="<?php echo base_url('question/question_statistics_by_date');?>"  method="post" >
              <fieldset><legend>&nbsp;新增資料&nbsp;</legend>                
                <p><label for="date" class="left">日期(起):</label>
                   <input type="text" name="date1" id="datepicker" class="field" value="" tabindex="1" /></p>
                <p><label for="date" class="left">日期(迄):</label>
                   <input type="text" name="date2" id="datepicker2" class="field" value="" tabindex="1" /></p>   
                <p><input type="submit" class="btn btn-success" value="送出查詢" tabindex="6" /></p>
              </fieldset>
            </form>
          </div>              
        </div>   
	</div>
	
