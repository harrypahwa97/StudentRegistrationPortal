<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <?php
            $conn=mysqli_connect("studentrecord.local","root","","mysql");
            $email=$_POST["email"];
            $password=$_POST["psw"];
            $query="SELECT name FROM STUDENT WHERE email='$email'";
            $check=mysqli_query($conn,$query);
            if(mysqli_num_rows($check)>0){
                $query2="SELECT password FROM STUDENT WHERE email='$email'";
                $check2=mysqli_query($conn,$query2);
                foreach($check as $rows2){
                    foreach($rows2 as $item){
                    }
                }
                foreach($check2 as $rows){
                    foreach($rows as $values){
                    }
                }
                if($values==$password){
                    echo "<h3 class='text-center'>WELCOME $item!</h3> ";
                    echo '<h4>All registered student list:</h4>';
                    echo("
                            <table class='table'>
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Roll No</th>
                                <th>Course</th>
                                <th>Phone Number</th>
                                <th>Image name</th>
                                <th>E-mail</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                    ");
                    $query3="SELECT name,age,rollno,course,phonenumber,image,email,status FROM student";
                    $arr=mysqli_query($conn,$query3);
                    foreach($arr as $rows){
                        echo "<tr>";
                        foreach($rows as $value)
                            echo "<td>$value &nbsp &nbsp </td>";    
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table><br><br>";
                    echo('
                            <div class="container">
                            <h5>Search Registered Student By:</h5>
                            <form action="searchdetails.php" method="POST">
                                <div class="form-group">
                                    <input type="radio" id="email" name="condition" value="email">
                                    <label for="email">Email</label><br>
                                    <input type="radio" id="rollno" name="condition" value="rollno">
                                    <label for="rollno">RollNo</label><br>
                                    <input type="radio" id="name" name="condition" value="name" checked>
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" placeholder="search here" id="query" name="query"> 
                                </div>
                                <div class="form-group">  
                                    <input type="submit" name="submit" value="Submit" class="btn btn-info">  
                                </div>  
                            </form>   
                            </div> 
                            <div class="row">
                                <div class="col-md-20 mx-auto">
                                    <br>
                                    <button class="btn btn-info"> <a href="login.html" style="color:white;" >Log Out</a></button>
                                    <button class="btn btn-info"> <a href="student-management.html" style="color:white;" >Home</a></button>
                                </div>
                            </div> 
                    ');
                }
                else{
                    echo "Wrong Password Login again";
                    echo ("
                    <div class='container'>
                        <a href='forgotpassword.php?email=$email'>Forget password?</a>
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
            }
            else{
                echo "Student not registered.Please register";
                echo('
                <div class="row">
                    <div class="col-md-20 mx-auto">
                        <br>
                        <button class="btn btn-info"> <a href="student-management.html" style="color:white;" >Home</a></button>
                    </div>
                </div>
                ');
            }
        ?>   
    </div>  
</body>
</html>