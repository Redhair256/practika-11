@extends('layouts.app')

@section('content')
    <h4>Выбрать ссылку</h4>
    <div class="input-group input-group-lg">
      <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-link" aria-hidden="false"></span></span>
      <select class="form-control" size="0" id="sel1"  aria-describedby="basic-addon1" onchange="top.location=this.value">
        <option disabled>Выберите код</option>

      @if ( $curent_link == null )  

        @foreach($links as $link)

          <option value="{{ route('linkStatistics') }}/{{ $link->token }}">{{ $link->token }}</option>

        @endforeach 

      @else
        @foreach($links as $link)

          @if ( $link->id == $curent_link->id)
            <option selected value="{{ $link->token }}">{{ $link->token }}</option>
          @else
            <option value="{{ $link->token }}">{{ $link->token }}</option>
          @endif

        @endforeach 
      @endif
      </select>
    </div>
    <br>
    @if ( $curent_link != null )
      <h4>Статистика</h4>
        <table class="table table-bordered">
          <thead> 
            <tr>
              <th width=40 class="text-center"><span class="glyphicon glyphicon-globe" aria-hidden="false"></span></th>
              <th width=250><b> идентификатор </b></th>
              <th><b> целевой URL ссылки </b></th>
              <th width=100><div class=text-center><b> Переходов: </b></div></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td align="center"><a href="{{ route('linkRedirect', $curent_link->token ) }} " target="_blank"><span class="glyphicon glyphicon-link" aria-hidden="false" ></span></a></td>
              <td>{{$curent_link->token}}</td>
              <td><a href="{{ $curent_link->target_url }}"> {{ $curent_link->target_url }} </a></td>
              <td align="right"> {{ $num_click }} </td>
            </tr>
          </tbody>
         </table> 
    
      <br>
      <h4>Преходы</h4>
      <table class="table table-bordered">
          <thead> 
            <tr>
              <th width=290><b> Время перехода </b></th>
              <th width=180><b> ip Пользователя </b></th>
              <th width=180><b> id Пользователя </b></th>
              <th><b> User-Agent Пользователя </b></th>
           </tr>
          </thead>
          <tbody>

          @foreach($clicks as $click)
            <tr>
              <td> {{ $click->created_at }} </td>
              <td> {{ $click->ip }} </td>
              <td><a href="{{ route('linkUsers', $click->user_id) }}"> {{ $click->visitor_token }} </a></td>
              <td> {{ $click->visitor_ua }} </td>
            </tr>
          @endforeach

          </tbody>
        </table> 
        <?php echo $clicks->render(); ?>
      @endif
 @endsection