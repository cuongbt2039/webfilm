<?php

    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\User;
    use App\UserEpisode;
    use App\Episode;

    class PlayerController extends Controller
    {

        private $latest_episode = '';
        private $current_time_latest_episode = '';

        public function __construct()
        {
        }

        public function index()
        {
            $isPlayByEpisode = FALSE;
            $cookie_code = COOKIE_CODE;
            $list_episode = Episode::orderBy('number_episode')->pluck('video_id', 'number_episode')->all();
            $descriptionTitle = "Phim Người Phán Xử";
            $descriptionContent = "Khai thác đề tài về hoạt động tội phạm, băng nhóm có tổ chức thời kinh tế thị trường - sự kết hợp giữa bạo lực và kinh doanh, trùm giang hồ đội lốt doanh nhân, Người phán xử hy vọng sẽ mang lại \"luồng gió\" mới cho thể loại phim hình sự. Theo chia sẻ của đạo diễn Mai Hiền - đạo diễn phim Người phán xử: \"Người phán xử là một câu chuyện hư cấu nhưng ở mức vừa phải để khán giả vẫn cảm thấy hấp dẫn bởi câu chuyện phù hợp với xã hội Việt Nam, con người Việt Nam. Hy vọng diễn xuất của các diễn viên sẽ mang đến nhiều thú vị cho khán giả\".";

            return view('player.index', compact('descriptionTitle','descriptionContent', 'cookie_code', 'list_episode', 'isPlayByEpisode'));
        }

        public function play($episodeId)
        {
            $currentTime = 0;
            $videoId = $episodeId;
            $isPlayByEpisode = TRUE;
            $cookie_code = COOKIE_CODE;
            $list_episode = Episode::getListEpisode();
            $episode = UserEpisode::getEpisode($episodeId);
            if (empty($episode)) {
                $episode = Episode::getEpisode($episodeId);
                if (empty($episode)) {
                    return abort(404);
                }
            } else {
                $currentTime = $episode->current_time;
            }
            $videoId = $episode->video_id;
            $currentSlide = intval(($episodeId -1) / NUMBER_SLIDE_SHOW_EPISOE);
            $descriptionTitle = $episode->name;
            $descriptionContent = $episode->short_description;

            return view('player.play', compact('descriptionTitle','descriptionContent', 'currentSlide','videoId', 'cookie_code', 'list_episode', 'isPlayByEpisode', 'currentTime'));
        }

    }
