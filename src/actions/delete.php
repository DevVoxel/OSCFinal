<?php require_once '../include/functions.php';

deletePost($_GET['id'] ?? 0);
header('Location: ../forum.php');