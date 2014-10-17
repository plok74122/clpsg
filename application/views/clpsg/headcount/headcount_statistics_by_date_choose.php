	<div class="main-content"">
		<h1 class="block">到訪人數分析</h1>
		<h1 class="block"></h1>
		
        <div class="column1-unit">
          <div class="contactform">
            <form action="<?php echo base_url('headcount/headcount_statistics_by_date');?>"  method="post" >
              <fieldset><legend>&nbsp;請選擇時間&nbsp;</legend>                
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
	
