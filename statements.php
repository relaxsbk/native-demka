<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /");
}

    $id = $_SESSION['user']['id'];


   $db = require_once 'src/database/connect.php';


$title = "Мои заявления";

include_once 'components/head.php';

require_once __DIR__ . '/src/database/connect.php';

include_once 'components/header.php';
?>

<div class="container mt-5">
    <h1>Добро пожаловать <?= $_SESSION['user']['FIO']?>!</h1>
    <p>Просмотрите свои заявления</p>

    <?php
    if (isset($_SESSION['success'])) {
        ?>
        <div class="mt-5 container alert alert-success">
            <?= $_SESSION['success']?>
        </div>
        <?php
        unset($_SESSION['success']);
    }
    ?>


    <?php
    $sql = "SELECT * FROM `status`";
    $query = mysqli_query($db, $sql);
    $tag = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $tag[] = $row;
    }

    $sql_state = "SELECT * FROM `statments` where `user_id`='$id' ORDER BY `id` DESC";
    $query_state = mysqli_query($db, $sql_state);
    $statements = array();
    while ($row = mysqli_fetch_assoc($query_state)) {
        $statements[] = $row;
    }

    if (empty($statements)) {
        echo "Упc... Похоже всё ещё пусто";
    }

    foreach ($statements as $statement) {
        $statusId = $statement['status_id'];
        $status = array_filter($tag, function ($status) use ($statusId) {
            return (int)$status['id_status'] === (int)$statusId;
        });
        $status = array_pop($status);
        ?>
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title">Дата создания:<br><?= $statement['created_at']?></h5>
                    <p class="card-text">Гос Номер машины:<br><?= $statement['gos_number']?> </p>
                    <p class="card-text">Описание нарушения:<br><?= $statement['desription']?></p>
                    <p class="card-text btn <?= $status['background']?>"><?= $status['label']?></p>
                </div>
            </div>
            <?php
        }
    ?>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<?php
    include_once 'components/footer.php';
?>