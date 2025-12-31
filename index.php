<?php
session_start();
include_once "./includ/header.php";
$formErrors = $_SESSION['formErrors'] ?? [];

?>
<main>
    <div class="text-center mt-5  d-flex justify-content-center flex-column align-items-center">
        <h1>Input Tasks</h1>
        <form action="./controllar/all-save-task.php" class="mt-5 border border-success border-5 p-3 rounded w-50" method="post">
            <input name="title" class="w-100 mb-4 p-3 form-control" type="text" placeholder="Title">
            <span class="text-warning"><?= $formErrors['title_error'] ?? null ?></span>
            <input name="description" class="w-100 mb-4 p-3 form-control" type="text" placeholder="Description">
            <span class="text-warning"><?= $formErrors['description_error'] ?? null ?></span>
            <input name="date" class="w-100 mb-4 p-3 form-control" type="date">
            <button class="w-50 btn btn-success py-3" type="submit">Add Task</button>            
        </form>
    </div>
</main>

<?php
include_once "./includ/footer.php";
session_unset();
?>