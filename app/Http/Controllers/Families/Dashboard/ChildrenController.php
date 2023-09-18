<?php

namespace App\Http\Controllers\Families\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\degree;
use App\Models\FeeInvoice;
use App\Models\ReceiptStudent;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChildrenController extends Controller
{
    public function index()
    {

        $students = Student::where('family_id', auth()->user()->id)->get();
        return view('pages.families.dashboard.children.index', compact('students'));
    }

    public function results($id)
    {

        $student = Student::findorFail($id);

        if ($student->family_id !== auth()->user()->id) {
            toastr()->error('يوجد خطا في كود الطالب');
            return redirect()->route('sons.index');
        }
        $degrees = degree::where('student_id', $id)->get();

        if ($degrees->isEmpty()) {
            toastr()->error('لا توجد نتائج لهذا الطالب');
            return redirect()->route('sons.index');
        }

        return view('pages.families.dashboard.degrees.index', compact('degrees'));

    }


    public function attendances()
    {
        $students = Student::where('family_id', auth()->user()->id)->get();
        return view('pages.families.dashboard.attendance.index', compact('students'));
    }

    public function attendanceSearch(Request $request)
    {
        $request->validate([
            'from' => 'required|date|date_format:Y-m-d',
            'to' => 'required|date|date_format:Y-m-d|after_or_equal:from'
        ], [
            'to.after_or_equal' => 'تاريخ النهاية لابد ان اكبر من تاريخ البداية او يساويه',
            'from.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
            'to.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
        ]);

        $ids = DB::table('teacher_sections')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();

        if ($request->student_id == 0) {

            $Students = Attendance::whereBetween('attendance_date', [$request->from, $request->to])->get();
            return view('pages.families.dashboard.Attendance.index', compact('Students', 'students'));
        } else {

            $Students = Attendance::whereBetween('attendance_date', [$request->from, $request->to])
                ->where('student_id', $request->student_id)->get();
            return view('pages.families.dashboard.Attendance.index', compact('Students', 'students'));

        }
    }

    public function fees(){
        $students_ids = Student::where('family_id', auth()->user()->id)->pluck('id');
        $Fee_invoices = FeeInvoice::whereIn('student_id',$students_ids)->get();

        return view('pages.families.dashboard.fees.index', compact('Fee_invoices'));

    }

    public function receiptStudent($id){

        $student = Student::findorFail($id);
        if ($student->family_id !== auth()->user()->id) {
            toastr()->error('يوجد خطا في كود الطالب');
            return redirect()->route('sons.fees');
        }

        $receipt_students = ReceiptStudent::where('student_id',$id)->get();

        if ($receipt_students->isEmpty()) {
            toastr()->error('لا توجد مدفوعات لهذا الطالب');
            return redirect()->route('sons.fees');
        }
        return view('pages.families.dashboard.receipt.index', compact('receipt_students'));

    }
}
