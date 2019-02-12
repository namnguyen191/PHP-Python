<?php
session_start();
if(isset($_SESSION['IT_Developer']))
    echo $_SESSION['IT_Developer'];
else
    echo "No variable exist in session!";