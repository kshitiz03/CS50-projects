<?php
  $errors = '';
$myemail = 'crank.kunal@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || empty($_POST['email']) ||empty($_POST['comments']))
{
    $errors .= "\n Error: all fields are required";
}
mail("crankkunal@gmail.com",$email_subject,$_POST["comments"],"From: email");
//redirect to the 'thank you' page
header('Location: read.php?action=send');
?>