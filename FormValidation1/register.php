<?php

$uname1 = $_POST['uname1'];
$email = $_POST['email'];
$upswd1 = $_POST['upswd1'];
$cfupswd = $_POST['cfupswd'];

if (!empty($uname1) || !empty($email) || !empty($upswd1) || !empty($cfupswd)){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "project1";

    //create connection
    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

    if(mysqli_connect_error()){
        die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT email From register where email = ? Limit 1";
        
        $INSERT = "INSERT Into register (uname1,email,upswd1,cfupswd)values(?,?,?,?)";

    //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

    //checking username
    if($rnum==0){
        $stmt->close();
        $stmt=$conn->prepare($INSERT);
        $stmt->bind_param("ssss",$uname1,$email,$upswd1,$cfupswd);
        $stmt->execute();
        echo "New record inserted succesfully";
    }else{
        echo "Someone already register using this email";
    }
    $stmt->close();
    $conn->close();
    }
}else{
    echo "All field are required";
    die;
}
?>