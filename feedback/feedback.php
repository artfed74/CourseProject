 <?php
    require("../DB_Connect/db_connect.php");

    require_once   '../vendor/autoload.php';
    $settings = require_once __DIR__ . '/settings.php';
    require_once __DIR__ . '/functions.php';

    $error = '';
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];
        $attachments = [
            __DIR__ . '/files/test.pdf'
        ];
        $body = "<h1>Дорогой(ая) $name</h1> <h2>Ваше письмо было отправлено администратору сайта. Ожидайте ответа в ближайшее время:)</h2>";
        var_dump(send_mail($settings['mail_settings_prod'], [$email], 'Письмо с сайта', $body, $attachments));
        if ($name == '' || $email == '' || $comment == '') {
            $error = "Вы не заполнили все поля";
        } else {
            $date = date('Y-m-d H:i:s');
            $stmt = $mysql->prepare("INSERT INTO  `feedback`(name,email,comment,date) VALUES (?,?,?,?)");
            $stmt->bind_param("ssss", $name, $email, $comment, $date);
            $stmt->execute();
            $stmt->close();
        }
    }





    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="../styles/feedback.css">
     <title>Обратная связь</title>
 </head>

 <body>
     <div class="container">
         <h1 class="name_contacts" style="text-align: center;">Остались вопросы к нам?</h1>
         <div class="row">
             <div class="col-6">
                 <div class="contacts">
                     <h3 class="contacts_h">Наши контакты</h3>
                     <h3 class="contacts_h">Расположение музея</h3>
                     <p class="contacts_p">Магнитогорск ул. Грязнова д. 36</p>
                     <h3 class="contacts_h">Телефоны</h3>
                     <p class="contacts_p">8 (351) 268-85-94</p>
                     <p class="contacts_p">8 (800) 100-19-34</p>
                     <h3 class="contacts_h">Email</h3>
                     <p class="contacts_p">mgtu@magtu.ru</p>
                     <p class="contacts_p">hotl@magtu.ru</p>
                     <div class="contacts_img">
                         <a href="https://vk.com/magtu_mpk_professionalitet"><img src="../assets/free-icon-communication-15047452.png"></a>
                         <a href="https://vk.com/magtu_mpk_professionalitet"><img src="../assets/free-icon-telegram-15015947.png"></a>
                     </div>
                 </div>
             </div>
             <div class="col-5">
                 <div class="feedback_form">
                     <form action="#" method="POST" class="form_feedback">
                         <input type="text" placeholder="Имя" name="name">
                         <input type="email" placeholder="Почта" name="email">
                         <textarea name="comment" placeholder="Ваше сообщение"></textarea>
                         <span>Осталось 100 символов</span>
                         <input type="submit" value="Отправить">
                         <div id="successMessage" style="display: none;" class="alert alert-success" role="alert">Ваш вопрос отправлен</div>
                         <span style="color: red;"><?php echo $error ?></span>
                     </form>
                 </div>
             </div>
         </div>
     </div>
     </div>




     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     <script src="feedback.js"></script>
 </body>

 </html>