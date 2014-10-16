	<div class="main-content">
		<h1 class="block">問卷統計(梯次統計)</h1>
        <div class="column1-unit">
					<table class="table table-striped">
					<tr><th>來訪單位</th><th>日期</th><th>來訪原因</th><th>問卷數/人數</th><th>備註</th><th></td></tr>
					<?php for($i=0 ; $i<count($list_need_question['no']);$i++):?>
						<tr>
							<td><?php echo $list_need_question['unit'][$i];?></td>
							<td><?php echo $list_need_question['date'][$i];?></td>
							<td><?php echo $list_need_question['reason_private'][$i];?></td>
							<th><?php echo $list_need_question['total_finish'][$i]."/".$list_need_question['headcount'][$i];?></td>
							<td><?php echo $list_need_question['region'][$i];?></td>
							<td><form action="<?php echo base_url('question/query_question_by_headcount/');?>" method="post"><input type="hidden" name="headlist_id[]" value="<?php echo $list_need_question['no'][$i];?>"><input type="submit" class="btn btn-danger" value="統計圖"></form><form action="<?php echo base_url('question/printA4_question_statistics_by_headlist_id/');?>" method="post"><input type="hidden" name="headlist_id[]" value="<?php echo $list_need_question['no'][$i];?>"><input type="submit" class="btn btn-success" value="A4列印"></form></a></td>
						</tr>
					<?php endfor;?>
          </table>
        </div>   
	</div>
	
