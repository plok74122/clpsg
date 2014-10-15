	<div class="main-content">
		<h1 class="block">到訪資訊</h1>
        <div class="column1-unit">
					<table class="table table-striped">
					<tr><th>來訪單位</th><th>日期</th><th>來訪原因</th><th>問卷數/人數</th><th>備註</th></tr>						
							<?php for($i=0;$i < count($write_question_info['no']);$i++):?>
							<tr>
							<td><?php echo $write_question_info['unit'][$i];?></td>
							<td><?php echo $write_question_info['date'][$i];?></td>
							<td><?php echo $write_question_info['reason_private'][$i];?></td>
							<th><?php echo $write_question_info['total_finish'][$i]."/".$write_question_info['headcount'][$i];?></td>
							<td><?php echo $write_question_info['region'][$i];?></td>
							</tr>
							<?php endfor;?>
          </table>
        </div>
        <div class="column1-unit">
        	<?php for($i=0;$i < count($question_statistics_by_headlist_id);$i++):?>
					<table class="table table-striped">
						
							<tr><th colspan="<?php echo count($question_statistics_by_headlist_id[$array_keys[$i]]['answer_type']);?>"><?php echo $query_questions_and_htmlcode['question'][$i];?></th></tr>
							<tr>
							<?php for($j=0;$j < count($question_statistics_by_headlist_id[$array_keys[$i]]['answer_type']);$j++):?>
								<td><?php echo $question_statistics_by_headlist_id[$array_keys[$i]]['answer_type'][$j];?></td>
							<?php endfor;?>
							</tr>
							<tr>
							<?php for($j=0;$j < count($question_statistics_by_headlist_id[$array_keys[$i]]['answer_type']);$j++):?>
								<td><?php echo $question_statistics_by_headlist_id[$array_keys[$i]]['total'][$j];?></td>
							<?php endfor;?>
							</tr>
							<tr><td colspan="<?php echo count($question_statistics_by_headlist_id[$array_keys[$i]]['answer_type']);?>"><div id="<?php echo "highcharts".$array_keys[$i];?>"></div></td></tr>
          </table>
          
          <?php endfor;?>
        </div>       
	</div>
	<!--調整欄位位置*/-->