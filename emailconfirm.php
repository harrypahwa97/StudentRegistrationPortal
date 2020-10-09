<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email confirmation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    $connect=mysqli_connect("studentrecord.local","root","","mysql");
    $email=$_GET["email"];
    $query="SELECT * FROM STUDENT WHERE email='$email' AND status=0";
    $check=mysqli_query($connect,$query);
    if(mysqli_num_rows($check)>0){
        $query2="UPDATE STUDENT SET status='ACTIVE' WHERE email='$email'";
        $verify=mysqli_query($connect,$query2);
        if(empty($verify))
            echo "you were not registered plss register again";
        else    
            echo "verified succesfully! thanks for registering";
    }
    else
        echo "you are not registered plss register again";
    echo ("
            <div class='row'>
            <div class='col-md-20 mx-auto'>
                <br>
                <button class='btn btn-info'> <a href='student-management.html' style='color:white;' >Home</a></button>
            </div>
            </div>
        ");    
    mysqli_close($connect);
?>    
</body>
</html>