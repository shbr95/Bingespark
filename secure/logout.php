<?php
session_start();

if(!isset($_SESSION["accountid"])) {
    session_destroy();
    header("Location: ../landing.php");
} else {
    session_destroy();
    header("Location: ../landing.php");
}