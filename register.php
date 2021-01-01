<?php

$fname=val($_POST["fname"]);
$lname=val($_POST["lname"]);
$email=val($_POST["email"]);


function val($data) {
$data=trim($data);
$data=stripslashes($data);
$data=htmlspecialchars($data);
return $data;

}

$servername="localhost";
$username="root";
$password="Vinay@11";
$dbname="mywebsite";

//create connection

$conn= new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error) {
die("connection failed:".$conn->connect_error);
}

$sql="insert into users(firstname,lastname,email)
values('$fname', '$lname','$email')";

if($conn->query($sql) === TRUE) {
$last_id=$conn->insert_id;
echo "new record created succesfully.Record id is:".$last_id;
}
else{
echo "error: " .$sql ."<br>" . $conn->error;
}
$conn->close();
?>