<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project2";

//create a connection

$conn = mysqli_connect($servername, $username, $password, $database);

//connection status
if (!$conn) {
    die("Disconnect" . mysqli_connect_error());
} else {
    echo "Connected";
    echo "<br>";
}

$name = $_POST["name"];
$username = $_POST["uname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["pass"];
$cpassword = $_POST["cpass"];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$chashed_password = password_hash($cpassword, PASSWORD_DEFAULT);

$validpattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
$validphone="/^[0-9]*$/";

if (!preg_match ($validphone, $phone) ){  
    echo '<script>alert("Invalid number")</script>';   
} else {  
   // echo $phone;  
}  

if (isset($_POST["submit"])) {
    if (!preg_match($validpattern, $email)) {
        echo '<script>alert("Invalid email")</script>';
    } else {
       // echo "Your valid email address is: " . $email;
       // echo "<br>";
    }
    if ($password == $cpassword) {

        // //data to insert into table
        // //$sql = "INSERT INTO `information`(`Full Name`, `User Name`, `Email`, `Phone`, `Password`, `Confirm Password`) VALUES ('$name','$username','$email','$phone','$hashed_password','$chashed_password')";

        // $result = mysqli_query($conn, $sql);
        // //SQL status
        // if ($result) {
        //     echo "inserted <br>";
        // } 

        //echo '<script>alert("Password matched")</script>';
    } else {
        echo '<script>alert("Password do not match")</script>';
        echo "not inserted" . mysqli_error($conn);
    }
}



// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     echo "Full Name: " . $name;
//     echo "<br>";
//     echo "Username Name: " . $username;
//     echo "<br>";
//     echo "Email: " . $email;
//     echo "<br>";
//     echo "Phone: " . $phone;
//     echo "<br>";
//     echo "Password: " . $hashed_password;
//     echo "<br>";
//     echo "C Password: " . $chashed_password;
//     echo "<br>";
//     echo "Gender: " .$_POST["gender"];
//     echo "<br>";
// }
?>