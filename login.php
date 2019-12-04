<?php

include('server.php');
include('includes/header9.php');
?>




<h2>Login</h2>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
<fieldset>
<!--Username label : stickiness not needed-->
<label>Username</label>
    <input type="text" name="userName" value ="<?php echo htmlspecialchars($userName); ?>">

<!--Username label -->        
<label>Password</label>
        <input type="password" name="password">   

<?php
include('errors.php');
?>

<input type="submit" name="login_user" value="Login" >
<input type="button" onclick= "window.location.href = '<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'" value="RESET">
</fieldset>
</form>

<p class="redirect">Not yet a member of Broken Boulevards? <a href="register.php" title="register page">Sign Up</a></p>
</main>
<?php include('includes/footer9.php'); ?>



