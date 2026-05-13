<?php

session_start();  

$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email'] ?? '');

setcookie("username", $username);
setcookie("email", $email);

$_SESSION['username'] = $username;
$_SESSION['email'] = $email;

$line = $username . ";" . $email . "\n";
file_put_contents("data.txt", $line, FILE_APPEND);

$errors = [];
if(empty($username)) $errors[] = "Имя не может быть пустым";
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Некорректный email";

if(!empty($errors)){
    $_SESSION['errors'] = $errors;
    header("Location: index.php");
    exit();
}

require_once 'ApiClient.php';
$api = new ApiClient();

$url = 'https://wttr.in/?format=j1'; 
$apiData = $api->request($url);

$_SESSION['api_data'] = $apiData;


header("Location: index.php");
exit();



