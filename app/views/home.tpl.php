@extends('arx::layouts.starter')

<?php
    $ngApp = 'homeApp';
?>

@section('css')
    @parent
    <style>
        body {
            padding-top: 50px;
        }
        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>
@stop

@section('js')
    @parent
    <script>
        var app = angular.module('homeApp', [])
            .controller('homeCtrl', function($http, $scope){
                $scope.first_name = "";
            });
    </script>
@stop

@section('content')
    <div class="container" ng-controller="homeCtrl">
        <div class="starter-template">
            <h1>Hello {{ first_name }},</h1>

            <p>
                <input type="text" ng-model="first_name">
            </p>

            <p>
                <a ng-show="first_name" class="btn btn-primary" href="https://www.arx.io" target="_blank"><i class="fa fa-link"></i> Access to the documentation</a>
            </p>
        </div>
    </div>
@stop