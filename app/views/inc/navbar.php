<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

<!--            <ul class="navbar-nav ml-auto">-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="--><?php //echo URLROOT; ?><!--/users/register">На головну <span class="sr-only">(current)</span></a>-->
<!--                </li>-->
<!--            </ul>-->

            <ul class="navbar-nav">
                <?php if(isset($_SESSION['code_client'])): ?>
                    <li class="nav-item">
                        <a class="nav-link text-right" href="<?php echo URLROOT; ?>/users/logout">Вийти <span class="sr-only">(current)</span></a>
                    </li>
                <?php else: ?>
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="--><?php //echo URLROOT; ?><!--/users/login">Увійти <span class="sr-only">(current)</span></a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="--><?php //echo URLROOT?><!--/users/register">Зареєструватися</a>-->
<!--                </li>-->
                <?php endif; ?>
            </ul>
    </div>
</nav>