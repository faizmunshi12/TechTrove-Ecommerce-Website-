<?php

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'faiz');

// Check if the connection was successful
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Get the signup form data
$firstname= $_POST['fname'];
$lastname = $_POST['lname'];
$gender = $_POST['gender'];
$phoneno = $_POST['phoneno'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password
//$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert the new user into the database
$sql = 'INSERT INTO signup (fname, lname, gender, phoneno, email, password) VALUES (?, ?, ?, ?, ?, ?)';
$stmt = $conn->prepare($sql);
$stmt->bind_param('sssiss', $firstname, $lastname, $gender, $phoneno, $email, $password);
$stmt->execute();

// Close the database connection
$conn->close();

// Redirect the user to the login page
header('Location: /Forms/electro-master/index.html');

?>