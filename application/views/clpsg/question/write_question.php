	<div class="main-content">
		<h1 class="block">輸入第 <?php echo $write_question_info['next_question_no'];?> 張問卷</h1>
        <div class="column1-unit">
        	<form action="<?php echo base_url('question/insert_question');?>" id="question_form" method="post">
        		<input type="hidden" name="headcount_id" value="<?php echo $write_question_info['no'];?>">
        		<input type="hidden" name="headcount_question_id" value="<?php echo $write_question_info['next_question_no'];?>">
					<table class="table table-striped">
						<tr><th width="30px"></th><th width="110px">問題</th><th>答案選項</th></tr>
						<?php for($i=0 ; $i < count($question_html_list['no']);$i++):?>
						<tr>
							<td><?php echo $question_html_list['no'][$i];?></td>
							<td><?php echo $question_html_list['question'][$i];?></td>
							<td><?php echo $question_html_list['ansmode'][$i];?></td>
						</tr>
						<?php endfor;?>
						<tr><td></td><td>送出第<?php echo $write_question_info['next_question_no'];?>張問卷</td><td><button id="form_check" class="btn btn-success">送出</button></td></tr>
          </table>
          </form>
        </div>
		<h1 class="block">到訪資訊</h1>
        <div class="column1-unit">
					<table class="table table-striped">
					<tr><th>來訪單位</th><th>日期</th><th>來訪原因</th><th>問卷數/人數</th><th>備註</th></tr>
						<tr>
							<td><?php echo $write_question_info['unit'];?></td>
							<td><?php echo $write_question_info['date'];?></td>
							<td><?php echo $write_question_info['reason_private'];?></td>
							<th><?php echo $write_question_info['total_finish']."/".$write_question_info['headcount'];?></td>
							<td><?php echo $write_question_info['region'];?></td>
						</tr>
          </table>
        </div>
	</div>
	<!--調整欄位位置*/-->
	<script>
	$(function(){
			$('body,html').animate({
			scrollTop: 480},
			700);
	});
	</script>