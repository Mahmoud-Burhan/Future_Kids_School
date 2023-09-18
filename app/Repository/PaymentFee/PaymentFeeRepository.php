<?php


namespace App\Repository\PaymentFee;


use App\Models\FundAccount;
use App\Models\PaymentFee;
use App\Models\Student;
use App\Models\StudentAccount;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PaymentFeeRepository implements PaymentFeeRepositoryInterface
{
    public function index()
    {
        $data['payments'] = PaymentFee::all();
        return view('pages.Accounts.Payment_Fee.index',$data);
    }


    public function show($id)
    {
        $data['students'] = Student::findorfail($id);
        $data['debit'] = StudentAccount::findorfail($id)->sum('debit');
        $data['credit'] = StudentAccount::findorfail($id)->sum('credit');
        return view('pages.Accounts.Payment_Fee.show',$data);
    }

    public function store($request)
    {
        DB::beginTransaction();
       try
       {
           $payment = new PaymentFee();
           $payment->date = Carbon::now();
           $payment->student_id = $request->student_id;
           $payment->debit = $request->debit;
           $payment->description = $request->description;
           $payment->save();

           $account = new StudentAccount();
           $account->date =Carbon::now();
           $account->type = 'Payment Fee';
           $account->student_id = $request->student_id;
           $account->payment_id = $payment->id;
           $account->debit = $request->debit;
           $account->description = $request->description;
           $account->save();

           $fund = new FundAccount();
           $fund->date = Carbon::now();
           $fund->payment_id = $payment->id;
           $fund->credit = $request->debit;
           $fund->description = $request->description;
           $fund->save();
           DB::commit();
           toastr()->success('messages.Success');
           return redirect()->route('PaymentFee.index');
       }
       catch (\Exception $ex)
       {
           DB::rollBack();
           return redirect()->route('PaymentFee.index')->withErrors(['error'=>$ex->getMessage()]);
       }
    }

    public function edit($id)
    {
        $data['payments'] = PaymentFee::findorfail($id);
        return view('pages.Accounts.Payment_Fee.edit',$data);
    }

    public function update($request, $id)
    {

        DB::beginTransaction();
        try
        {
            $payment = PaymentFee::findorfail($request->payment_id);
            $payment->debit = $request->debit;
            $payment->description = $request->description;
            $payment->save();

            $account = StudentAccount::where('payment_id',$request->payment_id)->first();
            $account->debit = $request->debit;
            $account->description = $request->description;
            $account->save();

            $fund = FundAccount::where('payment_id',$request->payment_id)->first();
            $fund->credit = $request->debit;
            $fund->description = $request->description;
            $fund->save();
            DB::commit();
            toastr()->success('messages.Update');
            return redirect()->route('PaymentFee.index');
        }
        catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('PaymentFee.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function destroy($request, $id)
    {
        try
        {
            $payment = PaymentFee::findorfail($request->id)->delete();
            toastr()->success('messages.Delete');
            return redirect()->route('PaymentFee.index');
        }
        catch (\Exception $ex)
        {
            return redirect()->route('PaymentFee.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }
}