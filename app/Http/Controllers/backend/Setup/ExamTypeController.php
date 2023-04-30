<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\FeeCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function ViewExamType(){
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type', $data);
    }

    public function ExamTypeAdd(){
        return view('backend.setup.exam_type.add_exam_type');
    }

    public function ExamTypeStore(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required | unique:exam_types'
        ]);

        $data = new ExamType();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Type Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('exam.type.view')->with($notification);
    }

    public function ExamTypeEdit($id){
        $editData = ExamType::find($id);

        return view('backend.setup.exam_type.edit_exam_type', compact('editData'));
    }

    public function ExamTypeUpdate(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $data = ExamType::find($id);

        $validatedData = $request->validate([
            'name' => 'required | unique:exam_types'
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Type Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('exam.type.view')->with($notification);
    }

    public function ExamTypeDelete($id): \Illuminate\Http\RedirectResponse
    {
        $data = ExamType::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Exam Type Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('exam.type.view')->with($notification);
    }
}
