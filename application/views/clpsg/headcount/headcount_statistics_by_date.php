	<div class="main-content">
		<h1 class="block">來訪人數統計(<?php echo $date1."~".$date2;?>)</h1>
        <div class="column1-unit">
					<table class="table table-striped">				
							<tr>
								<th></th>
								<?php for($i=0;$i < count($headcount_statistics_by_headlist_id_private['reason_private']);$i++):?>
								<th><?php echo $headcount_statistics_by_headlist_id_private['reason_private'][$i];?></th>
								<?php endfor;?>
							</tr>
							<tr>
								<td>人數</td>
								<?php for($i=0;$i < count($headcount_statistics_by_headlist_id_private['reason_private']);$i++):?>
								<td><?php echo $headcount_statistics_by_headlist_id_private['total'][$i];?></td>
								<?php endfor;?>
							</tr>
							<tr>
								<td colspan="<?php echo count($headcount_statistics_by_headlist_id_private['reason_private'])+1;?>"><div id="headcount_statistics_by_headlist_id_private"></div></td>
							</tr>
          </table>
    	 </div>
		<h1 class="block">來訪人數統計(公開)(<?php echo $date1."~".$date2;?>)</h1>
        <div class="column1-unit">
					<table class="table table-striped">				
							<tr>
								<th></th>
								<?php for($i=0;$i < count($headcount_statistics_by_headlist_id_public['reason_public']);$i++):?>
								<th><?php echo $headcount_statistics_by_headlist_id_public['reason_public'][$i];?></th>
								<?php endfor;?>
							</tr>
							<tr>
								<td>人數</td>
								<?php for($i=0;$i < count($headcount_statistics_by_headlist_id_public['reason_public']);$i++):?>
								<td><?php echo $headcount_statistics_by_headlist_id_public['total'][$i];?></td>
								<?php endfor;?>
							</tr>
							<tr>
								<td colspan="<?php echo count($headcount_statistics_by_headlist_id_public['reason_public'])+1;?>"><div id="headcount_statistics_by_headlist_id_public"></div></td>
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
			?>
			<tr><th></th>
			<?php for($i=0 ; $i < count($tablex);$i++):?>
			<th><?php echo $tablex[$i];?></th>
			<?php endfor;?>
			</tr>
			<?php for($i=0 ; $i < count($tabley);$i++):?>
			<tr>
				<td>
					<?php echo $tabley[$tabley_array_keys[$i]];?>
				</td>
				<?php for($j=0 ; $j < count($tablex);$j++):?>
				<td>
					<?php echo $headcount_statistics_by_headlist_id_week_in_private['total'][($i*count($tablex)+$j)];?>
				</td>
				<?php endfor;?>
			</tr>
			<?php endfor;?>
			<tr>
				<td colspan="<?php echo count($tablex)+1;?>"><div id="headcount_statistics_by_headlist_id_week_in_private"></div></td>
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
			?>
			<tr><th></th>
			<?php for($i=0 ; $i < count($tablex);$i++):?>
			<th><?php echo $tablex[$i];?></th>
			<?php endfor;?>
			</tr>
			<?php for($i=0 ; $i < count($tabley);$i++):?>
			<tr>
				<td>
					<?php echo $tabley[$tabley_array_keys[$i]];?>
				</td>
				<?php for($j=0 ; $j < count($tablex);$j++):?>
				<td>
					<?php echo $headcount_statistics_by_headlist_id_month_in_private['total'][($i*count($tablex)+$j)];?>
				</td>
				<?php endfor;?>
			</tr>
			<?php endfor;?>
			<tr>
				<td colspan="<?php echo count($tablex)+1;?>"><div id="headcount_statistics_by_headlist_id_month_in_private"></div></td>
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
			?>
			<tr><th></th>
			<?php for($i=0 ; $i < count($tablex);$i++):?>
			<th><?php echo $tablex[$i];?></th>
			<?php endfor;?>
			</tr>
			<?php for($i=0 ; $i < count($tabley);$i++):?>
			<tr>
				<td>
					<?php echo $tabley[$tabley_array_keys[$i]];?>
				</td>
				<?php for($j=0 ; $j < count($tablex);$j++):?>
				<td>
					<?php echo $headcount_statistics_by_headlist_id_week_in_public['total'][($i*count($tablex)+$j)];?>
				</td>
				<?php endfor;?>
			</tr>
			<?php endfor;?>
			<tr>
				<td colspan="<?php echo count($tablex)+1;?>"><div id="headcount_statistics_by_headlist_id_week_in_public"></div></td>
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
			?>
			<tr><th></th>
			<?php for($i=0 ; $i < count($tablex);$i++):?>
			<th><?php echo $tablex[$i];?></th>
			<?php endfor;?>
			</tr>
			<?php for($i=0 ; $i < count($tabley);$i++):?>
			<tr>
				<td>
					<?php echo $tabley[$tabley_array_keys[$i]];?>
				</td>
				<?php for($j=0 ; $j < count($tablex);$j++):?>
				<td>
					<?php echo $headcount_statistics_by_headlist_id_month_in_public['total'][($i*count($tablex)+$j)];?>
				</td>
				<?php endfor;?>
			</tr>
			<?php endfor;?>
			<tr>
				<td colspan="<?php echo count($tablex)+1;?>"><div id="headcount_statistics_by_headlist_id_month_in_public"></div></td>
			</tr>
			</table>
		</div>	