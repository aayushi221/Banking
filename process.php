<?php

require_once "connection.php";




$err_msg = '';
$s_msg = '';


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    
    $from_acc = (int)filter_input(INPUT_POST,"from_acc");
    $to_acc = (int)filter_input(INPUT_POST,"to_acc");
    $from_cust = filter_input(INPUT_POST,"from_cust");
    $to_cust = filter_input(INPUT_POST,"to_cust");
    $amt = (float)filter_input(INPUT_POST,"amount");


    $sql1 = "SELECT Name,Current_credit FROM transfer WHERE Account_No = ".$from_acc;
    $sql2 = "SELECT Name,Current_credit FROM transfer WHERE Account_No = ".$to_acc;

    $res1 = $conn->query($sql1);
    $res2 = $conn->query($sql2);

    
    if(($res1)and ($res2)){
        
    if (($res1->num_rows > 0) and ($res2->num_rows > 0)) {
        
        $d1 = $res1->fetch_assoc();
        $d2 = $res2->fetch_assoc();
        
        if ((strcasecmp($d1['Name'],$from_cust) == 0) and (strcasecmp($d2['Name'],$to_cust) == 0)) {

            if ($amt <= $d1['Current_credit']) {

                $curr_bal = $d1['Current_credit'] - $amt;
                $new_amt = $d2['Current_credit'] + $amt;
                
                $upd1 = "UPDATE transfer SET Current_credit = ".$curr_bal." WHERE Account_No = ".$from_acc;
                $upd2 = "UPDATE transfer SET Current_credit = ".$new_amt." WHERE Account_No = ".$to_acc;

                if (($conn->query($upd1) == TRUE) and ($conn->query($upd2) == TRUE)) {

                    $trans = "INSERT INTO transaction_rec VALUES (NULL,".$from_acc.",".$to_acc.",".$amt.",'CLEARED')";
                    
                    $s_msg = "Transaction Successful!";
                }
            } else {
                $trans = "INSERT INTO transaction_rec VALUES (NULL,".$from_acc.",".$to_acc.",".$amt.",'FAILED')";
                $err_msg = "The Entered Amount is Higher than Current Balance.<br>Transaction Cancelled!";
            }     
        } else {
            $trans = "INSERT INTO transaction_rec VALUES (NULL,".$from_acc.",".$to_acc.",".$amt.",'FAILED')";
            $err_msg = "Account details are Incorrect!<br>Please Verify and Try Again.";
        }
    } else {
        $err_msg = "Invalid Account Credentials!";
       
    }

    if ($err_msg != "Invalid Account Credentials!") {
      $conn->query($trans);
    }
    include "transfers.php";
}
}

?>

