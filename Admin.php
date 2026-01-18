<?php
// Check if username and password are correct
$username = $_POST['username'];
$password = $_POST['password'];

// You should have a proper authentication mechanism here, such as querying a database
$correct_username = 'admin@gmail.com';
$correct_password = 'ad1212';

if ($username === $correct_username && $password === $correct_password) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>