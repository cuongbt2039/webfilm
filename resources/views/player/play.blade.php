@extends('player.index')
@section('css')
    <link rel="stylesheet" href="/css/home.css">
@endsection

@section('body')
    @parent
@endsection

@section('js_footer')
    <script>
        var current_slide = setVariable({{$currentSlide}}, 0);
    </script>
    <script src="/js/player.js"></script>
    <script>
        var viedeo_id = setVariable("{{$videoId}}", 1);
        current_time = setVariable("{{$currentTime}}", 0);
        playByEpisode(viedeo_id, current_time);
    </script>
@endsection