<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\User;
use App\UserEpisode;
use App\Episode;
use App\Film;

class AdminController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        $films = \DB::table('films'); //Film::get(['name', 'short_description']);
        $grid = \DataGrid::source($films);
        $nameOfFilm = "Nguoi Phan Xu";
        $grid->add('id', 'ID', true);
        $grid->add('name', 'Name');
        $grid->add('short_description', 'Short description');
        $grid->paginate(10);

        return view('admin.index', compact('grid', 'nameOfFilm'));
    }

    public function manageFilm($id) {
        $episodes = \DB::table('episodes')->where('film_id', $id);
        $nameOfFilm = Film::find($id)->name;
        $grid = \DataGrid::source($episodes);
        $grid->add('id', 'ID', true);
        $grid->add('name', 'Name');
        $grid->add('video_id', 'Video Id');
        $grid->add('short_description', 'Short description');
        $grid->add('created_at', 'Created at');
        $grid->edit('/admin/edit-episode', 'Edit', 'show|modify');
        $grid->link("/admin/new-episode?film_id=$id", "New Article", "TR");
        $grid->paginate(10);

        return view('admin.film.manage_film', compact('grid', 'nameOfFilm'));
    }

    public function editEpisode() {
        $id = Input::get('modify');
        $episodes = Episode::find($id);
        $form = \DataForm::source($episodes);
        $form->add('name', 'Name', 'text')->rule('required');
        $form->add('video_id', 'Video id', 'text')->rule('required');
        $form->add('long_description', 'Long description', 'redactor')->rule('required');
        $form->add('short_description', 'Short description', 'redactor')->rule('required');
//        $form->add('photo', 'Photo', 'image')->move('uploads/demo/')->fit(240, 160)->preview(120, 80);
        $form->submit('Save');
        $form->saved(function () use ($episodes, $form) {
            $form->message("ok record saved");
            $form->link("/admin/manage-film/$episodes->film_id", "back to manage page");
        });
        $form->build();
        return $form->view('admin.film.edit_episode', compact('form'));
    }

    public function newEpisode() {
        $filmId = Input::get('film_id');
        $episodes = new Episode();
        $form = \DataForm::source($episodes);
        $form->add('name', 'Name', 'text')->rule('required');
        $form->add('video_id', 'Video id', 'text')->rule('required');
        $form->add('film_id', 'Film id', 'text')->rule('required');
        $form->set('film_id', $filmId);
        $form->add('logo', 'Logo', 'text')->rule('required');
        $form->set('logo', 'default');
        $form->add('long_description', 'Long description', 'redactor')->rule('required');
        $form->add('short_description', 'Short description', 'redactor')->rule('required');
//        $form->add('photo', 'Photo', 'image')->move('uploads/demo/')->fit(240, 160)->preview(120, 80);
        $form->submit('Save');
        $form->saved(function () use ($episodes, $form) {
            $form->message("ok record saved");
            $form->link("/admin/manage-film/$episodes->film_id", "back to manage page");
        });
        $form->build();
        return $form->view('admin.film.edit_episode', compact('form'));
    }

}
