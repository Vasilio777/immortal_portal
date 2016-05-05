<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Guide;
use App\Http\Requests;

class GuidesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $file = $request->file('userfile');
        $filename = $file->getClientOriginalName();
        $addRec = new Guide();
        $addRec->idaddlec = $request->lid;
        $addRec->addtitle = $filename;
        $addRec->save();
        $lection = Course::findOrFail($request->cid)->ctitle;
        $file->move('gruntFiles/'.$lection.'/addmats', mb_convert_encoding($filename, 'Windows-1251'));

        return back();
    }
    public function destroy(Request $request)
    {
        $abc = $request->get('name', -1);
        $delrec = Guide::findorFail($request->id);
        $delrec->delete();
        $lection = Course::findOrFail($request->cid)->ctitle;
        $path = public_path().'/gruntFiles/'.$lection.'/addmats/'.(mb_convert_encoding($abc, 'Windows-1251'));

        if (file_exists($path))  {
            \File::delete($path);
        }

        return back();
    }
}
