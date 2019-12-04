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

if(isset($_GET['today']) ) { /* if it is set, do something, if not do something else */
    $today = $_GET['today'];
} else {
    $today = date('l');
}

switch($today) {
    case 'Sunday':
        $hazard = 'Sunday is Pothole Day';
        $pic = 'pothole.jpg';
        $alt = 'It\'s a Pothole!';
        $factoid = 'Popping up in the most inconvenient places, these hazards have known to cause damage to vehicles when not addressed quickly.';
        $color = 'blue';
        break;
    case 'Monday':
        $hazard = 'Monday is Sinkhole Day';
        $pic = 'sinkhole.jpg';
        $alt = 'It\'s a Sinkhole!';
        $factoid = 'Truly frightening! Sinkholes can be big enough to swallow entire vehicles, and frequently unknown until the top ground level busts open!';
        $color = 'lightsteelblue';
        break;
    case 'Tuesday':
        $hazard = 'Tuesday is Road Construction Day';
        $pic = 'construction.jpg';
        $alt = 'It\'s Road Construction!';
        $factoid = 'These zones can crop up and surprise even locals. Be careful of construction workers who may be very near the driving lane!';
        $color = 'orange';
        break;
    case 'Wednesday':
        $hazard = 'Wednesday is Cobblestones Day';
        $pic = 'cobblestone.jpg';
        $alt = 'It\'s Cobblestones!';
        $factoid = 'Cobblestone streets are THE WORST. More super-annoying than a hazard, but we hate them.';
        $color = 'white';
        break;
    case 'Thursday':
        $hazard = 'Thursday is Animals Day';
        $pic = 'animals.jpg';
        $alt = 'It\'s Animals!';
        $factoid = 'Animals large and small can be hazardous, and cause massive damage to vehicles when they are hit. Larger animals like moose and deer can crash through the windshield and kick at the driver: you!  Don\'t hit \'em!';
        $color = 'brown';
        break;
    case 'Friday':
        $hazard = 'Friday is No Sidewalks Day';
        $pic = 'sidewalk.jpg';
        $alt = 'It\'s No Sidewalks!';
        $factoid = 'Some higher traffic streets don\'t have sidewalks, which mean pedestrians are very near the roadway.  In busy areas, this can be a definite road hazard!';
        $color = 'yellow';
        break;
    case 'Saturday':
        $hazard = 'Saturday is Lava Day';
        $pic = 'lava.jpg';
        $alt = 'It\'s F&#%ing LAVA!';
        $factoid = 'It might be pretty uncommon in most of the U.S., but still....I mean it\'s F&#%IN\' LAVA!';
        $color = 'red';
        break;
}
include('config.php');
include('includes/header.php');
    
?>


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

    <h1><?php echo $hazard; ?></h1>
        
        <p>Discover other crazy road hazards by clicking the links below!</p>
        <ul>
            <li><a href="daily.php?today=Sunday">Sunday</a></li>
            <li><a href="daily.php?today=Monday">Monday</a></li>
            <li><a href="daily.php?today=Tuesday">Tuesday</a></li>
            <li><a href="daily.php?today=Wednesday">Wednesday</a></li>
            <li><a href="daily.php?today=Thursday">Thursday</a></li>
            <li><a href="daily.php?today=Friday">Friday</a></li>
            <li><a href="daily.php?today=Saturday">Saturday</a></li>
        </ul>

        <p>Those options are already baked in with this model shoot me an email clear blue water but we need distributors to evangelize the new line to local markets, but fire up your browser. Strategic high-level 30,000 ft view. Drill down re-inventing the wheel at the end of the day but curate imagineer, or to be inspired is to become creative.</p>

        <p>Those options are already baked in with this model shoot me an email clear blue water but we need distributors to evangelize the new line to local markets, but fire up your browser. Strategic high-level 30,000 ft view. Drill down re-inventing the wheel at the end of the day but curate imagineer, or to be inspired is to become creative.</p>
</main>

<aside style="background:<?= $color ?>;">
<h3>What's the Road Hazard for <?= $today ?>?</h3>
<img src="images/<?= $pic ?>" class="aside" alt="<?= $alt ?>">
        <h3><?= $alt ?></h3>
        <p><em><?= $factoid ?></em></p>
</aside>


<? include('includes/footer.php'); ?>