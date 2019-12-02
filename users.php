<?php

$y= $_POST['ID'];
$z= $_POST['FirstName'];
$a= $_POST['LastName'];
$b= $_POST['password'];
$c= $_POST['email'];
$d= $_POST['date_joined'];



$servername= getenv('IP');
$database = "schemaDB";
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


$ucl = preg_match('/[A-Z]/', $b); // Uppercase Letter
$lcl = preg_match('/[a-z]/', $b); // Lowercase Letter
$dig = preg_match('/\d/', $b); // Numeral
if( strlen($b) >= 8 and $ucl and $lcl and $dig == TRUE){

	$sql = "INSERT INTO users (FirstName, LastName, password, email) VALUES ($z,$a,$b,$c)";
	$statement = $pdo->prepare($sql);
	$statement ->execute([$FirstName,$LastName,$password,$email]);	
}


$z = filter_input(INPUT_POST, 'FirstName',
FILTER_SANITIZE_STRING);
$statement->bindParam(':FirstName', $z, PDO::PARAM_STRING);
$statement ->execute(); 

$a = filter_input(INPUT_POST, 'LastName',
FILTER_SANITIZE_STRING);
$statement->bindParam(':LastName', $a, PDO::PARAM_STRING);
$statement ->execute();

$b = filter_input(INPUT_POST, 'password',
FILTER_SANITIZE_STRING);
$statement->bindParam(':password', $b, PDO::PARAM_STRING);
$statement ->execute();

$c = filter_input(INPUT_POST, 'email',
FILTER_SANITIZE_STRING);
$statement->bindParam(':email', $c, PDO::PARAM_STRING);
$statement ->execute();


$sql= "SELECT ID , FirstName , LastName , password , email , date_joined FROM Users";
$result= $conn->query($sql);

if($result->num_rows > 0){
	//output data in rows
	//var_dump($result->fetch_assoc());exit;
echo "<table>";
	while ($row = $result->fetch_assoc()){
		echo 
		"</td><td> ID:"     ." " .$row["ID"] . 
		"</td><td> FirstName:"      ." " .$row["FirstName"].
		"</td><td> LastName:"      ." " .$row["LastName"].
		"</td><td> password:"      ." " .$row["password"].
		"</td><td> email:"      ." " .$row["email"].
		"</td><td> date_joined:"      ." " .$row["date_joined"]. "</td></tr>";
	}
echo "</table>";

}else{
	echo "0 result";
}
$conn->close();

?>