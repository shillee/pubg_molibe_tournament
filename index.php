<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
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
                            <input type="text" name="number" id="number" class="form-control" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" placeholder="Ваш номер телефона (888 888 8888)" aria-describedby="helpId">
                        </div>
                    <div class="form-group">
                        <input class="btn btn-primary" name="submit" type="submit" value="Отправить"><br>

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
                                echo("thank you for registration, we will contact you.");
                            } else {
                                echo("Email sending failed...");
                            }
                        }
                        ?>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>