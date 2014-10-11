$(function() {
	$("#headcount_form").submit(function() {return false;});
	$('#reason_public').attr('disabled',true);
	var reason_private = Array("導覽參訪","營隊活動","研習講座","體驗課程");
	var reason_public = Array("其他","其他","其他","戶外課程");
	for( var i = 0; i < 4 ; i++)
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
		var confirm_str=
		"參訪單位："+$('#unit').val()+
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
});