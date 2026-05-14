<?php
// refresh.php
require_once 'ApiClient.php';
$api = new ApiClient();
$data = $api->request('https://www.themealdb.com/api/json/v1/1/random.php');

// Отдаем JSON обратно в JS
header('Content-Type: application/json');
echo json_encode($data);