
<div class="alert alert-success position-fixed w-100" role="alert">User added succesfully!</div>

<section class="mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="pb-3 border-bottom">Users</h1>
        <?php
            $adminStatus = $_SESSION["adminStatus"];
            if ($adminStatus) {
                echo "<a href=\"add\" class=\"mb-3 btn btn-primary\">Add user</a>";
            }
        ?>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Office</th>
                <th scope="col">Description</th>
                <th scope="col">isAdmin</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                while ($user = $users->fetch_assoc()) {
                    echo (
                        "<tr>
                                <th scope=\"row\">$i</th>
                                <td>{$user["name"]}</td>
                                <td>{$user["surname"]}</td>
                                <td>{$user["email"]}</td>
                                <td>{$user["phone"]}</td>
                                <td>{$user["office"]}</td>
                                <td>{$user["description"]}</td>
                                <td>{$user["admin_rights"]}</td>");
                    if ($adminStatus || $user["id"] == $loggedUserId) {
                        echo ("
                                <td>
                                    <a href=\"edit/{$user["id"]}\" class=\"icon-link\">
                                        <i class=\"bi bi-pencil-fill me-3\"></i>
                                    </a>
                                </td>
                            ");
                    }
                    if($adminStatus && $user["id"] != $loggedUserId){
                        echo("
                                <td>
                                    <a data-action=\"{$user["id"]}|{$user["email"]}\" class=\"icon-link button--delete\">
                                        <i class=\"bi bi-trash-fill\"></i>
                                    </a>
                                </td>
                            ");
                    }
                    echo "</tr>";
                    $i++;
                }
            ?>
        </tbody>
    </table>
    <dialog id="dialog" class="">
        <p class="dialog__text">Do you really want to delete this user?</br>This action cannot be undone.</p>
        <button id="dialog__confirm-btn" class="btn btn-outline-danger" onclick="">yes</button>
        <button class="btn btn-primary" onclick="closeDeleteDialog()">no</buton>
    </dialog>
</section>
<script src="/userDeleteDialog.js"></script>