<?php
session_start();
include "path.php"; 

unset($_SESSION['id']);
unset($_SESSION['login']); // Убедись, что в БД поле называется 'username'
unset($_SESSION['admin']);

  
header('location: ' . BASE_URL);