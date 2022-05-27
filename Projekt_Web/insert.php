<?php
include 'dbo-conn.php';

$conn = OpenCon();
 
$ime = $_REQUEST['ime'];
$prezime = $_REQUEST['prezime'];
$datum = $_REQUEST['datum'];
$email = $_REQUEST['email'];
$br_gostiju = $_REQUEST['br_gostiju'];
$sql = "INSERT INTO rezervacija (ime,prezime,datum,email,broj_gostiju)
VALUES ('$ime','$prezime','$datum','$email','$br_gostiju')";
if (mysqli_query($conn, $sql)) {
    header('Location: ./index.php');
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
CloseCon($conn);




?>