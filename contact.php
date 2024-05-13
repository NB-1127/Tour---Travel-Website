<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Contact</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("connection.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            
         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO users(Your_Name,Email,Subject,Message) VALUES('$username','$email','$subject','$message')") or die("Erroe Occured");

            echo "<div class='message'>
                      <p>Successfully Send Message!</p>
                  </div> <br>";
            echo "<a href='index.html'><button class='btn'>Done</button>";
         

         }

         }else{
         
        ?>

            <header>Contact Form</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Your_Name</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="message">Message</label>
                    <input type="message" name="message" id="message" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Send Message" required>
                </div>
                <div class="links">
                    
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>