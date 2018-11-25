<?php
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "userinfo";

	$connect = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

	$UserId = $_GET['id'];

	$sql = "SELECT * FROM `profile` WHERE id = '".$UserId."'";
	$userdata = mysqli_query($connect, $sql);

?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	    <meta name="viewport" content="width=device-width" />
	    
	    <title>User details</title>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
		  
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

	    <style type="text/css">
	        .container{ max-width: 1200px; margin: 0 auto; }
	        .logo-header{ padding: 2em; font-weight: bolder; text-align: center; text-decoration: underline;}
	        .info{ font-weight: bold; margin-bottom: 10px }
	        .field{ font-style: italic; font-weight: bold;}
	        .all{ margin-bottom: 5px; }
	    </style>
	</head>
        
	<body>

    <section class="container">
        <div class="logo-header">
        	USER DETAILS
        </div>
        <?php
        while ($row = $userdata->fetch_assoc()) { ?>

        	<div class="info">USER INFORMATION</div>

        	<div class="all">
				<label class="field">ID: </label><?=$row['id']?>
			</div>
			<div class="all">
				<label class="field">Title: </label><?=$row['title']?>				
			</div>
			<div class="all">
				<label class="field">Firstname: </label><?=$row['first']?>
			</div>
			<div class="all">
				<label class="field">Lastname: </label><?=$row['last']?>				
			</div>
			<div class="all">
				<label class="field">Gender: </label><?=$row['gender']?>				
			</div>
			<div class="all">
				<label class="field">Date of Birth: </label><?=date("F j, Y", strtotime($row['dob_date']))?>
			</div>
			<div class="all">
				<label class="field">Age: </label><?=$row['dob_age']?>				
			</div>
			<div class="all">
				<label class="field">Street: </label><?=$row['street']?>				
			</div>
			<div class="all">
				<label class="field">City: </label><?=$row['city']?>				
			</div>
			<div class="all">
				<label class="field">State: </label><?=$row['state']?>				
			</div>
			<div class="all">
				<label class="field">Postcode: </label><?=$row['postcode']?>				
			</div>
			<div class="all">
				<label class="field">Email: </label><?=$row['email']?>				
			</div>
			<div class="all">
				<label class="field">Phone: </label><?=$row['phone']?>				
			</div>
			<div class="all">
				<label class="field">Cell: </label><?=$row['cell']?>				
			</div>
			<div class="all">
				<label class="field">Latitude: </label><?=$row['latitude']?>				
			</div>
			<div class="all">
				<label class="field">Longitude: </label><?=$row['longitude']?>				
			</div>
			<div class="all">
				<label class="field">Timezone-offset: </label><?=$row['timezone_offset']?>				
			</div>
			<div class="all">
				<label class="field">Timeszone-description: </label><?=$row['timezone_description']?>
			</div>
			<div class="all">
				<label class="field">Registered date: </label><?=date("F j, Y, g:i a", strtotime($row['reg_date']))?>			
			</div>
			<div class="all">
				<label class="field">Registered age: </label><?=$row['reg_age']?>				
			</div>
			<div class="all">
				<label class="field">Large picture: </label><?=$row['pic_large']?><br>
				<label class="field">Medium picture: </label><?=$row['pic_medium']?><br>
				<label class="field">Thumbnail picture: </label><?=$row['pic_thumbnail']?><br>		
			</div>

			<br>
			<br>
			<div class="info">TRANSACTION INFORMATION</div>
			<div class="all">
				<label class="field">User transaction ID: </label><?=$row['transaction_id']?>				
			</div>
			<div class="all">
				<label class="field">Transaction amount: </label><?=$row['amount']?>				
			</div>
			<div class="all">
				<label class="field">Transaction status: </label><?=$row['status']?>				
			</div>
			<div class="all">
				<label class="field">Payment method: </label><?=$row['payment_method']?>				
			</div>
			<div class="all">
				<label class="field">Transaction timestamp: </label><?=$row['txn_timestamp']?>				
			</div>

        <?php	
        }
        ?>
    </section>
    
</body>
</html>