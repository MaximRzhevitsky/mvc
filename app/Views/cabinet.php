<?php
include ROOT.'/app/views/layouts/head.php';
include ROOT.'/app/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <h1>Админ-панель</h1>
                <br/><br/>
                <h5>Все комментарии</h5>
                <br/>
                <!--таблица со всеми комментариями-->
                <table class="table table-bordered" id="table">
                    <thead>
                    <tr>
                        <th scope="col">Номер</th>
                        <th scope="col">Текст</th>
                        <th scope="col">Автор</th>
                        <th>Дата добавления</th>
                        <th>Картинка</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($commentsList as $commentItem): ?>
                        <tr>
                            <th   scope="row"><?php echo $commentItem['id']; ?></th>
                            <td><?php echo $commentItem['text']; ?></td>
                            <td><?php echo $commentItem['name']; ?></td>
                            <td><?php echo $commentItem['date']; ?></td>
                            <td><img src="/resources/images/<?php echo $commentItem['image']; ?>" alt="foto"></td>
                            <td><a href="edit_comment/<?php echo $commentItem['id']; ?>">Редактировать</a></td>
                            <td><a href="delete_comment/<?php echo $commentItem['id']; ?>">Удалить</a></td>
                            <td><?php if ($commentItem['status']==1) {?>Опубликовано
                                 <?php }else { ?><a href="publicate/<?php echo $commentItem['id'] ?>">Опубликовать</a> <?php }?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
    </section>
<?php include ROOT.'/app/views/layouts/footer_admin.php'; ?>