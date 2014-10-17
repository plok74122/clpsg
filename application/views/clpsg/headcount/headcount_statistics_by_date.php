	<div class="main-content">
		<h1 class="block">來訪人數統計(<?php echo $date1."~".$date2;?>)</h1>
        <div class="column1-unit">
					<table class="table table-striped">				
							<tr>
								<th></th>
								<?php for($i=0;$i < count($headcount_statistics_by_headlist_id_private['reason_private']);$i++):?>
								<th><?php echo $headcount_statistics_by_headlist_id_private['reason_private'][$i];?></th>
								<?php endfor;?>
								<th>總和</th>
							</tr>
							<tr>
								<td>人數</td>
								<?php $sum_all_x = 0;?>
								<?php for($i=0;$i < count($headcount_statistics_by_headlist_id_private['reason_private']);$i++):?>
								<td><?php echo $headcount_statistics_by_headlist_id_private['total'][$i];?></td>
								<?php $sum_all_x = $sum_all_x + $headcount_statistics_by_headlist_id_private['total'][$i];?>
								<?php endfor;?>
								<td><font color="red"><?php echo $sum_all_x;?></font></td>
							</tr>
							<tr>
								<td colspan="<?php echo count($headcount_statistics_by_headlist_id_private['reason_private'])+2;?>"><div id="headcount_statistics_by_headlist_id_private"></div></td>
							</tr>
          </table>
    	 </div>
		<h1 class="block">來訪人數統計(公開)(<?php echo $date1."~".$date2;?>)</h1>
        <div class="column1-unit">
					<table class="table table-striped">				
							<tr>
								<th></th>
								<?php $sum_all_x = 0;?>
								<?php for($i=0;$i < count($headcount_statistics_by_headlist_id_public['reason_public']);$i++):?>
								<th><?php echo $headcount_statistics_by_headlist_id_public['reason_public'][$i];?></th>
								<?php endfor;?>
								<th>總和</th>
							</tr>
							<tr>
								<td>人數</td>
								<?php for($i=0;$i < count($headcount_statistics_by_headlist_id_public['reason_public']);$i++):?>
								<td><?php echo $headcount_statistics_by_headlist_id_public['total'][$i];?></td>
								<?php $sum_all_x = $sum_all_x + $headcount_statistics_by_headlist_id_public['total'][$i];?>
								<?php endfor;?>
								<td><font color="red"><?php echo $sum_all_x;?></font></td>
							</tr>						
							<tr>
								<td colspan="<?php echo count($headcount_statistics_by_headlist_id_public['reason_public'])+2;?>"><div id="headcount_statistics_by_headlist_id_public"></div></td>
							</tr>
          </table>
    	 </div>    
		<h1 class="block">每周來訪人數統計(<?php echo $date1."~".$date2;?>)</h1>
		<div class="column1-unit">
			<table class="table table-striped">		
			<?php 
					$tabley = array_unique($headcount_statistics_by_headlist_id_week_in_private['show_time'],SORT_REGULAR);
					$tablex = array_unique($headcount_statistics_by_headlist_id_week_in_private['private'],SORT_REGULAR);
					$tabley_array_keys = array_keys($tabley);
					$tablex_array_keys = array_keys($tablex);
					$sum_all_y = "";
					$sum_all = 0;
			?>
			<tr><th></th>
			<?php for($i=0 ; $i < count($tablex);$i++):?>
			<th><?php echo $tablex[$i];?></th>
			<?php endfor;?>
			<th>總和</th>
			</tr>
			<?php for($i=0 ; $i < count($tabley);$i++):?>
			<?php $sum_all_x = 0;?>
			<tr>
				<td>
					<?php echo $tabley[$tabley_array_keys[$i]];?>
				</td>
				<?php for($j=0 ; $j < count($tablex);$j++):?>
				<td>
					<?php echo $headcount_statistics_by_headlist_id_week_in_private['total'][($i*count($tablex)+$j)];?>
					<?php $sum_all_x = $sum_all_x + $headcount_statistics_by_headlist_id_week_in_private['total'][($i*count($tablex)+$j)];?>
					<?php $sum_all = $sum_all + $headcount_statistics_by_headlist_id_week_in_private['total'][($i*count($tablex)+$j)];?>
					<?php $sum_all_y[$tablex_array_keys[$j]] = $sum_all_y[$tablex_array_keys[$j]]+$headcount_statistics_by_headlist_id_week_in_private['total'][($i*count($tablex)+$j)];?>
				</td>
				<?php endfor;?>
				<td><font color="red"><?php echo $sum_all_x;?></font></td>
			</tr>
			<?php endfor;?>
			<tr>
				<td>總和</td>
			<?php for($i=0 ; $i < count($tablex);$i++):?>
				<td><font color="red"><?php echo $sum_all_y[$tablex_array_keys[$i]];?></font></td>
			<?php endfor;?>
				<td><font color="red"><?php echo $sum_all;?></font></td>
			</tr>
			<tr>
				<td colspan="<?php echo count($tablex)+2;?>"><div id="headcount_statistics_by_headlist_id_week_in_private"></div></td>
			</tr>
			</table>
		</div>
		<h1 class="block">每月來訪人數統計(<?php echo $date1."~".$date2;?>)</h1>
		<div class="column1-unit">
			<table class="table table-striped">		
			<?php 
					$tabley = array_unique($headcount_statistics_by_headlist_id_month_in_private['show_time'],SORT_REGULAR);
					$tablex = array_unique($headcount_statistics_by_headlist_id_month_in_private['private'],SORT_REGULAR);
					$tabley_array_keys = array_keys($tabley);
					$tablex_array_keys = array_keys($tablex);
					$sum_all_y = "";
					$sum_all = 0;					
			?>
			<tr><th></th>
			<?php for($i=0 ; $i < count($tablex);$i++):?>
			<th><?php echo $tablex[$i];?></th>
			<?php endfor;?>
			<th>總和</th>
			</tr>
			<?php for($i=0 ; $i < count($tabley);$i++):?>
			<?php $sum_all_x = 0;?>
			<tr>
				<td>
					<?php echo $tabley[$tabley_array_keys[$i]];?>
				</td>
				<?php for($j=0 ; $j < count($tablex);$j++):?>
				<td>
					<?php echo $headcount_statistics_by_headlist_id_month_in_private['total'][($i*count($tablex)+$j)];?>
					<?php $sum_all_x = $sum_all_x + $headcount_statistics_by_headlist_id_month_in_private['total'][($i*count($tablex)+$j)];?>
					<?php $sum_all = $sum_all + $headcount_statistics_by_headlist_id_month_in_private['total'][($i*count($tablex)+$j)];?>
					<?php $sum_all_y[$tablex_array_keys[$j]] = $sum_all_y[$tablex_array_keys[$j]]+$headcount_statistics_by_headlist_id_month_in_private['total'][($i*count($tablex)+$j)];?>
				</td>
				<?php endfor;?>
				<td><font color="red"><?php echo $sum_all_x;?></font></td>
			</tr>
			<?php endfor;?>
			<tr>
				<td>總和</td>
			<?php for($i=0 ; $i < count($tablex);$i++):?>
				<td><font color="red"><?php echo $sum_all_y[$tablex_array_keys[$i]];?></font></td>
			<?php endfor;?>
				<td><font color="red"><?php echo $sum_all;?></font></td>
			</tr>
			<tr>
				<td colspan="<?php echo count($tablex)+2;?>"><div id="headcount_statistics_by_headlist_id_month_in_private"></div></td>
			</tr>
			</table>
		</div>	
	
		<h1 class="block">每周來訪人數統計(公開)(<?php echo $date1."~".$date2;?>)</h1>
		<div class="column1-unit">
			<table class="table table-striped">		
			<?php 
					$tabley = array_unique($headcount_statistics_by_headlist_id_week_in_public['show_time'],SORT_REGULAR);
					$tablex = array_unique($headcount_statistics_by_headlist_id_week_in_public['public'],SORT_REGULAR);
					$tabley_array_keys = array_keys($tabley);
					$tablex_array_keys = array_keys($tablex);
					$sum_all_y = "";
					$sum_all = 0;					
			?>
			<tr><th></th>
			<?php for($i=0 ; $i < count($tablex);$i++):?>
			<th><?php echo $tablex[$i];?></th>
			<?php endfor;?>
			<th>總和</th>
			</tr>
			<?php for($i=0 ; $i < count($tabley);$i++):?>
			<?php $sum_all_x = 0;?>
			<tr>
				<td>
					<?php echo $tabley[$tabley_array_keys[$i]];?>
				</td>
				<?php for($j=0 ; $j < count($tablex);$j++):?>
				<td>
					<?php echo $headcount_statistics_by_headlist_id_week_in_public['total'][($i*count($tablex)+$j)];?>
					<?php $sum_all_x = $sum_all_x + $headcount_statistics_by_headlist_id_week_in_public['total'][($i*count($tablex)+$j)];?>
					<?php $sum_all = $sum_all + $headcount_statistics_by_headlist_id_week_in_public['total'][($i*count($tablex)+$j)];?>
					<?php $sum_all_y[$tablex_array_keys[$j]] = $sum_all_y[$tablex_array_keys[$j]]+$headcount_statistics_by_headlist_id_week_in_public['total'][($i*count($tablex)+$j)];?>		
				</td>
				<?php endfor;?>
				<td><font color="red"><?php echo $sum_all_x;?></font></td>
			</tr>
			<?php endfor;?>
			<tr>
				<td>總和</td>
			<?php for($i=0 ; $i < count($tablex);$i++):?>
				<td><font color="red"><?php echo $sum_all_y[$tablex_array_keys[$i]];?></font></td>
			<?php endfor;?>
				<td><font color="red"><?php echo $sum_all;?></font></td>
			</tr>
			<tr>
				<td colspan="<?php echo count($tablex)+2;?>"><div id="headcount_statistics_by_headlist_id_week_in_public"></div></td>
			</tr>
			</table>
		</div>
		<h1 class="block">每月來訪人數統計(公開)(<?php echo $date1."~".$date2;?>)</h1>
		<div class="column1-unit">
			<table class="table table-striped">		
			<?php 
					$tabley = array_unique($headcount_statistics_by_headlist_id_month_in_public['show_time'],SORT_REGULAR);
					$tablex = array_unique($headcount_statistics_by_headlist_id_month_in_public['public'],SORT_REGULAR);
					$tabley_array_keys = array_keys($tabley);
					$tablex_array_keys = array_keys($tablex);
					$sum_all_y = "";
					$sum_all = 0;					
			?>
			<tr><th></th>
			<?php for($i=0 ; $i < count($tablex);$i++):?>
			<th><?php echo $tablex[$i];?></th>
			<?php endfor;?>
			<th>總和</th>
			</tr>
			<?php for($i=0 ; $i < count($tabley);$i++):?>
			<?php $sum_all_x = 0;?>
			<tr>
				<td>
					<?php echo $tabley[$tabley_array_keys[$i]];?>
				</td>
				<?php for($j=0 ; $j < count($tablex);$j++):?>
				<td>
					<?php echo $headcount_statistics_by_headlist_id_month_in_public['total'][($i*count($tablex)+$j)];?>
					<?php $sum_all_x = $sum_all_x + $headcount_statistics_by_headlist_id_month_in_public['total'][($i*count($tablex)+$j)];?>
					<?php $sum_all = $sum_all + $headcount_statistics_by_headlist_id_month_in_public['total'][($i*count($tablex)+$j)];?>
					<?php $sum_all_y[$tablex_array_keys[$j]] = $sum_all_y[$tablex_array_keys[$j]]+$headcount_statistics_by_headlist_id_month_in_public['total'][($i*count($tablex)+$j)];?>							
				</td>
				<?php endfor;?>
				<td><font color="red"><?php echo $sum_all_x;?></font></td>
			</tr>
			<?php endfor;?>
			<tr>
				<td>總和</td>
			<?php for($i=0 ; $i < count($tablex);$i++):?>
				<td><font color="red"><?php echo $sum_all_y[$tablex_array_keys[$i]];?></font></td>
			<?php endfor;?>
				<td><font color="red"><?php echo $sum_all;?></font></td>
			</tr>
			<tr>
				<td colspan="<?php echo count($tablex)+2;?>"><div id="headcount_statistics_by_headlist_id_month_in_public"></div></td>
			</tr>
			</table>
		</div>	