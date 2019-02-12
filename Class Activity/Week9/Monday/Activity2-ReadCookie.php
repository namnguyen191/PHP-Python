<?php
if(isset($_COOKIE['IT_Developer']))
    echo $_COOKIE['IT_Developer'];
else
    echo "No cookie!";