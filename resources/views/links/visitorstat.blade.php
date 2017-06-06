@extends('layouts.app')

@section('content')
    <h4>Выберите Пользователя</h4>
    @if ( $curent_visitor != null )
      <div class="input-group input-group-lg">
        <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-user" aria-hidden="false"></span></span>
        <select class="form-control" size="0" id="sel2"  aria-describedby="basic-addon1" onchange="top.location=this.value">
          <option disabled>Выберите Пользователя</option>

          @foreach($visitors as $visitor)

            @if ( $visitor->id == $curent_visitor->id)
              <option selected value=" {{ route('linkUserStat', $visitor->token) }}">{{ $visitor->token }}</option>
            @else
              <option value="{{ route('linkUserStat', $visitor->token) }}">{{ $visitor->token }}</option>
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
              <td><a href="{{ route('linkUsers') }}"> {{ $curent_visitor->token }} </a></td>
              <td> {{ $curent_visitor->created_at }} </td>
              <td> {{ $curent_visitor->browser }} </td>
              <td> {{ $curent_visitor->os }} </td>
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
        <?php echo $clicks->render(); ?>
    @else
      <div class="input-group input-group-lg">
        <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-user" aria-hidden="false"></span></span>
        <select class="form-control" size="0" id="sel2"  aria-describedby="basic-addon1" onchange="top.location=this.value">
          <option disabled>Выберите Пользователя</option>

          @foreach($visitors as $visitor)

              <option value="{{ route('linkUserStat', $visitor->token) }}">{{ $visitor->token }}</option>

          @endforeach 

        </select>
      </div>

    @endif

@endsection