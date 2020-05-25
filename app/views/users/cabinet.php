<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="text-left">
                <h4>Особисті дані</h4>
                <table class="table-cab">
                    <tr>
                        <td>Ім'я</td>
                        <td><?= $data['response']['client']['name'] ?></td>
                        <td>
                               <div class="edit">


                                <button type="button" class="btn edit-data" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" name="edit" id="<?php echo $data['code_client']; ?>">
                                    <img src="<?php echo URLROOT;?>/public/img/icon_edit.png" alt="edit">
                                </button>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Зміна імені</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" id="id" value="<?= $data['response']['client']['code_client']?>"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">Редагувати ім'я:</label>
                                                        <input type="text" name="name" id="name"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="surname" class="col-form-label">Редагувати прізвище:</label>
                                                        <input type="text" name="surname" id="surname"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="patronymic" class="col-form-label">Редагувати по-батькові:</label>
                                                        <input type="text" name="patronymic" id="patronymic"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="date_birth" class="col-form-label">Редагувати дату народження:</label>
                                                        <input type="text" name="date_birth" id="date_birth"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone" class="col-form-label">Редагувати телефон:</label>
                                                        <input type="text" name="phone" id="phone"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email" class="col-form-label">Редагувати e-mail:</label>
                                                        <input type="text" name="email" id="email"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary" value="Зберегти" name="save_data" id="save_data" />
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Прізвище</td>
                        <td><?= $data['response']['client']['surname'] ?></td>
<!--                    </tr>-->
<!--                    <tr >-->
<!--                        <td>Змінити прізвища</td>-->
<!--                        <td>-->
<!--                            <input type="text" id="surname" name="surname">-->
<!--                            <button id="change_surname" class="btn-md">Змінити</button>-->
<!--                        </td>-->
<!--                    </tr>-->
                    <tr>
                        <td>По-батькові</td>
                        <td><?= $data['response']['client']['patronymic'] ?></td>
                    </tr>
<!--                    <tr>-->
<!--                        <td>Стать</td>-->
<!--                           --><?php
////                            if(!empty($properties[2])){
////                                if($properties[2] == 1){
////                                    echo 'Мужской';
////                                }else{
////                                    echo 'Женский';
////                                }
////                            } else{
////                                echo '-';
////                            }
////                            ?>
<!--                        </td>-->
<!--                    </tr>-->
                    <tr>
                        <td>Дата народження</td>
                        <td><?= $data['response']['client']['date_birth'] ?></td>
                    </tr>
                    <tr>
                        <td>Телефон</td>
                        <td><?= $data['response']['client']['phone'] ?></td>
                    </tr>
<!--                    <tr>-->
<!--                        <td>Зміна номера телефону</td>-->
<!--                        <td>-->
<!--                            <input name='phone' id="phone" type='text' maxlength='20' size='20'>-->
<!--                            <button id="change_phone" class="btn-md">Змінити</button>-->
<!--                        </td>-->
<!--                    </tr>-->
                    <tr>
                        <td>E-mail</td>
                        <td><?= $data['response']['client']['email'] ?></td>
                    </tr>
                    <tr>
                        <td >
                            <div class="text-left">
                                <button type="button" class="btn btn-secondary btn-lg btn-block edit" name="edit" id="<?= $data['response']['client']['code_client'] ?>" data-toggle="modal" data-target="#exampleModal">
<!--                                   <img src="--><?php //////echo URLROOT;?><!--/public/img/icon_edit.png" alt="edit">-->
                                    Редагувати дані
                                </button>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Зміна персональних даних:</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" id="insert-form">
                                                    <div class="form-group">
                                                        <label for="name"  class="col-form-label">Ім'я:</label>
                                                        <input type="text" class="form-control" id="name"><br />
                                                        <label for="surname"  class="col-form-label">Прізвище:</label>
                                                        <input type="text" class="form-control" id="surname"><br />
                                                        <label for="patronymic"  class="col-form-label">По-батькові:</label>
                                                        <input type="text" class="form-control" id="patronymic"><br />
                                                        <label for="date_birth"  class="col-form-label">Дата народження:</label>
                                                        <input type="text" class="form-control" id="date_birth"><br />
                                                        <label for="phone"  class="col-form-label">Телефон:</label>
                                                        <input type="text" class="form-control" id="phone"><br />
                                                        <label for="email"  class="col-form-label">E-mail:</label>
                                                        <input type="text" class="form-control" id="email"><br />
                                                        <input type="submit" name="insert" id="insert" value="Змінити" class="btn btn-primary">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-6 mx-auto">
            <div class="text-center">
                <h4>Карта лояльності</h4>
                <div class="card-wrapper">
                    <div class="card-front">
                        <h4 class="card-logo">
                            City
                            Market
                        </h4>
                        <h4 class="card-text">Карта лояльності</h4>
                        <p id="card-number"><?= $data['response']['client']['barcode'][0]['barcode'] ?></p>
                        <h4 class="card-text-bottom">Карта лояльності</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto">
        </div>
        <div class="col-md-6 mx-auto">
            <div class="card-wrapper">
                <div class="card-front">
                    <h4 class="card-text">City Market</h4>
                    <div class="barcode">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
