<?php
    error_reporting(E_ALL);
    session_start();
    include('db_connect.php');
//################## Get User ID ##################
    if(!isset($_SESSION['uid']))     //check user id session exist?
      $_SESSION['uid'] = NULL;       //change to NULL(guest)

//################## Get Compnay ID ##################
    $c_name = $_POST['compnay'];       //get company name from post
    $sql_cid = "SELECT cid FROM charity WHERE name ='$c_name'";   //seek mateched cid to compnay name
    $result = mysql_query($mysqli, $sql_cid);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $tmp_cid = $row["cid"];
        }
    }
    mysqli_close($mysqli);  //not sure put here or not

//################## Insert ID ##################
    $mysqli->select_db("winkleer-db");
    $sql_insert = "INSERT INTO money (uid, cid, amount, donate_on) VALUES (?,?,?,?)";
        if($stmt = $mysqli->prepare($sql_insert)){
            $stmt->bind_param("dddd", $uid, $cid, $amount, $donate_on);

            $uid = $_SESSION['uid'];
            $cid = $tmp_cid;    
            $amount = $_POST['amount'];
            $donate_on = date("Y-m-d H:i:s");   
        }
    $stmt->execute();
    $stmt->close();

    
    header("Location: user_profiles.php?");     //change page donate successfully 
?>
