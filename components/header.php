<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-info-subtle">
        <div class="container">
            <a class="navbar-brand fst-italic" href="/statements.php">Нарушителям.нет</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
            if (isset($_SESSION['user'])) {
                ?>
                <div style="white-space: nowrap" class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link  <?php if ($_SERVER['REQUEST_URI'] === '/statements.php') {
                                ?> active <?php
                            } ?>" aria-current="page" href="/statements.php">Мои заявления</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?php if ($_SERVER['REQUEST_URI'] === '/statement-form.php') {
                                ?> active <?php
                            } ?>" href="/statement-form.php">Создать заявление</a>
                        </li>
                        <?php
                        if ($_SESSION['user']['role'] === 'admin'){
                            ?>
                            <li class="nav-item">
                                <a class="nav-link  <?php if ($_SERVER['REQUEST_URI'] === '/admin/') {
                                    ?> active <?php
                                } ?>" href="/admin">Панель администратора</a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <form class="form-inline" action="/src/actions/user/logout.php">
                        <button class="btn btn-outline-danger">Выйти</button>
                    </form>
                </div>
                <?php
            }
            ?>
        </div>
    </nav>
</header>
