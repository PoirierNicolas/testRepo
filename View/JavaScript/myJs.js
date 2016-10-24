$(document).ready(function () {
	$('#btnAddDb').click(function(){
		var newDb = $("#addDb").val();

		$.ajax
		({ 
			url: '../Controller/controller.php',
			data: {"newDb": newDb},
			type: 'post',
			success: function(result)
			{
				$('#test').text(result).fadeIn(700, function() 
				{
					setTimeout(function() 
					{
						$('#test').fadeOut();
					}, 2000);
				});
			}
		});
		$.ajax
		({
			url: '../Controller/controller.php',
			data: {"showDb": ""},
			type: 'post',
			success: function(result)
			{
				$('#listDb').empty();
				$('#listDb').append(result);
			}
		});
	});

	$('#btnDelDb').click(function(){
		var delDb = $("#delDb").val();

		$.ajax
		({ 
			url: '../Controller/controller.php',
			data: {"delDb": delDb},
			type: 'post',
			success: function(result)
			{
				$('#msgDelDb').text(result).fadeIn(700, function() 
				{
					setTimeout(function() 
					{
						$('#msgDelDb').fadeOut();
					}, 2000);
				});
			}
		});
		$.ajax
		({
			url: '../Controller/controller.php',
			data: {"showDb": ""},
			type: 'post',
			success: function(result)
			{
				$('#listDb').empty();
				$('#listDb').append(result);
			}
		});
	});

	$('#btnEdit').click(function(){
		var nameDb = $("#nameDb").val();
		var newName = $("#newName").val();
		$.ajax
		({ 
			url: '../Controller/controller.php',
			data: {"nameDb": nameDb,"newName": newName},
			type: 'post',
			success: function(result)
			{
				$('#msgName').text(result).fadeIn(700, function() 
				{
					setTimeout(function() 
					{
						$('#msgName').fadeOut();
					}, 2000);
				});
			}
		});
		$.ajax
		({
			url: '../Controller/controller.php',
			data: {"showDb": ""},
			type: 'post',
			success: function(result)
			{
				$('#listDb').empty();
				$('#listDb').append(result);
			}
		});
	});
});