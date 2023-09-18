<?php


namespace App\Repository\ReceiptStudent;


use App\Models\FundAccount;
use App\Models\PaymentType;
use App\Models\ReceiptStudent;
use App\Models\Student;
use App\Models\StudentAccount;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReceiptStudentRepository implements ReceiptStudentRepositoryInterface
{
    public function index()
    {
        $receipts = ReceiptStudent::all();
        return view('pages.Accounts.Receipt.index',compact('receipts'));
    }

    public function show($id)
    {
        $accounts = Student::findorfail($id);
        $payments = PaymentType::all();
        $debits = StudentAccount::where('student_id',$id)->sum('debit');
        $credits = StudentAccount::where('student_id',$id)->sum('credit');
        return view('pages.Accounts.Receipt.create',compact('accounts','payments','debits','credits'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try
        {
            $receipt = new ReceiptStudent();
            $receipt->date = Carbon::now();
            $receipt->student_id = $request->student_id;
            $receipt->payment_type = $request->payment_type;
            $receipt->debit = $request->debit;
            $receipt->description = $request->description;
            $receipt->save();

            $fund_account = new FundAccount();
            $fund_account->date = Carbon::now();
            $fund_account->receipt_id = $receipt->id;
            $fund_account->debit = $request->debit;
            $fund_account->description = $request->description;
            $fund_account->save();


            $student_account = new StudentAccount();
            $student_account->date = Carbon::now();
            $student_account->type = 'Receipt';
            $student_account->student_id = $request->student_id;
            $student_account->receipt_id = $receipt->id;
            $student_account->credit = $request->debit;
            $student_account->description = $request->description;
            $student_account->save();

            DB::commit();
            toastr()->success('messages.Success');
            return redirect()->route('ReceiptStudent.index');
        }
        catch(\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('ReceiptStudent.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function edit($id)
    {
        try
        {
            $receipt = ReceiptStudent::findorfail($id);
            $collections['payments'] = PaymentType::all();
            return view('pages.Accounts.Receipt.edit', $collections,compact('receipt'));
        }
    catch(\Exception $ex)
        {
            return $ex;
            return redirect()->route('ReceiptStudent.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try
        {
            $receipt = ReceiptStudent::findorfail($request->receipt_id);
            $receipt->payment_type = $request->payment_type;
            $receipt->debit = $request->debit;
            $receipt->description = $request->description;
            $receipt->save();

            $fund_account = FundAccount::where('receipt_id',$request->receipt_id)->first();
            $fund_account->debit = $request->debit;
            $fund_account->description = $request->description;
            $fund_account->save();


            $student_account = StudentAccount::where('receipt_id',$request->receipt_id)->first();
            $student_account->credit = $request->debit;
            $student_account->description = $request->description;
            $student_account->save();

            DB::commit();
            toastr()->success('messages.Update');
            return redirect()->route('ReceiptStudent.index');
        }
        catch(\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('ReceiptStudent.show')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function destroy($request)
    {
        DB::beginTransaction();
        try
        {
            $receipt = ReceiptStudent::findorfail($request->id)->delete();

            DB::commit();
            toastr()->success('messages.Delete');
            return redirect()->route('ReceiptStudent.index');
        }
        catch(\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('ReceiptStudent.show')->withErrors(['error'=>$ex->getMessage()]);
        }
    }
}