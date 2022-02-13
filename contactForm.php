<?php

$error = "";
$successMessage ="";

if($_POST){
    if(!$_POST["email"]){
        $error .= "An email address is required.<br>";
    }
    if(!$_POST["message"]){
        $error .= "An content is required.<br>";

    }

    if(!$_POST["subject"]){
        $error .= "the subject address is required.<br>";
    }

    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false){
        $error .= "the email address is invalid.<br>";
    }

    if($error != ""){
        $error = '<div class="alert alert-dangr" role="alert"><p><strong>There were error(s) in your form:</strong></p>' . $error . '</div>';
    }else {
        $emailTo = " ";
        $subject = $_POST['subject'];
        $content = $_POST['message'];
        $headers = "From: " . $_POST['email'];

        if(mail($emailTo, $subject, $content, $headers)){
            $successMessage = '<div class="alert alert-success" role="alert">Your message was sent successfully, we\'ll get back to you ASAP!</div>';
        }else{
            $error = '<div class="alert alert-danger" role="alert"><strong>Ypur message couldn\'t be sent, pleas try again later</strong></div>';
        }

    }


}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
     crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>contact Form</title>
  </head>
  <body>
   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
     <div class="container" >
         <h1>Get in Touch! </h1>
         <div id="error"><? echo $error.$successMessage ?></div>
         <form method="post">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="subject" class="form-label">Subject</label>
    <input type="text" class="form-control" id="subject" name="subject">
  </div>
  <div class="mb-3">
  <label for="message"> What you want Ask us</label>
  <textarea class="form-control" id="message" rows="3" name="message"></textarea>
  
</div>
<br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<script type="text/javascript">
    $("form").submit(function(){
        let error = "";

        if($("#email").val() == ""){
        error += "The email field is required.<br>"
        }

        if($("#subject").val() == ""){
        error += "The subject field is required.<br>"
        }

        if($("#message").val() == ""){
        error += "The content field is required.<br>"
        }

        if(error != ""){
            $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were some error(s) in your form:</strong></p>' + error + '</div>');
        
        return false;

        }else{
            return true;

        }


    })
    </script>

  </body>
</html>