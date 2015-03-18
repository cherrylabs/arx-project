@extends('layouts.page')

@section('content')
<div ng-app="home">
	<div class="container" ng-controller="homeController" ng-cloak="ng-cloak">
		<h2>Hello, {{ name }} !</h2>

		<input type="text" ng-model="name"/>

		<a class="btn btn-default animated bounceIn" ng-show="name">Great, you've just used Arx !</a>

		<h2>Develop your app with ease</h2>

        <form action="#add" ng-show="name">
            <input type="text" ng-model="item.title" />
            <input type="text" ng-model="name" />
            <a href="#" class="btn btn-primary" ng-click="addItem()">Add</a>
        </form>

        <div class="blok-grid" ng-show="name">
            <ul>
                <li ng-repeat="(key,item) in items">
                    <h2>{{ item.title }}</h2>
                    <h2>{{ item.name }}</h2>
                </li>
            </ul>
        </div>
	</div>
</div>
@stop
