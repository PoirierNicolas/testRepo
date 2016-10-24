$(document).ready(function () {
	$('#btnFreeReq').click(function(){
		var req = $("#inputFreeReq").val();
		
		$.ajax
		({ 
			url: '../Controller/controller.php',
			data: {"freeReq": req},
			type: 'post',
			success: function(result)
			{
				$('#divFreeReq').empty();
				$('#divFreeReq').append(result);
			}
		});
	});
});