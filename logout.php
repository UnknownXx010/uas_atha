<?php
session_start();
session_destroy();
header("Location: /uas_atha/login.php");
exit;
?>