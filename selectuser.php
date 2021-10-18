<?php
include 'connection.php';
if(isset($_POST['submit']))
{
    $from = $_GET['Id'];
    $to = $_POST['to'];
    $amount = $_POST['Amount'];
    echo $from ;

    $sql = "SELECT * from users where Id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where Id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['Balance'] - $amount;
                $sql = "UPDATE users set Balance=$newbalance where Id=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['Balance'] + $amount;
                $sql = "UPDATE users set Balance=$newbalance where Id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['Name'];
                $receiver = $sql2['Name'];
                $sql = "INSERT INTO transaction(`Sender`, `Receiver`, `Amount`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='history.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="index.css" >
     <link rel="stylesheet" type="text/css" href="users.css">
     <link rel="stylesheet" type="text/css" href="style.css">

     <style type="text/css">
        
        button{
            border:none;
            background: #d9d9d9;
        }
        button:hover{
            background-color:#777E8B;
            transform: scale(1.1);
            color:white;
        }

    </style>

    <title>Transact</title>
</head>
<body>
        <!-- header starts -->
        <div class="header">
            <div class="header_logo"> TSF Bank 
                <i class="fa fa-bank" style="font-size:48px;color: whitesmoke;"></i></div>
            <div class="nav_bar">
                <div class="nav_items" onclick="document.location='index.php'">Home</div>
                <div class="nav_items" onclick="document.location='users.php'">Users</div>
                <div class="nav_items" onclick="document.location='transaction.php'">Transaction</div>
                <div class="nav_items" onclick="document.location='history.php'">History</div>
                <div class="nav_items" onclick="document.location='contact.html'">Contact</div>
            </div>
        </div>
        <!-- header ends -->
        
        <div class="body">
            <div class="user">
                <div class="container">
                    <h2 class="text-center pt-4" style="color : white;">Transaction</h2>

<?php
                include 'connection.php';
                $sid=$_GET['Id'];
                $sql = "SELECT * FROM  users where Id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>

            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr style="color : white;">
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Balance</th>
                </tr>
                
                <tr style="color : white;">
                    <td class="py-2"><?php echo $rows['Id'] ?></td>
                    <td class="py-2"><?php echo $rows['Name'] ?></td>
                    <td class="py-2"><?php echo $rows['Balance'] ?></td>
                </tr>
            </table>
        </div>

                    <br><br>
        <label style="color : white;"><b>Transfer To:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>

<?php
                include 'connection.php';
                $sid=$_GET['Id'];
                $sql = "SELECT * FROM users where Id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['Id'];?>" >
                
                <?php echo $rows['Name'] ;?> (Balance: 
                    <?php echo $rows['Balance'] ;?> )
               
                </option>
            <?php 
                } 
            ?>


</select>
<br>
<br>
            <label style="color : white;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="Amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3 btn-success" name="submit" type="submit" id="myBtn" >Transfer</button>
            </div>
        </form>
    </div>
    </div>
</div>
  
    <!-- footer starts -->
       <div class="footer">
            <span>&copy</span> Designed by Iswarya Mayilsamy, Web Development Intern @ The Sparks Foundation !

        </div>
    <!-- footer ends -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>