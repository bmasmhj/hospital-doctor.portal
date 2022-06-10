<div class="navbar-custom" style="left:0!important;">
            <ul class="list-unstyled topbar-menu float-start  mb-0">
                <li class="dropdown p-2 notification-list">
                    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <h2>Hospital</h2>
                    </a>
                </li>
            </ul>
            <ul class="list-unstyled topbar-menu float-end mb-0">
                 <?php require 'notification.php'?>   
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="account-user-avatar"> 
                            <img src="../Hospital/assets/images/uploads/doctors/default.jpg" alt="user-image" class="rounded-circle">
                        </span>
                        <span>
                            <span class="account-user-name"><?php echo $docname ?></span>
                            <span class="account-position"><?php echo $docspeciality ?></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                        <!-- item-->
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="Logout" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout me-1"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>

            </ul>   
        </div>
        