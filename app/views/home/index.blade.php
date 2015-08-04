@extends('home.layout')

@section('title') «Совет Консалтинг» oрганизация и сопровождение бизнеса в турции @stop

@section('content')

<section id="slider" class='dark'>
            <div class="container text-center">
                <div class="row">
                    <p class="title">«Sovet Consulting»</p>
                    <h1>Организация и сопровождение<br> бизнеса в турции</h1>
                </div>
                <div class="row  block-btn">
                    <a href="/uslugi/investicii-v-turcii" class="btn btn-head">Инвестиции</a>
                    <a href="http://sovet.com.tr" class="btn btn-head">Производство</a>
                </div>
            </div>
        </section>
        <section id="we-service" class="light">
            <div class="container">
                <h2>Мы оказываем<br> широкий спектр услуг</h2>
                <hr class="h2-line">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12 col-block">
                        <div class="block block-hover block-1">
                            <div class="title txt-big">
                                <p>Таможня</p>
                            </div>
                            <div class="description">
                                <p>
                                    Услуги брокера<br>
                                    Таможенные консалтинг<br>
                                    Временное хранение товаров
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6  col-xs-12 col-block">
                        <div class="block block-hover block-2">
                            <div class="title txt-big">
                                <p>Маркетинг</p>
                            </div>
                            <div class="description">
                                <p>
                                    Маркетинговые исследования<br>
                                    Брендинг<br>
                                    Маркетинговое планирование
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6  col-xs-12 col-block">
                        <div class="block block-hover block-3">
                            <div class="title txt-big">
                                <p>Юридические услуги</p>
                            </div>
                            <div class="description">
                                <p>
                                    Нотариус<br>
                                    Юридический консалтинг<br>
                                    Сопровождение бизнеса<br>
                                    Регистрация компаний<br>
                                    Юридические услуги ВЭД<br>
                                    Защита прав собственности
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 col-block">
                        <div class="block block-hover block-4">
                            <div class="title txt-big">
                                <p>Персонал</p>
                            </div>
                            <div class="description">
                                <p>
                                    Аттестация сотрудников<br>
                                    Рекрутинг/подбор кадров<br>
                                    Обучение<br>
                                    Разрешение на работу<br>
                                    Структуризация
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 col-block">
                        <div class="block block-hover block-5">
                            <div class="title txt-big">
                                <p>Бухгалтерия</p>
                            </div>
                            <div class="description">
                                <p>
                                    Налоговый учет<br>
                                    Бухгалтерские услуги<br>
                                    Налоговый консалтинг<br>
                                    Оформление документации
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 col-block">
                        <div class="block block-hover block-6">
                            <div class="title txt-big">
                                <p>Реклама и PR</p>
                            </div>
                            <div class="description">
                                <p>
                                    IT сопровождение<br>
                                    Разработка сайтов<br>
                                    Продвижение сайтов<br>
                                    Реклама в Интернете<br>
                                    Разработка фирменного стиля<br>
                                    Медиа
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row block-btn text-center">
                    <a href="#footer" class="btn btn-form" onclickno="openForm(this);">Задать вопрос</a>
                    <a href="/uslugi" class="btn btn-links">Все услуги</a>
                </div>
            </div>
        </section>

        <section id="we-need-you" class="dark">
            <div class="container text-center">
                <h2>Мы нужны вам,</h2>
                <p class="title">если вы хотите</p>
                <div class="txt">
                    <p>А тут идет какой-то длинный текст</p>
                </div>
                <div class="txt-center block-btn">
                    <a href="#" class="btn btn-form">Оставить заявку</a>
                </div>
            </div>
        </section>

        <section id="we-need" class="light">
            <div class="container">
                <h2>Мы знаем как</h2>
                <hr class="h2-line">
                <div class="row text-center">
                    <div class="col-sm-6 col-xs-12">
                        <div class="block block-hover block-right">
                            <div class="title txt-big">
                                <p class="col-xs-8">инвестировать</p>
                                <div class="img-circle col-xs-4">
                                    <img src="/img/icon/4-invest-ico.png">
                                </div>
                            </div>
                            <div class="description">
                                <p class="col-xs-8">
                                Мы можем подобрать для вас прибыльный проект для инвестиций с выдачей паспорта <b>инвестора</b>
                                </p>
                                <div class="img-circle col-xs-4">
                                    <img src="/img/icon/4-invest-ico-hover.png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="block block-hover block-left">
                            <div class="title txt-big">
                                <div class="img-circle col-xs-4">
                                    <img src="/img/icon/4-baybusinest-ico.png" >
                                </div>
                                <p class="col-xs-8">открыть или купить бизнес</p>
                            </div>
                            <div class="description">
                                <div class="img-circle col-xs-4">
                                    <img src="/img/icon/4-baybusinest-ico-hover.png">
                                </div>
                                <p class="col-xs-8">
                                Мы можем помочь вам завести собственный бизнес в рамках особых условий Турецкой экономики
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xs-12">
                        <div class="block block-hover block-right">
                            <div class="title txt-big">
                                <p class="col-xs-8">развить существующий бизнес</p>
                                <div class="img-circle col-xs-4">
                                    <img src="/img/icon/4-openbusines-ico.png" >
                                </div>
                            </div>
                            <div class="description">
                                <p class="col-xs-8">
                                Если у вас уже есть бизнес в Турции, мы готовы предложить свои услуги для его развития
                                </p>
                                <div class="img-circle col-xs-4">
                                    <img src="/img/icon/4-openbusines-ico-hover.png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="block block-hover block-left">
                            <div class="title txt-big">
                                <div class="img-circle col-xs-4">
                                    <img src="/img/icon/4-expand-ico.png" >
                                </div>
                                <p class="col-xs-8">расширить рынки сбыта</p>
                            </div>
                            <div class="description">
                                <div class="img-circle col-xs-4">
                                    <img src="/img/icon/4-expand-ico-hover.png">
                                </div>
                                <p class="col-xs-8">
                                Если вас интересуют расширения рынков, мы поможем внедрится со своим товаром/услугой на рынок Турции
                                </p>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="row block-btn text-center">
                    <a href="#footer" class="btn btn-form">Заказать звонок</a>
                    <!-- <a class="btn btn-form">Оставить заявку</a> -->
                    <!-- <a class="btn btn-links">Подробнее</a> -->
                </div>
            </div>
        </section>
        <section id="we-why" class="dark">
            <div class="container">
                <h2>Почему выбирают нас?</h2>
                <p class="text-center title-h2">Партнеры и заказчики доверяют нам</p>
                <div class="row block-square">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="block block-hover">
                            <div class="title">
                                <p class="txt-big">15-ЛЕТНИЙ<br> ОПЫТ РАБОТЫ</p>
                            </div>
                            <div class="description">
                                <p>
                                    Знание национальных особенностей турецкой деловой среды
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="block block-hover">
                            <div class="title">
                                <p class="txt-big" >ПОЛНЫЙ <br>СПЕКТР УСЛУГ</p>
                            </div>
                            <div class="description">
                                <p>
                                    Решение любых финансовых, юридических и деловых вопросов
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="block block-hover">
                            <div class="title">
                                <p class="txt-big">ИНДИВИДУАЛЬНЫЙ <br>ПОДХОД</p>
                            </div>
                            <div class="description">
                                <p>
                                    Глубоко вникаем в специфику бизнеса клиента
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="block block-hover">
                            <div class="title">
                                <p class="txt-big">ОБШИРНЫЕ <br>ДЕЛОВЫЕ СВЯЗИ<br></p>
                            </div>
                            <div class="description desc-smile">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section id="description">
            <div class="container">

                <div class="row block-text">
                    <div class="col-sm-6 col-xs-12">
                        <p>
<b>Консалтинговая компания "СОВЕТ" гарантирует</b> комплексное решение задач: от регистрации компании и разработки маркетинговой стратегии до конечной реализации вашего продукта/услуги.
                        </p>
                        <p>
Высокое качество нашей работы обеспечивается глубокими знаниями специфики <b>каждого сегмента рынка</b>
                        </p>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <p>
Мы обеспечиваем доступ в прибыльные сферы турецкой экономики, комфортные условия существования вашего бизнеса и гарантии юридической чистоты.
                        </p>
                    <p><b>Мы бережно относимся к своей репутации, поэтому можем это гарантировать.</b></p>
                    </div>
                </div>
<!--                <div class="row block-text">
                    <div class="col-sm-4 col-xs-12">
                        <p>
                            Консалтинговая компания "СОВЕТ" гарантирует <b>комплексное решение задач в максимально сжатый срок:</b> от регистрации компании и разработки маркетинговой стратегии компании до подбора эффективных ключевых сотрудников
                        </p>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <p>
                            Высокое качество нашей работы обеспечивается глубокими знаниями специфики <b>каждого сегмента рынка</b>
                        </p>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <p>
                            У нас много успешных проектов. <br>
Успешным проектом мы называем только тот проект, после которого клиент <b>доверил нам еще более сложную задачу и рекомендовал нас своим друзьям</b>
                        </p>
                    </div>
                </div> -->
            </div>
        </section>

        <section id="unique-offer" class="dark">
            <div class="container">
                <h2>Уникальное предложение</h2>
                <hr class="h2-line">
                <div class="row block-main">
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <h3 class="text-center">«Завод под ключ»</h3>
                        <div>
<!--
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner" role="listbox">
    <div class="item active">
        <div class="col-xs-6">
            <img src="img/slider/test.jpg" alt="...">
        </div>
        <div class="col-xs-6">
            <p>
 Следствие: бесконечно малая величина осмысленно нейтрализует график функции многих переменных. Аффинное преобразование не критично. Используя таблицу интегралов элементарных функций, получим: асимптота вырождена. Комплексное число, следовательно, уравновешивает комплексный двойной интеграл. Максимум охватывает линейно зависимый интеграл от функции, обращающейся в бесконечность вдоль линии, что неудивительно. Аксиома соответствует натуральный логарифм.
            </p>
        </div>

    </div>
    <div class="item">
        <div class="col-xs-6">
            <img src="img/slider/test1.jpg" alt="...">
        </div>
        <div class="col-xs-6">
            <p>
            Поэтому теорема Гаусса - Остроградского проецирует изоморфный интеграл по бесконечной области. Матожидание необходимо и достаточно. Дивергенция векторного поля, как следует из вышесказанного, определяет экспериментальный функциональный анализ. Стоит отметить, что скачок функции упорядочивает двойной интеграл. Дивергенция векторного поля масштабирует постулат.
            </p>
        </div>

    </div>
        <div class="item">
        <div class="col-xs-6">
            <img src="img/slider/test3.jpg" alt="...">
        </div>
        <div class="col-xs-6">
            <p>
Интересно отметить, что иррациональное число притягивает интеграл Фурье. Частная производная детерменирована. Натуральный логарифм, исключая очевидный случай, синхронизирует график функции многих переменных, что несомненно приведет нас к истине. Тройной интеграл является следствием. Итак, ясно, что связное множество нейтрализует интеграл от функции, обращающейся в бесконечность в изолированной точке.
            </p>
        </div>

    </div>
  </div>

  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>   -->
                        </div>
                    </div>

                </div>
                <div class="row text-center block-btn">
                    <a href="#" class="btn btn-form">Подробнее</a>
                </div>
            </div>
        </section>

        <section id="partner" class="light">
            <h2>С нами работают</h2>
            <div class="container text-center">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="gallery">
                            <ul>
                                <li><img src="/img/partner/11.png" height="113px" width="200px" alt=""/></li>
                                <li><img src="/img/partner/12.png" height="113px" width="200px" alt=""/></li>
                                <li><img src="/img/partner/13.png" height="113px" width="180px" alt=""/></li>
                                <li><img src="/img/partner/15.png" height="113px" width="166px" alt=""/></li>
                            </ul>
                        </div>
                        <hr>
                        <button class="prev">prev</button>
                        <button class="next">next</button>
                    </div>
                </div>

            </div>
        </section>

<section class='row'>
    <div id="click-form" class="col-sm-4 col-xs-12">
        <form method="POST" action="/form-request"  role="form">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="inputName" class="sr-only">Имя</label>
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Ваше имя">
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="sr-only">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Ваш e-mail">
                      </div>
                      <div class="form-group">
                        <label for="inputPhohe" class="sr-only">Телефон</label>
                        <input type="phone" name="phone" class="form-control" id="inputPhohe" placeholder="Ваш телефон">
                      </div>
                      <div class="form-group">
                        <label for="inputQuestion" class="sr-only">Ваш вопрос</label>
                        <input type="textarea" name="text" class="form-control" id="inputQuestion" placeholder="Ваш вопрос">
                      </div>
                      <div class="form-group">

                    <button type="submit" class="btn btn-default">Оставить заявку</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@stop

@section('scripts')

@stop
