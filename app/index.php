<?php
include ROOT."/app/views/layouts/head.php";
include ROOT."/app/views/layouts/header.php";
 ?>
<!--MENU-->


</head>
<body>
<div id="fon"></div>
    <div class="container">
     <h4>Страница комментариев</h4>
        <br/>
        <br/>
        <p>Сортировать:</p>

        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="/sort/nameAsc"><button type="button" class="btn btn-secondary">От А до Я</button></a>
            <a href="/sort/nameDsc"><button type="button" class="btn btn-secondary">От Я до А</button></a>
            <a href="/sort/dateAsc"><button type="button" class="btn btn-secondary">Сначала свежие</button></a>
            <a href="/sort/dateDsc"><button type="button" class="btn btn-secondary">Сначала более ранние</button></a>
        </div>
    </div>
        <br/>
        <br/>

        <div class="container">
            <table class="table" id="table">
             <thead>
             <tr>
                 <th scope="col">Номер</th>
                 <th scope="col">Текст</th>
                 <th scope="col">Автор</th>
                 <th>Дата добавления</th>
                 <th>Картинка</th>
                 <th>Статус</th>
             </tr>
           </thead>
           <tbody>
           <?php foreach ($commentsList as $commentItem): ?>
               <tr>
                   <th scope="row"><?php echo $commentItem['id']; ?></th>
                   <td><?php echo $commentItem['text']; ?></td>
                   <td><?php echo $commentItem['name']; ?></td>
                   <td><?php echo $commentItem['date']; ?></td>
                   <td><img src="/resources/images/<?php echo $commentItem['image']; ?>" alt="foto"></td>
                   <td><?php if($commentItem['corrected']==1) echo 'Отредактирован'; ?></td>
               </tr>
           <?php endforeach; ?>
           <tr><td id="preview_image"></td></tr>
           </tbody>
       </table>
    </div>

<br/>
<br/>
        <!--форма для комментариев-->
        <div class="container">
            <div class="contact-form">
                <h2 class="title text-center">Оставьте свой комментарий</h2>
                <form id="contact-form" class="contact-form row" enctype="multipart/form-data" name="contact-form" method="post">
                    <div class="form-group col-md-12">
                        <textarea name="text" id="comment" required="required" class="form-control" rows="8" placeholder="Текст письма"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" name="name" id="name" class="form-control" required="required" placeholder="name"/>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" name="email" id="email" class="form-control" required="required" placeholder="Email"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="views">Добавьте картинку</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="9000000" />
                        <input type="file" id="image" name="userImage" value="Картинка">
                    </div>
                    </br>
                    <div id="error-message"></div>
                    <br/>
                    <div id="saccess"></div>
                    <br/>
                    <div class="form-group col-md-12">
                        <input type="button" id="preg-view" name="preg-wiew" class="btn btn-primary pull-right" value="Предварительный просмотр">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" id="sent_form" name="submit" class="btn btn-primary pull-right" value="Отправить">
                    </div>
                </form>
            </div>
        </div>
</body>
<?php include (ROOT."/app/views/layouts/footer.php"); ?>
