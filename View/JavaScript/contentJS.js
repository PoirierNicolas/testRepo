$(document).ready(function () {
	$('#btnChoiceDb').click(function(){
		var db = $("#choiceDb").val();

		$.ajax
		({ 
			url: '../Controller/controller.php',
			data: {"choiceDb": db},
			type: 'post',
			success: function(result)
			{
				$('#divSelectDb').hide();
				$('#divSelectTable').show();
			}
		});

		$.ajax
		({
			url: '../Controller/controller.php',
			data: {"showTables": ""},
			type: 'post',
			success: function(result)
			{
				$('#listTables').empty();
				$('#listTables').append(result);
			}
		});
	});

	$('#btnChoiceTable').click(function(){
		var table = $('#choiceTable').val();
		$.ajax
		({
			url: '../Controller/controller.php',
			data: {"showTableContent": table},
			type: 'post',
			success: function(result)
			{
				$('#listLines').empty();
				$('#listLines').append(result);
				$('#divAddLines').show();
			}
		});
	});

	$('#listLines').on('click','button[name="btnLineDelete"]', function() {
		var row = $(this).closest("tr");
		var lineToDel = row.find("td:nth-child(1)").text();
		var id = $('#tableLines th:first').html();
		$.ajax
		({
			url: '../Controller/controller.php',
			data: {"lineToDel": lineToDel, "idLine": id},
			type: 'post',
			success: function(result)
			{
				$('#msg2').text(result).fadeIn(700, function() 
				{
					setTimeout(function() 
					{
						$('#msg2').fadeOut();
					}, 2000);
				});
			}
		});
		$.ajax
		({
			url: '../Controller/controller.php',
			data: {"actuTableLines": ""},
			type: 'post',
			success: function(result)
			{
				$('#listLines').empty();
				$('#listLines').append(result);
			}
		});
	});

	$('#btnAdd').click(function() {
		$.ajax
		({
			url: '../Controller/controller.php',
			data: {"showTableAddLine": ""},
			type: 'post',
			success: function(result)
			{
				$('#tableAddLine').empty();
				$('#tableAddLine').append(result);
			}
		});
	});

	$('#tableAddLine').on('click','button[id="btnAddLine"]', function() {
		var toServer = {};
		var i = 0;
		var data = $('#tableAddLine tbody tr td').each(function(key, value) {
			toServer[i] = $(this).text();
			i++;
		});

		$.ajax
		({
			url: '../Controller/controller.php',
			data: {"toServer": toServer},
			type: 'post',
			success: function(result)
			{
				$('#msgAddLines').text(result).fadeIn(700, function() 
				{
					setTimeout(function() 
					{
						$('#msgAddLines').fadeOut();
					}, 10000);
				});
			}
		});
		$.ajax
		({
			url: '../Controller/controller.php',
			data: {"actuTableLines": ""},
			type: 'post',
			success: function(result)
			{
				$('#listLines').empty();
				$('#listLines').append(result);
			}
		});
	});
});