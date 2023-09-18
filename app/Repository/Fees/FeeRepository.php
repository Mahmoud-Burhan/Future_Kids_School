<?php


namespace App\Repository\Fees;


use App\Models\Classroom;
use App\Models\Fees;
use App\Models\FeesType;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;

class FeeRepository implements FeeRepositoryInterface
{
    public function index()
    {
        $fees = Fees::all();
        return view('pages.accounts.fees.index', compact('fees'));
    }

    public function create()
    {
        $grades = Grade::all();
        $fee_types = FeesType::all();
        return view('pages.accounts.fees.create', compact('grades', 'fee_types'));
    }

    public function getClassroom($id)
    {
        $classroom = Classroom::where('grade_id', $id)->pluck('class_name', 'id');
        return $classroom;

    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $fees = new Fees();
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->fee_type = $request->fee_type;
            $fees->grade_id = $request->grade_id;
            $fees->classroom_id = $request->classroom_id;
            $fees->amount = $request->amount;
            $fees->vat = $request->vat;
            $fees->total = (($request->amount/100)*$request->vat) +$request->amount;
            $fees->academic_year = $request->academic_year;
            $fees->description = $request->description;
            $fees->save();
            DB::commit();
            toastr()->success('messages.Success');
            return redirect()->route('Fees.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('Fees.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function edit($id)
    {
        $fees = Fees::findorfail($id);
        $grades = Grade::all();
        $fee_types = FeesType::all();
        return view('pages.accounts.fees.edit', compact('fees','grades', 'fee_types'));
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        try
        {
            $fees = Fees::findorfail($request->id);
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->fee_type = $request->fee_type;
            $fees->grade_id = $request->grade_id;
            $fees->classroom_id = $request->classroom_id;
            $fees->amount = $request->amount;
            $fees->vat = $request->vat;
            $fees->total = (($request->amount/100)*$request->vat) +$request->amount;
            $fees->academic_year = $request->academic_year;
            $fees->description = $request->description;
            $fees->save();
            DB::commit();
            toastr()->success('messages.Update');
            return redirect()->route('Fees.index');
        }
        catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('Fees.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function destroy($id, $request)
    {
        DB::beginTransaction();
        try
        {
            $fees = Fees::findorfail($request->id)->delete();
            DB::commit();
            toastr()->success('messages.Delete');
            return redirect()->route('Fees.index');
        }
        catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('Fees.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }


}