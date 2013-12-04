@extends('arx::layouts.carousel')

@section('head')
    <meta http-equiv="Content-Type" content="; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?= $this->metatitle ?></title>
    <link rel="stylesheet" href="<?php echo asset('assets/css/main.css') ?>"/>
@stop

@section('body.content')

<div class="navbar-wrapper">
    <div class="container">

        <div class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img src="<?= asset('assets/img/logo-white.png') ?>" alt="Arx webdevelopment kit"/>
                </div>
                <div class="navbar-collapse collapse pull-right">
                    <?php echo \Arx\helpers\Bootstrap::nav(Lang::get('menu'), array('class' => 'nav navbar-nav')) ?>
                </div>
            </div>
        </div>

    </div>
</div>


<div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach(Lang::get('home.slides') as $key => $slide)
            <li data-target="#myCarousel" data-slide-to="<?php echo $key ?>" <?php echo $key == 0 ? 'class="active"' : '' ?>></li>
        @endforeach
    </ol>
    <div class="carousel-inner">

        @foreach(Lang::get('home.slides') as $key => $slide)
        <div class="item <?php echo $key == 0 ? 'active' : '' ?>">
            <?php echo$slide['media']?>

            <div class="container">
                <div class="carousel-caption">
                    <h1><?php echo$slide['title']?></h1>
                    <div><?php echo$slide['content']?></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span
            class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span
            class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<!-- /.carousel -->

<div class="container marketing">

    <h1 class="headtitle"><?php echo Lang::get('home.title') ?></h1>

    <hr class="featurette-divider">

    @foreach(Lang::get('home.tutorials') as $key => $tutorial)
        <div class="row featurette">
            <div class="col-md-7">
                <?php echo $tutorial['media'] ?>
            </div>
            <div class="col-md-5 text-top">
                <h2 class="featurette-heading"><?php echo $tutorial['title'] ?></h2>
                <p class="lead">
                    <?php echo $tutorial['content'] ?>
                </p>
            </div>
        </div>
        <hr class="featurette-divider">
    @endforeach

</div>
<!-- /.container -->

<div class="container">
    <hr />
    <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>

        <p>&copy; 2013 Cherrypulp, LLC. &middot; <a href="/privacy">Privacy</a> &middot; <a href="#">Code licensed under the The MIT License. Documentation licensed under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a></p>
    </footer>
    <!--/footer-->
</div>
@stop