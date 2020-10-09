<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        h2 {
        text-transform: uppercase;
        font-weight: 400;
        }
        h3 {
          font-weight: 400;
        }
    </style>
</head>
<body>
    <div class="main-block">
        <div>
            <?php 
                $target_dir = "C:\Users\hitesh pahwa\Documents\GitHub\assignment-student-registration-portal/";
                $connection=mysqli_connect("studentrecord.local","root","","mysql");        
                $name=$_POST["name"];
                if(empty($_POST["age"]))
                    $age=0;
                else
                    $age=$_POST["age"];
                $rollno=$_POST["rollnumber"];
                $course=$_POST["course"];
                $phonenumber=$_POST["phonenumber"];
                $email=$_POST["email"];
                $password=$_POST["psw"];
                $q="SELECT * FROM STUDENT WHERE email='$email'";
                $verify=mysqli_query($connection,$q);
                if(mysqli_num_rows($verify)>0)
                    echo "<h3 class='text-center'>E-mail Already Exists!</h3><br>";
                else{
                    $target_file = $target_dir . basename($_FILES["customFile"]["name"]);           
                    if (move_uploaded_file($_FILES["customFile"]["tmp_name"], $target_file)) {
                        $pictureName = basename( $_FILES["customFile"]["name"]);
                        $status="NOT ACTIVE";
                        $query="INSERT INTO STUDENT VALUES('$name',$age,$rollno,'$course',$phonenumber,'$pictureName','$email','$status','$password')";
                        $check=mysqli_query($connection,$query);
                        echo (!$check) ? "
                            <div class='container'>
                            <h3 class='text-center'>Form Not Submitted</h3><br>
                            </div>
                        " : "
                            <div class='container'>
                            <h3 class='text-center'>you have been registered .Please click the link sent to your email to verify </h3><br>
                            </div>
                        " ;
                        mysqli_close($connection);
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
                $mail->Subject='Student Registration Confirmation';
                $mail->Body="<h3 align=center>click the link below confirm registration</h3><br> <a href='http://studentrecord.local/emailconfirm.php?email=$email'>Click here</a>";
                if(!$mail->send()){
                    echo "mail was not send";
                }
          ?>
          </div>
          <div>
              <h5>&nbsp; &nbsp; wanna submit another response <a href="register.html">click here</a></h5>
          </div>
          <div class="row">
              <div class="col-md-20 mx-auto">
                  <br>
                  <br>
                  <button class="btn btn-info"> <a href="student-management.html" style="color:white;" >Home</a></button>
              </div>
          </div>
    </div>
  </body>
</html>