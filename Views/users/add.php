<section class="mt-5">
    <h1 class="pb-3 border-bottom">Add user</h1>

    <form action="" class="row g-3" method="post">
        <input type="hidden" name="userId" value="<?php echo $userId; ?>">
        <div class="col-md-5">
            <label class="form-label" for="name">Name</label>
            <input class="form-control" type="text" placeholder="name" id="name" name="name">
        </div>
        <div class="col-md-5">
            <label class="form-label" for="surname">Surname</label>
            <input class="form-control" type="text" placeholder="surname" id="surname" name="surname">
        </div>
        <div class="col-md-5">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" placeholder="email" id="email" name="email">
        </div>
        <div class="col-md-5">
            <label class="form-label" for="password">Password</label>
            <input class="form-control" type="password" placeholder="*********" id="password" name="password">
        </div>
        <div class="col-md-4">
            <label class="form-label" for="phone">Phone</label>
            <input class="form-control" type="text" placeholder="phone" id="phone" name="phone">
        </div>
        <div class="col-md-2">
            <label class="form-label" for="office">Office</label>
            <input class="form-control" type="text" placeholder="office" id="office" name="office">
        </div>
        <div class="col-md-4">
            <label class="form-label" for="description">Description</label>
            <textarea class="form-control" type="text" rows="5" placeholder="description" id="description" name="description"></textarea>
        </div>
        <div class="form-check">
            <label class="form-check-label" for="isAdmin">Admin rights</label>
            <input class="form-check-input" type="checkbox" value="" id="isAdmin" name="isAdmin">
        </div>
        <button id="submitBtn" class="btn btn-primary col-2" type="submit">Add person</button>
    </form>
</section>
<script src="/add.js"></script>