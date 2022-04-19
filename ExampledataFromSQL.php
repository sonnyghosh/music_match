<?php
session_start();

//Connect to the databse
$DATABASE_HOST = 'mydb.itap.purdue.edu';
$DATABASE_USER = 'g1120478';
$DATABASE_PASS = 'Bean123.';
$DATABASE_NAME = 'g1120478';

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
//Build and execute query
$query = 'SELECT id, username FROM Accounts WHERE auth = 1';
$result = mysqli_query($con, $query);

$i = 0;
$id_list;
while ($result->data_seek($i)) {
	$row = $result->fetch_row();
	$id_list[$i] = $row;
	$i++;
}
$i = 0;
while ($i < count($id_list)) {
	printf("Id: %u %s \n", $id_list[$i][0],$id_list[$i][1]);
	$i++;
}
$result -> close();
die($con);

//Alternative Way to Get Data

// $i = 0;
// while ($result->data_seek($i)) {
// 	$row = $result->fetch_row();
// 	printf("Id: %u \n", $row[0]);
// 	$i++;
// }


?>
