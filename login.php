<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Login Page</title>
    <style>
        .container{
            width: 25%;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2 class="text-center text-primary">User Login</h2>
    <form action="login.php" class="form" method="post">
        

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username">
        </div>  

       

       
        
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" class="form-control" name="pass">
        </div>  
        
      
    
        
        <div class="form-group">
            <button type="submit" name="btn_login" class="btn btn-primary form-control mt-3">Login</button>
        </div>

        <p class="text center">Don't Have an Account? Click <a href="reg.php">Here</a> to Register</p>
        
    </form>
        
    </div>
</body>
</html>
<?php
include "server.php";



?>