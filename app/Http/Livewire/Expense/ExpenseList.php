<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ExpenseList extends Component
{
    public function render()
    {
        $expenses = Auth::user()->expenses()->paginate(3);

        return view('livewire.expense.expense-list', ['expenses' => $expenses]);
    }

    public function remove($id)
    {
        $expense = Auth::user()->expenses()->find($id);
        $expense->delete();

        session()->flash('message', "Registro Removido com Sucesso!");

        $this->emit('expense::deleted');
    }
}
