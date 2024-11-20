<!doctype html>
<html lang="en">

<head>
    <title>Dashboard Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./bootstrap-01.css">
    <link rel="stylesheet" href="./bootstrap-icons.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100 bg-dark">
        <div class="mb-md-5 mt-md-5 p-5 card bg-body-secondary">
            <h1>Login</h1>
            <p>Please enter your login and password.</p>
            <?php 
                $message = $_SESSION["invalidLoginMessage"];
                echo "<span class=\"text-danger\">$message</span>";
                $_SESSION["invalidLoginMessage"] = "&nbsp";
            ?>
            <form action="" class="row g-3" method="post">
                <div class="col-12">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" placeholder="email" id="email" name="email" required>
                </div>
                <div class="col-12">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" placeholder="password" id="password" name="password" required>
                </div>
                <button class="btn btn-primary" type="submit">Login</button>
            </form>
        </div>
    </div>
</body>