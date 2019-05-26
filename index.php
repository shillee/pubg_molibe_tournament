<?php
define('SITE_KEY', '6LcRkaUUAAAAAKE_FSU_YsRak9bE76PoabuPSmQZ');
define('SITE_KEY', '6LcRkaUUAAAAAPywwJxHN3VGm95NzDcDdx0WqK3L');
if($_POST){
    /*СОЗДАЕМ ФУНКЦИЮ КОТОРАЯ ДЕЛАЕТ ЗАПРОС НА GOOGLE СЕРВИС*/
    function getCaptcha($SecretKey) {
        $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}");
        $Return = json_decode($Response);
        return $Return;
    }

    /*ПРОИЗВОДИМ ЗАПРОС НА GOOGLE СЕРВИС И ЗАПИСЫВАЕМ ОТВЕТ*/
    $Return = getCaptcha($_POST['g-recaptcha-response']);
    /*ВЫВОДИМ НА ЭКРАН ПОЛУЧЕННЫЙ ОТВЕТ*/
    var_dump($Return);

    /*ЕСЛИ ЗАПРОС УДАЧНО ОТПРАВЛЕН И ЗНАЧЕНИЕ score БОЛЬШЕ 0,5 ВЫПОЛНЯЕМ КОД*/
    if($Return->success == true && $Return->score > 0.5){
        echo "Succes!";
    }
    else {
        echo "You are Robot";
    }
}
?>
<!DOCTYPE html>
<html lang="ru-RU">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index, follow">
    <title>PUBG TOUR - зарегестриваться</title>

    <meta name="description" content="Круто играешь в Pubg Mobile? Если это так, то скорее зарегестрируйся. Сдесь будут проходить жесточайшие турниры со ставками. И лишь самый сильный сможет победить." />
    <meta name="keywords" content="Сквады ,Игра пабг, Турнир, Pubg Tour, pubg, пабг, PlayerUnknown’s Battlegrounds, игровые ставки, соревнования, денежные ставки, пабг регистрация, плэйер анкнаунс баттле граунд">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="bg-container">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <div class="content-form">
                <form method="POST" action="index.php">
                    <h2 class="text-center">Форма регистрации для турнира по PUBG</h2>
                    <div class="form-group">
                        <label for="">Имя</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Ваше имя (en)" pattern="[A-Za-z]{4,12}" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Ваша электронная почта" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">Телефона</label>
                        <div class="user_phone">
  		                <input type="tel" required placeholder="+38 (___) ___-__-__" id="user_phone" class="user-phone" title="Формат: +38 (096) 999 99 99"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="g-recaptcha-response" id="g-recaptcha-response">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary btn_submit" name="submit" type="submit" value="Отправить" disabled><br>

                        <?php
                        if(isset($_POST['submit'])){
                            $to_email = "info@pubg-tour.zzz.com.ua";
                            $subject = "Form registration for PUBG";
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $number = $_POST['number'];
                            $messeng = "Имя: " . $name . "\n" . "Телефон: " . $number . "\n" . "Email: " . $email;
                            $headers = "From: info@pubg-tour.zzz.com.ua";
                            if ( mail($to_email, $subject, $messeng, $headers)) {
                                echo("Спасибо за регистрацию, мы скоро с вами свяжемся.");
                            } else {
                                echo("Ошибка при отправке. Попробуйте еще раз.");
                            }
                        }
                        ?>

                    </div>
                </form>
            </div>

            <div class="container-social pt-5">
                <div class="row">
                    <div class="col">
                        <a class="asocial facebook" href="#"><i class="link-social fab fa-facebook-square"></i></a>
                    </div>
                    <div class="col">
                        <a class="asocial instagram" href="https://www.instagram.com/pubg_mobile_tournament_ukraine/"><i class="link-social fab fa-instagram"></i></a>
                    </div>
                    <div class="col">
                        <a class="asocial twitter" href="#"><i class="link-social fab fa-twitter-square"></i></a>
                    </div>
                </div>
            </div>
            <div class="copy text-center pt-3">
                <p>Copyright © tour-pubg 2019 Все права защищены</p>
            </div>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY ?>"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=reCAPTCHA_site_key"></script>
  <script>
  grecaptcha.ready(function() {
      grecaptcha.execute('<?php echo SITE_KEY ?>', {action: 'homepage'}).then(function(token) {
        console.log(token);
        document.GetElementById('g-recaptcha-response').value = token
      });
  });
  </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>