// JavaScript Document
$(document).ready(function(e) {
    $('#bmitext').hide();
	$('input[type="radio"]').eq(1).change(function(){
		$('#bmitext').show()
	});
});