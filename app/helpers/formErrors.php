<?php if(count($errors) > 0): ?>
    <div class="msg <?php echo $_SESSION['type'] ?>">
        <?php foreach($errors as $error):?>
        <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </div>
<?php endif;?>