<?php
// Get the username and password input fields from the login form
$username = $_POST["uname"];
$password = $_POST["psw"];
$client = new MongoClient();
// Select the database and collection
$db = $client->mydb;
$collection = $db->users;

// Find the user with the given
?>