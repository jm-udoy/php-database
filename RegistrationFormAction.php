<!DOCTYPE html>
<html>
<head>
	<title>Registration Form Action</title>
</head>
<body>
	<h1>Registration Form Action</h1>

	<?php 


		/*$hostname = "localhost";
		$username = "task_user_1";
		$password = "123";
		$dbname = "task";

		// Mysqli Object-Oriented
		 $conn1 = new mysqli($hostname, $username, $password, $dbname);
		$res1 = $conn1->connect_errno;


		if($res1){
			echo "Database connection failed!...";
			echo "<br>";
			echo $conn1->connect_error; 
		}
		else{
			echo "Database connection successful!...";
		} */



		$firstName = $_POST['fname'];
		$lastName = $_POST['lname'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$userName = $_POST['uname'];
		$password = $_POST['passw'];
		$recEmail = $_POST['recEmail'];

		
		if($_SERVER['REQUEST_METHOD'] == "POST") {

			if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['uname']) || empty($_POST['passw']) || empty($_POST['recEmail'])) {
				echo "Please fill up the full form properly";
			} 
			else {
				//$firstName = $_POST['fname'];
				//$lastName = $_POST['lname'];
				echo "REGISTRATION COMPLETED SUCCESSFULLY!";



				$hostname = "localhost";
				$username = "task_user_1";
				$password = "123";
				$dbname = "task";

				echo "<br>";
				// Mysqli Procedural
				$conn2 = mysqli_connect($hostname, $username, $password, $dbname);
				if(mysqli_connect_error()) {
					echo "Database Connection Failed!...";
					echo "<br>";
					echo mysqli_connect_error();
				}
				else {
					echo "Database Connection Successful!";
					/*$sql2 = "insert into users (username, password) values ('ghi', 456)";
					if(mysqli_query($conn2, $sql2)) {
						echo "Data Insert Successful!";
					}
					else {
						echo "Failed to Insert Data.";
						echo "<br>";
						echo mysqli_error($conn2);
					}*/

					$stmt2 = mysqli_prepare($conn2, "insert into users (fname, lname, gender, email, uname, pass, recemail) values (?, ?, ?, ?, ?, ?, ?)");
					mysqli_stmt_bind_param($stmt2, "sssssss", $p1, $p2, $p3, $p4, $p5, $p6, $p7);
					$p1 = $firstName;
					$p2 = $lastName;
					$p3 = $gender;
					$p4 = $email;
					$p5 = $userName;
					$p6 = $password;
					$p7 = $recEmail;
					$res = mysqli_stmt_execute($stmt2);

					if($res) {
						echo "Data Insert Successful!";
					}
					else {
						echo "Failed to Insert Data.";
						echo "<br>";
						echo $conn2->error;
					}
				}

				mysqli_close($conn2);
				

				/////////////////////////////////////

				/* $stmt1 = mysqli_prepare($conn1, "insert into users (fname, lname, gender, email, uname, pass, recemail) values (?, ?, ?, ?, ?, ?, ?)");
				mysqli_stmt_bind_param($conn1, "sssssss", $p1, $p2, $p3, $p4, $p5, $p6, $p7);
				$res = mysqli_execute($stmt1);
				$p1 = $firstName;
				$p2 = $lastName;
				$p3 = $gender;
				$p4 = $email;
				$p5 = $userName;
				$p6 = $password;
				$p7 = $recEmail;
				//$res = mysqli_stmt_execute($stmt1);

				if($res) {
					echo "Data Insert Successful!";
				}
				else {
					echo "Failed to Insert Data.";
					echo "<br>";
					echo $conn1->error;
				} */


			}
		}
	?>

</body>
</html>