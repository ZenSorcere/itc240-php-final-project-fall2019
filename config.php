<?php
    

    $nav['index.php'] = 'Home';
    $nav['about.php'] = 'About';
    $nav['daily.php'] = 'Daily';
    $nav['roadsdb.php'] = 'Database';
    $nav['form3.php'] = 'Contact';

    function makeLinks($nav) {
        $myReturn = '';
    foreach($nav as $key => $value) {
        if(THIS_PAGE == $key) {
            $myReturn .= '<li><a class="active" href=" ' .$key. ' "> ' .$value. '</a></li>';
        } else {
            $myReturn .= '<li><a href=" ' .$key. '"> ' .$value. '</a></li>';
        } // end of else
    } return $myReturn;  // end of foreach
    } // end of function


    /* server variable to call for self referential page title */
    /* bsename will tell you the name of the file, and the bit at the end removes
        the .php.  otherwise it shows you the file name */

     /* $title = basename($_SERVER['PHP_SELF'], '.php'); */


    /* creating a constant  and a switch case for each page*/

    define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

    switch(THIS_PAGE) {
        case 'index.php':
            $title = 'Broken Boulevards - Home page';
            $body = 'home';
            $header1 ='Broken Boulevards: Worst Roads in America';
            $header2 ='(Who cares about Infrastructure?)';
            break;
        case 'about.php':
            $title = 'About page';
            $body = 'about inner';
            $header1 ='There are Bad Roads, and WORST Roads';
            $header2 ='(So many awful places to drive!)';
            break;
        case 'daily.php':
            $title = 'Daily Hazard page';
            $header1 = 'Mike Presents: The Daily Road Hazard!';
            $header2 = '(Keep your eyes peeled!)';
            break;
        case 'roadsdb.php':
            $title = 'MySQL Roads Database page';
            $header1 ='MySQL Database: Most Dangerous Roads Database!';
            $header2 ='(Drive Safe!)';
            break;
        case 'roads-view.php':
                $title = 'MySQL Database - Details page';
                $header1 ='MySQL Database: Most Dangerous Roads Database!';
                $header2 ='(Drive Safe!)';
                break;    
        case 'form3.php':
            $title = 'Contact page';
            $header1 = 'Tell us about a Bad Road!';
            $header2 = '(Answer a few questions below!)';
            break;
        case 'thx.php';
            $title = 'Thank You page';
            $header1 ='Your information will be useful!';
            $header2 ='(To Someone. Somewhere. Hopefully...)';
            break;
        case 'contact.php';
            $title = 'Contact page';
            $header1 ='Broken Boulevards is not contactable!';
            $header2 = '(Easter Egg page!)';
            break;
    }

    
    
    ob_start();  //preventing header errors before reading whole page
    define('DEBUG','TRUE');
    // we want to see all errrors - change to FALSE later
    include('credentials.php'); 
    
    
    function myerror($myFile, $myLine, $errorMsg)
    {
    if(defined('DEBUG') && DEBUG)
    {
    echo"Error in file: <b>".$myFile."</b> on line: <b>".$myLine."</b><br />";
    echo"Error Message: <b>".$errorMsg."</b><br />";
    die();
    }else{
            echo "I'm sorry, we have encountered an error. ";
            die();
    }
    }
    


 ?>