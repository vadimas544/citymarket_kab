<?php

error_reporting(0);

class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index(){

    }
    public function register()
    {
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Process form

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'phone' => trim($_POST['phone']),
                'name' => trim($_POST['name']),
                'surname' => trim($_POST['surname']),
                'patronymic' => trim($_POST['patronymic']),
                'birthday' => trim($_POST['birthday']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'phone_error' => '',
                'name_error' => '',
                'surname_error' => '',
                'patronymic_error' => '',
                'birthday_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            //Validate phone
            if(empty($data['phone'])){
                $data['phone_error'] = 'Будь-ласка введіть телефон!';
            }

            //Validate Name
            if(empty($data['name'])){
                $data['name_error'] = 'Будь-ласка введіть ім\'\я';
            }
            
            //Validate Surname
            if(empty($data['surname'])){
                $data['surname_error'] = 'Будь-ласка введіть прізвище!';
            }

            //Validate Password
            if(empty($data['password'])){
                $data['password_error'] = 'Будь-ласка введіть пароль!';
            }elseif (strlen($data['password']) < 8){
                $data['password_error'] = 'Пароль повинен бути більше 8 символів!';
            }

            //Validate confirm password
            if(empty($data['confirm_password'])){
                $data['confirm_password_error'] = 'Будь-ласка підтвердіть пароль!';
            } else{
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_error'] = 'Паролі не співпадають!';
                }
            }

            //Make sure errors are empty

            if(empty($data['phone_error']) && empty($data['name_error']) && empty($data['surname_error'])   && empty($data['password_error']) && empty($data['confirm_password_error'])){

                //Validated

                //Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                //Hash confirm password
                $data['confirm_password'] = password_hash($data['confirm_password'] , PASSWORD_DEFAULT);

                //Authentication by SMS

                //$code_client

                $_SESSION['data']=$data;

                if( $this->userModel->sendSms($data['phone']) ){


                    //$this->userModel->register($data, $code_client);
//                    flash('register_success', 'Ви успішно зареєструвались і можете увійти!');
//                    redirect('users/login');

                }


            }else{
                $this->view('users/register', $data);
            }

        }else{
            //Init data
            $data = [
                'phone' => '',
                'name' => '',
                'surname' => '',
                'patronymic' => '',
                'birthday' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'phone_error',
                'name_error' => '',
                'surname_error' => '',
                'patronymic_error' => '',
                'birthday_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            //Load view
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        //Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Process form

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'phone' => trim($_POST['phone']),
                'password' => trim($_POST['password']),
                'phone_error' => '',
                'password_error' => '',
            ];

            //Validate phone
            if (empty($data['phone'])) {
                $data['phone_error'] = 'Будь-ласка введіть номер телефону!';
            }

//            //Check for user phone
//            if($this->userModel->checkPhone($data['phone'])){
//                //User found
//            }else{
            /*                $data['phone_error'] = "Користувача з таким номером не знайдено. Необхідно пройти процедуру <a href='<?php echo URLROOT?>/users/login'>реєстрації</a>>!!!";*/
//            }

            //Validate Password
            if (empty($data['password'])) {
                $data['password_error'] = 'Будь-ласка введіть пароль!';
            }

            //Check that password is not empty
//            if($this->userModel->checkPassword($data['phone'])){
//                //Password is be
//            }else{
//                $data['password_error'] = 'Такого пользователя нет. Нужно пройти процедуру регистрации!';
//            }

            //Make sure errors are empty

            if (empty($data['phone_error']) && empty($data['password_error'])) {
                //Validated
                if ($code_client = $this->userModel->checkPhone($data['phone'])) {

                    //User found
                    $loggedInUser = $this->userModel->login($data['phone'], $data['password']);
//                    echo '<pre>';
//                    var_dump($loggedInUser);
//                    die();
                    if ($loggedInUser) {
                        //Create Session
                        $this->createUserSession($loggedInUser);
                        redirect('users/cabinet');
                    } else {
                        $data['password_error'] = 'Пароль невірний!';
                        $this->view('users/login', $data);
                    }
                } else{
                    $data['password_error'] = "Користувача з таким номером не знайдено. Необхідно пройти процедуру реєстрації!";
                    $this->view('users/login', $data);
                }

                //Check and set logged in user

//

//
//                } else {
//                    $data['password_error'] = 'Пароль невірний!';
//                    $this->view('users/login', $data);
//                }
//                    //Init data
//                    $data = [
//                        'phone' => '',
//                        'password' => '',
//                        'phone_error' => '',
//                        'password_error' => '',
//                    ];
//
//
//                    //Load view
//                    $this->view('users/login', $data);
//                }
//
//        }


            } else{
                $this->view('users/login', $data);
            }

        }else{
            //Init data
            $data = [
                       'phone' => '',
                        'password' => '',
                        'phone_error' => '',
                        'password_error' => '',
                    ];

            //Load view
            $this->view('users/login', $data);
        }
    }

    public function recovery(){

            //Load view
            $this->view('users/recovery');
    }

    public function sms(){

        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Process form

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'code' => trim($_POST['code']),
                'code_error' => '',
            ];

            //Validate code
            if(empty($data['code'])){
                $data['code_error'] = 'Введите пожалуйста код';
            }

            if(empty($data['code_error'])){



                if($this->userModel->checkSmsCode($data['code'])){
                    //echo 1;


                    $code_client = get_code_client();
                    //echo $code_client;

                    if($this->userModel->register($_SESSION['data'], $code_client)){
                        del_code_client();
                        flash('register_success', 'Ви успішно зареєструвались і можете увійти!');
                        redirect('users/login');
                    }
                }else{
                    $data['code_error'] = 'Невірний код!';
                    $this->view('users/sms', $data);
                }
            } else {
                $data['code_error'] = 'Введіть будь-ласка код!';
                $this->view('users/sms', $data);
            }

        }else {
            //Init data
            $data = [
                'code' => '',
                'code_error' => '',
            ];

            //Load view
            $this->view('users/sms', $data);
        }
    }



    public function createUserSession($user)
    {
        $_SESSION['code_client'] = $user;
//        echo $_SESSION['code_client'];
//        die();
//        $_SESSION['user_name'] = $user->name;
//        $_SESSION['user_phone'] = $user->phone;

        redirect('users/cabinet');

    }

    public function cabinet(){

        $code_client = $_SESSION['code_client'];
        //var_dump($code_client);
        $data = $this->userModel->cabinetInfo($code_client);
//        echo '<pre>';
//        var_dump($data);
        $this->view('users/cabinet', $data);
    }

    public function logout(){
        unset($_SESSION['code_client']);
//        unset($_SESSION['user_phone']);
//        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    public function isLoggedIn()
    {
        if(isset($_SESSION['code_client'])){
            return true;
        }else{
            return false;
        }
    }
}