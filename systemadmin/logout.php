<?php
include("../inc/class.mainlib.inc.php");
admsessions();
$_SESSION["admuserid"] = '';
$_SESSION["admsessionid"] = '';
session_destroy();
header("Location: login.php");
?>