<?php 

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?= $title ?></title>
<link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">

<link href="css/dailystyles.css" type="text/css" rel="stylesheet">

</head>

<body class="<?php $body ?>">


<header>
<div class="header-img">
    <h1><?php echo $header1; ?></h1>
    <h2><?php echo $header2; ?></h2>
    </div>


 </header>
<nav>
<ul>

<?php
echo makeLinks($nav);
    
?>
</ul>

</nav>
  
<div id="wrapper">