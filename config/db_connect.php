<?php

$conn = mysqli_connect('localhost', 'sayenkiller', 'test1234', 'try_website');
//connexion check
if (!$conn) {
     echo 'Connection errors: ' . mysqli_connect_error();
}
