<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ceud Operation</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container tb">
        <form action="crud.php" method="POST">
            
            Name:<input type="text" name="name"><br>
            Age:<input type="text" name="userage"><br>
            Username: <input type="username" name="username"> <br>
            Password:<input type="password" name="userpassword"><br>
            <button type="submit" class="btn" name="btn">Submit</button>
        </form>
    </div>
    <div class="container tb">
        <form action="crud.php" method="POST">
            <?php
            $conn=mysqli_connect('localhost','root','','person');
                if(isset($_GET['update'])){
                    $Id =$_GET['update'];
                    $query=" SELECT*FROM personinformation WHERE id={$Id}";
                    $getdata=mysqli_query($conn, $query);
                    while($rx=mysqli_fetch_assoc($getdata)){
                        $Id= $rx['id'];
                        $Name=$_POST['name'];
                        $Age=$_POST['userage'];
                        $username=$_POST['username'];
                        $password=$_POST['userpassword']; 

            ?>
            Name: <input type="text" value="<?php echo $Name; ?>"name="name"><br>
            Age:<input type="text" value="<?php echo $Age; ?>" name="userage"><br>
            Username:<input type="text" value="<?php echo $username; ?>" name="username"> <br>
            Password:<input type="password" value="<?php echo $Password; ?>" name="userpassword"><br>
             <input type="submit" name="update_btn" value="update" class="btn btn-primary">
            <?php  } } ?>
            <?php 
            $conn=mysqli_connect('localhost','root','','person');
            if(isset($_POST['update_btn'])){
                 $Name=$_POST['name'];
                 $Age=$_POST['userage'];
                 $username=$_POST['username'];
                 $password=$_POST['userpassword']; 

                 $query="UPDATE personinformation SET name='$Name',	userage='$Age',username=$username,userpassword ='$password' ";
                 $updatequery=mysqli_query($conn,$query);
                 if($updatequery){
                    echo "Data Update";
                 }
                 else{
                    echo"Not update";
                 }
            }
            ?>
        </form>
    </div>
    <div class="container">
        <table class="table table-bordered">
           <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Age</th>
            <th>Username</th>
            <th>Password</th>
            <th>Delete</th>
            <th>Update</th>
           </tr>
           <?php
                 $conn=mysqli_connect('localhost','root','','person');
                $query="SELECT*FROM personinformation";
                $readquery=mysqli_query($conn,$query);
                if($readquery->num_rows >0){
                     while($rd=mysqli_fetch_assoc($readquery)) {
                        $Id=$rd['id'];
                        $Name=$_POST['name'];
                        $Age=$_POST['userage'];
                        $username=$_POST['username'];
                        $password=$_POST['userpassword']; 
            ?>
           <tr>
            <td><?php  echo $Id;?> </td>
            <td><?php  echo $Name;?> </td>
            <td><?php  echo $Age;?></td>
            <td><?php  echo $username;?></td>
            <td><?php  echo $password;?></td>
            <td> <a href="crud.php ?delete=<?php  echo $Id;?>" class="btn btn-danger">Delete</a></td>
            <td> <a href="crud.php ?update=<?php echo $Id;?>" class="btn btn-success">Update</a></td>
           </tr>
           <?php  } }else{
            echo "No data";
           }?>

           <?php
           if(isset($_GET['delete'])){
            $Id=$_GET['delete'];
            $query="DELETE FROM personinformation WHERE id={$Id}";
            $deletequery=mysqli_query($conn,$query);
            if($deletequery){
                echo "Data remove successfully";
            }
           }
           ?>
        </table>
    </div>
</body>
</html>
 <?php 
    $conn=mysqli_connect('localhost','root','','person');
    if(isset($_POST['btn'])){
                 $Name=$_POST['name'];
                 $Age=$_POST['userage'];
                 $username=$_POST['username'];
                 $password=$_POST['userpassword']; 
        if(!empty($Name) && !empty($Age) && !empty($username) && !empty($password)){
           $query="INSERT INTO personinformation(name,userage,username,userpassword) VALUE('$Name','$Age','$username','$password')";
            $createquery=mysqli_query($conn,$query);  
        }else{
            echo "Empty file";
        }
       
    }
     ?>