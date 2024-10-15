<?php 
    session_start();
    $page = $_GET["page"] ?? "Dashboard";
?>

<!doctype html>
<html lang="en">

<head>
    <title>Simple Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./bootstrap-01.css">
    <link rel="stylesheet" href="./bootstrap-icons.css">
</head>

<style>
    /* some hacks for responsive sidebar */
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 100;
        padding: 48px 0 0;
        /* height of navbar */
    }

    .sidebar-sticky {
        height: calc(100vh - 48px);
        overflow-x: hidden;
        overflow-y: auto;
    }
</style>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <button class="navbar-toggler d-md-none collapsed m-2 b-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">simple administration</a>

        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="logout.php">logout</a>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="?page=Dashboard" class="nav-link<?php if ($page == "Dashboard") {
                                                                            echo " active";
                                                                        } else {
                                                                            echo " link-dark";
                                                                        } ?>" aria-current="page">
                                <span class="icon">
                                    <i class="bi bi-easel"></i>
                                </span>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="?page=Items" class="nav-link <?php if ($page == "Items") {
                                                                        echo " active";
                                                                    } else {
                                                                        echo " link-dark";
                                                                    } ?>">
                                <span class="icon">
                                    <i class="bi bi-card-list"></i>
                                </span>
                                Items
                            </a>
                        </li>
                        <li>
                            <a href="?page=Others" class="nav-link <?php if ($page == "Others") {
                                                                        echo " active";
                                                                    } else {
                                                                        echo " link-dark";
                                                                    } ?>">
                                <span class="icon">
                                    <i class="bi bi-box"></i>
                                </span>
                                Others
                            </a>
                        </li>
                        <li>
                            <a href="?page=Users" class="nav-link <?php if ($page == "Users") {
                                                                        echo " active";
                                                                    } else {
                                                                        echo " link-dark";
                                                                    } ?>">
                                <span class="icon">
                                    <i class="bi bi-person-circle"></i>
                                </span>
                                Users
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 pb-3">
                <?php
                    if ($page == "Dashboard") {
                        include "dashboard.php";
                    } elseif ($page == "Users") {
                        include "users.php";
                    } elseif ($page == "Items") {
                        include "items.php";
                    } elseif ($page == "Others") {
                        include "others.php";
                    } else {
                        include "error.php";
                    }
                ?>
            </main>
        </div>
    </div>
</body>

</html>