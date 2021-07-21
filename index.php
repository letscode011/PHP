<?php
$insert = false;
if (isset($_POST['Name'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server,$username,$password);

    if(!$con)
    {
        die("Connection failed due to " . mysqli_connect_error());
    }
    // echo "Sucees connection";

    $Name = $_POST["Name"];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `pvgcoet`.`pvg` (`Name`, `age`, `gender`, `email`, `phone`, `info`, `date`) VALUES ('$Name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    //echo $sql;

    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Loop&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Loop&family=Zen+Tokyo+Zoo&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet"> 

</head>
<body>
    <img class="bg" src="bg.jpg" alt="PVG">
    <div class="container">
        <h1>Welcome to PVGCOET</h1>
        <p>Enter your details to know more about admissions</p>
        <form action="index.php" method="POST">
        <input type="text" name="Name" id="name" placeholder="Enter your name">
        <input type="text" name="age" id="age" placeholder="Enter your age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="email" name="email" id="email" placeholder="Enter your mail">
        <input type="phone" name="phone" id="phone" placeholder="Enter your phone no.">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter Additional information"></textarea>
        <button class="btn">Submit</button>
        </form>
        <?php
        if($insert == true)
        {
        echo "<p class='submitMsg'>Thanks for submitting your form. We will contact you shortly. </p>";
        }
        ?>
    </div>
    <script src="index.js"></script>
    
</body>
</html>