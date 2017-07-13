<?php
if (@$_POST['email']!='') {
	$email = $_POST['email'];
	$email = SQLite3::escapeString($email);
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {	
		$db = new SQLite3('main.db');
		$result = $db->query('insert into emails(email) values("'.$email.'")');
		if ($result) {
			exit(0);
		}
	}
	header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
} else {
	echo file_get_contents(__DIR__ . '/index.html.old');
}

