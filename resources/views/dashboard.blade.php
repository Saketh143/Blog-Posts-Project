@extends('layouts.app')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);
      google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Title');
        data.addColumn('string', 'date');
        data.addColumn('string','post-id');
        data.addColumn('string', 'edit');
        

        @foreach($posts as $post)
        data.addRow(['{{$post->title}}','{{$post->created_at}}','{{ $post->id }}','<a href="/posts/{{$post->id}}/edit" class = "btn btn-secondary">Edit</a>']);
        @endforeach

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {allowHtml: true,showRowNumber: true, width: '100%', height: '100%'});

        var view = new google.visualization.DataTable();
        view.addColumn('string','Title');
        view.addColumn('number','Views');

        @foreach($posts as $post)
        view.addRow(['{{$post->title}}',{{$post->view_count}}]);
        @endforeach

        

        var options = {
        title: "No. of views per post",
        width: 400,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);

        

      }
    </script>
  
</head>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <div class="panel-body">
                            <a href="/posts/create" class="btn btn-primary"> Create Post</a>
                            <br>
                            <h3>Your Blog Posts</h3>
                           
                            @if(count($posts) > 0)
                                <div id="table_div">
                                </div>
                                <br>
                                <br>
                                <div id="columnchart_values">
                                </div>
                            @else
                                <p>You have no posts</p>
                            @endif
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


