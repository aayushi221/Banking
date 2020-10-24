<?php
require_once "connection.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- <link rel="stylesheet" type = "text/css" href="styles.css"> -->

    <style>
        ::-webkit-scrollbar {
    width: 5px;
}
body {
    background-image: url("images/display.jpg");
    background-position: center; 
    background-repeat: no-repeat; 
    background-size: cover;
    opacity : 2;
 
  }
        .container {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .subcont {
            font-family: 'Nunito Sans', sans-serif;
            width: 80%;
            height: 75vh;
            overflow-y: scroll;
            border: 1px solid rgba(250,250,250,0.36);
        }
      
        td,th {
            border:1px solid grey;
            color: white;
            opacity: 1;
            font-size: 3vh;
            
        }
       
        table {
    width: 100%;
    padding-top:30px;
  }
      th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    color: white;
   }
        tr:hover {
            background-color: rgba(0,0,0,0.36);
        }
        td {
            text-align: center;
            font-weight: bold;
        }
        #heading {
            font-family:Arial,Helvetica;
            padding: 5px;
            font-variant: small-caps;
            background-color: #ffffff;
            opacity: 80%;
        }
    </style>

</head>
<body>


    <div class="container">
      
 
                <div class= "container">
                <h1 id="heading"> &nbsp Transaction History &nbsp</h1>
 <div class= "table-responsive">  
 <table class="table table-hover table-bordered ">
  <thead class="thead-dark">
    <tr  style= "background-color: #ffffff;">
      <th scope="col">S.No.</th>
      <th scope="col">From </th>
      <th scope="col">To</th>
      <th scope="col">Credit(Rs.)</th>
      <th scope="col">Transfer Status</th>
    </tr>
  </thead>

</div>
</div>
                <?php


                $sql = "SELECT * FROM transaction_rec" ;
                $result = $conn->query($sql);
               
                if ($result->num_rows > 0) {
                  
                    while ($data = $result->fetch_assoc()) {
                     
                        $c = '';
                        if ($data['trans_status'] == 'FAILED') {$c = "rgba(255, 39, 88,0.7)";}
                        else {$c = "rgba(39, 255, 107,0.6)";}
                        echo "<tr>
                        <td>".$data['trans_id']."</td>
                        <td>".$data['from_acc_num']."</td>
                        <td>".$data['to_acc_num']."</td>
                        <td>".$data['amt_transfered']."</td>
                        <td style='color:".$c."'>".$data['trans_status']."</td>
                    </tr>";
                   
                    }
                }
                ?>
            </table>
        <!-- </div> -->
    </div>
    
</body>
</html>