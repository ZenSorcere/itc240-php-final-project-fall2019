<?php
//index.php from the login or registration page!

session_start();

if(!isset($_SESSION['userName'])) {
    $_SESSION['msg'] = 'You must login first!';
    header('Location: login.php');
}

if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['userName']);
    header('Location: login.php');
}

include('config.php');
include('includes/header.php');

?>
<main>

<h1>Contact Page</h1>
<!-- LOGIN INFO BOX --> 

<div class="box">
<!-- notification message -->
<?php
if(isset($_SESSION['success'])) {
    echo '<p class="session">'. $_SESSION['success'] . '</p>';
    unset($_SESSION['success']);

}
?> 
<!-- communicate to the logged in user -->
<?php
if(isset($_SESSION['userName'])); ?>
<p><strong><?php echo $_SESSION['userName']; ?>,</strong></p>
<p>You are still logged in!</p>
<p><a href="index.php?logout='1'" >Logout</a></p>


</div> <!--END BOX --> 

<h2>Did you really think I'd make yet *another* form, <?php echo $_SESSION['userName']; ?>?</h2>
<h2>Come on. ;)</h2>



</main>

<aside>
<img src="images/dirtroad.jpg" class="aside" alt="dirt road">
<h3>Bonus Road Hazard: Dirt Roads!</h3>
<p><em>You ever try driving on one of these? Ridiculous! Hope you have good suspension! *shudder*</em></p>
</aside>

<?php 
include('includes/footer.php');
?>

