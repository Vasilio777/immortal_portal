<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Lection;
use App\Guide;
use App\Message;
use App\Homework;
use App\Http\Requests;

class LectionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
//    public function showAll()
//    {
//        $lections = \Auth::user()->coursesLiked;
//        $arr = explode(', ', $lections);
//
//        $data = [
//            'courses' => Course::all(),
//            'lections' => Lection::all(),
//            'usaName' =>  \Auth::user()->name,
//            'section' => 'Лекции+',
//            'coursesLiked' => Course::whereIn('id', $arr)->get()
//        ];
//
//        return view('new_app.new_lections_all', $data);
//    }
    public function show($id)
    {
        $lections = \Auth::user()->coursesLiked;
        $arr = explode(', ', $lections);

        $data = [
            'hiUsa' => \Auth::user(),
            'chosencourse' => Course::findorFail($id),
            'lections' => Lection::query()->where('idcourse', $id)->get(),
            'usaName' =>  \Auth::user()->name,
            'section' => Course::findorFail($id)->ctitle.' - лекции',
            'coursesection' => 'da',
            'coursesLiked' => Course::whereIn('id', $arr)->get(),
            'isLiked' => in_array($id, $arr)
        ];

        return view('new_app.new_lections', $data);
//        return view('lections', $data);
    }
    public function showOneLection($id, $lid)
    {
        $data = [
            'hiUsa' => \Auth::user(),
            'chosencourse' => Course::findorFail($id),
            'lections' => Lection::query()->where('idcourse', $id)->get(),
            'onelection' => Lection::findOrFail($lid),
            'addmats' => Guide::query()->where('idaddlec', $lid)->get(),
            'usaName' =>  \Auth::user()->name,
            'section' => Course::findorFail($id)->ctitle,

            'messages' => Message::query()->where('messagesOfLection', $lid)->latest()->paginate(10),
            'count' => Message::count(),

            'homeworks' => Homework::query()->where('homeworkOfLection', $lid)->latest()->paginate(10),
            'hcount' => Homework::count(),
        ];

        return view('new_app.new_onelection', $data);
//        return view('onelection', $data);
    }
    public function store(Request $request)
    {
        $file = $request->file('videofile');
        $filename = $file->getClientOriginalName();
        $file_type = substr($filename, strrpos($filename, '.')+1);
        $ltitle = $request->ltitle;
        $newname = $ltitle.'.'.$file_type;
        $lection = Course::findOrFail($request->id)->ctitle;

        $whitelist = [".mp4", ".webm", ".ogv", ".mpeg"];
        foreach ($whitelist as $item) {
            if(preg_match("/$item\$/i", $_FILES['videofile']['name'])) {
                $file->move('gruntFiles/'.$lection.'/videos', mb_convert_encoding($newname, 'Windows-1251'));

                $new = new Lection();
                $new->ltitle = $newname;
                $new->idcourse = $request->id;
                $new->ldesc = $request->ldesc;
                $new->save();

                return back()->with('message', 'Лекция успешно добавлена.');
            }
        }

        return back()->with('message', 'Выберите видеофайл(Поддерживаемые форматы: mp4, webm, ogv, mpeg)');
    }
    public function edit($id, Request $request)
    {
        $newLecDesc = $request->get('comment', -1);
        $desc = Lection::findorFail($id);
        $desc->ldesc = $newLecDesc;
        $desc->save();

        return back();
    }
    public function destroy(Request $request)
    {
        $abc = $request->get('name', -1);
        $delrec = Lection::findorFail($request->id);
        $delrec->delete();
        $lection = Course::findOrFail($request->cid)->ctitle;
        \File::delete(public_path().'/gruntFiles/'.$lection.'/videos/'.(mb_convert_encoding($abc, 'Windows-1251')));

        $lections = \Auth::user()->coursesLiked;
        $arr = explode(', ', $lections);

        return redirect()->action('LectionsController@show', ['id' => $request->cid]);
    }
}
