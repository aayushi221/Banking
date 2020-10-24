<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

   <style>
body {
    background-image: url("display.jpg");
    background-position: center; 
    background-repeat: no-repeat,repeat; 
    background-size: cover;
    opacity : 2;
  }

  .send-container {
  margin-top:10%;
  margin-left:5%;
  width: 80%;
  border: 3px solid black;
  padding: 10px;
  }

.table-form {
    margin:auto;
  width: 50%;
  padding: 10px;
}

  table {
    width: 100%;
  }

  th, td {
  padding: 15px;
  text-align: left;
}
  h1 {
      font-variant: small-caps;
      padding:10%
      text-align: center;
  }
  .bold {
    font-variant: small-caps;
  }

  
   </style>

<body>
<div class="container">
<div class ="send-container">

            <form class="send-block" method="POST" action="process.php">
            <div class="form-group">
                <table class="transtable">
                    <tr>
                        
                            <th><h1>Enter Details for the Transaction</h1></th>

                            </tr>
                    <tr>
                     
                        <td>
                            <b class="bold">From</b>
                            
                                <p>Account No. : <br>
                                <input type="number" name="from_acc" id="a1" required list="acc-numbers"></p> 
                                <p>Sender's Name : <br>
                                <input type="text" name="from_cust" id="cn1" required></p>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b class="bold">To</b>
                            
                                <p>Account No. : <br>
                                <input type="number" name="to_acc" id="a2" required list="acc-numbers"></p> 
                                <p>Receiver's Name : <br>
                                <input type="text" name="to_cust" id="cn2" required ></p>
                           
                        </td>
                    </tr>
                    <tr>
                    <br>
                        <td><p class="amt">Amount (in Rs.) : <br>
                            <input type="number" class="amt-i" name="amount" required >
                        </p></td>
                    </tr>
                    <tr>
                        <td>
                         <input type="submit" value="SEND" id="send" name="send">
                        
                        </td>
                    </tr>
                </table>
            </form>
           
        </div>
    
    
    <datalist id="acc-numbers">
        <option value="22101"></option>
        <option value="22102"></option>
        <option value="22103"></option>
        <option value="22104"></option>
        <option value="22105"></option>
        <option value="22106"></option>
        <option value="22107"></option>
        <option value="22108"></option>
        <option value="22109"></option>
        <option value="221010"></option>
    </datalist>
 
</div>



    <?php if (!empty($err_msg) or !empty($s_msg)) { ?>
    
        <div class="message-container">
            <div class="message">
                <?php if (!empty($err_msg)) { 
                        echo "<h2 style='color:red'>$err_msg</h2>";
                    } elseif (!empty($s_msg)) {
                        echo "<h2 style='color:green'>$s_msg</h2>";
                    }
                ?>
                <p style="text-align: center;"><button id="okbtn" onclick="document.querySelector('.message-container').style.display = 'none';">OK</button></p>
            </div>
        </div>
    
    <?php } ?>
                </div>

</body>
</html>