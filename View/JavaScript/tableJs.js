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
				$('#divSelectDb').empty();
				$('#divSelectDb').append(result);
				$('#divAddTable').show();
				$('#divElements').show();
				$('#addElement').show();
				$('#delElement').show();
				$('#editElement').show();
				$('#tableRename').show();
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

	$('body').on('click','#btnDelTable', function() {
		var delTable = $('#delTable').val();
		$.ajax
		({
			url: '../Controller/controller.php',
			data: {"delTable": delTable},
			type: 'post',
			success: function(result)
			{
				$('#msgDelTable').text(result).fadeIn(700, function()
				{
					setTimeout(function()
					{
						$('#msgDelTable').fadeOut();
					}, 2000);
				});
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

	$('body').on('click','#btnEditTable', function() { 
		var tableName = $('#tableName').val();
		var newTableName = $('#newTableName').val();
		$.ajax
		({
			url: '../Controller/controller.php',
			data: {"tableName": tableName, "newTableName": newTableName},
			type: 'post',
			success: function(result)
			{
				$('#msgEditTableName').text(result).fadeIn(700, function() 
				{
					setTimeout(function() 
					{
						$('#msgEditTableName').fadeOut();
					}, 2000);
				});
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

	$('#btnAddTable').click(function (){
		checkInt = function (value) {
			if(/^[0-9]+$/.test(value))
				return Number(value);
			return NaN;
		}
		var nomTable = $('#addTable').val();
		var nom = $('#nom').val();
		var type = $('#type').val();
		var taille = $('#taille').val();
		var index = $('#index').val();
		var aI = document.getElementById('aI').checked;
		if(nom == "" || taille == "")
			alert("Les champs marqués d'une * sont obligatoires");
		else if(!checkInt(taille))
			alert("Le champ Taille/Valeur* doit être un Nombre Entier");
		else if(aI && type != "INT")
			alert("Auto incrémentation impossible sur une valeur autre que INT");
		else
		{
			$.ajax
			({
				url: '../Controller/controller.php',
				data: {"nomTable": nomTable, "nom": nom, "type": type, "taille": taille, "index": index, "aI": aI},
				type: 'post',
				success: function(result)
				{
					$('#msgAddTable').text(result).fadeIn(700, function() 
					{
						setTimeout(function() 
						{
							$('#msgAddTable').fadeOut();
						}, 2000);
					});
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
		}
	});

$('#btnAddElement').click(function (){
	checkInt = function (value) {
		if(/^[0-9]+$/.test(value))
			return Number(value);
		return NaN;
	}
	var tableAddTarget = $('#tableAddTarget').val();
	var nomAdd = $('#nomAdd').val();
	var typeAdd = $('#typeAdd').val();
	var tailleAdd = $('#tailleAdd').val();
	var indexAdd = $('#indexAdd').val();
	var aIAdd = document.getElementById('aIAdd').checked;
	if(nomAdd== "" || tailleAdd == "")
		alert("Les champs marqués d'une * sont obligatoires");
	else if(!checkInt(tailleAdd))
		alert("Le champ Taille/Valeur* doit être un Nombre Entier");
	else if(aIAdd && typeAdd != "INT")
		alert("Auto incrémentation impossible sur une valeur autre que INT");
	else
	{
		$.ajax
		({
			url: '../Controller/controller.php',
			data: {"tableAddTarget": tableAddTarget, "nomAdd": nomAdd, "typeAdd": typeAdd, "tailleAdd": tailleAdd, "indexAdd": indexAdd, "aIAdd": aIAdd},
			type: 'post',
			success: function(result)
			{
				$('#msgAddElement').text(result).fadeIn(700, function() 
				{
					setTimeout(function() 
					{
						$('#msgAddElement').fadeOut();
					}, 2000);
				});
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
	}
});
$('#btnShowElement').click(function(){
	var tableDelTarget = $("#tableDelTarget").val();
	$.ajax
	({ 
		url: '../Controller/controller.php',
		data: {"tableDelTarget": tableDelTarget},
		type: 'post',
		success: function(result)
		{
			$('#structure').empty();
			$('#structure').append(result);
		}
	});
});
$('#structure').on('click','#btnDelElement', function () {
	var delElement = $("input[id='delElement']").val();
	$.ajax
	({ 
		url: '../Controller/controller.php',
		data: {"delElement": delElement},
		type: 'post',
		success: function(result)
		{
			$('#msgDelElement').text(result).fadeIn(700, function() 
			{
				setTimeout(function() 
				{
					$('#msgDelElement').fadeOut();
				}, 2000);
			});	
		}
	});
	$.ajax
	({
		url: '../Controller/controller.php',
		data: {"showElements": ""},
		type: 'post',
		success: function(result)
		{
			$('#structure').empty();
			$('#structure').append(result);
		}
	});
});
$('#btnEdit').click(function () {
	var tableEdit = $('#tableEdit').val();
	$.ajax
	({
		url: '../Controller/controller.php',
		data: {"tableEdit": tableEdit},
		type: 'post',
		success: function(result)
		{
			$('#structureEdit').empty();
			$('#structureEdit').append(result);
		}
	});
});
$('#structureEdit').on('click','button[name="btnTableEdit"]', function() {
	var row = $(this).closest("tr");
	nom = row.find("td:nth-child(2)").text();
	type = row.find("td:nth-child(3)").text();
	nullValue = row.find("td:nth-child(4)").text();
	numero = row.find("td:nth-child(1)").text();
	if(nullValue != "NO" && nullValue != "YES")
	{
		alert("La valeur du champ NULL doit être YES ou NO");
	}
	else
	{
		$.ajax
		({
			url: '../Controller/controller.php',
			data: {"nameEdit": nom, "typeEdit": type, "nullEdit": nullValue, "numeroEdit": numero},
			type: 'post',
			success: function(result)
			{
				$('#msgEditElement').text(result).fadeIn(700, function() 
				{
					setTimeout(function() 
					{
						$('#msgEditElement').fadeOut();
					}, 2000);
				});
			}
		});
		$.ajax
		({
			url: '../Controller/controller.php',
			data: {"actuTableEdit": ""},
			type: 'post',
			success: function(result)
			{
				$('#structureEdit').empty();
				$('#structureEdit').append(result);
			}
		});
	}
});
});

