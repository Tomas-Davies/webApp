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
            <form action="Dashboard" class="row g-3" method="post">
                <div class="col-12">
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" type="text" placeholder="name" id="name" name="name">
                </div>
                <div class="col-12">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" placeholder="password" id="password" name="password">
                </div>
                <button class="btn btn-primary" type="submit">Login</button>
            </form>
        </div>
    </div>
</body>