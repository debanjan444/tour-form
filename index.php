<?php
$insert = false;
if(isset($_POST['name'])){
 
$server = "localhost";
$username = "root";
$password = "";


$con = mysqli_connect($server,$username,$password);
if(!$con){
    die("connection to this database failed due to ". mysqli_connect_error());
}
//echo "Success connecting to the db";
$name  = $_POST['name'];
$gender = $_POST['gender'];
$age= $_POST['age'];
$email  = $_POST['email'];
$phone = $_POST['phone'];
$other = $_POST['desc'];

$sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
//echo $sql;
if($con->query($sql) == true){
   // echo "Successfully inserted";
   $insert = true;   

}else{
    echo "error";
   
}
$con->close();
}









?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <img class="bg" src="bg.jpg" alt="college img" />
    <div class="container">
      <h1>Welcome to Narula Institute of Technology travel form</h1>
      <p>
        enter your details and submit this form to confirm your participation in
        the trip
      </p>
      <?php
        if($insert == true){
       echo "<p class='submitMsg'>
       thanks for submitting form . we are happy to see you joining for the
       upcoming trip
     </p>";
}
      
      ?>
     
      <form action="index.php" method="post">
        <input
          type="text"
          name="name"
          id="name"
          placeholder="enter your name"
        />
        <input type="text" name="age" id="age" placeholder="enter your age" />
        <input
          type="text"
          name="gender"
          id="gender"
          placeholder="enter your gender"
        />
        <input
          type="email"
          name="email"
          id="email"
          placeholder="enter your email"
        />
        <input
          type="phone"
          name="phone"
          id="phone"
          placeholder="enter your phone no"
        />
        <textarea
          name="desc"
          id="eesc"
          cols="30"
          rows="10"
          placeholder="enter any other information here"
        ></textarea>
        <button class="btn">Submit</button>
      </form>
    </div>
    <script src="index.js"></script>
  </body>
</html>
