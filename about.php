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
            <h1>About us at Broken Boulevards</h1>
           
            <p>Those options are already baked in with this model shoot me an email clear blue water but we need distributors to evangelize the new line to local markets, but fire up your browser. Strategic high-level 30,000 ft view. Drill down re-inventing the wheel at the end of the day but curate imagineer, or to be inspired is to become creative.</p>
       
        
        </main>

        
        <aside>
<img src="images/black-ice.jpg" class="aside" alt="road covered in black ice">
<h3>Bonus Road Hazard: Black Ice!</h3>
<p><em>Black ice creates a thin layer of ice, where the road merely looks wet, but will surprise even the most vigilant drivers when they suddenly have zero tire traction.  Remember to pump your brakes when you find yourself sliding in icy conditions!</em></p>
                
        </aside>
    





<?php include('includes/footer.php'); ?>


