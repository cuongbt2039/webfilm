@extends('app.layout')
@section('css')
<link rel="stylesheet" href="/css/home.css">
<!-- Styles -->
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
    
    .ytp-pause-overlay{
        display: none;
    }
</style>
@endsection

@section('body')
    <div class="col-md-10"  id="player" style="height: 95%">

    </div>
    <div class="col-md-2" style="padding: 0">
        @foreach($list_episode as $id_ep)
            @include('player.episode_rightbar', compact('id_ep'))
        @endforeach
    </div>
@endsection

@section('js_footer')
    <script>
        var cookie_code = "{{$cookie_code}}";
        var current_time = 0;
        var id_video_playing = '';
    </script>
    <script src="/js/player.js"></script>
@endsection