<?php
session_start();
$title = "Админ панель";

include_once '../components/head.php';

include_once '../components/header.php';

    $db = require_once __DIR__ . '/../src/database/connect.php';


    $sql = "SELECT statments.*, users.*, status. * FROM statments JOIN users ON statments.user_id = users.id_user JOIN status ON statments.status_id = status.id_status ORDER BY statments.id DESC";
    $query_statement = mysqli_query($db, $sql);
    $statements = [];
    
    while ($row = mysqli_fetch_assoc($query_statement)) {
        $statements[] = $row;
    }
?>

    <div class="container mt-5">
        <h1>Добро пожаловать в административную панель </h1>
        <p>Выполните интересующие вас действия</p>

        <?php
        if (!empty($statements)) {
            ?>
        <table class="table mt-5">
            <thead>
            <tr>
                <th scope="col">ФИО пользователя</th>
                <th scope="col">Описание нарушения</th>
                <th scope="col">Гос. номер</th>
                <th scope="col">Статус</th>
                <th scope="col">Изменение статуса</th>
            </tr>
            </thead>
            <tbody>
            <?php

        } else {
            echo "Пусто...";
        }
            foreach ($statements as $statement) {
                ?>
                <tr>


                    <th scope="row"><?= $statement['FIO'] ?></th>
                    <td>
                        <?= $statement['desription']?>
                    </td>
                    <td> <?= $statement['gos_number']?></td>
                    <td><?= $statement['label']?></td>
                    <td>
                        <?php if ($statement['label'] == 'Новый') { ?>
                            <form method="POST" action="/src/actions/admin/statements/change_status.php">
                                <input type="hidden" name="statement_id" value="<?= $statement['id'] ?>">
                                <label>
                                    <select class="form-select" name="new_status">
                                        <option value="2">Подтвердить</option>
                                        <option value="3">Отклонить</option>
                                    </select>
                                </label>
                                <button class="form btn btn-outline-success" type="submit">Изменить статус</button>
                            </form>
                        <?php } else {
                            echo "...";
                        }

                        ?>
                    </td>
                </tr>

                <?php
            }
            ?>


            </tbody>
        </table>


    </div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

<?php
include_once '../components/footer.php';
?>