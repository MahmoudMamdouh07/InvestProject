
<?php
if(isset($_GET['login']))
{
    if(!isset($_SESSION['username']))
    {
 ?>
  <!-- Navigation -->
<?php
  ob_start();
require 'classes.php';
$db = new Database;
$loginSystem = new loginSystem;
if(isset($_POST['login']))
{
        $username = $_POST['username'];
        $password = $_POST['password']; 
 //   $username = $loginSystem->clean($username);
 //   $password = $loginSystem->clean($password);
    $loginSystem->login($username,$password);
}
    
?>
<br>
<br><br><br>
    <div class="container">
    <br><br>
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">			
<h3>Sign In</h3>
			</div>
			<div class="card-body">
				<form method="post" action="">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" name="login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="./index.php?signup">Sign Up</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
}
}
?>
