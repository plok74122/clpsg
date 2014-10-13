	<div class="main-content">
		<h1 class="block">到訪列表</h1>
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
							<td><a href="<?php echo base_url('question/write_answer_question/'.$list_need_question['no'][$i]);?>"><button class="btn btn-danger">寫問卷</button></a></td>
						</tr>
					<?php endfor;?>
          </table>
        </div>   
	</div>
	
