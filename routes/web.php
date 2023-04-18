<?php

use App\Http\Livewire\Expense\ExpenseCreate;
use App\Http\Livewire\Expense\ExpenseEdit;
use App\Http\Livewire\Expense\ExpenseList;
use App\Http\Livewire\Plan\PlanCreate;
use App\Http\Livewire\Plan\PlanList;
use App\Models\Expense;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::prefix('expenses')->name('expenses.')->group(function () {
        Route::get('/', ExpenseList::class)->name('list');
        Route::get('create', ExpenseCreate::class)->name('create');
        Route::get('edit/{expense}', ExpenseEdit::class)->name('edit');
        Route::get('{expense}/photo', function ($expense) {

            $expense = Expense::findOrFail($expense);
            if (!$expense->photo)
                abort(404, 'Image not found');

            $photo = Storage::disk('public')->get($expense->photo);

            $mineType = File::mimeType(storage_path("app/public/$expense->photo"));

            return response($photo)->header('Content-Type', $mineType);
        })->name('photo');
    });

    Route::prefix('plans')->name('plan.')->group(function () {
        Route::get('/', PlanList::class)->name('list');
        Route::get('create', PlanCreate::class)->name('create');
    });
});
