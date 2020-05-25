<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Сторінка реєстрації користувача</h2>
                <p>Будь-ласка введіть ваші дані:</p>
                <form action="<?php echo URLROOT?>/users/register" method="post">
                    <div class="form-group">
                        <label for="phone">Телефон: <sup>*</sup></label>
                        <input type="text" id="phone" name="phone" class="form-control form-control-lg <?php echo (!empty($data['phone_error'])) ? 'is-invalid' : ''?>"
                               value="<?php echo $data['phone']; ?>">
                        <span class="invalid-feedback"><?php echo $data['phone_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Ім'я: <sup>*</sup></label>
                        <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''?>"
                               value="<?php echo $data['name']; ?>">
                        <span class="invalid-feedback"><?php echo $data['name_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="surname">Прізвище: <sup>*</sup></label>
                        <input type="text" name="surname" class="form-control form-control-lg <?php echo (!empty($data['surname_error'])) ? 'is-invalid' : ''?>"
                               value="<?php echo $data['surname']; ?>">
                        <span class="invalid-feedback"><?php echo $data['surname_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="patronymic">По-батькові: </label>
                        <input type="text" name="patronymic" class="form-control form-control-lg <?php echo (!empty($data['patronymic_error'])) ? 'is-invalid' : ''?>"
                               value="<?php echo $data['patronymic']; ?>">
                        <span class="invalid-feedback"><?php echo $data['patronymic_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Дата народження: </label>
                        <input type="date" name="birthday" class="form-control form-control-lg <?php echo (!empty($data['birthday_error'])) ? 'is-invalid' : ''?>"
                               value="<?php echo $data['birthday']; ?>">
                        <span class="invalid-feedback"><?php echo $data['birthday_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''?>"
                               value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
                    </div>
                    <div class="form-group group">
                        <label for="password">Пароль: <sup>*</sup></label>
                        <input type="password" name="password"  class="form-control form-control-lg password <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''?>"
                               value="<?php echo $data['password']; ?>">
                        <input type="checkbox" class="password-show">Показати пароль
                        <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
                    </div>
                    <div class="form-group group">
                        <label for="confirm password">Повторіть введений пароль: <sup>*</sup></label>
                        <input type="password" name="confirm_password" class="form-control form-control-lg password <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid' : ''?>"
                               value="<?php echo $data['confirm_password']; ?>">
                        <input type="checkbox" class="password-show">Показати пароль
                        <span class="invalid-feedback"><?php echo $data['confirm_password_error']; ?></span>
                    </div>

                    <div class="form-group group">
                        <input type="checkbox" name="rules"> Ви даєте згоду на обробку персональних даних і ознайомлені з <a href="#">правилами</a> програми лояльності.
                        <span class="invalid-feedback"><?php echo $data['rules_error']; ?></span>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Зареєструватися" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT;?>/users/login " class="btn btn-light btn-block">У вас уже є акаунт? <span style="color: cornflowerblue">Увійти</span></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>