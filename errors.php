<?php //errors page - the shortest page in the group of pages

// if there are errors, show them to me -- errors are in an array

if(count($errors) > 0) : ?>

<?php
// run  a foreach loop to identify the errors

foreach($errors as $error) : ?>

<p class="error"><?php echo $error; ?></p>



<?php endforeach ?>
<?php endif ?>





