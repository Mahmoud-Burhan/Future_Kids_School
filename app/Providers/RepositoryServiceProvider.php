<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repository\Grade\GradeRepositoryInterface','App\Repository\Grade\GradeRepository');
        $this->app->bind('App\Repository\Classroom\ClassroomRepositoryInterface','App\Repository\Classroom\ClassroomRepository');
        $this->app->bind('App\Repository\Section\SectionRepositoryInterface','App\Repository\Section\SectionRepository');
        $this->app->bind('App\Repository\Teacher\TeacherRepositoryInterface','App\Repository\Teacher\TeacherRepository');
        $this->app->bind('App\Repository\Student\StudentRepositoryInterface','App\Repository\Student\StudentRepository');
        $this->app->bind('App\Repository\StudentPromotion\StudentPromotionRepositoryInterface','App\Repository\StudentPromotion\StudentPromotionRepository');
        $this->app->bind('App\Repository\StudentGraduate\StudentGraduateRepositoryInterface','App\Repository\StudentGraduate\StudentGraduateRepository');
        $this->app->bind('App\Repository\Fees\FeeRepositoryInterface','App\Repository\Fees\FeeRepository');
        $this->app->bind('App\Repository\FeesInvoice\FeesInvoiceRepositoryInterface','App\Repository\FeesInvoice\FeesInvoiceRepository');
        $this->app->bind('App\Repository\ReceiptStudent\ReceiptStudentRepositoryInterface','App\Repository\ReceiptStudent\ReceiptStudentRepository');
        $this->app->bind('App\Repository\ProcessingFee\ProcessingFeeRepositoryInterface','App\Repository\ProcessingFee\ProcessingFeeRepository');
        $this->app->bind('App\Repository\PaymentFee\PaymentFeeRepositoryInterface','App\Repository\PaymentFee\PaymentFeeRepository');
        $this->app->bind('App\Repository\StudentAttendance\StudentAttendanceRepositoryInterface','App\Repository\StudentAttendance\StudentAttendanceRepository');
        $this->app->bind('App\Repository\Subject\SubjectRepositoryInterface','App\Repository\Subject\SubjectRepository');
        $this->app->bind('App\Repository\Quizzes\QuizRepositoryInterface','App\Repository\Quizzes\QuizRepository');
        $this->app->bind('App\Repository\Question\QuestionRepositoryInterface','App\Repository\Question\QuestionRepository');
        $this->app->bind('App\Repository\OnlineClasses\OnlineClassesRepositoryInterface','App\Repository\OnlineClasses\OnlineClassesRepository');
        $this->app->bind('App\Repository\Library\LibraryRepositoryInterface','App\Repository\Library\LibraryRepository');
        $this->app->bind('App\Repository\Setting\SettingRepositoryInterface','App\Repository\Setting\SettingRepository');
        $this->app->bind('App\Repository\Calendar\FullCalendarRepositoryInterface','App\Repository\Calendar\FullCalendarRepository');
    }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
