<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Homework;
use App\Http\Requests;

class HomeworkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $file = $request->file('homeworkfile');
        $username = \Auth::user()->name;
        $lection = Course::findOrFail($request->cid)->ctitle;

        $homework = new Homework();
        $homework->name = $username;
        $homework->homeworkOfLection = $request->get('id');

        $filename = $file->getClientOriginalName();
        $newfilename = $username.'_'.$filename;
        $homework->homeworkfile = $newfilename;
        $file->move('gruntFiles/'.$lection.'/homework', mb_convert_encoding($newfilename, 'Windows-1251'));

        $homework->save();

//        $file_type = substr($filename, strrpos($filename, '.')+1);
//        $ltitle = $request->ltitle;
//        $newname = $ltitle.'.'.$file_type;

//        $whitelist = [".mp4", ".webm", ".ogv", ".mpeg"];
//        foreach ($whitelist as $item) {
//            if(preg_match("/$item\$/i", $_FILES['videofile']['name'])) {

        return back();
//            }
//        }
//        return back();
    }
}
