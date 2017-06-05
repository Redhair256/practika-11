

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Listing</title>
      <link rel="stylesheet" href={{ asset('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') }} >
   </head>
   <body>

      <nav class="navbar navbar-default" role="navigation">
      <!-- Содержимое Navbar -->
         <div class="container">
         <ul class="nav navbar-nav">
            <li><a href="{{ route('main') }}"><span class="glyphicon glyphicon-home" aria-hidden="false"></span></a></li>
            <li><a href="{{ route('linkLinks') }}"><span class="glyphicon glyphicon-list" aria-hidden="false"></span>
               Ссылки</a></li>
            <li><a href="{{ route('linkStatistics') }}"><span class="glyphicon glyphicon-stats" aria-hidden="false"></span>
               Статистика переходов</a></li>
            <li><a href="{{ route('linkUsers') }}"><span class="glyphicon glyphicon-user" aria-hidden="false"></span> Список пользователей</a></li>
            <li><a href="{{ route('linkUserStat') }}"><span class="glyphicon glyphicon-equalizer" aria-hidden="false"></span> Статистика пользователей</a></li>
         </ul>
         </div>
      </nav>

      <div class="container">
         <h4>Добавить ссылку</h4>
         <form action="{{ url('./create') }}" method="POST">
         {{ csrf_field() }} <!-- Очень важная строчка!!! Иначе ни черта не работает. -->
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-link" aria-hidden="false"></span></span>
            <input type="text" name="target_url" class="form-control" placeholder="Https:\\" aria-describedby="basic-addon1">
            <span class="input-group-btn">
            <button class="btn btn-primary" type="submit" > Добавить <span class="glyphicon glyphicon-arrow-right" aria-hidden="false"></span></button>
            </span>
         </div>
         </form>

         @if (count($errors) > 0)
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif

         <br>
         <h4>Cсылки</h4>
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th width=40 class="text-center"><span class="glyphicon glyphicon-globe" aria-hidden="false"></span></th>
                  <th width=300><b> идентификатор </b></th>
                  <th><b> целевой URL ссылки </b></th>
                  <th width=40>
                     <div class=text-center><span class="glyphicon glyphicon-stats" aria-hidden="false"></span></div>
                  </th>
               </tr>
            </thead>
            <tbody>
               @if($links->currentPage() != 1)
               <tr>
                  <td align="center"><span class="glyphicon glyphicon-link" aria-hidden="false" ></span></td>
                  <td> ... </td>
                  <td> ... </td>
                  <td align="center"><a href="statistics/01"><span class="glyphicon glyphicon-eye-open" aria-hidden="false"></span></a></td>
               </tr>
               @endif
               @foreach($links as $link)
                  <tr>
                  <td align='center'><a href='r/{{ $link->token }}' target="_blank"><span class='glyphicon glyphicon-link' aria-hidden='false'></span></a></td>
                  <td>{{ $link->token }}</td>
                  <td><a href='{{ $link->target_url}}'>{{ $link->target_url}}</a></td>
                  <td align='center'><a href='statistics/{{ $link->token}}'><span class='glyphicon glyphicon-eye-open' aria-hidden='false'></span></a></td>
                  </tr>
               @endforeach  
               @if($links->currentPage() != $links->lastPage())
               <tr>
                  <td align="center"><span class="glyphicon glyphicon-link" aria-hidden="false" ></span></td>
                  <td> ... </td>
                  <td> ... </td>
                  <td align="center"><a href="statistics/01"><span class="glyphicon glyphicon-eye-open" aria-hidden="false"></span></a></td>
               </tr>
               @endif
            </tbody>
         </table>
         <?php echo $links->render(); ?>
      </div>
      <script type="text/javascript" src={{ asset('vendor/components/jquery/jquery.min.js') }}></script>
      <script type="text/javascript" src={{ asset('vendor/twbs/bootstrap/dist/js/bootstrap.min.js') }}></script>    
   </body>
</html>


