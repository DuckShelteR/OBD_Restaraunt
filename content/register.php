<?php include("../includes/header1.php"); ?>
<div class="container mregister">
	<div id="login">
		<h1>Регистрация</h1>
		<form action="register.php" id="registerform" method="post"name="registerform">
			
			<p><label for="user_login">Имя<br>
				<input class="input" id="name" name="name"size="32"  type="text" value=""></label></p>
				
				<p><label for="user_login">Фамилия<br>
					<input class="input" id="surname" name="surname"size="32"  type="text" value=""></label></p>

					<p><label for="user_login">Номер телефона<br>
						<input class="input" id="phone" name="phone"size="32"  type="text" value=""></label></p>

						<p><label for="user_pass">E-mail<br>
							<input class="input" id="email" name="email" size="32"type="email" value=""></label></p>
						
							<p><label for="user_pass">Пароль<br>
								<input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>

							<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Зарегистрироваться"></p>
							<p class="regtext">Уже зарегистрированы? <a href= "login.php">Авторизироваться</a>!</p>
						</form>
					</div>
				</div>
				<?php

				if(isset($_POST["register"])){

					if($_POST['name'] != "" && $_POST['surname'] != "" && $_POST['phone'] != "" && $_POST['email'] != "" && $_POST['password'] != "") {
					$_POST['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
					$_POST['surname'] = filter_var($_POST['surname'], FILTER_SANITIZE_STRING);
					$_POST['phone'] = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
					$_POST['email'] = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
					$_POST['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
					if($_POST['name'] == "" || $_POST['surname'] == "" || $_POST['phone'] == "" || $_POST['email'] == "" || $_POST['password'] == ""){
						$message = "Введите корректные данные!";
					} else{
						$name= htmlspecialchars($_POST['name']);
						$surname= htmlspecialchars($_POST['surname']);
						$phone= htmlspecialchars($_POST['phone']);
						$email=htmlspecialchars($_POST['email']);
						$password=htmlspecialchars($_POST['password']);
						$query=mysqli_query($con, "SELECT * FROM users WHERE email='".$email."'");
						$numrows=mysqli_num_rows($query);
						if($numrows==0)
						{
							$sql="INSERT INTO users
							(email, pass, name, surname, phone)
							VALUES('$email','$password', '$name', '$surname', '$phone')";
							$result=mysqli_query($con, $sql);
							if($result){
								$message = "Account Successfully Created";
							} else {
								$message = "Failed to insert data information!";
							}
						} else {
							$message = "That email already exists! Please try another one!";
						}
					}
					} else {
						$message = "All fields are required!";
					}
				}
				?>

				<?php if (!empty($message)) {echo "<p class='error'>" . "MESSAGE: ". $message . "</p>";} ?>

				<?php include("../includes/footer.php"); ?>