<?php include('config.php');

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
   // FORM PHP

    // this will be our emailable form

    $name = $email = $response = $comments = $location = $hazards = $phone = $privacy = '';
    $nameErr = $emailErr = $responseErr = $commentsErr = $locationErr = $hazardsErr = $phoneErr = $privacyErr = '';
    
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if(empty($_POST['name'])) {
        $nameErr = 'Please fill out your name';
    } else {
    $name = $_POST['name'];
    }
    
    if(empty($_POST['email'])) {
        $emailErr = 'Please fill out your email';
    } else {
    $email = $_POST['email'];
    }
    
    if(empty($_POST['response'])) {
        $responseErr = 'Please select your desired response';
    } else {
    $response = $_POST['response'];
    }

    if(empty($_POST['location'])) {
        $locationErr = 'Please tell us the location!';
    } else {
    $location = $_POST['location'];
    }
    if(empty($_POST['hazards'])) {
        $hazardsErr = 'Please select your hazards';
    } else {
    $hazards = $_POST['hazards'];
    }
    
    if(empty($_POST['comments'])) {
        $commentsErr = 'Please say something!';
    } else {
    $comments = $_POST['comments'];
    }
    
    if(empty($_POST['privacy'])) {
        $privacyErr = 'You have to click this!';
    } else {
    $privacy = $_POST['privacy'];
    }
    
    if(empty($_POST['phone'])) {  // if empty, type in your number
        $phoneErr = 'Your phone number please!';
        } elseif(array_key_exists('phone', $_POST)){
        if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone']))
        { // if you are not typing the requested format of xxx-xxx-xxxx, display Invalid format
        $phoneErr = 'Invalid format!';
        } else {
        $phone = $_POST['phone'];
        }
        }
    
    if (isset($_POST['name'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['response'],
        $_POST['comments'],
        $_POST['location'],
        $_POST['privacy'],
        $_POST['hazards'])) {
      
        function myHazards() {
        $myReturn = '';
        if(!empty($_POST['hazards'])) {
                $myReturn = implode(",", $_POST['hazards']);
        }   return $myReturn; // end if not empty
    
    }  //end myHazards function
    
    $to = 'szemeo@mystudentswa.com';
    $subject = 'Test Email ' .date("m/d/y");
    $body = '
    ' .$name.' has submitting the form' .PHP_EOL.'
    Email: '.$email.' ' .PHP_EOL.' 
    Phone Number: '.$phone.' ' .PHP_EOL.'
    Location: '.$location.' ' .PHP_EOL.'
    Response Type: '.$response.' ' .PHP_EOL.'
    The hazards reported: '.myHazards().' ' .PHP_EOL.'
    Comments: '.$comments.' ';
    
    $headers = array(
        'From' => 'no-reply@gilson-coding.com',
        'Reply-to' => ''.$email.'');
    
    if($_POST['name']!="" && $_POST['email']!="" && $_POST['phone']!="" &&
    $_POST['response']!="" && $_POST['location']!="" && $_POST['hazards']!="" && $_POST['comments']!="" && $_POST['privacy']!="")
    {
        mail($to, $subject, $body, $headers);
        header('Location: thx.php');
    } //end if statement to make sure nothing is empty, and only send email then.
    } // end isset
    } // end Server

    ?>
   <?php include('includes/header.php'); ?>

   

<!-- <div id="wrapper"> -->
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

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <fieldset>
        <legend>Tell Broken Boulevards About a Problem!</legend>
    
    <label>Name</label>
        <input type="text" name="name" size= "44" value ="<?php if (isset($_POST['name'])) {
            echo htmlspecialchars($_POST['name']);} ?>">
        <span><?php echo $nameErr; ?></span>
        <label>Email</label>
        <input type="email" name="email" size= "44" value ="<?php if (isset($_POST['email'])) {
            echo htmlspecialchars($_POST['email']);} ?>">
        <span><?php echo $emailErr; ?></span>   

        <label>Phone Number</label>
        <input type="text" name="phone" size= "44" placeholder="xxx-xxx-xxxx" value ="<?php if (isset($_POST['phone'])) {
            echo htmlspecialchars($_POST['phone']);} ?>">
        <span><?php echo $phoneErr; ?></span>
        
        <label>Location</label>
            <textarea name="location" cols="44" rows="2"><?php if (isset($_POST['location'])) {
            echo htmlspecialchars($_POST['location']);} ?></textarea>
            <span><?php echo $locationErr; ?></span>

        
        <label>Hazards You're Reporting</label>
        <ul>
            <li><input type="checkbox" name="hazards[]" value="pothole"
            <?php if(isset($_POST['hazards']) && in_array('pothole', $hazards)) echo 'checked = "checked" ' ; ?>
            >Pothole</li>
            <li><input type="checkbox" name="hazards[]" value="fallen tree"
            <?php if(isset($_POST['hazards']) && in_array('fallen tree', $hazards)) echo 'checked = "checked" ' ; ?>
            >Fallen Tree</li>
            <li><input type="checkbox" name="hazards[]" value="fallen power line"
            <?php if(isset($_POST['hazards']) && in_array('fallen powe line', $hazards)) echo 'checked = "checked" ' ; ?>
            >Fallen Power Line</li>
            <li><input type="checkbox" name="hazards[]" value="flooding"
            <?php if(isset($_POST['hazards']) && in_array('flooding', $hazards)) echo 'checked = "checked" ' ; ?>
            >Flooding</li>
            <li><input type="checkbox" name="hazards[]" value="black ice"
            <?php if(isset($_POST['hazards']) && in_array('black ice', $hazards)) echo 'checked = "checked" ' ; ?>
            >Black Ice</li>
            <li><input type="checkbox" name="hazards[]" value="power outage"
            <?php if(isset($_POST['hazards']) && in_array('power outage', $hazards)) echo 'checked = "checked" ' ; ?>
            >Power Outage</li>
            <li><input type="checkbox" name="hazards[]" value="animal carcass"
            <?php if(isset($_POST['hazards']) && in_array('animal carcass', $hazards)) echo 'checked = "checked" ' ; ?>
            >Animal Carcass</li>
            <li><input type="checkbox" name="hazards[]" value="LAVA"
            <?php if(isset($_POST['hazards']) && in_array('LAVA', $hazards)) echo 'checked = "checked" ' ; ?>
            >LAVA!</li>
        </ul>
            <span><?php echo $hazardsErr; ?></span>

        <label>Response Desired</label>
        <ul>
            <li><input type="radio" name="response" value="email" <?php if(isset($_POST['response']) && $_POST['response'] == 'email') { echo 'checked = "checked" ' ; } ?> >Email</li>
            <li><input type="radio" name="response" value="phone call" <?php if(isset($_POST['response']) && $_POST['response'] == 'phone call') { echo 'checked = "checked" ' ; } ?> >Phone Call</li>
            <li><input type="radio" name="response" value="council meeting" <?php if(isset($_POST['response']) && $_POST['response'] == 'council meeting') { echo 'checked = "checked" ' ; } ?>>Council Meeting</li>
            <li><input type="radio" name="response" value="site inspection" <?php if(isset($_POST['response']) && $_POST['response'] == 'site inspection') { echo 'checked = "checked" ' ; } ?>>Site Inspection</li>
            <li><input type="radio" name="response" value="just fix it!" <?php if(isset($_POST['response']) && $_POST['response'] == 'just fix it!') { echo 'checked = "checked" ' ; } ?>>Just Fix It!</li>
        </ul>
        <span><?php echo $responseErr; ?></span>
        <label>Additional Comments</label>
            <textarea name="comments" cols="44" rows="6"><?php if (isset($_POST['comments'])) {
            echo htmlspecialchars($_POST['comments']);} ?></textarea>
            <span><?php echo $commentsErr; ?></span>
        <label>Privacy</label>
            <input type = "radio" name = "privacy" value="privacy" <?php if (isset($_POST['privacy']) && $_POST['privacy'] == 'privacy') echo 'checked = "checked" ';   ?>>
            <span class="privacy"><?php echo $privacyErr; ?></span><br>

<input type="submit" name="submit" value="Send It" >

<input type="button" onclick= "window.location.href = '<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'" value="Reset">
    </fieldset>
    </form>
</main>
<aside>
<img src="images/flood.jpg" class="aside" alt="flooded road">
<h3>Bonus Road Hazard: Flooding!</h3>
<p><em>Flooding can be sudden in some areas; never assume it's just a shallow puddle, or that your car can make it through!</em></p>
</aside>


<?php include('includes/footer.php'); ?>