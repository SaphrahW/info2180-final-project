
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$a= $_POST['Username'];
	$b= $_POST['Password'];
	
	$servername= getenv('IP');
	$database = "schema";
	$dbport = 3306;
	
	//Create connection
	try {
$pdo = new PDO('mysql:host=;dbname=schema','admin@bugme.com', );

} catch(PDOException $e){
	die('Could not connect.');
}


$statement = $pdo ->prepare('select password,email from schema');
$statement->execute();

$user = $statement -> fetch(PDO::FETCH_OBJ);

$hash = '482c811da5d5b4bc6d497ffa98491e38';

if (password_verify('password123', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

	
	$name = "Mona"; //declaration and initialization
	$Salter=mt_rand ( 100000 ,999999 );
	session_start(); 
	$session=md5(session_id());
	
?> <!-- end PHP script -->







