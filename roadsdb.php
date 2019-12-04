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
include('includes/header.php');

$sql = 'SELECT * FROM Roads';
// we now need to connect to the db

$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
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

<?php
// we need to extract the data
$result = mysqli_query($iConn, $sql) or
die(myerror(__FILE__,__LINE__,mysqli_connect_error($iConn)));


//we need an if statement asking if we have more than 0 rows?

if(mysqli_num_rows($result) > 0) {  // show the records
?> <table class="sql"> <?php
while ($row = mysqli_fetch_assoc($result)) {
// the msqli fetch associative array will display the contents of the row
echo '<tr>';
echo '<td>';
echo '<ul>';
echo '<li class="large">For more info about <a href="roads-view.php?id=' .$row['roadID']. '"> '.$row['roadName'].' </a>    </li>';
echo '<li>Road Name: '.$row['roadName'].'    </li>';
echo '<li>Cities: '.$row['city'].'     </li>';
echo '<li>States: '.$row['state'].'     </li>';
echo '<li>Worst Road Rank: '.$row['rank'].'    </li>';
echo '</ul>';
echo '</td>';
echo '</tr>';


} //end while loop ?>
</table>
<?php
} else { // end if statement and what if no customers exist! 
 echo 'Sorry, no horrible roads!';
} //end else


?>
<p>*Data compiled from <a href="https://www.cheatsheet.com/culture/proceed-with-caution-americas-most-dangerous-roads.html/" target="_blank" title="cheatsheet.com, America's most dangerous roads">cheatsheet.com</a></p>

</main>

<aside>
<img src="images/cyclist.jpg" class="aside" alt="cyclist and car accident image">
<h3>Bonus Road Hazard: Cyclists!</h3>
<p><em>Cars are dangerous to everyone, and cyclists are frequently overlooked!</em></p>
<p>Dangerous Roads! Let's start with <a href="https://gilson-coding.com/ITC240/final-project/roads-view.php?id=1" title="Danger Road view">the top ranked</a>...</p>
</aside>
<?php

// release web server

@mysqli_free_result($result);

//close the connection

@mysqli_close($iConn);

?>


<?php include('includes/footer.php'); ?>