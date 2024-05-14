<?php
require("DB_Connect/db_connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Музей МПК</title>
    <style>
        .gradient-button {
            color: white;
            font-size: 18px;
            background-image: linear-gradient(to right, #334c8b, #00bfff);
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 160px;
            height: 50px;
            border-radius: 50%;
            margin: 10px;
            transition: 0.5s;
        }

        .gradient-button:hover {
            height: 60px;
            background-image: linear-gradient(to right, #283b6b, #00bfff);

        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img src="assets/logo.png" style="width:30px;height:30px"> <a class="navbar-brand" href="#">Музей МПК</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/achives.php">Награды</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/notable_alumni.php">Выдающиеся выпускники</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/teachers-veterans.php">Ветераны труда</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/veterans.php">Участники войны</a>
                    </li>
                </ul>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) { ?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../admin_panel/admin_feedback/admin_panel.php">Обратная связь</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin_panel/admin_achives/admin_panel.php">Управление наградами</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-danger" href="#" onclick="confirmLogout();">Выйти</a>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </nav>

    <div style=" margin: 0; padding: 20px; display: flex; gap: 200px; padding-top: 200px">

        <h3 style="font-size: 30px; width: 1000px; padding-left: 100px; padding-top: 120px"> В
            <span class="gradient-text4">2016 году</span> в рамках Многопрофильного колледжа был запущен проект по созданию Центра содействия российско-германскому деловому сотрудничеству <br>
            <span style="font-style: italic"> (Фонд Эберхарда Щека)</span>
        </h3>

        <div>
            <div id="content2016"></div>
            <h2 class="gradient-text4" style="padding-left: 15%; padding-top: 30px; font-weight: bolder; font-size: 30px">
                Выпуск 1986 года, группа №36</h2>
        </div>
    </div>


    <div>
        МНОГОПРОФИЛЬНЫЙ КОЛЛЕДЖ СЕГОДНЯ
    </div>






    <div style="padding-top: 200px; padding-bottom: 300px; background-color: #ffffff">
        <h1 style="text-align: center; padding-bottom: 50px">Директорами в разные годы были:</h1>
        <div id="container7" class="director-container">
            <br>
            <div class="year">
                <h3>1943–45</h3>
            </div>
            <div class="year">
                <h3>1945</h3>
            </div>
            <div class="year">
                <h3>1946</h3>
            </div>
            <div class="year">
                <h3>1947</h3>
            </div>
            <div class="year">
                <h3>1955–64</h3>
            </div>
            <div class="year">
                <h3>1965</h3>
            </div>
            <div class="year">
                <h3>1965–68</h3>
            </div>
            <div class="year">
                <h3>1968–83</h3>
            </div>
            <div class="year">
                <h3>1983–88</h3>
            </div>
            <div class="year">
                <h3>1988–90</h3>
            </div>
            <div class="year">
                <h3>1990</h3>
            </div>
        </div>

        <div class="director-description" style="height: 100px; overflow: hidden;">
            <br>
            <h1>
                <span class="gradient-text2" id="director" style="font-size: 50px;"></span>
            </h1>
        </div>
    </div>

    <div class="container">
        <div id="content5"></div>
        <div id="text">
            В <span class="gradient-text">1991</span> году колледж имел статус среднего специального учебного заведения
            повышенного уровня
            <br>
            В <span class="gradient-text1">1998</span> году был переименован в «Магнитогорский государственный
            профессионально-педагогический колледж»
        </div>
    </div>
    <div>
        <h1 style="text-align: center; padding-top: 300px; font-weight: bold; font-size: 50px">Список специальностей,
            которые были в то время:</h1>
        <div id="content6" style=" padding-top: 100px; padding-bottom: 100px">
            <div>
                <h3>Строительство и эксплуатация зданий и сооружений</h3>
            </div>
            <div>
                <h3>Технология деревообработки</h3>
            </div>
            <div>
                <h3>Монтаж, наладка и эксплуатация электрооборудования предприятий и гражданских зданий</h3>
            </div>
            <div>
                <h3>Труд</h3>
            </div>
            <div>
                <h3>Правоведение</h3>
            </div>
            <div>
                <h3>Экономика, бухгалтерский учет и контроль</h3>
            </div>
            <div>
                <h3>Менеджмент</h3>
            </div>
            <div>
                <h3>Банковское дело</h3>
            </div>
            <div>
                <h3>Страховое дело</h3>
            </div>
            <div>
                <h3>Маркетинг</h3>
            </div>
            <div>
                <h3>Делопроизводство и архивоведение</h3>
            </div>
            <div>
                <h3>Техническое обслуживание и ремонт автомобильного транспорта</h3>
            </div>
            <div>
                <h3>Вычислительные машины, комплексы, системы и сети</h3>
            </div>
            <div>
                <h3>Программное обеспечение вычислительной техники и автоматизированных систем</h3>
            </div>
            <div>
                <h3>Парикмахерское искусство, декоративная косметика</h3>
            </div>
            <div>
                <h3>Моделирование и конструирование одежды</h3>
            </div>
        </div>
    </div>


    <style>
        .container {
            /*background-color: #ffffff;*/
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px;
        }

        #text {
            padding-left: 100px;
            font-size: 34px;
            font-weight: bold;
        }

        #content5 {
            width: 1200px;
            height: 400px;
            margin-left: 70px;
            background-image: url("assets_main/проф-пед.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border-radius: 6px;
            box-shadow: 0 0 20px rgb(14, 16, 38);
            /* Добавил тень */

        }

        .gradient-text {
            background: radial-gradient(circle, #0099ff, #0077cc, #0055aa);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            /* Делаем текст невидимым, так как градиент будет отображаться как текст */
        }

        .gradient-text1 {
            background: radial-gradient(farthest-corner, #636dfe, #1346de);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            /* Делаем текст невидимым, так как градиент будет отображаться как текст */
        }

        .gradient-text2 {
            background: radial-gradient(circle, #ff8800, #ff3300);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            /* Делаем текст невидимым, так как градиент будет отображаться как текст */
        }

        .gradient-text4 {
            background: radial-gradient(circle, #ad051b, #c37575);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;

        }
    </style>


    <div style=" margin: 0; padding: 20px; display: flex; gap: 200px; padding-top: 200px">

        <h3 style="font-size: 30px; width: 1000px; padding-left: 100px; padding-top: 120px"> Количество преподавателей –
            <span class="gradient-text4"> 8</span> человек.
            <br>

            В 80-е годы контингент учащихся вырос до 1000 человек, с 1979 года была подготовка иностранных учащихся из стран
            <span class="gradient-text4">Азии, Африки, Латинской Америки</span>
        </h3>

        <div>
            <div id="content4"></div>
            <h2 class="gradient-text4" style="padding-left: 15%; padding-top: 30px; font-weight: bolder; font-size: 30px">
                Выпуск 1986 года, группа №36</h2>
        </div>
    </div>





    <div id="content3" style="padding-top: 200px; ">
        <div id="content33" style="display: flex; padding-bottom: 120px">
            <div id="contentcol"></div>

            <p style="color: #34313f; font-size: 28px; font-weight: bolder; width: 1000px; padding-top: 100px; padding-left: 120px ">
                Был открыт в 1943 году как техникум
                трудовых
                резервов. Первый набор – 150 человек по трем специальностям:

                <br>
                <br>
                <span class="gradient-text5"> • Промышленное и гражданское строительство</span>
                <br>
                <span class="gradient-text5"> • Производство стали </span>
                <br>
                <span class="gradient-text5"> • Доменное производство</span>
                <br>
                <br>

                В 1956 году был переименован в индустриально-педагогический техникум профтехобразования.
            </p>

        </div>

    </div>
    <style>
        #contentcol {
            width: 700px;
            height: 500px;
            margin-left: 70px;
            background-image: url("assets_main/колледж2.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border-radius: 6px;
            box-shadow: 0 0 20px rgb(14, 16, 38);

        }

        .gradient-text5 {
            background: radial-gradient(circle, #db2424, #ff5a13);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;

        }

        .gradient-text6 {
            background: radial-gradient(circle, #bf3232, #e04616);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;

        }
    </style>




    <div style=" margin: 0; padding: 20px; display: flex; gap: 100px; padding-top: 200px">

        <h3 style="font-size: 30px; width: 1000px; padding-left: 100px; padding-top: 120px">
            Уже к 1952 году заложен фундамент современного учебного комплекса в правобережье,
            а в 1955 году под сияющими белизной сводами нового здания МИТа начались занятия.
        </h3>
        <div id="content55"></div>


    </div>

    <style>
        #content55 {
            background-image: url("assets_main/Индустриальный\ колледж\ на\ правом\ берегу.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 400px;
            width: 600px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgb(38, 14, 17);
            margin-left: 120px;
        }


        #content55 h2 {
            color: #FFF;
            text-align: center;
            font-size: 24px;
            margin-top: 20px;
        }

        #content55 p {
            color: #FFF;
            text-align: center;
            font-size: 18px;
            margin-top: 10px;
        }
    </style>


    <div style="display: flex; margin-top: 420px">


        <div id="content1" style="cursor: pointer"></div>

        <div class="fade-in" style="width: 1200px; font-size: 28px; font-weight: bolder; padding-left: 220px; padding-top: 150px">
            Большой вклад в становление
            колледжа (тогда еще техникума) сделал <br><span class="gradient-text6">Николай Иванович Макаров </span> <br>
            18 июля 1950 года был назначен на
            должность директора Магнитогорского индустриального техникума и сразу же взялся за дело.
            <br> Благодаря нему техникум переехал в новое красивое здание.
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <section id="content" class="visible"></section>


    <script>
        window.onload = function() {
            window.scrollTo(0, document.body.scrollHeight);
        }
        const headerTabs = document.querySelectorAll("#hh header button");
        const museumButton = document.querySelector("#museumButton");
        const h1Title = document.querySelector("h1");

        for (let i = 0; i < headerTabs.length; i++) {
            headerTabs[i].addEventListener("click", function() {
                if (i === 0) {
                    museumButton.textContent = "Виртуальный музей";
                    h1Title.textContent = "Посетите виртуальный музей МПК";
                } else if (i === 1) {
                    museumButton.textContent = "Посмотрите все награды нашего колледжа";
                    h1Title.textContent = "Награды";
                } else if (i === 2) {
                    museumButton.textContent = "Подробнее о ветеранах труда";
                    h1Title.textContent = "Ветераны труда";
                } else if (i === 3) {
                    museumButton.textContent = "Подробнее о выдающихся выпускниках";
                    h1Title.textContent = "Выдающиеся выпускники";
                } else if (i === 4) {
                    museumButton.textContent = "Подробнее об участниках войны";
                    h1Title.textContent = "Участники войны";
                }
            });
        }


        const years = document.querySelectorAll('.year');
        const directorParagraph = document.getElementById('director');

        years.forEach((year) => {
            year.addEventListener('click', () => {
                const selectedYear = year.innerText;
                let director;
                switch (selectedYear) {
                    case '1943–45':
                        director = 'Лядский';
                        break;
                    case '1945':
                        director = 'Н.Г. Беляев';
                        break;
                    case '1946':
                        director = 'Д.В. Кузнецов';
                        break;
                    case '1947':
                        director = 'В.Ф. Цапин';
                        break;
                    case '1955–64':
                        director = 'В.К. Голубятников';
                        break;
                    case '1965':
                        director = 'В.А. Королев';
                        break;
                    case '1965–68':
                        director = 'А.И. Седов';
                        break;
                    case '1968–83':
                        director = 'Б.П. Голуб';
                        break;
                    case '1983–88':
                        director = 'С.П. Арефьев';
                        break;
                    case '1988–90':
                        director = 'А.А. Кравцов';
                        break;
                    case '1990':
                        director = 'В.И. Кондрух, Н. Резвакова';
                        break;
                    default:
                        director = '';
                }
                directorParagraph.innerText = director;
            });
        });
    </script>

</body>

</html>