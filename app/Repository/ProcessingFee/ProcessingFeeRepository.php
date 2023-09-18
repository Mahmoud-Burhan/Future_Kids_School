<?php


namespace App\Repository\ProcessingFee;


use App\Models\FundAccount;
use App\Models\ProcessingFee;
use App\Models\Student;
use App\Models\StudentAccount;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class ProcessingFeeRepository implements ProcessingFeeRepositoryInterface
{
    public function index()
    {
        $processing = ProcessingFee::all();
        return view('pages.Accounts.Processing_Fee.index',compact('processing'));
    }

    public function show($id)
    {
        $data['students'] = Student::findorfail($id);
        $data['debit'] = StudentAccount::where('student_id',$id)->sum('debit');
        $data['credit'] = StudentAccount::where('student_id',$id)->sum('credit');
        return view('pages.Accounts.Processing_Fee.show',$data);
    }

    public function store($request)
    {
        DB::beginTransaction();
      try
      {
          $processing = new ProcessingFee();
          $processing->date = Carbon::now();
          $processing->student_id = $request->student_id;
          $processing->debit = $request->debit;
          $processing->description = $request->description;
          $processing->save();

          $student_account = new StudentAccount();
          $student_account->date = Carbon::now();
          $student_account->type = 'Processing Fee';
          $student_account->student_id = $request->student_id;
          $student_account->processing_id = $processing->id;
          $student_account->credit = $request->debit;
          $student_account->description = $request->description;
          $student_account->save();


         DB::commit();
         toastr()->success('messages.Success');
         return redirect()->route('ProcessingFee.index');
      }
      catch (\Exception $ex)
      {

          DB::rollBack();
          return redirect()->route('ProcessingFee.index')->withErrors(['error'=>$ex->getMessage()]);
      }
    }

    public function edit($id)
    {
        try
        {
            $processing = ProcessingFee::findorfail($id);
            return view('pages.Accounts.Processing_Fee.edit',compact('processing'));
        }
        catch (\Exception $ex)
        {
            return $ex;
            DB::rollBack();
            return redirect()->route('ProcessingFee.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try
        {
            $processing = ProcessingFee::findorfail($request->id);
            $processing->debit = $request->debit;
            $processing->description = $request->description;
            $processing->save();

            $student_account = StudentAccount::where('processing_id',$request->id)->first();
            $student_account->credit = $request->debit;
            $student_account->description = $request->description;
            $student_account->save();
            DB::commit();
            toastr()->success('messages.Update');
            return redirect()->route('ProcessingFee.index');
        }
        catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('ProcessingFee.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function destroy($request, $id)
    {
        try
        {
            $processing = ProcessingFee::findorfail($request->id)->delete();
            toastr()->success('messages.Delete');
            return redirect()->route('ProcessingFee.index');
        }
        catch (\Exception $ex)
        {
            return redirect()->route('ProcessingFee.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

}