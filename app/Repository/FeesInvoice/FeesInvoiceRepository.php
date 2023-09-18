<?php


namespace App\Repository\FeesInvoice;


use App\Models\FeeInvoice;
use App\Models\Fees;
use App\Models\FeesType;
use App\Models\Student;
use App\Models\StudentAccount;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FeesInvoiceRepository implements FeesInvoiceRepositoryInterface
{
    public function index()
    {
        $fees_invoice = FeeInvoice::all();
        return view('pages.Accounts.Fees_Invoices.index', compact('fees_invoice'));
    }

    public function show($id)
    {
        $students = Student::where('id', $id)->first();
        $fees = Fees::all();
        $fee_types = FeesType::all();
        return view('pages.Accounts.Fees_Invoices.show', compact('students', 'fees', 'fee_types'));
    }

    public function getAmount($id)
    {
        $amount = Fees::where('fee_type', $id)->pluck('amount');
        return $amount;
    }

    public function store($request)
    {
        $ListFees = $request->ListFees;
        DB::beginTransaction();
        try {
            foreach ($ListFees as $listFee) {
                $fees_invoice = new FeeInvoice();
                $fees_invoice->invoice_date = Carbon::now();
                $fees_invoice->student_id = $listFee['student_id'];
                $fees_invoice->grade_id = $request->grade_id;
                $fees_invoice->classroom_id = $request->classroom_id;
                $fees_invoice->fee_type = $listFee['fee_type'];
                $fees_invoice->total = $listFee['total'];
                $fees_invoice->description = $listFee['description'];
                $fees_invoice->save();

                //Student Account

                $account = new StudentAccount();
                $account->date = Carbon::now();
                $account->type = 'Fee Invoice';
                $account->student_id = $listFee['student_id'];
                $account->fee_invoice_id = $fees_invoice->id;
                $account->debit = $listFee['total'];
                $account->description = $listFee['description'];
                $account->save();
            }


            DB::commit();
            toastr()->success('messages.Success');
            return redirect()->route('FeesInvoice.index');
            return redirect()->back();
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('FeesInvoice.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $invoices = FeeInvoice::where('id', $id)->first();
            $fees = Fees::all();
            $fee_types = FeesType::all();
            return view('pages.Accounts.Fees_Invoices.edit', compact('invoices', 'fees', 'fee_types'));


        } catch (\Exception $ex) {
            return redirect()->route('FeeInvoice.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {

            $fees_invoice = FeeInvoice::findorfail($request->invoice_id);
            $fees_invoice->fee_type = $request->fee_type;
            $fees_invoice->total = $request->total;
            $fees_invoice->description = $request->description;
            $fees_invoice->save();

            //Student Account
            $account = StudentAccount::where('fee_invoice_id', $request->invoice_id)->first();
            $account->debit = $request->total;
            $account->description = $request->description;
            $account->save();
            DB::commit();
            toastr()->success('messages.Update');
            return redirect()->route('FeesInvoice.index');
        } catch (\Exception $ex) {
            return $ex;
            DB::rollBack();
            return redirect()->route('FeesInvoice.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function destroy($request, $id)
    {
        $invoice = FeeInvoice::findorfail($request->id)->delete();
        toastr()->success('messages.Delete');
        return redirect()->route('FeesInvoice.index');
    }
}