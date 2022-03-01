<?php

require __DIR__ . '/connection.php';

$todos = $db->query('SELECT * FROM todos ORDER BY DESC')->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

</body>
</html>
