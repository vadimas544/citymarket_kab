<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2>Аутентификация</h2>
            <p>На ваш номер телефона выслано смс с паролем. Пожалуйста введите его ниже:</p>
            <form action="<?php echo URLROOT?>/users/sms" method="post">
                <div class="form-group">
                    <label for="pass">Пароль: <sup>*</sup></label>
                    <input type="text" name="code" class="form-control form-control-lg  <?php echo (!empty($data['code_error'])) ? 'is-invalid' : ''?>"><br />
                    <span class="invalid-feedback"><?php echo $data['code_error']; ?></span><br />
                    <input type="submit" value="Войти" class="btn btn-success btn-block">
                </div>
            </form>
        </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>