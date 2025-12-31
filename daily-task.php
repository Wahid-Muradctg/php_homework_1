<?php
include_once "./includ/header.php";
include_once "./databse/from-databse.php";
$quarry = "SELECT * FROM `tasks` ORDER BY status ASC, id DESC";
$result = mysqli_query($db, $quarry);
$tasks = mysqli_fetch_all($result, 1);

?>
<main>
    <div class="text-center mt-5  d-flex justify-content-center flex-column align-items-center">
        <h1>Your Daily Tasks</h1>
        <table class="w-75 mt-5 border border-success border-5 p-3 rounded table table-striped table-hover">
            <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
            <?php
            foreach ($tasks as $index=>$task) {
                ?>
                <tr>
                    <td><?= ++$index ?></td>
                    <td><?= $task['title'] ?></td>
                    <td><?= $task['description'] ?></td>
                    <td><?= $task['date'] ?></td>
                    <td><span class=" badge bg-<?= ($task['status'] == 1) ? 'success' : (($task['date']< date('Y-m-d')) ? 'danger':'warning') ?> p-2"><?= ($task['status'] == 1) ? 'completed' : (($task['date']< date('Y-m-d')) ? 'Expired':'Pending') ?></span></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</main>

<?php
include_once "./includ/footer.php"
    ?>