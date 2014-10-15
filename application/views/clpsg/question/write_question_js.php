<script>
$(function() {
	$('body,html').animate({scrollTop: 480},700);
	$("#ckeck_all_8").click(function() {
	   if($("#ckeck_all_8").prop("checked"))
	   {
	   	 $("#ckeck_all_8").prop("checked", false);	
	     $("input[name='8[]']").each(function() {
	         $(this).prop("checked", false);	         
	     });
	   }
	   else
	   {
	     $("input[name='8[]']").each(function() {
	     		 $("#ckeck_all_8").prop("checked", true);	
	         $(this).prop("checked", true);
	     });           
	   }
	   return false;
	});
	$("#ckeck_all_9").click(function() {
	   if($("#ckeck_all_9").prop("checked"))
	   {
	   	$("#ckeck_all_9").prop("checked", false);	
	     $("input[name='9[]']").each(function() {
	         $(this).prop("checked", false);
	     });
	   }
	   else
	   {
	   	 $("#ckeck_all_9").prop("checked", true);	
	     $("input[name='9[]']").each(function() {
	         $(this).prop("checked", true);
	     });           
	   }
	   return false;
	});
});
</script>