<?php
  if(!session_start()){
    header('location: index.php');
  }
  else{
      session_unset();
      session_destroy();
      header('location: index.php');
  }