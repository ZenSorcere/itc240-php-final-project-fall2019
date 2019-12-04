<?php
// We are going to declare an array
include('config.php');
include('includes/header.php'); 




?>

<main class="gallery">
<table>
    <?php foreach($people as $full_name => $image)  : ?>
    <tr>
        <td>
        <img src="images/<?php echo substr($image, 0, 9) ;  ?>" alt="<?php echo htmlspecialchars($full_name); ?> " >
        </td>
        <td>
        <?php echo str_replace('_', ' ', $full_name) ;   ?>
        </td>
        <td>
        <?php echo substr($image, 10, -10) ;  ?>
        </td>
       <td>
        <img src="images/<?php echo substr($image, -9) ;  ?>" alt="<?php echo htmlspecialchars($full_name); ?> " >
        </td>

    </tr>

<?php endforeach; ?>
</table>
</main>
<aside class="gallery">
<img src="images/wuher.jpg" class="aside" alt="Wuher, Mos Eisley Cantina bartender">
<h3>Do we serve their kind here?</h3>
<p><em>"No blasters! No blasters!"</em></p>
</aside>


<? include('includes/footer.php'); ?>