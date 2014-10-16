<div style="width: 20cm;height:29.7cm;border: groove;">
					<div style="width: 49%;height:9.3cm;float:left;">
					<table class="table table-striped" style="text-align: center;border: groove;">				

							<tr style="text-align: center;font-size: 16px;">
							<td>來訪單位</td><td><?php echo $write_question_info['unit'][0];?></td>
							</tr>
							<tr>
							<td>日期</th><td><?php echo $write_question_info['date'][0];?></td>
							</tr>
							<tr>
							<td>來訪原因</td><td><?php echo $write_question_info['reason_private'][0];?></td>
							</tr>
							<tr>
							<td>人數</td><td><?php echo $write_question_info['headcount'][0];?></td>
							</tr>
							<tr>
							<td>備註</td><td><?php echo $write_question_info['region'][0];?></td>
							</tr>

          </table>
					</div>
        	<?php for($i=0;$i < count($question_statistics_by_headlist_id) -4;$i++):?>
        	<div style="width:49%;height:9.3cm;float:left;">
					<table class="table table-striped" style="text-align: center;">		
							<tr><th colspan="<?php echo count($question_statistics_by_headlist_id[$array_keys[$i]]['answer_type']);?>" style="text-align: center;font-size: 16px;"><?php echo $query_questions_and_htmlcode['question'][$i];?></th></tr>
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
							<tr><td colspan="<?php echo count($question_statistics_by_headlist_id[$array_keys[$i]]['answer_type']);?>"><div id="<?php echo "highcharts".$array_keys[$i];?>" style="width:9.0cm;height:5.9cm;"></div></td></tr>
          </table>
       	 	</div>
          <?php endfor;?>

</div>
<br>
<div style="page-break-before: always;"></div>
<div style="width: 20cm;height:29.7cm;border: groove;">
	
        	<?php for($i=5;$i < count($question_statistics_by_headlist_id) -2;$i++):?>
        	<div style="width: 49%;height:9.3cm;float:left;">
					<table class="table table-striped" style="text-align: center;">
						
							<tr><th colspan="<?php echo count($question_statistics_by_headlist_id[$array_keys[$i]]['answer_type']);?>" style="text-align: center;font-size: 16px;"><?php echo $query_questions_and_htmlcode['question'][$i];?></th></tr>
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
							<tr><td colspan="<?php echo count($question_statistics_by_headlist_id[$array_keys[$i]]['answer_type']);?>"><div id="<?php echo "highcharts".$array_keys[$i];?>" style="width:9.0cm;height:5.9cm;"></div></td></tr>
          </table>
       	 	</div>
          <?php endfor;?>
        	<?php for($i=7;$i < count($question_statistics_by_headlist_id) ;$i++):?>
        	<div style="width: 15 cm;height:9cm;float:left;">
					<table class="table table-striped" style="text-align: center;">
						
							<tr><th colspan="<?php echo count($question_statistics_by_headlist_id[$array_keys[$i]]['answer_type']);?>" style="text-align: center;font-size: 16px;"><?php echo $query_questions_and_htmlcode['question'][$i];?></th></tr>
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
							<tr><td colspan="<?php echo count($question_statistics_by_headlist_id[$array_keys[$i]]['answer_type']);?>"><div id="<?php echo "highcharts".$array_keys[$i];?>" style="width:15cm;height:5.6cm;"></div></td></tr>
          </table>
       	 	</div>
          <?php endfor;?>
</div>
