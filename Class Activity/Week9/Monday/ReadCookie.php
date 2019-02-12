<?php
print_r($_COOKIE);

if(isset($_COOKIE['cpan204user']))
    echo $_COOKIE['cpan204user'];
else
    echo "No more Cookie!";