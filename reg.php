<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Registration Page</title>
    <script src="static/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .container{
            width: 25%;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2 class="text-center text-primary">Registration Form</h2>
    <form action="reg.php" class="form" method="post">
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" class="form-control" name="fullname">
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username">
        </div>  
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email">
        </div>  

        <div class="form-group">
            <label for="gender">Gender</label><br>
            Male<input type="radio" class="form-radio" name="gender" value="Male">
            Female<input type="radio" class="form-radio" name="gender" value="Female">
        </div>

        <div class="form-group">
            <label for="state">State of Origin</label><br>
           <select name="state" id="" class="form-control form-select">
                <option value="">Select State</option>
                <option value="Kano">Kano</option>
                <option value="Kaduna">Kaduna</option>
                <option value="Jigawa">Jigawa</option>
                <option value="Katsina" selected>Katsina</option>
           </select>
        </div>
        
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" class="form-control" name="pass">
        </div>  
        
      
        
        <div class="form-group">
            <label for="cpass">Confirm Password</label>
            <input type="password" class="form-control" name="cpass">
        </div> 
        
        <div class="form-group">
            <button type="submit" name="btn_reg" class="btn btn-primary form-control mt-3">Register</button>
        </div>
        <p class="text center">Already Have an Account? Click <a href="login.php">Here</a> to Login</p>

    </form>
        
    </div>
</body>
</html>
<?php
  //PHP MAILER ...
//Include required PHPMailer files
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';
require 'phpMailer/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include "server.php";

if(isset($_POST['btn_reg'])){
    //variables
    $full_name = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];
    $token = substr(time()*rand(),1,6);

    if($password!=$cpassword){
        echo "Invalid Username/Password";
        die();
    }else{
        $password = md5($password);
    $sql = "INSERT INTO users (`full_name`, `username`, `email`, `gender`, `state`, `password`, `token`) VALUES ('$full_name', '$username', '$email', '$gender', '$state', '$password', '$token')";
    $result = mysqli_query($conn, $sql);

    if($result){
        // header("Location: verify_token.php");
         // $to = $email;
         $subject = "E-mail Verification";
         $message = "Welcome ".$full_name. ", your verification code is <b>".$token."</b>";
      

              
         //Create instance of PHPMailer
         $mail = new PHPMailer();
         //Set mailer to use smtp
         $mail->isSMTP();
         //Define smtp host
         $mail->Host = "smtp.gmail.com";
         //Enable smtp authentication
         $mail->SMTPAuth = true;
         //Set smtp encryption type (ssl/tls)
         $mail->SMTPSecure = "ssl";
         //Port to connect smtp
         $mail->Port = "465";
         //Set gmail username
         $mail->Username = "ibrobk@gmail.com";
         //Set gmail password
         $mail->Password = "";
         //Email subject
         $mail->Subject = $subject;
         //Set sender email
         $mail->setFrom('ibrobk@gmail.com', "Email Verification");
         //Enable HTML
         $mail->isHTML(true);
         //Attachment
         // $mail->addAttachment('img/attachment.png');
         //Email body
         $mail->Body = $message;
         //Add recipient
         $mail->addAddress($email);
         //Finally send email
         if ( $mail->send() ) {
         // $_SESSION['sent'] = $subject2;
         
         echo "
             <script>
                 swal('Done','Registration Successful, please check your email to verify.', 'success')
                 .then(function(result){
                     if (true) {
                         window.location = 'verify_token.php';
                     }
                 })
               
              
             </script>
         ";
         }else{
           echo  "<script>
                 swal('Error','OTP could not be sent to email.', 'error')
                 .then(function(result){
                     if (true) {
                         window.location = './signup.php';
                     }
                 })
               
              
             </script>";
         // echo "OTP could not be sent. Mailer Error: ".$mail->ErrorInfo;
         }
         //Closing smtp connection
         $mail->smtpClose();  


     }

         // header("Location: login.php");
     }
     
 }

//     }

// }
// }


?>