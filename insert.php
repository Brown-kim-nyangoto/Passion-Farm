<?php
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phoneCode = $_POST['phonecode'];
$phone = $_POST['phone'];

if (empty($username) || empty($password) || empty($gender) || empty($email) || empty($phoneCode) || empty($phone)) {
    # code...
}

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "youtube";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    $SELECT = "SELECT email from register Where email = ? Limit 1";
    $ISERT = "INSERT Into register (username, password, gender, email, phonecode, phone) values(?,?,?,?,?,?)";

    //Prepare Statement
    $stmt = $conn->prepare($SELECT);
    $stmt->blind_param("s", $email);
    $stmt->execute();
    $stmt->blind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    
    if($rnum==0) {
        $stmt->close();

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssssii, $username, $password, $gender, $phonecode,$phone");
        $stmt->execute();
        echo "New record inserted sucessfully";
    }else {
        echo "Someone already registered using this email";
    }
    $stmt->close();
    $stmt->close();
} else {
echo "All fields are required";
}
