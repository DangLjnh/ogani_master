<?php
if (!isset($_SESSION)) session_start();
if ($_SESSION['nameUser']) unset($_SESSION['nameUser']);
if ($_SESSION['nameAdmin']) unset($_SESSION['nameAdmin']);
header('Location: ../view/login.php');