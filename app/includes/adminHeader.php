<header>
        <div class="header-container">
            <div class="logo-container">
                <a href="../../index.php">
                    <h3 class="logo-text">
                        Scope's<span> Corner</span>
                    </h3>
                </a>


            </div>

            <i class="fa fa-bars menu-toggle menu-bar fa-2x" onClick="_open_menu();"></i>


            <ul class="nav">

            <?php
        if(isset($_SESSION['id'])){
        ?>
        <li class="dropdown-li">
        <a href="">
            <i class="fa fa-user-circle"></i> <?php echo $_SESSION['username']; ?> <i class="fa fa-chevron-down"></i>
        </a>
        <ul>
            <li><a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout"><i class="fa fa-sign-out"> </i>Logout</a></li>
        </ul>
    </li>
    <?php
    }
?>
                
            </ul>
        </div>
    </header>