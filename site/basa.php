<?php
    @session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Basa</title>
	<script src="jquery.js"></script>
	<script src="login.js"></script>
	<link href="styles.css" rel="stylesheet" type="text/css">
	<script>
		<?php
			$link = new PDO('mysql:host=localhost;dbname=loginpass;charset=utf8', 'root','kjkrf');
        ?>   
    </script>
</head>
<body>
	<span class="logo">Horse Club</span>
<div class="registration">
<?php
    if (isset($_POST['login'])) {
        $login = $_POST['login'];
        if ($login == '') {
        unset($login);
        } 
    } 
    if (isset($_POST['password'])) 
        { $password=$_POST['password'];
        if ($password =='') {
            unset($password);
        } 
    } 
    if (!empty($login)) {
    $password = md5($password);
    foreach($link->query("SELECT * FROM users WHERE login='$login'") as $myrow);
    if (!empty($myrow['id'])) {
        echo 'Sorry, we have that login';
    }
    else {
        $link->exec("INSERT INTO users (login,password) VALUES('$login','$password')");
        echo "Hello:".$login;
        }
    }

?>
</div>
<div class="registration">
<?php
if (isset($_POST['username'])) { 
    $username = $_POST['username'];
        if ($username == '') {
            unset($username);
        } 
} 
if (isset($_POST['passwordd'])) { 
    $passwordd=$_POST['passwordd'];
    if ($passwordd =='') {
        unset($passwordd);
    } 
}
if (!empty($username)) {
    $passwordd = md5($passwordd);
    foreach($link->query("SELECT * FROM users WHERE login ='$username'") as $myrows);
    if (empty($myrows['password'])){
        echo "Sorry, you login is NOT right";
    }
    else {
        if ($myrows['password']==$passwordd) {
            $_SESSION['username']=$myrows['login']; 
            $_SESSION['id']=$myrows['id'];
            $_SESSION['status']=$myrows['status'];
        }
        else {
        echo "Sorry, you login or pass is not right.";
        }
    }
}
?>
<span class='registration'>
    <?php 
        if (empty($_SESSION['username']) or empty($_SESSION['id'])) {
            echo "Hello: Guest";
        }
        else {
            echo "Hello: ".$_SESSION['username'];
        }
    ?>
</span>
</div>
	<div id="openModal" class="modalDialog">
    	<div>
    		<a href="#close" title="Close" class="close">X</a>
    		<p>
    			<label>Login:<br></label>
    			<input id="username" type="text" size="15" maxlength="15">
    		</p>
    		<p>
    			<label>Password:<br></label>
    			<input id="passwordd" type="text" size="15" maxlength="15">
			</p>
    		<p>
    			<input type="button" id="button" onclick="login()" value="Log in"></p>
    		<br> 
		</div>
	</div>
    <div id='openModal2' class="modalDialog">
      <div>
      <a href='#close' title="Close" class="close">X</a>
      <p>
      <p>
    <label>Login:<br></label>
    <input id="login" type="text" size="15" maxlength="15">
    </p>
	<p>
    <label>Password:<br></label>
    <input id="password" type="text" size="15" maxlength="15">
    </p>
	<p>
    <input type="submit" name="submit" value="Registration" onclick="registr()">
	</p>
	<br>
	</div>
	</div>
<?php
    if(isset($_POST['Logout'])){
        unset($_SESSION['username']);
        unset($_SESSION['id']);
        unset($_SESSION['status']);
        session_destroy();
    }
?>
<ul class="menu cf">
	<li><a href="index.php">Home</a></li>
	<li>
		<a href="#">Information</a>
		<ul class="submenu">
			<li><a href="info.php">Info</a></li>
			<li><a href="Photo.php">Photo</a></li>
			<li><a href="Forowner.php">For Owner</a></li>
		</ul>
	</li>
	<li><a href="Contacts.php">Contacts</a></li>
	<li>
		<a href="#">Login</a>
		<ul class="submenu">
			<li><a href="#openModal">Login</a></li>
			<li><a href="#openModal2">Registration</a></li>
		</ul>
	</li>
    <li><form method="POST">
        <input type="submit" name='Logout' value="Log out">
        </form>
    </li>
</ul>
</body>
</html>