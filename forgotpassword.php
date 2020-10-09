<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Forgot Password</title>
</head>
<body>
<?php
    $email=$_GET["email"];
    $conn=mysqli_connect("studentrecord.local","root","","mysql");
    $query="SELECT password FROM STUDENT WHERE email='$email'";
    $check=mysqli_query($conn,$query);
    foreach($check as $rows){
        foreach($rows as $value){
        }
    }
    require 'PHPMailerAutoload.php';
    $mail= new PHPMailer;
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';

    $mail->Username='harrypahwa97@gmail.com';
    $mail->Password='';

    $mail->setFrom('harrypahwa97@gmail.com','Student Registration Portal');
    $mail->addAddress("$email");
    $mail->addReplyTo('harrypahwa97@gmail.com');

    $mail->isHTML(true);
    $mail->Subject='Forgot Password';
    $mail->Body="<h5>Password for $email is : $value </h5><br><a href='http://studentrecord.local/login.html'>Log in</a>";
    if(!$mail->send()){
        echo "mail was not send";
    }
    else{
    echo ("
        <div class='container'>
            <h3>password sent to your E-mail : $email </h3>
        </div>
        <div class='row'>
                        <div class='col-md-20 mx-auto'>
                            <br>
                            <button class='btn btn-info'> <a href='login.html' style='color:white;' >Log In Again</a></button>
                            <button class='btn btn-info'> <a href='student-management.html' style='color:white;' >Home</a></button>
                        </div>
        </div>
    ");
    }
?>
</body>
</html>