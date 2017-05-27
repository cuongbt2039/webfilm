@extends('app.layout')
@section('css')
<link rel="stylesheet" href="/css/home.css">

@endsection

@section('body')
    <div class="col-md-10"  id="player" style="height: 95%">

    </div>
    <div class="col-md-2" style="padding: 0">
        <h2 id="list-film-label">Các tập phim</h2>
        @foreach($list_episode as $number_episode=>$id_ep)
            @include('player.episode_rightbar', compact('id_ep'))
        @endforeach
    </div>
@endsection

@section('js_footer')
    <script src="/js/player.js"></script>
    <script>
        playAuto();
    </script>
@endsection