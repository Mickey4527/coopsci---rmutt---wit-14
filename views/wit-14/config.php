<?php
$_SESSION['user']['role'] = 'coordinator';

    if(!isset($_SESSION['user'])){
        header('Location: ../login.php');
    }
    if(!$_SESSION['user']['role'] == 'coordinator'){
        header('Location: ../error.php?error=403&message=Permission denied');
    }
?>