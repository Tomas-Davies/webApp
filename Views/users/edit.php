<section class="mt-5">
    <h1 class="pb-3 border-bottom">Edit</h1>
    <form action="" class="row g-3" method="post">
        <input type="hidden" name="userId" value="<?php echo $id; ?>">
        <div class="col-12">
            <label class="form-label" for="name">Name</label>
            <input class="form-control" type="text" value="<?php echo $user["name"]; ?>" id="name" name="name" required>
        </div>
        <div class="col-12">
            <label class="form-label" for="surname">Surname</label>
            <input class="form-control" type="text" value="<?php echo $user["surname"]; ?>" id="surname" name="surname" required>
        </div>
        <div class="col-12">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" value="<?php echo $user["email"]; ?>" id="email" name="email" required>
        </div>
        <div class="col-12">
            <label class="form-label" for="phone">Phone</label>
            <input class="form-control" type="text" value="<?php echo $user["phone"]; ?>" id="phone" name="phone" required>
        </div>
        <div class="col-12">
            <label class="form-label" for="office">Office</label>
            <input class="form-control" type="text" value="<?php echo $user["office"]; ?>" id="office" name="office">
        </div>
        <div class="col-12">
            <label class="form-label" for="description">Description</label>
            <input class="form-control" type="text" value="<?php echo $user["description"]; ?>" id="description" name="description">
        </div>
        <?php if($adminStatus){
            echo("
            <div class=\"form-check\">
                <label class=\"form-check-label\" for=\"isAdmin\">Admin rights</label>
                <input class=\"form-check-input\" type=\"checkbox\" value=\"1\" id=\"isAdmin\" name=\"isAdmin\""); if($user["admin_rights"] == 1) echo "checked"; echo(">
            </div>
            ");
        }
        ?>
        
        <button class="btn btn-primary col-2" type="submit">Save</button>
    </form>
</section>