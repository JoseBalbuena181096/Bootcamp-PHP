<?php

session_start();
$_SESSION['name'] = 'Jose Balbuena';


if(isset($_SESSION['name'])) {
    echo "Hello " . $_SESSION['name'];
}