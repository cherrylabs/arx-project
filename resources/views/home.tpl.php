@extends('layouts.page')

@section('content')
<div class="wrapper">
    <div class="container marketing">
        <div class="row fadeInDown animated">
            <div class="col-sm-12">
                <h1 class="text-center">
                    <em>Introducing</em><br/>
                    <strong>Arx</strong> <sup>Beta</sup>

                    <hr class="featurette-divider" data-0="width: 0px;" data-500="width: 57px;" />
                </h1>
            </div>
        </div>


        <section class="row featurette">
            <div class="col-sm-7 fadeInLeft animated">
                <img class="featurette-image img-responsive" src="//www.arx.io/assets/img/screen-dev.jpg" alt="Generic placeholder image" />
            </div>
            <div class="col-sm-5 fadeInRight animated">
                <div class="alignmiddle">
                    <h2 class="featurette-heading">
                        1. Dig into the code
                    </h2>

                    <hr class="featurette-divider" data-0="width: 0px;" data-600="width: 57px;" />

                    <p>
                        How about discover the fantastic world of Laravel ? <br />

                        <a class="btn btn-default" href="http://www.arx.io/getting-started">Getting started</a>
                    </p>
                </div>
            </div>
        </section>

        <section class="row featurette">
            <div class="col-sm-5 fadeInLeft animated" data-0="left: -1000px;" data-800="left: 0px;">
                <div class="alignmiddle">
                    <h2 class="featurette-heading">
                        As a design helper <br/>
                        <strong>Only ideas matter</strong>
                    </h2>

                    <hr class="featurette-divider" data-500="width: 0px;" data-900="width: 57px;" />

                    <p class="lead">
                        Your website must be unique but not the common parts. <br/>Arx helps developers to produce beautiful and standard user interface to respond to classic needs of a website like subscription, admin process.<br/>
                        Your team can stay focused only on the specific code of your project and will not be reinventing the wheel each time.
                    </p>
                </div>
            </div>
            <div class="col-sm-7 fadeInRight animated">
                <img class="featurette-image img-responsive pull-right" src="//www.arx.io/assets/img/screen-admin.jpg" alt="Generic placeholder image" data-0="opacity: 0;" data-850="opacity: 1;" />
            </div>
        </section>

        <section class="row featurette">
            <div class="col-sm-7 fadeInLeft animated">
                <img class="featurette-image img-responsive" src="//www.arx.io/assets/img/screen-group.jpg" alt="Generic placeholder image" data-0="opacity: 0;" data-1400="opacity: 1;" />
            </div>
            <div class="col-sm-5 fadeInRight animated" data-0="right: -1000px;" data-1000="right: 0px;">
                <div class="alignmiddle">
                    <h2 class="featurette-heading">
                        As a think tanker<br/>
                        <strong></strong>
                    </h2>

                    <hr class="featurette-divider" data-800="width: 0px;" data-1100="width: 57px;" />

                    <p class="lead">Arx is driven by an open-source community and a little dedicated agency using it. <br/>The code and design flows are tested on real projects.</p>
                </div>
            </div>
        </section>
    </div>
</div>
@stop
