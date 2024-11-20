<!doctype html>
<html lang="en">

<head>
    <title>Simple Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/bootstrap-01.css">
    <link rel="stylesheet" href="/bootstrap-icons.css">
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
                <a class="nav-link px-3" href="/logout">logout</a>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="/dashboard/show" class="nav-link<?php if ($router["controller"] == "dashboard") {
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
                            <a href="/items/show" class="nav-link <?php if ($router["controller"] == "items") {
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
                            <a href="/others/show" class="nav-link <?php if ($router["controller"] == "others") {
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
                            <a href="/users/show" class="nav-link <?php if ($router["controller"] == "users") {
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
                    <?php 
                $userId = $_SESSION["loggedUserId"];
                $query = $mysqli->query("SELECT * FROM users WHERE id = $userId");
                $userLog = $query->fetch_assoc();
                $name = "{$userLog["name"]} {$userLog["surname"]}";
            ?>
            <div class="mt-5 ms-3 d-flex align-items-center">
                <span>Welcome: <?php echo $name;?></span>
            </div>
            
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 pb-3">