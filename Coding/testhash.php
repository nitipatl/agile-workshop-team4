<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
$new_password = password_hash('N@admin1', PASSWORD_DEFAULT);
//echo $new_password;
$pwd = md5('N@admin1');
echo $pwd;
?>
</body>
</html>