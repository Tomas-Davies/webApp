<section id="root" class="mt-5">
    <h1 class="pb-3 border-bottom">Dashboard</h1>
    <h2>Recent users</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Email</th>
                <th scope="col">Logged</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $i = 1;
                while($user = $users->fetch_assoc()){
                    echo (
                        "<tr>
                            <th scope=\"row\">$i</th>
                            <td>{$user["name"]}</td>
                            <td>{$user["surname"]}</td>
                            <td>{$user["email"]}</td>
                            <td>{$user["log_time"]}</td>
                        </tr>"
                    );
                    $i++;
                }
            ?>
        </tbody>
    </table>
</section>

<script src="/react-app/my-app/src/App.js"></script>