<?php include './navbar.php'; ?>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="./dashboard.php"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span class="logo-name">EVSU APP</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <?php if (Auth::user()->user_type == 'admin') { ?>
                <li class="dropdown">
                    <a href="./admin.php" class="nav-link"><i data-feather="monitor"></i><span>Admin Panel</span></a>
                </li>
            <?php  } ?>
            <li class="dropdown">
                <a href="./dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Post Feed</span></a>
            </li>
            <?php if (Auth::user()->user_type == 'user') { ?>
                <li class="dropdown">
                    <a href="./posts.php" class="nav-link"><i data-feather="list"></i><span>Posts</span></a>
                </li>
            <?php  } ?>


        </ul>
    </aside>
</div>