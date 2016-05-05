<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Http\Requests;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $lections = \Auth::user()->coursesLiked;
        $arr = explode(', ', $lections);

        $data = [
            'usaName' =>  \Auth::user()->name,
            'courses' =>  Course::all(),
            'usachek' => \Auth::user()->isPrepod,
            'coursesLiked' => Course::whereIn('id', $arr)->get(),
            'section' => 'Курсы'
        ];

        return view('new_app.index', $data);
//        return view('courses', $data);
    }
    public function create()
    {
        $data = [
            'usaName' => \Auth::user()->name,
            'courses' => Course::all(),
            'usachek' => \Auth::user()->isPrepod,
            'section' => 'Новый курс'
        ];

        if (\Auth::user()->isPrepod == 2) {
            return view('new_app.new_newcourse', $data);
        } else {
            return \Redirect::action('CoursesController@index');
        }
    }
    public function store(Request $request)
    {
        $new = new Course();
        $new->ctitle = $request->ctitle;
        $new->cdesc = $request->cdesc;
        $new->requirements = $request->requirements;
        $new->forWhom = $request->forWhom;
        $new->image = $request->logofile;
        //$new->toggleLiked = 'star_silver.png';
        $new->save();
        $id = $new->id;
        try {
            mkdir(public_path() . '/gruntFiles/' . $request->ctitle);
            mkdir(public_path() . '/gruntFiles/' . $request->ctitle . '/videos');
            mkdir(public_path() . '/gruntFiles/' . $request->ctitle . '/homework');
            mkdir(public_path() . '/gruntFiles/' . $request->ctitle . '/addmats');
            rename(public_path() . '/images/icon/' . $request->logofile, public_path() . '/gruntFiles/' . $request->ctitle . '/' . $request->logofile);
        } catch (\ErrorException $e) {

        }

        return \Redirect::to('course'.$id.'/lections');
    }

    public function show($id)
    {
        $data = [
            'usaName' =>  \Auth::user()->name,
            'chosencourse' => Course::findorFail($id),
            'section' => 'Редактирование курса',
        ];

        if (\Auth::user()->isPrepod == 2) {
            return view('new_app.new_changeCourse', $data);
//            return view('changeCourse', $data);
        } else {
            return \Redirect::action('CoursesController@index');
        }
    }
    public function showGrade()
    {
        $lections = \Auth::user()->coursesLiked;
        $arr = explode(', ', $lections);

        $data = [
            'usaName' =>  \Auth::user()->name,
            'coursesLiked' => Course::whereIn('id', $arr)->get(),
            'section' => 'Избранное'
        ];

        return view('new_app.new_grade', $data);
    }
    public function addLogo()
    {
        $filename = $_FILES['logofile']['name'];
        $uploaddir = public_path().'/images/icon/';
        $whitelist = [".jpg", ".jpeg", ".png", ".gif"];
        foreach ($whitelist as $item) {
            if(preg_match("/$item\$/i", $_FILES['logofile']['name'])) {
                move_uploaded_file($_FILES['logofile']['tmp_name'], $uploaddir.basename(mb_convert_encoding($filename, 'utf-8')));
            }
        }
    }

    public function edit($id, Request $request)
    {
        $changeCourse = Course::findorFail($id);
        rename(public_path() . '/gruntFiles/' . $changeCourse->ctitle, public_path() . '/gruntFiles/' . $request->ctitle);
        $changeCourse->ctitle = $request->ctitle;
        $changeCourse->cdesc = $request->get('cdesc', -1);
        $changeCourse->requirements = $request->get('requirements', -1);
        $changeCourse->forWhom = $request->get('forWhom', -1);
        if ($request->get('logofile', -1) != "") {
            rename(public_path() . '/images/icon/' . $request->logofile, public_path() . '/gruntFiles/' . $request->ctitle . '/' . $request->logofile);
            $changeCourse->image = $request->get('logofile', -1);
        }
        $changeCourse->save();

        return \Redirect::to('course'.$id.'/lections');
    }

    public function toggleLiked(Request $request)
    {
        $id = $request->get('id', -1);
        $lections = \Auth::user()->coursesLiked;
        $arr = explode(', ', $lections);
        $key = array_search($id, $arr, true);

        if ($key === false)
            $arr[] = $id;
        else
            unset($arr[$key]);

        \Auth::user()->coursesLiked = implode(', ', $arr);
        \Auth::user()->save();
    }
    public function destroyLiked(Request $request)
    {
        $id = $request->get('id', -1);

        $lections = \Auth::user()->coursesLiked;
        $arr = explode(', ', $lections);

        $key = array_search($id, $arr);
        if ($key !== false)
            unset($arr[$key]);

        \Auth::user()->coursesLiked = implode(', ', $arr);
        \Auth::user()->save();

        return back();
    }
    public function lol() {
        $data = [
            'usaName' =>  \Auth::user()->name,
            'courses' =>  Course::all(),
            'chosencourse' => Course::findorFail(1),
            'usachek' => \Auth::user()->isPrepod,
            'section' => 'Курсы'
        ];
        return view('changeCourse', $data);
    }
}
