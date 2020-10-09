
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search Student Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <?php
            $conn=mysqli_connect("studentrecord.local","root","","mysql");
            $condition=$_POST["condition"];
            $flag=0;
            $q=$_POST["query"];
            if($condition=="email"){
                $query="SELECT name,age,rollno,course,phonenumber,image,email,status FROM STUDENT WHERE email='$q'";
                $arr=mysqli_query($conn,$query);
            }
            else if($condition=="name"){
                $query="SELECT name,age,rollno,course,phonenumber,image,email,status FROM STUDENT WHERE name='$q'";
                $arr=mysqli_query($conn,$query);
            }
            else if($condition=="rollno"){
                $query="SELECT name,age,rollno,course,phonenumber,image,email,status FROM STUDENT WHERE rollno='$q'";
                $arr=mysqli_query($conn,$query);
            }
            else{
                echo "some error is there";
            }
            if(mysqli_num_rows($arr)==0)
                echo"<h3 class='text-danger'><strong>Sorry,No Result Found for '$condition :$q'</h3>";
            else if(mysqli_num_rows($arr)>0){
                echo"<h3><strong>&nbspShowing Result/s for '$condition: $q' -</h3>";
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
                foreach($arr as $rows){
                    echo "<tr>";
                    foreach($rows as $value)
                        echo "<td>$value &nbsp &nbsp </td>";    
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            }
            mysqli_close($conn);    
        ?>      
    </div>
    <div class="container">  
        <div class="row h-100">
            <div class="col-sm-12 my-auto">
                <br>
                <br>
                &nbsp;
                <button class="btn btn-info"> <a href="login.html" style="color:white;" >Log Out</a></button>
                <button class="btn btn-info"> <a href="student-management.html" style="color:white;" >Home</a></button>              
                
            </div>
        </div>
    </div>
</body>
</html>