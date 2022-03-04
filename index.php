<?php
require __DIR__ . '/connection.php';
require __DIR__ . '/helpers.php';



//$todos = $db->query('SELECT * FROM todos ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
$todos = $db->query('SELECT * FROM todos ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>


<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
	<title></title>
	<style type="text/css">

		tr.updated td {
			background-color: green;
			color: #fff;
		}

		tr.inserted td {
			background-color: blue;
			color: #fff;
		}
	</style>
</head>


<body>

<div class="popup">
	
</div>

<hr>

<button class="new-todo">Yeni ekle</button>

<hr>

<table id="todo-table" border="1">

<!-- TABLO -->
	<thead>
		<tr>
			<th>Todo</th>
			<th>Tip</th>
			<th>Yapıldı mı?</th>
			<th>&nbsp;</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach($todos as $todo): ?>
			<?php require __DIR__ . '/static/todo-item.php'; ?>
		<?php endforeach; ?>
	</tbody>

</table>
<!-- TABLO Bitiş -->






<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
	//yeni ekle butonuna tıklanınca popup'ın açılması için api.php'e data içinde action ile new-to-popup'u gönderiyoruz.
$('.new-todo').on('click',function(e){
	const data = {
		action : 'new-todo-popup'
	}

	$.post('api.php',data, function(response){
		$('.popup').html(response.html)
	},'json')
});

$(document.body).on('click', '.todo-edit', function(){

	const data = {
		id : $(this).data('id'),
		action : 'edit-todo-popup'
	}

	$.post('api.php',data, function(response){
		$('.popup').html(response.html)
	},'json')

});

$(document.body).on('click', '.todo-delete', function(){

	const id = $(this).data('id')
	const data = {
		id : id,
		action : 'delete-todo'
	}

	$.post('api.php',data, function(response){
		if (response.error) {
			alert(response.error)
		} else {
			$('#todo_'+id).remove();
		}
		
	},'json')

});



</script>

</body>

</html>