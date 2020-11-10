<?php
// destruction = deconnection
session_start();

session_destroy();

header ("Location: ../login.php");

?>