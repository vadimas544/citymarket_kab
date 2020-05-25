<?php
/*
    Template Name: Client Registration Old
*/
get_header();

$is_error = false;
// Соединение, выбор базы данных
$dbconn = pg_connect("host=213.160.158.80 port=58685  dbname=dbmain user=web password=web123!@#")
or die('Could not connect: ' . pg_last_error());

session_start();


$data = $_POST;
if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($data['do_signup'])){

    $errors = array();
    if(htmlspecialchars(trim($data['card'])) == '' )
    {
        $errors[] = 'Введіть номер картки!';
    }
    if(htmlspecialchars(trim($data['username'])) == '' )
    {
        $errors[] = 'Введіть Імя!';
    }
    if(htmlspecialchars(trim($data['surname'])) == '' )
    {
        $errors[] = 'Введіть Прізвище!';
    }
    if(htmlspecialchars(trim($data['patronymic'])) == '' )
    {
        $errors[] = 'Введіть По Батькові!';
    }
    if(htmlspecialchars(trim($data['gender'])) == '' )
    {
        $errors[] = 'Введіть стать!';
    }
    if(htmlspecialchars(trim($data['phone'])) == '' )
    {
        $errors[] = 'Введіть номер телефону!';
    }
    $pos = strstr($data['phone'], '8', true);
    if($pos != '3'){
        $errors[] = 'Неправильний формат номера, потрібно 380*********!';
    }
    if(htmlspecialchars(trim($data['birthday'])) == '' )
    {
        $errors[] = 'Введіть дату народження!';
    }
    if(htmlspecialchars(trim($data['email'])) == '' )
    {
        $errors[] = 'Введіть email!';
    }
    if(htmlspecialchars(trim($data['password'])) == '' )
    {
        $errors[] = 'Введіть пароль!';
    }
    if(htmlspecialchars(trim($data['password_2'])) == '' )
    {
        $errors[] = 'Повторіть введення пароля!';
    }
    /*
    if(!preg_match("/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/", $data['email'])){
		$error[] = "Вкажіть коректний E-mail";
    }

    if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
		$error[] = "Вкажіть коректний E-mail";
    }
    */

    $phone = trim(pg_escape_string($data['phone']));
    $email = trim(pg_escape_string($data['email']));
    $username = trim(pg_escape_string($data['username']));
    $surname = trim(pg_escape_string($data['surname']));
    $patronymic = trim(pg_escape_string($data['patronymic']));
    $gender = $data['gender'];
    $date = trim(pg_escape_string($data['birthday']));
    //Проверяем, есть ли пользователь с таким номером карты
    $begin = '0001';
    $query ="SELECT code_client FROM pos.barcode_client WHERE barcode LIKE '".$begin . $data['card'] ."_'";

    $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
    $code_client = pg_fetch_array($result, null,  PGSQL_NUM);
    $cod = $code_client[0];

    if(pg_num_rows($result) == 0) {
        $errors[] = 'Користувача з такою картою не знайдено!';
    }else{
        $sql = "SELECT password FROM pos.client WHERE code_client = '".$cod."'";
        //echo $sql;
        $result = pg_query($sql) or die('Ошибка запроса: ' . pg_last_error());
        //$int = pg_affected_rows($result);
        //echo $int;
        $pass = pg_fetch_array($result, null, PGSQL_NUM);
        if(!empty($pass[0])){
            $errors[] = "Ця картка вже зареєстрована!";
        }
    }
    //Если пустой массив ошибок, то записываем данные в БД
    if(empty($errors)){

        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $query = "SELECT code_client FROM pos.client";
        $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
        $code_client_new = [];

        while ($line = pg_fetch_array($result, null, PGSQL_NUM)) {
            foreach ($line as $code) {
            }
            $code_client_new[] = $code;
        }


        $sql1 = "SELECT code_property FROM pos.client_property WHERE code_client = '".$cod."'";
        //echo $sql1;
        $res1 = pg_query($sql1) or die('Ошибка запроса: ' . pg_last_error());
        while ($prop = pg_fetch_array($res1, null, PGSQL_ASSOC)) {
            foreach ($prop as $code_prop) {
            }
            $property_code[] = $code_prop;
        }
        $two = 2;$three = 3; $four = 4;

        if(in_array($code, $code_client_new)){

            //Если клиент есть в таблице то ей просто добавляются поля пароль, телефон, почта
            $query = "UPDATE pos.client SET surname='$surname', name='$username', patronymic='$patronymic', date_birth='$date', password='$password'  WHERE code_client=$cod;";
            pg_query($dbconn, $query);
            if(in_array(2, $property_code) && in_array(3, $property_code) && in_array(4, $property_code)){

                $sql2 = "UPDATE pos.client_property SET value_property=$phone  WHERE code_client = $cod AND code_property = $two";
                $res2 = pg_query($sql2) or die('Ошибка запроса: ' . pg_last_error());
                $sql6 = "UPDATE pos.client_property SET value_property=$gender  WHERE code_client = $cod AND code_property = $three";
                $res6 = pg_query($sql6) or die('Ошибка запроса: ' . pg_last_error());

                $sql4 = "UPDATE pos.client_property SET value_property='$email'  WHERE code_client = $cod AND code_property = $four";
                $res4 = pg_query($sql4) or die('Ошибка запроса: ' . pg_last_error());
            }else{
                $sql3 = "INSERT INTO pos.client_property (code_client, code_property, value_property) values ('$cod', '2', '$phone')";
                $res3 = pg_query($sql3) or die('Ошибка запроса: ' . pg_last_error());
                $sql7 = "INSERT INTO pos.client_property (code_client, code_property, value_property) values ('$cod', '3', '$gender')";
                $res7 = pg_query($sql7) or die('Ошибка запроса: ' . pg_last_error());
                $sql5 = "INSERT INTO pos.client_property (code_client, code_property, value_property) values ('$cod', '4', '$email')";
                $res5 = pg_query($sql5) or die('Ошибка запроса: ' . pg_last_error());
            }


        }
        echo '<div class="overlay" id="overlay" style="display:none;"></div><div class="anim box red-echo" id="box"><a class="boxclose" id="boxclose"></a>Ви успішно зареєстровані!</div>';
        //echo '<a href="clientlogin.php">Перейти в особистий кабінет</a>';
    }
    else{
        echo '<div class="overlay" id="overlay" style="display:none;"></div><div class="anim box red-echo" id="box"><a class="boxclose" id="boxclose"></a>'.array_shift($errors).'</div>';

    }
}

?>
<tr><p class="reg-text">Реєстрація особистого кабінету</p></tr>
<form class="registration" method="POST" action="<?php the_permalink(); ?>">
    <table>
        <tr>
            <td><p>Номер картки</p></td>
            <td><input type="number" name="card" value="<?php echo @$data['card']; ?>"></td>
        </tr>
        <tr>
            <td><p>Ім'я</p></td>
            <td><input type="text" name="username" value="<?php echo @$data['username']; ?>"></td>
        </tr>
        <tr>
            <td><p>Прізвище</p></td>
            <td><input type="text" name="surname" value="<?php echo @$data['surname']; ?>"></td>
        </tr>
        <tr>
            <td><p>По батькові</p></td>
            <td><input type="text" name="patronymic" value="<?php echo @$data['patronymic']; ?>"></td>
        </tr>
        <tr>
            <td><p>Пол</p></td>
            <td>
                <input class="reg-field" type="radio" name="gender" value="1">
                <span>Чоловік</span>

                <input class="reg-field" type="radio" name="gender" value="2">
                <span>Жінка</span></td>
        </tr>

        <tr>
            <td><p>Номер телефону</p></td>
            <td><input type="text" id="phone" name="phone" value="<?php echo @$data['phone']; ?>"></td>
        </tr>
        <tr>
            <td><p>Дата народження</p></td>
            <td><input type="date" name="birthday" value="<?php echo @$data['birthday']; ?>"></td>
        </tr>
        <tr>
            <td><p>Email</p></td>
            <td><input type="email" name="email" value="<?php echo @$data['email']; ?>"></td>
        </tr>
        <tr>
            <td><p>Пароль</p></td>
            <td> <input type="password" name="password"></td>
        </tr>
        <tr>
            <td><p>Повторіть введення пароля</p></td>
            <td><input type="password" name="password_2"></td>
        </tr>
    </table>
    <div class="zgoda">
        <div>
            <div  data-validation="checked">
                <input  type="checkbox" name="personalDataAgreement" value="1">
                <span>Ви даєте згоду на обробку персональних даних</span>
            </div>
            <div  class="c-form__field" data-validation="checked">
                <input type="checkbox" name="loyaltyTermsAgreement" value="1">
                <span>
                                Ви ознайомлені з                                <a href="https://pchelkamarket.kiev.ua/rule-programs/" target="_blank">
                        Правилами програми лояльності                                </a>
                            </span>
            </div>
            <span data-error="checked">
                            <p>Згода з правилами та обробка даних - обов'язкова</p>
                        </span>
        </div>
    </div>
    <p>
        <button type="submit" name="do_signup">Зареєструватися</button>
    </p>

</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
    jQuery(function(jQuery){
        jQuery("#phone").mask("380999999999");
    });
</script>
<script>

    $('#boxclose').click(function(){
        $('#box').animate({'top':'-200px'},500,function(){
            $('#overlay').fadeOut('fast');
        });
    });
</script>
<script>
    setTimeout(function(){
        document.getElementById('box').style.display = 'none';
    }, 3000);
</script>
<?php get_footer(); ?>
