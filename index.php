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

// include('includes/header9.php');






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
<p>Welcome <strong><?php echo $_SESSION['userName']; ?>,</strong></p>
<p><a href="index.php?logout='1'" >Logout</a></p>


</div> <!--END BOX --> 
           
            <h1>Welcome to <em>Broken Boulevards</em>, the Worst Roads Home Page!</h1>
            <p>Those options are already baked in with this model shoot me an email clear blue water but we need distributors to evangelize the new line to local markets, but fire up your browser. Strategic high-level 30,000 ft view. Drill down re-inventing the wheel at the end of the day but curate imagineer, or to be inspired is to become creative.</p>

            <p>Those options are already baked in with this model shoot me an email clear blue water but we need distributors to evangelize the new line to local markets, but fire up your browser. Strategic high-level 30,000 ft view. Drill down re-inventing the wheel at the end of the day but curate imagineer, or to be inspired is to become creative.</p>
       
        
        </main>

        <aside>
            <h3>Road Hazards Abound!<br>
            Keep your eye open for Hazard clues throughout the site!</h3>
            <img src="images/steep.jpg" class="aside" alt="severely steep road">
<h3>Bonus Road Hazard: Steep Roads!</h3>
<p><em>Steep roads can pose a risk to many a driver. Always go down them slowly, as decelerating will take longer due to gravity and inertia.  And turn your wheel toward the curb when parking!</em></p>   
        </aside>







<?php include('includes/footer.php'); ?>


