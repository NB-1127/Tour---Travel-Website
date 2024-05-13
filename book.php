<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Book Now</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("connect.php");
         if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $destination = $_POST['destination'];
            $depart_date = $_POST['depart_date'];
            $return_date = $_POST['return_date'];


         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO users(Name,Email,Address,Phone_No,Destination,Depart_Date,Return_Date) VALUES('$name','$email','$address',,'$phone','$destination','$depart_date','$return_date')") or die("Erroe Occured");

            echo "<div class='message'>
                      <p>Booking successfully!</p>
                  </div> <br>";
            echo "<a href='index.html'><button class='btn'>Done</button>";
         

         }

         }else{
         
        ?>

            <header>Booking Form</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="phone">Phone_No</label>
                    <input type="number" name="phone" id="phone" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="destination">Destination</label>
                    <input type="text" name="destination" id="destination" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="depart_date">Depart_Date</label>
                    <input type="date" name="depart_date" id="depart_date" autocomplete="off" required>
                </div>
                
                <div class="field input">
                    <label for="return_date">Return_Date</label>
                    <input type="date" name="return_date" id="return_date" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Book Now" required>
                </div>
                
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>