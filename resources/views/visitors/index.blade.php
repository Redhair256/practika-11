@extends('layouts.app')

@section('content')
      <h4>Список пользователей</h4>
      <table class="table table-bordered">
          <thead> 
            <tr>
              <th width=40 class="text-center"><span class="glyphicon glyphicon-th-list" aria-hidden="false"></span></th>
              <th width=200><b> id Пользователя </b></th>
              <th width=200><b> Браузер Пользователя </b></th>
              <th width=200><b> ОС Пользователя </b></th>
              <th><b> Дата и время создания </b></th>
           </tr>
          </thead>
          <tbody>
        @if ( $visitor_id != null )
          @foreach($visitors as $visitor)
            @if ( $visitor_id  == $visitor->id)  
              <tr bgcolor="lightgreen">
            @else
              <tr>
            @endif
              <th width=40 class="text-center"><span class="glyphicon glyphicon-user" aria-hidden="false"></span></th>
              <td><a href="{{ route('linkUserStat', $visitor->token) }}"> {{ $visitor->token }} </a></td>
              <td> {{ $visitor->browser }} </td>
              <td> {{ $visitor->os }} </td>
              <td> {{ $visitor->created_at }} </td>
            </tr>
          @endforeach
        @else
          @foreach($visitors as $visitor)
            <tr>
              <th width=40 class="text-center"><span class="glyphicon glyphicon-user" aria-hidden="false"></span></th>
              <td><a href="#"> {{ $visitor->token }} </a></td>
              <td> {{ $visitor->browser }} </td>
              <td> {{ $visitor->os }} </td>
              <td> {{ $visitor->created_at }} </td>
            </tr>
          @endforeach
        @endif
        </tbody>
      </table> 
      <?php echo $visitors->render(); ?>
@endsection