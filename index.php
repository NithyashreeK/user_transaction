<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "userinfo";

$connect = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

set_time_limit(60);
$json = file_get_contents("https://randomuser.me/api/?results=500&nat=us&exc=login,id,nat");
$data =  json_decode($json);


// for($i=0; $i<count($data->results); $i++){

// 	$sql = "INSERT INTO profile (gender, title, first, last, street, city, state, postcode, latitude, longitude, timezone_offset, timezone_description, email, dob_date, dob_age, reg_date, reg_age, phone, cell, pic_large, pic_medium, pic_thumbnail, transaction_id, amount, txn_timestamp) VALUES 
// 		('".$data->results[$i]->gender."', 
// 		'".$data->results[$i]->name->title."',
// 		'".$data->results[$i]->name->first."', 
// 		'".$data->results[$i]->name->last."', 
// 		'".$data->results[$i]->location->street."', 
// 		'".$data->results[$i]->location->city."', 
// 		'".$data->results[$i]->location->state."',
// 		'".$data->results[$i]->location->postcode."',
// 		'".$data->results[$i]->location->coordinates->latitude."', 
// 		'".$data->results[$i]->location->coordinates->longitude."', 
// 		'".$data->results[$i]->location->timezone->offset."', 
// 		'".$data->results[$i]->location->timezone->description."', 
// 		'".$data->results[$i]->email."', 
// 		'".date("F j, Y, g:i a", strtotime($data->results[$i]->dob->date))."',
// 		'".$data->results[$i]->dob->age."',
// 		'".$data->results[$i]->registered->date."', 
// 		'".$data->results[$i]->registered->age."', 
// 		'".$data->results[$i]->phone."', 
// 		'".$data->results[$i]->cell."', 
// 		'".$data->results[$i]->picture->large."', 
// 		'".$data->results[$i]->picture->medium."', 
// 		'".$data->results[$i]->picture->thumbnail."',
// 		'".uniqid('txn_')."',
// 		FLOOR(RAND() * 401) + 100,
// 		FROM_UNIXTIME(UNIX_TIMESTAMP('2018-04-30 14:53:27') + FLOOR(0 + (RAND() * 63072000)))
// 	)";

// 	mysqli_query($connect, $sql);
// }

// for($i=1; $i<=500; $i++){
// 	$a=array("Visa", "Mastercard", "Discover", "American Express", "Diners Club", "JCB", "UnionPay", "eCheck");
// 	$random_keys=array_rand($a);
// 	$sql = "UPDATE profile SET payment_method = '".$a[$random_keys]."' WHERE id = '".$i."'";
// 	mysqli_query($connect, $sql);
// }

// for($i=1; $i<=500; $i++){
// 	$a=array("expired","expires soon","active");
// 	$random_keys=array_rand($a);
// 	$sql = "UPDATE profile SET status = '".$a[$random_keys]."' WHERE id = '".$i."'";
// 	mysqli_query($connect, $sql);
// }

// echo "Success";

$sql = "SELECT id, transaction_id, first, last, amount, status, payment_method, txn_timestamp FROM `profile` ORDER BY `profile`.`transaction_id` ASC";

$transactions = mysqli_query($connect, $sql);

$users = "SELECT id, first, last, email, phone, transaction_id FROM `profile`";

$user_array = mysqli_query($connect, $users);


?>

<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	    <meta name="viewport" content="width=device-width" />
	    
	    <title>NSK Data</title>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
		  
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

	    <style type="text/css">
	    	.logo-header{ padding: 2em; font-weight: bolder; text-align: center; text-decoration: underline;}
	        .user{ text-align: center; font-weight: bold; }
	        .userid{ cursor: pointer; }
	    </style>
	</head>
        
	<body>
    <section>
    	<div class="logo-header">
        	NSK INFORMATION
        </div>
        <div class="user">TRANSACTION TABLE</div>
        <div class="container">
            <table class="table table-striped" id="tab_id">
                <thead>
                    <tr>
                    	<th class="ui-secondary-color">ID</th>
                        <th class="ui-secondary-color">Transaction ID</th>
                        <th class="ui-secondary-color">Firstname</th>
                        <th class="ui-secondary-color">Lastname</th>
                        <th class="ui-secondary-color">Amount</th>
                        <th class="ui-secondary-color">Status</th>
                        <th class="ui-secondary-color">Payment method</th>
                        <th class="ui-secondary-color">Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
						while ($row = $transactions->fetch_assoc()) { ?>

	                		<tr>
	                			<td><?=$row['id']?></td>
		                        <td><?=$row['transaction_id']?></td>
		                        <td><?=$row['first']?></td>
		                        <td><?=$row['last']?></td>
		                        <td><?=$row['amount']?></td>
		                        <td><?=$row['status']?></td>
		                        <td><?=$row['payment_method']?></td>
		                        <td><?=date("m/d/Y", strtotime($row['txn_timestamp']))?></td>
		                    </tr> 
		                <?php 
		                }                		
                	
                	?>
                      
                </tbody>
            </table>
        </div>
    </section>
    <br>
    <br>
    <section>
        <div class="user">USER TABLE</div>
        <div class="container">
            <table class="table table-striped" id="arr_id">
                <thead>
                    <tr>
                    	<th class="ui-secondary-color">ID</th>
                        <th class="ui-secondary-color">Firstname</th>
                        <th class="ui-secondary-color">Lastname</th>
                        <th class="ui-secondary-color">Email</th>
                        <th class="ui-secondary-color">Phone</th>
                        <th class="ui-secondary-color">Transaction ID</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
						while ($row = $user_array->fetch_assoc()) { ?>

	                		<tr class="data-row">
	                			<td class="userid"><?=$row['id']?></td>
		                        <td><?=$row['first']?></td>
		                        <td><?=$row['last']?></td>
		                        <td><?=$row['email']?></td>
		                        <td><?=$row['phone']?></td>
		                        <td><?=$row['transaction_id']?></td>
		                    </tr> 
		                <?php 
		                }                		
                	
                	?>
                      
                </tbody>
            </table>
        </div>

    </section>
    <script>
    	$(document).ready(function(){

		    $('#tab_id').DataTable();
		    $('#arr_id').DataTable();

		    $('#arr_id').on('click', '.userid', function(){
		    	var id = $(this)[0].innerHTML;
		    	location.href = "list.php?id="+id;
		    });

		});
    </script>
</body>
</html>