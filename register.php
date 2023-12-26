<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>

    <div class="form">
        <?php
            include("php/config.php");
            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $password = $_POST['password'];

                // verifying the unique email 
                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

                if(mysqli_num_rows($verify_query) != 0){
                    echo "<div class ='message'>
                            <p>This email is used. Please try another one.</p>
                          </div><br>";
                    echo "<a href ='javascript:self.history.back()'><button class ='submit-btn'>Go Back</button></a>";
                }
                else{
                    mysqli_query($con, "INSERT INTO users(name, email, age, password) VALUES('$name', '$email', '$age', '$password')") or die ("Error occurred");
                    echo "<div class ='message'>
                            <p>Registration successful!</p>
                          </div><br>";
                    echo "<a href ='index.php'><button class ='submit-btn'>Login now</button></a>";
                }
            }
            else {
        ?>
        <h1 class="heading">Register</h1>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Name" autocomplete="off" class="name" required>
            <input type="email" name="email" placeholder="Email" autocomplete="off" class="email" required>
            <input type="text" name="age" placeholder="Age" autocomplete="off" class="age" required>
            <input type="password" name="password" placeholder="Password" autocomplete="off" class="password" required>
            <button type="submit" name="submit" class="submit-btn">Register</button>
        </form>
        <a href="login.php" class="link">Already have an account? Log in here</a>
        <?php } ?>
    </div>
</body>
</html>
