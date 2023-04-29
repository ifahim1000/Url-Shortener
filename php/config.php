<?php
 $conn=mysqli_connect("localhost","root","root","urlshortener");
 if(!$conn)
 {
    echo "errr".mysqli_connect_error();
 }
 
?>