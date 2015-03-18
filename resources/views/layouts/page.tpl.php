@extends('arx::layouts.starter')

@section('css')
<?php

echo \Arx\classes\Load::css([
    url('assets/css/main.css'),
]);
?>
@stop

@section('head')
<meta name="DC.title" lang="en" content="Example overriding" />
@parent
<script>
    window.__app = <?php echo Hook::getJson('__app'); ?>;
</script>
@stop

@section('js')
<?php
echo \Arx\classes\Load::js([
    'assets/js/main.js'
]);
?>
@stop

<?php
/**
 * Here is an example of how to override default body class attributes
 */
$body['attributes']['class'] = (\Arx\classes\Detect::is_mobile()?'is_mobile ': '') .' page '.$this->body['attributes']['class'];
?>

@section('body')
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><% $this->project['name'] ?: Lang::get('project.name') %></a>
        </div>
        <div class="collapse navbar-collapse">
            @section('nav')
            <?php
            echo \Arx\BootstrapHelper::nav(
                $this->nav ?: Lang::get('arx::example.nav'),
                array('parent@' => array('class' => 'nav navbar-nav')));
            ?>
            @show
            @section('nav-right')
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                <li><a href="<%= url('/auth/login') %>">Login</a></li>
                <li><a href="<%= url('/auth/register') %>">Register</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><%= Auth::user()->name %> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<%= url('/auth/logout') %>">Logout</a></li>
                    </ul>
                </li>
                @endif
            </ul>
            @show
        </div>
        <!--/.nav-collapse -->
    </div>
</div>
<div class="container page-wrapper">
    @section('content')
    <?php
    if (isset($content)):
        echo $content;
    else:
        ?>
        <div class="starter-template">
            <h1>Bootstrap starter template</h1>

            <p class="lead">Define a $content var to change this content.</p>
        </div>
    <?php
    endif;
    ?>
    @show
</div> <!-- /container -->
@stop