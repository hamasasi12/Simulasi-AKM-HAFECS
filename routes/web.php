<?php

use App\Http\Controllers\Admin\ExamHistoryController;
use App\Http\Controllers\Admin\userController;
use App\Models\Province;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\IndoRegionController;
use App\Http\Controllers\Admin\JenjangController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Import\ImportSoalSDController;

Route::get('/', function () {
    $provinces = Province::all();
    return view('welcome', [
        'provinces' => $provinces,
    ]);
});

Route::get('/admin', [AuthController::class, 'adminLogin'])->name('admin.login');
Route::get('/loginn', [AuthController::class, 'adminLogin'])->name('login');
Route::get('/login/students', [AuthController::class, 'loginStudents'])->name('login.students');
Route::post('/login/students', [AuthController::class, 'loginStudentsProcess'])->name('login.students.post');

Route::post('/admin/post', [AuthController::class, 'adminLoginProcess'])->name('admin.login.process');

Route::middleware(['guest'])->group(function () {
    Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');

});

Route::middleware(['auth'])->group(function () {
    // Route::get('/students/jenjang/sd/index', [StudentController::class, 'jenjangsdShow'])->name('students.jenjang.sd');
    // Route::get('/students/jenjang/smp/index', [StudentController::class, 'jenjangsmpShow'])->name('students.jenjang.smp');
    // Route::get('/students/jenjang/sma/index', [StudentController::class, 'jenjangsmaShow'])->name('students.jenjang.sma');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::post('/admin/dashboard/logout', [AuthController::class, 'logout'])->name('logout');

    //USER STUDENT
    Route::get('/admin/users/index', [userController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/{id}/show', [userController::class, 'show'])->name('admin.users.show');
    Route::get('/admin/users/{id}/edit', [userController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{id}/update', [userController::class, 'update'])->name('admin.users.update');
    Route::get('/admin/users/create', [userController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users/store', [userController::class, 'store'])->name('admin.users.store');
    Route::delete('/admin/users/{id}/delete', [userController::class, 'delete'])->name('admin.users.delete');

    // EXAM HISTORY
    Route::get('/admin/exam/index', [ExamHistoryController::class, 'index'])->name('admin.exam.index');
    Route::get('/admin/exam/create', [ExamHistoryController::class, 'create'])->name('admin.exam.create');
    Route::get('/admin/exam/{id}/edit', [ExamHistoryController::class, 'edit'])->name('admin.exam.edit');
    Route::get('/admin/exam/{id}/show', [ExamHistoryController::class, 'show'])->name('admin.exam.show');
    Route::post('/admin/exam/store', [ExamHistoryController::class, 'store'])->name('admin.exam.store');

    // JENJANG SD
    Route::get('/admin/dashboard/jenjang/sd/index', [JenjangController::class, 'indexJenjangSD'])->name('admin.dashboard.jenjang.sd.index');
    Route::get('/admin/dashboard/jenjang/sd/create', [JenjangController::class, 'createJenjangSD'])->name('admin.dashboard.jenjang.sd.create');
    Route::get('/admin/dashboard/jenjang/sd/{id}/edit', [JenjangController::class, 'editJenjangSD'])->name('admin.dashboard.jenjang.sd.edit');
    Route::get('/admin/dashboard/jenjang/sd/{id}/show', [JenjangController::class, 'showJenjangSD'])->name('admin.dashboard.jenjang.sd.show');
    Route::post('/admin/dashboard/jenjang/sd/store', [JenjangController::class, 'storeJenjangSD'])->name('admin.dashboard.jenjang.sd.store');
    Route::put('/admin/dashboard/jenjang/sd/{id}/update', [JenjangController::class, 'updateJenjangSD'])->name('admin.dashboard.jenjang.sd.update');
    Route::delete('/admin/dashboard/jenjang/sd/{id}/delete', [JenjangController::class, 'deleteJenjangSD'])->name('admin.dashboard.jenjang.sd.delete');

    // JENJANG SMP
    Route::get('/admin/dashboard/jenjang/smp/index', [JenjangController::class, 'indexJenjangSMP'])->name('admin.dashboard.jenjang.smp.index');
    Route::get('/admin/dashboard/jenjang/smp/create', [JenjangController::class, 'createJenjangSMP'])->name('admin.dashboard.jenjang.smp.create');
    Route::get('/admin/dashboard/jenjang/smp/{id}/show', [JenjangController::class, 'showJenjangSMP'])->name('admin.dashboard.jenjang.smp.show');
    Route::post('/admin/dashboard/jenjang/smp/store', [JenjangController::class, 'storeJenjangSMP'])->name('admin.dashboard.jenjang.smp.store');
    Route::get('/admin/dashboard/jenjang/smp/{id}/edit', [JenjangController::class, 'editJenjangSMP'])->name('admin.dashboard.jenjang.smp.edit');
    Route::put('/admin/dashboard/jenjang/smp/{id}/update', [JenjangController::class, 'updateJenjangSMP'])->name('admin.dashboard.jenjang.smp.update');
    Route::delete('/admin/dashboard/jenjang/smp/{id}/delete', [JenjangController::class, 'deleteJenjangSD'])->name('admin.dashboard.jenjang.smp.delete');

    // JENJANG SMA
    Route::get('/admin/dashboard/jenjang/sma/index', [JenjangController::class, 'indexJenjangSMA'])->name('admin.dashboard.jenjang.sma.index');
    Route::get('/admin/dashboard/jenjang/sma/create', [JenjangController::class, 'createJenjangSMA'])->name('admin.dashboard.jenjang.sma.create');
    Route::get('/admin/dashboard/jenjang/sma/{id}/edit', [JenjangController::class, 'editJenjangSMA'])->name('admin.dashboard.jenjang.sma.edit');
    Route::get('/admin/dashboard/jenjang/sma/{id}/show', [JenjangController::class, 'showJenjangSMA'])->name('admin.dashboard.jenjang.sma.show');
    Route::post('/admin/dashboard/jenjang/sma/store', [JenjangController::class, 'storeJenjangSMA'])->name('admin.dashboard.jenjang.sma.store');
    Route::delete('/admin/dashboard/jenjang/sma/{id}/delete', [JenjangController::class, 'deleteJenjangSMA'])->name('admin.dashboard.jenjang.sma.delete');

    Route::post('/admin/dashboard/jenjang/sd/import', [ImportSoalSDController::class, 'import'])->name('admin.dashboard.jenjang.sd.import');

    Route::get('/students/index', [StudentController::class, 'index'])->name('students.jenjang.index');
    Route::get('/students/history/index', [StudentController::class, 'historyTest'])->name('students.jenjang.history.index');

    Route::prefix('exams')->name('exams.')->group(function () {
        Route::get('/', [ExamController::class, 'index'])->name('index');
        Route::post('/start', [ExamController::class, 'start'])->name('start');
        Route::get('/{exam}/continue', [ExamController::class, 'continue'])->name('continue');
        Route::get('/{exam}', [ExamController::class, 'show'])->name('show');
        Route::post('/{exam}/answer', [ExamController::class, 'answer'])->name('answer');
        Route::post('/{exam}/finish', [ExamController::class, 'finish'])->name('finish');
        Route::get('/{exam}/result', [ExamController::class, 'result'])->name('result');
        // Route::get('/instruction', [ExamController::class, 'instruction'])->name('instruction');
        // Route::get('/instruction', [ExamController::class, 'instruction'])->name('instruction');
    });

    // Profile student
    Route::get('/students/profile/{id}/index', [StudentController::class, 'indexProfile'])->name('students.profile.index');
    Route::put('/students/profile/post', [StudentController::class, 'updateProfile'])->name('students.profile.update');


    
});

Route::get('/regencies/{provinceId}', [IndoRegionController::class, 'getRegencies']);
Route::get('/districts/{regencyId}', [IndoRegionController::class, 'getDistricts']);
Route::get('/villages/{districtId}', [IndoRegionController::class, 'getVillages']);

Route::get('/instruction/{id}', [ExamController::class, 'instruction'])->name('instruction');



