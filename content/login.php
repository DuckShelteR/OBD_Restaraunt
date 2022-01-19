<?php include("../includes/header.php"); ?>
<div class="container mlogin">
	<div id="login">
		<h1>Вход</h1>
		<form action="" id="loginform" method="post"name="loginform">

			<p><label for="user_login">Email<br>
				<input class="input" id="email" name="email"size="20"
				type="text" value=""></label></p>

				<p><label for="user_pass">Пароль<br>
					<input class="input" id="password" name="password"size="20"
					type="password" value=""></label></p> 

					<p class="submit"><input class="button" name="login"type= "submit" value="Log In"></p>
					<p class="regtext">Еще не зарегистрированы?<a href= "register.php">Регистрация</a>!</p>
				</form>
			</div>
		</div>
		<?php
		session_start();
		?>

		<?php require_once("../includes/connection.php"); ?>
		<?php include("../includes/header.php"); ?>	 
		<?php

		if(isset($_SESSION["session_username"])){
	// вывод "Session is set"; // в целях проверки
			$query=mysqli_query($con, "SELECT * FROM users WHERE email = '".$_SESSION["session_username"]."' ");
			$row=mysqli_fetch_assoc($query);
				header("Location: intropage.php");
		}

		if(isset($_POST['login'])){
			if($_POST['email'] != "" && $_POST['password'] != ""){
				$_POST['email'] = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
				$_POST['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
				if($_POST['email'] == "" || $_POST['password'] == ""){
					$message = "Введите корректные данные!";
				}else{
					$email=htmlspecialchars($_POST['email']);
					$password=htmlspecialchars($_POST['password']);
					$query =mysqli_query($con, "SELECT * FROM users WHERE email='".$email."' AND pass='".$password."'");
					$numrows=mysqli_num_rows($query);
					if($numrows!=0)
					{
						$row=mysqli_fetch_assoc($query);
					
						$dbemail=$row['email'];
						$dbpassword=$row['pass'];
					
						if($email == $dbemail && $password == $dbpassword)
						{
	// старое место расположения
	//  session_start();
							$_SESSION['session_username']=$email;	 
						/* Перенаправление браузера */
								header("Location: intropage.php");
						}
					} else {
						$message = "Invalid username or password!";
					}
				}
			}else{
				$message = "Все поля должны быть заполнены!";
			}
		}

		
		?>
		<?php if (!empty($message)) {echo "<p class='error'>" . "MESSAGE: ". $message . "</p>";} ?>
		<?php include("../includes/footer.php"); ?>

















<!-- 

		if(isset($_POST["login"])){

			if(!empty($_POST['email']) && !empty($_POST['password'])) {
				$email=htmlspecialchars($_POST['email']);
				$password=htmlspecialchars($_POST['password']);
				$query =mysqli_query($con, "SELECT * FROM users WHERE email='".$email."' AND pass='".$password."'");
				$numrows=mysqli_num_rows($query);
				if($numrows!=0)
				{
					$row=mysqli_fetch_assoc($query);
					
						$dbemail=$row['email'];
						$dbpassword=$row['pass'];
					
					if($email == $dbemail && $password == $dbpassword)
					{
	// старое место расположения
	//  session_start();
						$_SESSION['session_username']=$email;	 
						/* Перенаправление браузера */
						if($row['role'] == "customer")
							header("Location: intropage.php");
						else if ($row['role'] == "admin")
							header("Location: intropageAdmin.php");
					}
				} else {
	//  $message = "Invalid username or password!";

					echo  "Invalid username or password!";
				}
			} else {
				$message = "All fields are required!";
			}
		} -->