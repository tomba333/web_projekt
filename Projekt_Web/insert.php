<?php
include 'dbo-conn.php';

$conn = OpenCon();
 
$ime = $_REQUEST['ime'];
$prezime = $_REQUEST['prezime'];
$datum = $_REQUEST['datum'];
$email = $_REQUEST['email'];
$br_gostiju = $_REQUEST['br_gostiju'];
$stol =isset($_POST['stol'])?$_POST['stol']:'not yet';
$sql = "INSERT INTO rezervacija (ime,prezime,datum,email,broj_gostiju,stol)
VALUES ('$ime','$prezime','$datum','$email','$br_gostiju','$stol')";
if (mysqli_query($conn, $sql)) {
    header('Location: ./index.php');
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}



CloseCon($conn);




?>