<script type="text/javascript">
$(function() {
    $('#headcount_statistics_by_headlist_id_private').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false
        },
        title: {
            text: '到訪人數統計'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}({point.percentage:.1f}%)</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} <br>({point.percentage:.1f} %)',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: '所佔比例',
            data: [
            <?php for($j=0;$j < count($headcount_statistics_by_headlist_id_private['reason_private']);$j++):?>
                ['<?php echo $headcount_statistics_by_headlist_id_private['reason_private'][$j];?>',   <?php echo $headcount_statistics_by_headlist_id_private['total'][$j];?>],
            <?php endfor;?>
            ]
        }]
    });
    $('#headcount_statistics_by_headlist_id_public').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false
        },
        title: {
            text: '到訪人數統計'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}({point.percentage:.1f}%)</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} <br>({point.percentage:.1f} %)',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: '所佔比例',
            data: [
            <?php for($j=0;$j < count($headcount_statistics_by_headlist_id_public['reason_public']);$j++):?>
                ['<?php echo $headcount_statistics_by_headlist_id_public['reason_public'][$j];?>',   <?php echo $headcount_statistics_by_headlist_id_public['total'][$j];?>],
            <?php endfor;?>
            ]
        }]
    });
 
 		<?php 
				$tabley = array_unique($headcount_statistics_by_headlist_id_week_in_public['show_time'],SORT_REGULAR);
				$tablex = array_unique($headcount_statistics_by_headlist_id_week_in_public['public'],SORT_REGULAR);
				$tabley_array_keys = array_keys($tabley);
		?>   
    $('#headcount_statistics_by_headlist_id_week_in_public').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: '每周來訪人數統計'
        },
        xAxis: {
            categories: ['<?php echo implode("','",$tabley);?>']
        },
        yAxis: {
            title: {
                text: '人次'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [
        	<?php for($i=0 ; $i < count($tablex);$i++):?>
        	{
            name: "<?php echo $tablex[$i];?>",
            data: [<?php 
            				$output = "";
            				for($j=$i ; $j < count($headcount_statistics_by_headlist_id_week_in_public['total']);$j = $j + count($tablex))
            				{
            					$output[]=$headcount_statistics_by_headlist_id_week_in_public['total'][$j];
            				}
            				echo implode(",",$output);
            			?>]
        	},
        	<?php endfor?>
        ]
    });    

 
 		<?php 
				$tabley = array_unique($headcount_statistics_by_headlist_id_month_in_public['show_time'],SORT_REGULAR);
				$tablex = array_unique($headcount_statistics_by_headlist_id_month_in_public['public'],SORT_REGULAR);
				$tabley_array_keys = array_keys($tabley);
		?>   
    $('#headcount_statistics_by_headlist_id_month_in_public').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: '每月來訪人數統計'
        },
        xAxis: {
            categories: ['<?php echo implode("','",$tabley);?>']
        },
        yAxis: {
            title: {
                text: '人次'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [
        	<?php for($i=0 ; $i < count($tablex);$i++):?>
        	{
            name: "<?php echo $tablex[$i];?>",
            data: [<?php 
            				$output = "";
            				for($j=$i ; $j < count($headcount_statistics_by_headlist_id_month_in_public['total']);$j = $j + count($tablex))
            				{
            					$output[]=$headcount_statistics_by_headlist_id_month_in_public['total'][$j];
            				}
            				echo implode(",",$output);
            			?>]
        	},
        	<?php endfor?>
        ]
    });    
 		<?php 
				$tabley = array_unique($headcount_statistics_by_headlist_id_week_in_private['show_time'],SORT_REGULAR);
				$tablex = array_unique($headcount_statistics_by_headlist_id_week_in_private['private'],SORT_REGULAR);
				$tabley_array_keys = array_keys($tabley);
		?>   
    $('#headcount_statistics_by_headlist_id_week_in_private').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: '每周來訪人數統計'
        },
        xAxis: {
            categories: ['<?php echo implode("','",$tabley);?>']
        },
        yAxis: {
            title: {
                text: '人次'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [
        	<?php for($i=0 ; $i < count($tablex);$i++):?>
        	{
            name: "<?php echo $tablex[$i];?>",
            data: [<?php 
            				$output = "";
            				for($j=$i ; $j < count($headcount_statistics_by_headlist_id_week_in_private['total']);$j = $j + count($tablex))
            				{
            					$output[]=$headcount_statistics_by_headlist_id_week_in_private['total'][$j];
            				}
            				echo implode(",",$output);
            			?>]
        	},
        	<?php endfor?>
        ]
    });    
 		<?php 
				$tabley = array_unique($headcount_statistics_by_headlist_id_month_in_private['show_time'],SORT_REGULAR);
				$tablex = array_unique($headcount_statistics_by_headlist_id_month_in_private['private'],SORT_REGULAR);
				$tabley_array_keys = array_keys($tabley);
		?>   
    $('#headcount_statistics_by_headlist_id_month_in_private').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: '每月來訪人數統計'
        },
        xAxis: {
            categories: ['<?php echo implode("','",$tabley);?>']
        },
        yAxis: {
            title: {
                text: '人次'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [
        	<?php for($i=0 ; $i < count($tablex);$i++):?>
        	{
            name: "<?php echo $tablex[$i];?>",
            data: [<?php 
            				$output = "";
            				for($j=$i ; $j < count($headcount_statistics_by_headlist_id_month_in_private['total']);$j = $j + count($tablex))
            				{
            					$output[]=$headcount_statistics_by_headlist_id_month_in_private['total'][$j];
            				}
            				echo implode(",",$output);
            			?>]
        	},
        	<?php endfor?>
        ]
    });    

});
</script>