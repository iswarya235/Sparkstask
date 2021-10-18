<html>
    <head>
    <title>View Users</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="index.css" >
        <link rel="stylesheet" type="text/css" href="users.css">
        <link rel="stylesheet" type="text/css" href="style.css">  
    </head>
    <body>         
        <!-- header starts -->
        <div class="header">
            <div class="header_logo"> TSF Bank 
                <i class="fa fa-bank" style="font-size:48px;color: whitesmoke;"></i></div>
            <div class="nav_bar">
                <div class="nav_items" onclick="document.location='index.php'">Home</div>
                <div class="nav_items">Users</div>
                <div class="nav_items" onclick="document.location='transaction.php'">Transaction</div>
                <div class="nav_items" onclick="document.location='history.php'">History</div>
                <div class="nav_items" onclick="document.location='contact.html'">Contact</div>
            </div>
        </div>
        <!-- header ends -->
        <?php
        $user = 'root';
        $password = '';
        $database = 'sparks_task';
        $servername = 'localhost';
        $mysqli = new mysqli($servername,$user,$password,$database);

        if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}
        $sql = "SELECT * FROM users";
$result = $mysqli->query($sql);

?>

        <div class="body">
        <div class="user">
        <!-- table starts -->
        
        <div class="table-responsive-sm">
        <table style="margin-top:15px;" class="table" style="border-color:wheat;">
                        <thead style="color : whitesmoke;">
                            <tr>
                                <th scope="col" class="text-center py-2">Id</th>
                                <th scope="col" class="text-center py-2">Name</th>
                                <th scope="col" class="text-center py-2">E-Mail</th>
                                <th scope="col" class="text-center py-2">Balance</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php   

                  
while($rows=$result->fetch_assoc())
{
?>
<tr>
<!--FETCHING DATA FROM EACH 
    ROW OF EVERY COLUMN-->
<td style="color:white;"><?php echo $rows['Id'];?></td>
<td style="color:white;"><?php echo $rows['Name'];?></td>
<td style="color:white;"><?php echo $rows['Email'];?></td>
 <td style="color:white;"><?php echo $rows['Balance'];?></td>
 </tr> 

                 
          
            <?php
                }
             ?>
              </tbody>
                    </table>
        </div>
    </div>
</div>
  
    <!-- footer starts -->
       <div class="footer">
            <span>&copy</span> Designed by Iswarya Mayilsamy, Web Development Intern @ The Sparks Foundation !

        </div>
    <!-- footer ends -->
  
</body>

</html>