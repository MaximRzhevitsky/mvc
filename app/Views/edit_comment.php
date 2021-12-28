<?php
include ROOT."/app/views/layouts/head.php";
include ROOT."/app/views/layouts/header_admin.php";?>

<section id="form"><!--form-->
    <div class="container">
        <div class="row">

            <div class="signup-form"><!--signup form-->
                <h2>Редактирование текста комментария</h2>

                <form action="" method="post">
                    <textarea name="text"><?php echo $comment['text']; ?></textarea>
                    <br/>
                    <br/>
                    <button type="submit" name="submit" class="btn btn-default">Сохранить</button>
                </form>
                <br/>
            </div>
        </div>
    </div>
</section><!--/form-->

<?php include ROOT."/app/views/layouts/footer.php";?>