<?php
    session_start();
      if( !isset($_SESSION['username']) && !isset($_SESSION['senha']) ) {
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['senha']);
        //header('location:index.php');
      }
