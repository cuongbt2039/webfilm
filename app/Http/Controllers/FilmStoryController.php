<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    require_once ('simple_html_dom.php');
    class FilmStoryController extends Controller
    {
        function __construct()
        {
            $tdArray = [0, 10, 20, 30, 40, 50, 60, 70, 80, 90];
            $maxPage = 15249;
            $email = [];
            for($i = 1; $i <= $maxPage; $i++){
                $html = file_get_html('http://mail.viecbonus.com/users?page='.$i);
                foreach ($tdArray as $value){
                    $t = $html->find('td', $value);
                    if(!empty($t)){
                        $email[] = $t->plaintext;
                    }
                }
                if($i == 1000){
                    $myfile = fopen("email_1.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, json_encode($email));
                    fclose($myfile);
                    $email = [];
                }
                if($i == 2000){
                    $myfile = fopen("email_2.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, json_encode($email));
                    fclose($myfile);
                    $email = [];
                }
                if($i == 3000){
                    $myfile = fopen("email_3.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, json_encode($email));
                    fclose($myfile);
                    $email = [];
                }
                if($i == 4000){
                    $myfile = fopen("email_4.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, json_encode($email));
                    fclose($myfile);
                    $email = [];
                }
                if($i == 5000){
                    $myfile = fopen("email_5.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, json_encode($email));
                    fclose($myfile);
                    $email = [];
                }
                if($i == 6000){
                    $myfile = fopen("email_6.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, json_encode($email));
                    fclose($myfile);
                    $email = [];
                }
                if($i == 7000){
                    $myfile = fopen("email_7.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, json_encode($email));
                    fclose($myfile);
                    $email = [];
                }
                if($i == 8000){
                    $myfile = fopen("email_8.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, json_encode($email));
                    fclose($myfile);
                    $email = [];
                }
                if($i == 9000){
                    $myfile = fopen("email_9.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, json_encode($email));
                    fclose($myfile);
                    $email = [];
                }
                if($i == 10000){
                    $myfile = fopen("email_10.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, json_encode($email));
                    fclose($myfile);
                    $email = [];
                }
                if($i == 11000){
                    $myfile = fopen("email_11.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, json_encode($email));
                    fclose($myfile);
                    $email = [];
                }
                if($i == 12000){
                    $myfile = fopen("email_12.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, json_encode($email));
                    fclose($myfile);
                    $email = [];
                }
                if($i == 13000){
                    $myfile = fopen("email_13.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, json_encode($email));
                    fclose($myfile);
                    $email = [];
                }
                if($i == 14000){
                    $myfile = fopen("email_14.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, json_encode($email));
                    fclose($myfile);
                    $email = [];
                }
                if($i == 15000){
                    $myfile = fopen("email_1.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, json_encode($email));
                    fclose($myfile);
                    $email = [];
                }
                if($i == $maxPage){
                    $myfile = fopen("email_2.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, json_encode($email));
                    fclose($myfile);
                    $email = [];
                }
            }
            dd('done');
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