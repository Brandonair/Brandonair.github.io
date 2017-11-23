</br /<br />
<form name="loginform" action="<?php echo url('/login');?>" method="post">
<?php echo "<?xml version='1.0'?>"; ?>
<?php
if(isset($message))
	echo '<p class="error">'.$message.'</p>';
?>
<dl>
<center>

	<dt>E-mail Address:</dt>
	<dd><input type="text" name="email" "style="width: 200px"value="" />
	<dt>Password:</dt>
	<dd><input type="password" name="password" value="" />
	  </center> 
	<dt></dt>
	<center>
	<dd>Remember Me? <input type="checkbox" name="remember" /></dd>

	<dt></dt>
	<dd><input type="hidden" name="redir" value="index.php/profile" />
		<input type="hidden" name="action" value="login" />
		<input type="submit" name="submit" value="Log In" />

	
		
	<dt></dt>
	<dd><a href="<?php echo url('Login/forgotpassword'); ?>">I forgot my password</a></dd>
</dl>
</center>
</form>