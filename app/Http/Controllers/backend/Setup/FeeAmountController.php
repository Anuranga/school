<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    public function ViewFeeAmount(){
        //$data['allData'] = FeeCategoryAmount::all();
        $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_fee_amount', $data);
    }

    public function FeeAmountAdd(){
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount', $data);
    }

    public function FeeAmountStore(Request $request): \Illuminate\Http\RedirectResponse
    {
        $countClass = count($request->class_id);
        if($countClass != null){
            for($i=0; $i < $countClass; $i++){
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        }
        /*$validatedData = $request->validate([
            'name' => 'required | unique:fee_categories'
        ]);*/

        $notification = array(
            'message' => 'Fee Amount Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.amount.view')->with($notification);
    }

    public function FeeAmountEdit($id){
        $editData = FeeCategoryAmount::find($id);

        return view('backend.setup.fee_amount.edit_fee_amount', compact('editData'));
    }

    public function FeeAmountUpdate(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $data = FeeCategoryAmount::find($id);

        $validatedData = $request->validate([
            'name' => 'required | unique:fee_categories'
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Amount Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.amount.view')->with($notification);
    }

    public function FeeAmountDelete($id): \Illuminate\Http\RedirectResponse
    {
        $data = FeeCategoryAmount::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Fee Amount Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('fee.amount.view')->with($notification);
    }
}
