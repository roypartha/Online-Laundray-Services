<?php 

session_start(); // Start the session.
if(isset($_SESSION['username'])){ // If the session variable username is set, then the user is logged in.
    //echo "Welcome ".$_SESSION['username']."<br>";
    
}
else{ 
    
    header("refresh: 4 ; url =../Sign_Login/login.php");
    die("Please Login First");

}
//
if (isset($_POST['submit']) && isset($_FILES['fileToUpload'])) {  // check submit button is clicked or not and file is selected or not

	include "db_conn.php"; // Database connection file

	echo "<pre>";
	print_r($_FILES['fileToUpload']); // Print the file information
	echo "</pre>";

    echo "File Name: ".$_FILES['fileToUpload']['name']."<br>";

	$img_name = $_FILES['fileToUpload']['name'];
	$img_size = $_FILES['fileToUpload']['size'];
	$tmp_name = $_FILES['fileToUpload']['tmp_name'];
	$error = $_FILES['fileToUpload']['error'];

    if ($error === 0) { //
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: edit_profile.php?error=$em");
		}
        else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION); // Get the extension of the file
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = " update customer set image = '$new_img_name' where uname = '".$_SESSION['username']."' ";
				mysqli_query($conn, $sql);

				header("refresh: 1 ; url = edit_profile.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: edit_profile.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: edit_profile.php?error=$em");
	}

    

}else {
	header("Location: edit_profile.php");
}