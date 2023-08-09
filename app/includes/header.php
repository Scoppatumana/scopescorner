<header>
        <div class="header-container">
            <div class="logo-container">
                <a href="index.php">
                    <h3 class="logo-text">
                        Scope's<span> Corner</span>
                    </h3>
                </a>

                <ul class="social-handles">
                    <li> <a href=""><i class="fa fa-twitter fa-lg"></i></a></li>
                    <li> <a href=""><i class="fa fa-facebook fa-lg"></i></a></li>
                    <li> <a href=""><i class="fa fa-linkedin fa-lg"></i></a></li>
                    <li> <a href=""><i class="fa fa-whatsapp fa-lg"></i></a></li>
                    <li> <a href=""><i class="fa fa-phone fa-lg"></i></a></li>
                </ul>
            </div>

            <i class="fa fa-bars menu-toggle menu-bar fa-2x" onClick="_open_menu();"></i>


            <ul class="nav">
                <li> <a href="#">Home</a></li>
                <li> <a href="#">Posts</a></li>
                <li> <a href="#">About</a></li>
                <li> <a href="#">Services</a></li>
                 <?php
                    if(isset($_SESSION['id'])){
                ?>
                <li class="dropdown-li">
                    <a href="">
                        <i class="fa fa-user-circle"></i> <?php echo $_SESSION['username']; ?> <i class="fa fa-chevron-down"></i>
                    </a>
                    <ul>
                      <?php
                        if($_SESSION['admin']){
                      ?>
                        <li><a href=""> <i class="fa fa-dashboard"> </i> Dashboard</a></li>
                      <?php

                        }
                        ?>
                      <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout"><i class="fa fa-sign-out"> </i> Logout</a></li>
                      
                        
                        
                    </ul>
                </li>
                <?php
                    }else{
                ?>
                <li> <a href="<?php echo BASE_URL . "/register.php"; ?>"> <i class="fa fa-user-plus"></i> Sign Up</a></li>
                <li> <a href="<?php echo BASE_URL . "/login.php"; ?>"> <i class="fa fa-sign-in"></i> Login</a></li>
                <?php
                    }
                 ?>
            </ul>
        </div>
    </header>


    <!-- hamburger -->
    <div class="menu-bar-overall-div" onClick="_close_menu();">
        <div class="side-menu-bar">
          <ul class="side-bar-ul">
            <a href="index.php">
              <li class="side-bar-li"><i class="fa fa-dashboard"></i> Dashboard</li>
            </a>
            <a href="registration-form.php">
              <li class="side-bar-li"><i class="fa fa-sign-out"></i> Logout</li>
            </a>
            <a href="annualdues.php">
              <li class="side-bar-li">Entertainment</li>
            </a>
            <a href="ounjeleyin.htl">
              <li class="side-bar-li"> <i class="fa fa-car"></i> Car Deals</li>
            </a>
            <a href="feed-subscription.php">
              <li class="side-bar-li">Naija Politics</li>
            </a>
            <a href="">
              <li class="side-bar-li"><i class="fa fa-computer"></i> Programming</li>
            </a>
            <a href="newyearparty.php">
              <li class="side-bar-li"><i class="fa fa-running"></i> Sports</li>
            </a>
            <a href="../index.php">
              <li class="side-bar-li">Stories</li>
            </a>
          </ul>
        </div>
      </div>
    <!-- /hamburger -->
