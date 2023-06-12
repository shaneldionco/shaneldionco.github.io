<?php
	$fullName = $_POST['fullName'];
	$email = $_POST['email'];
	$comment = $_POST['comment'];
	

	$conn = new mysqli('localhost', 'root', '','recos');
	if($conn->connect_error){
		die('Connection Failed :'.$conn->connect_error);
	}
	else{
		$stmt = $conn->prepare("insert into recommendation(fullName, email, comment)
		values(?,?,?)");
		$stmt->bind_param("sss",$fullName, $email, $comment);
		$stmt->execute();
		echo 'Comment sent!';
		$stmt->close();
		$conn->close();
	}

?>