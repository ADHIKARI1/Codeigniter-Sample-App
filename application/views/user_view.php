<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Welcome</h1>
	<ul>
		<?php foreach($users as $user): ?>
		<li><?php echo $user->username; ?></li>
		<?php endforeach; ?>
	</ul>
	
</body>
</html>