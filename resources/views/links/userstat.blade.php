<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>User Statistics</title>
    <link rel="stylesheet" href={{ asset('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') }} > 
	</head>
	<body>
  
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
      <ul class="nav navbar-nav">
        <li><a href="{{ route('linkLinks') }}"><span class="glyphicon glyphicon-list" aria-hidden="false"></span> Ссылки</a></li>
        <li><a href="{{ route('linkStatistics') }}"><span class="glyphicon glyphicon-stats" aria-hidden="false"></span> Статистика переходов</a></li>
        <li><a href="{{ route('linkUsers') }}"><span class="glyphicon glyphicon-user" aria-hidden="false"></span> Сисок пользователей</a></li>
        <li><a href="{{ route('linkUserStat') }}"><span class="glyphicon glyphicon-equalizer" aria-hidden="false"></span> Статистика пользователей</a></li>
      </ul>
    </nav>

    <div class="container">
    @if ( $curent_user != null )
      <div class="input-group input-group-lg">
        <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-user" aria-hidden="false"></span></span>
        <select class="form-control" size="0" id="sel2"  aria-describedby="basic-addon1" onchange="top.location=this.value">
          <option disabled>Выберите Пользователя</option>

          @foreach($users as $user)

            @if ( $user->id == $curent_user->id)
              <option selected value=" {{ route('linkUserStat', $user->token) }}">{{ $user->token }}</option>
            @else
              <option value="{{ route('linkUserStat', $user->token) }}">{{ $user->token }}</option>
            @endif

          @endforeach 

        </select>
      </div>
      <div>
        <br>
        <h4>Инфрмация о пользователе</h4>
        <table class="table table-bordered">
          <thead> 
            <tr>
              <th width=40 class="text-center"><span class="glyphicon glyphicon-th-list" aria-hidden="false"></span></th>
              <th width=200><b> id Пользователя </b></th>
              <th width=200><b> Дата и время создания </b></th>
              <th width=200><b> Браузер Пользователя </b></th>
              <th width=200><b> ОС Пользователя </b></th>
              <th><b> Общее количество пееходов </b></th>
           </tr>
          </thead>
          <tbody>
            <tr>
              <th class="text-center"><span class="glyphicon glyphicon-user" aria-hidden="false"></span></th>
              <td><a href="{{ route('linkUsers') }}"> {{ $curent_user->token }} </a></td>
              <td> {{ $curent_user->created_at }} </td>
              <td> {{ $curent_user->browser }} </td>
              <td> {{ $curent_user->os }} </td>
              <td> {{ $num_link }} </td>
            </tr>
          </tbody>
        </table> 
      </div>
      <br>
      <h4>Преходы</h4>
      <table class="table table-bordered">
          <thead> 
            <tr><th width=40 class="text-center"><span class="glyphicon glyphicon-globe" aria-hidden="false"></span></th>
              <th width=190><b> Время перехода </b></th>
              <th width=180><b> ip Пользователя </b></th>
              <th><b> Адресс перехода </b></th>
           </tr>
          </thead>
          <tbody>

          @foreach($clicks as $click)
            <tr>
              <th class="text-center"><span class="glyphicon glyphicon-link" aria-hidden="false"></span>
              <td> {{ $click->created_at }} </td>
              <td> {{ $click->ip }} </td>
              <td> {{ $click->link_url }} </td>
            </tr>
          @endforeach

          </tbody>
        </table> 
    @else
      <div class="input-group input-group-lg">
        <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-user" aria-hidden="false"></span></span>
        <select class="form-control" size="0" id="sel2"  aria-describedby="basic-addon1" onchange="top.location=this.value">
          <option disabled>Выберите Пользователя</option>

          @foreach($users as $user)

              <option value="{{ route('linkUserStat', $user->token) }}">{{ $user->token }}</option>

          @endforeach 

        </select>

      </div>

    @endif

    </div>
    <script type="text/javascript" src= {{ asset('vendor/components/jquery/jquery.min.js') }} ></script>
    <script type="text/javascript" src= {{ asset('vendor/twbs/bootstrap/dist/js/bootstrap.min.js') }} ></script>    

	</body>
</html>