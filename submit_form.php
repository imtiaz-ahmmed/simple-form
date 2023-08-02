<?php

$servername = "localhost";

$dbname = "userInfo";


$conn = new mysqli($servername, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$stmt = $conn->prepare("INSERT INTO userDetails (first_name, last_name, email, phone, message) VALUES ($first_name, $last_name, $email, $phone, $message)");
$stmt->bind_param("information", $first_name, $last_name, $email, $phone, $message);

if ($stmt->execute()) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
