<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Livewire\Component;

class ExpenseCreate extends Component
{
    public  $description = null;
    public  $type = null;
    public  $amount = null;

    protected $rules = [
        'amount' => ['required', 'numeric'],
        'type' => ['required', 'int'],
        'description' => ['required', 'min:3', 'max:150']
    ];

    public function render()
    {
        return view('livewire.expense.expense-create');
    }


    public function createExpense()
    {
        $this->validate();

        Expense::create([
            'user_id' => 1,
            'description' => $this->description,
            'type' => $this->type,
            'amount' => $this->amount
        ]);

        $this->reset(['amount', 'type', 'description']);
        $this->emit('expense::create');

        session()->flash('message', 'Registro Criado com sucesso!');
    }
}
