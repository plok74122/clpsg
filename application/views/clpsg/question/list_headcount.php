	<div class="main-content"">
		<h1 class="block">到訪列表</h1>
        <div class="column1-unit">
					<table class="table table-striped">
					<tr><th>來訪單位</th><th>日期</th><th>進出時間</th><th>來訪原因</th><th>人數</th><th>備註</th><th>修改</td></tr>
					<?php for($i=0 ; $i<count($list_array['no']);$i++):?>
						<tr>
							<td><?php echo $list_array['unit'][$i];?></td>
							<td><?php echo $list_array['date'][$i];?></td>
							<td><?php echo $list_array['entry_time'][$i];?><br><?php echo $list_array['departure_time'][$i];?><br>(<?php echo $list_array['stay_time'][$i];?>)</td>
							<td><?php echo $list_array['reason_private'][$i];?></td><th><?php echo $list_array['headcount'][$i];?></td>
							<td><?php echo $list_array['region'][$i];?></td>
							<td><a href="<?php echo base_url('headcount/edit_headcount/'.$list_array['no'][$i]);?>"><button class="btn btn-default">修改</button></a></td>
						</tr>
					<?php endfor;?>
          </table>
        </div>   
	</div>
	
