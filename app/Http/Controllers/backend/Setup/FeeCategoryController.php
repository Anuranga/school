<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use App\Models\StudentYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function ViewFeeCat(){
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_cat', $data);
    }

    public function FeeCatAdd(){
        return view('backend.setup.fee_category.add_fee_cat');
    }

    public function FeeCatStore(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required | unique:fee_categories'
        ]);

        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.category.view')->with($notification);
    }

    public function FeeCatEdit($id){
        $editData = FeeCategory::find($id);

        return view('backend.setup.fee_category.edit_fee_cat', compact('editData'));
    }

    public function FeeCatUpdate(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $data = FeeCategory::find($id);

        $validatedData = $request->validate([
            'name' => 'required | unique:fee_categories'
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.category.view')->with($notification);
    }

    public function FeeCatDelete($id): \Illuminate\Http\RedirectResponse
    {
        $data = FeeCategory::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Fee Category Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('fee.category.view')->with($notification);
    }
}
