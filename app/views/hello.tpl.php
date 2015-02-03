@extends('arx::layouts.starter')

@section('content')
    <div class="container" ng-app ng-cloak>
        <h2>Hello, {{ name }} !</h2>

        <input type="text" ng-model="name"/>

        <a class="btn btn-default animated bounceIn" ng-show="name">Great, you've just used Arx !</a>

        <h2>Develop your app with ease</h2>

        <div class="well">
            <code>composer create arx/project myapp</code>
            <code>> Install last version of Laravel </code>
        </div>

        <?php
            //trigger_error('te');
        ?>


    </div>
@stop

@section('js')
@parent
<script src="<?php echo url('assets/js/typewriter.js') ?>"></script>
<script>
    $(function(){
        $(".typewriter").typewriter({'speed':100});
    })
</script>
@stop