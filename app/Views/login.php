<?php
include ROOT."/app/views/layouts/head.php";
include ROOT."/app/views/layouts/header_admin.php";
 ?>

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 padding-right">
                    <?php if(isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--signup form-->
                        <h2>Вход в админпанель</h2>
                        <form action="#" method="post">
                            <input type="text" name="login" placeholder="Логин"/>
                            <input type="password" name="password" placeholder="Пароль"/>
                            <button type="submit" name="submit" class="btn btn-default">Войти</button>
                        </form>
                    </div><!--/sign up form-->
                    <br/>
                </div>
            </div>
        </div>
    </section><!--/form-->

<?php include (ROOT."/app/views/layouts/footer_admin.php"); ?>