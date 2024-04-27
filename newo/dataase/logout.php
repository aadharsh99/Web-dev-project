<?php 
//session_start(); /* First we must start the session */ 
//session_destroy(); /* Destroy started session */ 
//header("location:home.php");  /* Redirect to login page */ 
//exit; 

require_once 'src/session.php'; 
$session = new session(); 
$session->forgetSession();      //forgets kills
