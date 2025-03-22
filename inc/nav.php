<nav class="side-bar">
            <div class="user-p">
                <img src="img/user.png">
                <h4>@<?=$_SESSION['username']?></h4>
            </div>
            
            <?php
                
                if ($_SESSION['role'] == "employee") {
            ?>
            <!-- Navigation Bar -->
            <ul>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-desktop"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-bars-progress"></i>
                        <span>My Task</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-bell"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
            <?php 
                } else { 
            ?>
            <!-- Admin Nav Bar -->
            <ul id="navList">
                <li>
                    <a href="#">
                        <i class="fa-solid fa-desktop"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="active">
                    <a href="user.php">
                        <i class="fa-solid fa-users"></i>
                        <span>Manage Users</span>
                    </a>
                </li>
                <li>
                    <a href="create_task.php">
                        <i class="fa-solid fa-plus"></i>
                        <span>Create Task</span>
                    </a>
                </li>
                <li>
                    <a href="tasks.php">
                        <i class="fa-solid fa-tasks"></i>
                        <span>All Task</span>
                    </a>
                </li>
                <li>
                    <a href="notification.php">
                        <i class="fa-solid fa-bell"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
            <?php } ?>
        </nav>