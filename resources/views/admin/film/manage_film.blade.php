@extends('app.admin.layout')
@section('css')
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin.css">
@endsection

@section('body')

<div class="container-fluid no-padding" style="height: 100%">
    <div class="col-md-3 no-padding admin-menu">
        @include('app.admin.menu')
    </div>
    <div class="col-md-9 no-padding-left main">
        <h3>Film: {{$nameOfFilm}}</h3>
         {!!$grid!!}
    </div>
</div>
<div>
   
</div>
@endsection

@section('js_footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    
@endsection