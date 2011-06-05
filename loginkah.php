<?php
session_start();
if(!$_SESSION['petugas']) header("Location: login.php");