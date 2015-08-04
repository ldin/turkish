<!DOCTYPE html>
<html lang="ru">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles.css?0008" rel="stylesheet">

    @yield('header')

 </head>

<body>

    <header>
        <div class="container top-block">
            <div class="row">
                <div class=" col-lg-5 col-xs-12 col-sm-4">
                    <a href="/">
                    <img src="/img/sovet-logo.png" alt="sovet-logo">
                    </a>
                </div>
                <div class="col-lg-4 col-sm-4 col-xs-12 phone text-right">
                    <p class="red">горячая линия: <a href="tel:+905414086107">+90 541 408 6107</a></p>
                    <p>офис в анталии: <a href="tel:+902423163651">+90 242 316 3651</a></p>
                    <p>офис в стамбуле: <a href="tel:+90 532 388 0314">+90 532 388 0314</a></p>
                </div>
                <div class=" col-lg-3 col-sm-4 col-xs-12 phone text-right">
                    <p>E-MAIL: <span class="small"><a href="mail:info@infoturk.biz">info@infoturk.biz</a></span></p>
                    <p>Skype: <span class="small"> <b>infoturk-1</b>, <b>sovet-1</b></span></p>
                </div>

            </div>
        </div>
        <nav class="navbar">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main-menu" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse text-center" id="navbar-main-menu">
                <div class="inline-navbar">
                    <ul class="nav navbar-nav">
                        <li {{ (Request::is('/')) ? 'class="active"' : '' }}><a href="/">Главная <span class="sr-only">(current)</span></a></li>

                        @if(isset($type_page))
                            @foreach($type_page as$type=>$page)
                                <li {{ (Request::is($type.'*')) ? 'class="active"' : '' }}>{{HTML::link($type, $page)}}</li>
                            @endforeach
                        @endif

                  </ul>
                </div>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    </header>

    <main>

        @yield('content')

    </main>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <p class="title-h1">Организация и сопровождение бизнеса в турции+</p>
                    <p class="txt">
                    ГОРЯЧАЯ ЛИНИЯ: +90 541 408 6107<br>
                    ОФИС В АНТАЛИИ: +90 242 316 3651<br>
                    ОФИС В СТАМБУЛЕ: +90 532 388 03 14<br>
                    E-MAIL: info@infoturk.biz<br>
                    Skype: infoturk-1, sovet-1</p>
                    <br><br><br>
                    <p class="txt">© SovetConsulting 1999-2015</p>
                                        <p></p>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                    <p>Инвестиции<br>
                    <span class="txt">Инвестиционный консалтинг</span></p>
                    <p>Производство<br>
                    <span class="txt">Выгодное вложение в производство</span></p>
                    <p>Услуги<br>
                    <span class="txt">Таможня<br>
                    Маркетинг<br>
                    Юридические услуги<br>
                    Персонал<br>
                    Бухгалтерия<br>
                    Реклама и PR</span></p>


                </div>
                <div class="col-sm-4 col-xs-12">
                        <form method="POST" action="/form-request"  role="form">
                            <div class="row">
                                <div class="col-xs-12">
                                    <p class="title-h1">Связаться с нами</p>
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
            </div>
        </div>
    </footer>

{{ HTML::script('/js/jquery-1.11.3.min.js') }}
{{ HTML::script('/js/bootstrap.min.js') }}
{{ HTML::script('/js/jcarousellite-mod.js') }}
{{ HTML::script('/js/main.js') }}
@yield('scripts')

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter30970706 = new Ya.Metrika({
                    id:30970706,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    trackHash:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/30970706" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>

</html>
