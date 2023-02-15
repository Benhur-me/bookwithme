<?php

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//Read from database
			$query = "select * from users where user_name = '$user_name' limit 1";

			$result = mysqli_query($con, $query);

            if($result){
                if($result && mysqli_num_rows($result) > 0){

                    $user_data  = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password){

                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                        die;
                    }
                }
            }
            echo "<script>alert('Wrong username or password')</script>";
		}else
		{
			echo "<script>alert('Wrong username or password')</script>";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div id="box">
        <h3>Login to book for a movie</h3>

        <form action="" method="post">
            <div style="font-size: 20px; margin: 10px; color: #fff;">Login</div>
            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Login">

            <a class="signup_account" href="signup.php">Signup</a><br><br>
        </form>
    </div>

</body>
</html>