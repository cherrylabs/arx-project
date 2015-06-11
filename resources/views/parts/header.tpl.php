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
            # Little helper to generate a bootstrap nav =>
            echo \Arx\BootstrapHelper::nav(
                $this->menu ?: Lang::get('menu.navbar'),
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