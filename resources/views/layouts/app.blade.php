<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Users List</title>
    <link rel="stylesheet" href={{ asset('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') }} > 
    </head>
    <body>
  
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
      <ul class="nav navbar-nav">
        <li><a href="{{ route('main') }}"><span class="glyphicon glyphicon-home" aria-hidden="false"></span></a></li>
        <li><a href="{{ route('linkLinks') }}"><span class="glyphicon glyphicon-list" aria-hidden="false"></span> Ссылки</a></li>
        <li><a href="{{ route('linkStatistics') }}"><span class="glyphicon glyphicon-stats" aria-hidden="false"></span> Статистика переходов</a></li>
        <li><a href="{{ route('linkUsers') }}"><span class="glyphicon glyphicon-user" aria-hidden="false"></span> Список пользователей</a></li>
        <li><a href="{{ route('linkUserStat') }}"><span class="glyphicon glyphicon-equalizer" aria-hidden="false"></span> Статистика пользователей</a></li>
      </ul>
      <div align=right valign=center>
        @if (Auth::check())
          <form action="{{ url('./logout') }}" method="POST">
          {{ csrf_field() }} <!-- Очень важная строчка!!! Иначе ни черта не работает. -->
          <button class="btn btn-primary" type="submit" > LogOut <span class="glyphicon glyphicon-arrow-right" aria-hidden="false"></span></button>
          </form>
        @else
          <a href="{{ route('main') }}"><span class="glyphicon glyphicon-user" aria-hidden="false"></span> Вход/Login</a>
        @endif
      </div>
      </div>
    </nav>

    <div class="container">

        @yield('content')
    </div>

    <!-- Scripts -->
      <script type="text/javascript" src={{ asset('vendor/components/jquery/jquery.min.js') }}></script>
      <script type="text/javascript" src={{ asset('vendor/twbs/bootstrap/dist/js/bootstrap.min.js') }}></script>
    </body>
</html>
