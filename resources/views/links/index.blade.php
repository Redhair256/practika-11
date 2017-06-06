@extends('layouts.app')

@section('content')
      <h4>Общая информация: </h4>
      <table class="table table-bordered">
          <thead> 
            <tr>
              <th width=40 class="text-center"><span class="glyphicon glyphicon-th-list" aria-hidden="false"></span></th>
              <th width=200><b> Общее кол-во ссылок </b></th>
              <th width=220><b> Общее кол-во переходов </b></th>
              <th width=220><b> Среднее кол-во переходов </b></th>
              <th><b> Общее кол-во уникальных переходов </b></th>
           </tr>
          </thead>
          <tbody>
            <th width=40 class="text-center"><span class="glyphicon glyphicon-asterisk" aria-hidden="false"></span></th>
            @if($numLinks == null)
              <th><b> Нет информации. </b></th>
            @else
              <th><b> {{ $numLinks }} </b></th>
            @endif
            @if($numClicks == null)
              <th><b> Нет информации. </b></th>
            @else
              <th><b> {{ $numClicks }} </b></th>
            @endif
            @if($averClicks == null)
              <th><b> Нет информации. </b></th>
            @else
              <th><b> {{ $averClicks }} </b></th>
            @endif
            @if($numUniqClicks == null)
              <th><b> Нет информации. </b></th>
            @else
              <th><b> {{ $numUniqClicks}} </b></th>
            @endif
        </tbody>
      </table> 
      <br>
      <h4>Информация за текущий день: </h4>
      <table class="table table-bordered">
          <thead> 
            <tr>
              <th width=40 class="text-center"><span class="glyphicon glyphicon-th-list" aria-hidden="false"></span></th>
              <th width=200><b> Кол-во новых ссылок </b></th>
              <th width=220><b> Общее кол-во переходов </b></th>
              <th width=220><b> Кол-во уникальных переходов </b></th>
              <th width=220><b> Среднее кол-во переходов </b></th>
           </tr>
          </thead>
          <tbody>
            <th width=40 class="text-center"><span class="glyphicon glyphicon-asterisk" aria-hidden="false"></span></th>
            @if($tdLinks == null)
              <th><b> Нет информации. </b></th>
            @else
              <th><b> {{ $tdLinks }} </b></th>
            @endif
            @if($tdClicks == null)
              <th><b> Нет информации. </b></th>
            @else
              <th><b> {{ $tdClicks }} </b></th>
            @endif
            @if($tdNumUniqClicks == null)
              <th><b> Нет информации. </b></th>
            @else
              <th><b> {{ $tdNumUniqClicks }} </b></th>
            @endif
            @if($tdAverClicks == null)
              <th><b> Нет информации. </b></th>
            @else
              <th><b> {{ $tdAverClicks }} </b></th>
            @endif

        </tbody>
      </table> 
@endsection