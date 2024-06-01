<?php

use Illuminate\Support\Facades\Route;
use App\Models\Staff;
use App\Http\Controllers\StaffController;

Route::get('/staff', [StaffController::class, 'index'])->name('staffs.index');
Route::post('/staff', [StaffController::class, 'store'])->name('staffs.store');
Route::get('/staff/delete/{id}', [StaffController::class, 'delete'])->name('staff.delete');
Route::get('/staff/edit/{id}', [StaffController::class, 'edit'])->name('staff.edit');
Route::post('/staff/update/{id}', [StaffController::class, 'update'])->name('staff.update');
Route::get('/', [StaffController::class, 'view'])->name('staffs.view');
Route::get('/staff/{id}/download-pdf', [StaffController::class, 'downloadPdf'])->name('staff.downloadPdf');
Route::get('/staff/{id}/download-excel', [StaffController::class, 'downloadExcel'])->name('staff.downloadExcel');
Route::get('/export/staff', [StaffController::class, 'exportAll'])->name('export.staff');
