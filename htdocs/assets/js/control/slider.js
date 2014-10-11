$(function() {
	$('#headcount_slider').slider({
		orientation: "horizontal",
		value: 10,
		min: -1,
		max: 150,
		step: 1,
		slide: function(event, ui) {
      $("#headcount").val($("#headcount_slider").slider("value"));
    },
	});
	$("#headcount").change(function(){
			var index = $(this).val();
			if(index <= 0 || index >= 150)
			{
				var r = confirm("人數可能小於零或人數過多，你確定是否要輸入這個數字?");
				if (r != true) {
						$("#headcount").val(0);
				}
			}
			$("#headcount_slider").slider('value', this.value);
			refreshSliders( index - 0 );
	});
});