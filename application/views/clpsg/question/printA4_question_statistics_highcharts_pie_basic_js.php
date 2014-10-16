<script type="text/javascript">
$(function() {
	<?php for($i=0;$i < count($question_statistics_by_headlist_id);$i++):?>
    $('#<?php echo "highcharts".$array_keys[$i];?>').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: null
        },
        credits:{
        		enabled:false,	
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y} ({point.percentage:.1f}%)</b>'
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
            <?php for($j=0;$j < count($question_statistics_by_headlist_id[$array_keys[$i]]['answer_type']);$j++):?>
                ['<?php echo $question_statistics_by_headlist_id[$array_keys[$i]]['answer_type'][$j];?>',   <?php echo $question_statistics_by_headlist_id[$array_keys[$i]]['total'][$j];?>],
            <?php endfor;?>
            ]
        }]
    });
    <?php endfor;?>
});
</script>