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


if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];

} else {
    header('Location:roadsdb.php');

} // closing if-isset statement

$sql = 'SELECT * FROM Roads WHERE roadID = '.$id.'';
// we now need to connect to the db

$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
?>

<?php
// we need to extract the data
$result = mysqli_query($iConn, $sql) or
die(myerror(__FILE__,__LINE__,mysqli_connect_error($iConn)));


//we need an if statement asking if we have more than 0 rows?

if(mysqli_num_rows($result) > 0) {  // show the records

while ($row = mysqli_fetch_assoc($result)) {
// the msqli fetch associative array will display the contents of the row
$roadName = stripcslashes($row['roadName']);
$city = stripcslashes($row['city']);
$state = stripcslashes($row['state']);
$rank = stripcslashes($row['rank']);
$length = stripcslashes($row['length']);
$deaths = stripcslashes($row['deaths']);
$deathType = stripcslashes($row['deathType']);
$description = stripcslashes($row['description']);
$feedback = '';



} //end while loop 

} else { // end if statement and what if no roads exist? 
 $feedback = 'This road\'s horribleness is shrouded in mystery!';
} //end else

include('includes/header.php');
?>


<main class="gallery">

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

<h2><?php echo 'Worst Road #'. $rank . ': ' . $roadName; ?></h2>
<?php 
echo '<img class ="view" src="images/uploads/roads'.$id.'.jpg"  alt="'.$roadName.' in '.$city.', '.$state.'"> ';
echo '<ul class="viewlist">';
echo '<li><strong>Road:</strong> '.$roadName.' </li>';
echo '<li><strong>City:</strong> '.$city.' </li>';
echo '<li><strong>State:</strong> '.$state.' </li>';
echo '<li><strong>Rank:</strong> '.$rank.' </li>';
echo '<li><strong>Length (in Miles):</strong> '.$length.' </li>';
echo '<li><strong>No. of Deaths (5yr window):</strong> '.$deaths.' </li>';
echo '<li><strong>Prominent Type of Death:</strong> '.$deathType.' </li>';
echo '</ul>';


echo '<p class="viewdsc">'.$description.'</p>';

echo '<a class="viewlink" href="roadsdb.php" title="Back to Roads DB">Back to Worst Roads Database</a>';
?>

<?php
// release web server

@mysqli_free_result($result);

//close the connection

@mysqli_close($iConn);
?>


</main>



<?php include('includes/footer.php'); ?>