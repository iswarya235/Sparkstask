<html>
<head>
	<meta charset="utf-8">
	<title>Transaction</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="index.css" >
	 <link rel="stylesheet" type="text/css" href="users.css">
	 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

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


	<!-- header -->
	<div class="header">
		<div class="header_logo">TSF BANK
			<i class="fa fa-bank" style="font-size:48px;color:whitesmoke;"></i></div>
		<div class="nav_bar">
      <div class="nav_items" onclick="document.location='index.php'">Home</div>
			<div class="nav_items" onclick="document.location='users.php'">Users</div>
			<div class="nav_items">Transaction</div>
			<div class="nav_items" onclick="document.location='history.php'">History</div>
			<div class="nav_items" onclick="document.location='contact.html'">Contact</div>
		</div>
	</div>
    <!-- header -->

    

    
    <div class="body">
    	 <div class="transact">
             <form method="post" name="tcredit" class="tabletext" ><br>
               <div>
                    <table class="table" style="border-color:black;">
                        <thead style="color : whitesmoke;">
                            <tr>
                                <th scope="col" class="text-center py-2">Id</th>
                                <th scope="col" class="text-center py-2">Name</th>
                                <th scope="col" class="text-center py-2">E-Mail</th>
                                <th scope="col" class="text-center py-2">Balance</th>
                                <th scope="col" class="text-center py-2">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php   

                  
while($rows=$result->fetch_assoc())
{
?>
<tr>
<td style="color:white;"><?php echo $rows['Id'];?></td>
<td style="color:white;"><?php echo $rows['Name'];?></td>
<td style="color:white;"><?php echo $rows['Email'];?></td>
 <td style="color:white;"><?php echo $rows['Balance'];?></td>
 <td><a href="selectuser.php?Id=<?php echo $rows['Id']; ?>"> <button type="button" class="btn" style="background-color : #24bace;">Transact</button></a></td>
 </tr>             
                 
          
            <?php
                }
             ?>
             </tbody>
                    </table>
                </div>
            </form>
           </div>
    </div>

    <!-- body -->
    
    <!-- footer -->
    <div class="footer">
    	<span>&copy</span> Designed by Iswarya Mayilsamy, Web Development Intern @ The Sparks Foundation !
    </div>
    <!-- footer -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  

</body>
</html>