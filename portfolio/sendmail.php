<?php

    
if (isset($_POST['submit'])) {
    $usermail = $_POST['useremail'];
    $mymail = "akramettayfi@gmail.com";
    $object = $_POST['object'];
    $message = $_POST['Message'];
    

    mail($mymail,$object,$message,'From: '.$usermail);
    header("location:index.php?emailsend");
  }
  

   

   

?>