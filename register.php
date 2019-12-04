<?php   

include('server.php');
include('includes/header9.php');
?>

<h2>Become a member of Broken Boulevards!</h2>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<fieldset>
<label>First Name:</label>
<input type="text" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>">

<label>Last Name:</label>
<input type="text" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>">

<label>User Name:</label>
<input type="text" name="userName" value="<?php echo htmlspecialchars($userName); ?>">
    
<label>Email:</label>
<input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">

<label>Password:</label>
<input type="password" name="password_1">

<label>Confirm Password:</label>
<input type="password" name="password_2">

<?php
include('errors.php');
?>

<input type="submit" class="" name="reg_user" value="Register">

</fieldset>
</form>

<p class="redirect">
    Already a member? <a href="login.php" target="_blank" title="Sign in link">Sign in!</a>
</p>

</main>
<?php
include('includes/footer9.php');
?>