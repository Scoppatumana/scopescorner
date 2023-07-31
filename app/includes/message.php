<?php
    if(isset($_SESSION['message'])){
?>
    <div class="msg <?php echo $_SESSION['type'] ?>">
        <li>You're Logged in </li>
        
    </div>
<?php
    unset($_SESSION['message'], $_SESSION['type']);
    }

   
?>