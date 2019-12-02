<?php

$y= $_POST['ID'];
$z= $_POST['Title'];
$a= $_POST['Description'];
$b= $_POST['Type'];
$c= $_POST['Priority'];
$d= $_POST['Status'];
$e= $_POST['assigned_to'];
$f= $_POST['created_by'];
$g= $_POST['created'];
$h= $_POST['updated'];



$servername= getenv('IP');
$database = "schema";
$dbport = 3306;


//Create connection
try {
$pdo = new PDO('mysql:host=;dbname=schema','admin@bugme.com', );

} catch(PDOException $e){
	die('Could not connect.');
}

$statement = $pdo ->prepare('select issues from schema');
$statement->execute();

$user = $statement -> fetch(PDO::FETCH_OBJ);


$sql = "INSERT INTO users (Title, Description, assigned_to, Type, Priority ) VALUES ($z,$a,$e,$b,$c)";
$statement = $pdo->prepare($sql);
$statement ->execute([$Title,$Description,$assigned_to,$Type,$Priority]);	



$z = filter_input(INPUT_POST, 'Title',
FILTER_SANITIZE_STRING);
$statement->bindParam(':Title', $z, PDO::PARAM_STRING);
$statement ->execute(); 

$a = filter_input(INPUT_POST, 'Description',
FILTER_SANITIZE_STRING);
$statement->bindParam(':Description', $a, PDO::PARAM_STRING);
$statement ->execute();

$e = filter_input(INPUT_POST, 'assigned_to',
FILTER_SANITIZE_STRING);
$statement->bindParam(':assigned_to', $e, PDO::PARAM_STRING);
$statement ->execute();

$b = filter_input(INPUT_POST, 'Type',
FILTER_SANITIZE_STRING);
$statement->bindParam(':Type', $b, PDO::PARAM_STRING);
$statement ->execute();

$c = filter_input(INPUT_POST, 'Priority',
FILTER_SANITIZE_STRING);
$statement->bindParam(':Priority', $c, PDO::PARAM_STRING);
$statement ->execute();


$sql= "SELECT ID , Title , Description , Type , Priority , Status, assigned_to, created_by, created, updated FROM Issues";
$result= $pdo->query($sql);

if($result->num_rows > 0){
	//output data in rows
	//var_dump($result->fetch_assoc());exit;
echo "<table>";
	while ($row = $result->fetch_assoc()){
		echo 
		"</td><td> ID:"     ." " .$row["ID"] . 
		"</td><td> Type:"      ." " .$row["Type"].
		"</td><td> Status:"      ." " .$row["Status"].
		"</td><td> Assigned:"      ." " .$row["assigned_to"].
		"</td><td> Created:"      ." " .$row["created"]. "</td></tr>";
	}
echo "</table>";

}else{
	echo "0 result";
}
$conn->close();

?>