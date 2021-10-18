<html>
<head>
	<meta charset="utf-8">
	<title>Transaction history</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="index.css" >
	 <link rel="stylesheet" type="text/css" href="users.css">
	 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<!-- header -->
	<div class="header">
		<div class="header_logo">TSF BANK
			<i class="fa fa-bank" style="font-size:48px;color:whitesmoke;"></i></div>
		<div class="nav_bar">
      <div class="nav_items" onclick="document.location='index.php' ">Home</div>
			<div class="nav_items" onclick="document.location='users.php'">Users</div>
			<div class="nav_items" onclick="document.location='transaction.php'">Transaction</div>
			<div class="nav_items" >History</div>
			<div class="nav_items" onclick="document.location='contact.html'">Contact</div>
		</div>
	</div>
    <!-- header -->
    <!-- body -->
    <div class="body">
    	 <div class="history">
              <form method="post" name="tcredit" class="tabletext" ><br>
               <div>
                    <table class="table" style="border-color:black;">
                        <thead style="color : whitesmoke;">
                            <tr>
                                <th scope="col" class="text-center py-2">S.no</th>
                                <th scope="col" class="text-center py-2">Sender</th>
                                <th scope="col" class="text-center py-2">Reciever</th>
                                <th scope="col" class="text-center py-2">Amount</th>
                                <th scope="col" class="text-center py-2">Date and Time</th>
                            </tr>
                        </thead>
                        <?php
                            include 'connection.php';

 

                    $sql = "select * from transaction";

                    $query = mysqli_query($conn, $sql);

                    while ($rows = mysqli_fetch_assoc($query)) {
                    ?>

                        <tr >
                        <td style="color:whitesmoke;" class="py-2"><?php echo $rows['Id']; ?></td>

                            <td style="color:whitesmoke;" class="py-2"><?php echo $rows['Sender']; ?></td>
                            <td style="color:whitesmoke;" class="py-2"><?php echo $rows['Receiver']; ?></td>
                            <td style="color:whitesmoke;" class="py-2"><?php echo $rows['Amount']; ?> </td>
                            <td style="color:whitesmoke;" class="py-2"><?php echo $rows['Date_and_time']; ?> </td>

                        <?php
                    }

                        ?>
                    </table>
                </div>
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