<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <h2 class="text-center">Авторизація</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-3">
            <?php
//            var_dump($_SESSION);
            flash('register_success');?>

<!--            .<p>Пожалуйста введите ваши данные</p>-->
            <form action="<?php echo URLROOT?>/users/login" method="post">
                <div class="form-group">
                    <label for="phone">Телефон: <sup>*</sup></label>
                    <input type="text" name="phone" id="phone" class="form-control form-control-lg <?php echo (!empty($data['phone_error'])) ? 'is-invalid' : ''?>"
                           value="<?php echo $data['phone']; ?>">
                    <span class="invalid-feedback"><?php echo $data['phone_error']; ?></span>
                </div>
                <div class="form-group group">
                    <label for="password">Пароль: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg password <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''?>"
                           value="<?php echo $data['password']; ?>">
                    <input type="checkbox" class="password-show">Показати пароль<br /><br />
                    <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
                    <span>Забули пароль? - </span><a href="<?php echo URLROOT?>/users/recovery">Відновлення паролю</a>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Увійти" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT;?>/users/register " class="btn btn-light btn-block">Немає облікового запису? <span style="color: cornflowerblue">Зареєструватися</span></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
