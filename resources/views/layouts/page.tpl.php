@extends('arx::layouts.starter')

@section('css')
<?php
# Example of using CSS Loader
echo \Arx\classes\Load::css([
    url('assets/css/main.css'),
]);
?>
@stop

@section('head')
<meta name="DC.title" lang="en" content="Example of overriding" />
@parent
<script>
    window.__app = <?php echo Hook::getJson('__app'); ?>;
</script>

<!--[if lt IE 8]>
<script src="<?php echo url('assets/js/plugins/modernizr/modernizr.js'); ?>"></script>
<![endif]-->
@stop

@section('js')
<?php
# Example of using JS Loader
echo \Arx\classes\Load::js([
    'assets/js/plugins.js',
    'assets/js/main.js'
]);
?>
@stop

<?php
/**
 * Here is an example of how to override default body class attributes
 *
 * This is a convenient way to handle class with the Paul Irish Structure
 */
$body['attributes']['class'] = (\Arx\classes\Detect::is_mobile()?'is_mobile ': '') .' page '.$this->body['attributes']['class'];
?>

@section('body')

@section('header')
    @include('parts.header')
@show

<div class="container page-wrapper">
    @section('content')
    <?php
    if (isset($content)):
        echo $content;
    else:
        ?>
        <div class="starter-template">
            <h1>Bootstrap starter template</h1>

            <p class="lead">Define a $content var to change this content or override the content section.</p>
        </div>
    <?php
    endif;
    ?>
    @show
</div> <!-- /container -->

@section('footer')
    @include('parts.footer')
@show
@stop