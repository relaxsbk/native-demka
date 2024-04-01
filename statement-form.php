<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: /");
    }

    $title = "Оставить заявку";

    include_once 'components/head.php';

    include_once 'components/header.php';
?>
<!--Номер машины и описание нарушения-->


<div class="container mt-5">
    <h1> Оставить заявку</h1>
    <p>Оставьте свою заявку о нарушении</p>
</div>
<?php
if (isset($_SESSION['fields'])) {
    ?>
    <div class="mt-5 container alert alert-danger">
        Проверьте правильность введённых данных
    </div>
    <?php
    $fields = $_SESSION['fields'];
    unset($_SESSION['fields']);
}
?>
<div class="container d-flex justify-content-center align-items-center " style="height: 50vh;">

    <form action="/src/actions/statements/statement-add.php" method="post">
        <input name="id" type="hidden" class="form-control" id="car_number" value="<?= $_SESSION['user']['id']?>">
        <div class="mb-3">
            <label for="car_number"  class="form-label">Государственный номер машины</label>
            <input name="car_number" value="<?= $fields['car_number']['value'] ?? ''?>" type="text" class="form-control <?= $fields['car_number']['error'] ? 'is-invalid' : '' ?>" id="car_number" placeholder="С587ТС">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Какое нарушение совершил</label>
            <textarea class="form-control  <?= $fields['description']['error'] ? 'is-invalid' : '' ?>"  name="description" id="description" placeholder="Проехал на красный свет" ><?= $fields['description']['value'] ?? ''?></textarea>
        </div>

        <button type="submit" class="btn btn-success ">Отправить</button>
    </form>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<?php
include_once 'components/footer.php';
?>