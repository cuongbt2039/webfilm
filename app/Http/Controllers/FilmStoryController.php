<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    require_once ('simple_html_dom.php');
    class FilmStoryController extends Controller
    {
        function __construct()
        {

        }

        public function storyPost()
        {
            return view('story.story');
        }

        public function filmCharacterPost()
        {
            return view('story.charactor');
        }

        public function FamousQuotePost()
        {

        }
    }