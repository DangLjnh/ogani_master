<?php
if (!isset($_SESSION)) session_start();
if ($_SESSION['nameUser']) unset($_SESSION['nameUser']);
if ($_SESSION['nameAdmin']) unset($_SESSION['nameAdmin']);
if ($_SESSION['currentUser']) unset($_SESSION['currentUser']);
header('Location: ../view/login.php');