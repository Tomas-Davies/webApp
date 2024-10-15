<section class="mt-5">
    <h2>Users</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $name = $_SESSION["name"] ?? "Jane";
                $password = $_SESSION["password"] ?? "Doe";
            echo (
                "<tr>
                    <th scope=\"row\">1</th>
                    <td>$name</td>
                    <td>-</td>
                    <td>@mdo</td>
                </tr>"
            );
            ?>
        </tbody>
    </table>
</section>