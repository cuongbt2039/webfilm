@extends('app.layout')
@section('css')
<link rel="stylesheet" href="/css/home.css">

@endsection

@section('body')
    <div class="col-md-10 container-flex">
        <div id="player" style="width: 100%;">

        </div>
        <div class="description" style="width: 100%">
            <h3>{!! $descriptionTitle !!}</h3>
            <hr>
            <p>
                {!! $descriptionContent !!}
            </p>
        </div>
    </div>
    <div class="col-md-2" style="padding: 0">
        <h2 id="list-film-label">Các tập phim</h2>
        <div class="outside">
            <span class="slick-prev">← previous  | </span><span class="slick-next" >next →</span>
        </div>
        <ul class="bxslider" style="padding-left: 0px">
            <?php $temp = 0?>
            @foreach($list_episode as $number_episode=>$id_ep)
                @if($temp == 0)
                    <div>
                @endif
                    <?php $temp += 1?>
                @include('player.episode_rightbar', compact('id_ep'))
                @if($temp == NUMBER_SLIDE_SHOW_EPISOE)
                    </div>
                    <?php $temp = 0?>
                @endif
            @endforeach
        </ul>
    </div>
{{--    @include('app.cta_box')--}}
@endsection

@section('js_footer')
    <script>
        var current_slide = 0;
    </script>
    <script src="/js/player.js"></script>
    <script>
        playAuto();
    </script>
@endsection