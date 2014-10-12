<script>
$(function() {
	$("#headcount_form").submit(function() {return false;});
	$('#reason_public').attr('disabled',true);
	var reason_private = Array("<?php echo implode("\",\"",$reason);?>");
	for( var i = 0; i < reason_private.length ; i++)
	{
		$("#reason_private").append($("<option></option>").attr("value", reason_private[i]).text(reason_private[i]));
	}
	$('#reason_private').change(function(){
		var a = reason_private.indexOf($("#reason_private").val());
		$('#reason_public').val(reason_public[a]);
	});
	$('#submit1').click(function(){
		if($('#unit').val()=="" || $('#region').val()==""|| $('#datepicker').val()==""|| $('#reason_private').val()==""|| $('#timepicker1').val()==""|| $('#timepicker2').val()==""|| $('#headcount').val()==""|| $('#username').val()=="" )
		{
			alert('參數有缺少');
			return false;
		}
		if($('#headcount').val() < 1 || $('#headcount').val() >= 150 )
		{
			var r = confirm("人數異常，請確認是否要輸入這個值。");
			if (r != true) {return false;}
		}		
		var confirm_str=
		"請確認以下修改資料‧\r\n	參訪單位："+$('#unit').val()+
		"\r\地區："+$('#region').val()+
		"\r\n日期："+$('#datepicker').val()+
		"\r\n事由："+$('#reason_private').val()+
		"\r\n進入時間："+$('#timepicker1').val()+
		"\r\n離開時間：:"+$('#timepicker2').val()+
		"\r\n參訪人數："+$('#headcount').val()+
		"\r\n填寫人："+$('#username').val();
		
		var r = confirm(confirm_str);
		if (r == true) {
			$("#headcount_form").get(0).submit();
			}
		});
	$("#datepicker").change(function(){
		$("#no_group").find('option').remove();
		$.ajax({
			url: '<?php echo base_url('headcount/get_two_week_headcount');?>',
			data: 'query_date='+$("#datepicker").val(),
			type:"POST",
			dataType:'json',
			success: function(return_json){
				for(var i =0 ; i < return_json.no.length ; i++)
				{
					$("#no_group").append($("<option></option>").attr("value", return_json.no[i]).text(return_json.no_info[i]));
				}
      },
		});
	});
	if($("#datepicker").val()!="")
	{
		$("#no_group").find('option').remove();
		$.ajax({
			url: '<?php echo base_url('headcount/get_two_week_headcount');?>',
			data: 'query_date='+$("#datepicker").val(),
			type:"POST",
			dataType:'json',
			success: function(return_json){
			for(var i =0 ; i < return_json.no.length ; i++)
			{
				if($("#no").val()==return_json.no[i])
				{
					$("#no_group").append($("<option selected></option>").attr("value", return_json.no[i]).text(return_json.no_info[i]));
				}
				else
				{
					$("#no_group").append($("<option></option>").attr("value", return_json.no[i]).text(return_json.no_info[i]));
				}
			}
			},
		});

	}
});	
</script>