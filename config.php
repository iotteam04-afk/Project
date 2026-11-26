<?php

$db_host = "localhost";
$db_name = "sheights";
$db_user = "shop";
$db_pass = "shop_dev_pw";

$conn= new PDO ("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass,
[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
]
);



function e($value)
{
    return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8");
}