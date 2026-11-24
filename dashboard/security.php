<?php
session_start();
require_once __DIR__ . '/../config.php';

if(!$_SESSION['username'])
{
    header('Location: login.php');
}
?>