<?php
if(isset($_GET['signup']))
{
    
require 'classes.php';
$db = new Database;
$loginSystem = new loginSystem;
if(isset($_POST['register']))
{
        if(isset($_POST['investor']) && !isset($_POST['owner']))
        {
        $name       = $_POST['name'];
        $username   = $_POST['username'];
        $password   = $_POST['password']; 
        $type       = $_POST['investor'];
        $user_email = $_POST['email'];
        $phone      = $_POST['phone'];
 //   $username = $loginSystem->clean($username);
 //   $password = $loginSystem->clean($password);
    $loginSystem->register($name,$username,$password,$type,$user_email,$phone);
            echo "Registration completed";
            sleep(5);
            header("Location: ./index.php?login");
        }
        elseif(isset($_POST['owner']) && !isset($_POST['investor']))
        {
        $name       = $_POST['name'];
        $username   = $_POST['username'];
        $password   = $_POST['password']; 
        $type       = $_POST['owner'];
        $user_email = $_POST['email'];
        $phone      = $_POST['phone'];
 //   $username = $loginSystem->clean($username);
 //   $password = $loginSystem->clean($password);
    $loginSystem->register($name,$username,$password,$type,$user_email,$phone);
            $message = "Registration completed";
            sleep(1);
            header("Location: ./index.php?login");
        }
}
    
?>


<div class="container">
<br><br>
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign Up</h3>
				<h3><?php if(isset($_POST['register']))
    {
        echo $message;
    }?></h3>
			</div>
			<div class="card-body">
				<form method="post" action="">
				<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="name" placeholder="Name">
						
					</div>
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
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="email" name="email" class="form-control" placeholder="email">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="text" name="phone" class="form-control" placeholder="phone">
					</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="owner" type="checkbox" id="inlineCheckbox1" value="owner">
  <label class="form-check-label" for="inlineCheckbox1">Owner</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="investor" type="checkbox" id="inlineCheckbox2" value="investor">
  <label class="form-check-label" for="inlineCheckbox2">Investor</label>
</div>
					<div class="form-group">
						<input type="submit" value="register" name="register" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
<?php
}
?>