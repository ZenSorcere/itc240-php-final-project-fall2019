<?php 

//check to see if entered via the login or registration page!

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
include('includes/header.php'); ?>


<main>

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

<h1>Thanks for letting us know!</h1>
<p>We'll respond per your requested method.</p>
<p>In the meantime, head on back to the <a href="daily.php">Daily Hazards Page</a>!</p>
</main>


<aside>
<img src="images/curvy.jpg" class="aside" alt="curvy road">
<h3>Bonus Road Hazard: Curvy Roads!</h3>
<p><em>Curvy roads such as this don't allow for seeing what's ahead, and most people misjudge the speed at which to take them. Obey spped limits on curvy roads!</em></p>
</aside>


<?php include('includes/footer.php'); ?>



