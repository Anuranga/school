<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function ViewGroup(){
        $data['allData'] = StudentShift::all();
        return view('backend.setup.group.view_shift', $data);
    }

    public function StudentGroupAdd(){
        return view('backend.setup.group.add_shift');
    }

    public function StudentGroupStore(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required | unique:student_shifts'
        ]);

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentGroupEdit($id){
        $editData = StudentShift::find($id);

        return view('backend.setup.shift.edit_shift', compact('editData'));
    }

    public function StudentGroupUpdate(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $data = StudentShift::find($id);

        $validatedData = $request->validate([
            'name' => 'required | unique:student_shifts'
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentGroupDelete($id): \Illuminate\Http\RedirectResponse
    {
        $data = StudentShift::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Student Shift Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }
}
