<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class ExpenseEdit extends Component
{
    use AuthorizesRequests;
    public $identy;
    public $description;
    public $type;
    public $amount;

    protected $rules = [
        'amount' => ['required', 'numeric'],
        'type' => ['required', 'int'],
        'description' => ['required', 'min:3', 'max:150']
    ];

    public function mount(Expense $expense)
    {
        $this->authorize('update', $expense);

        $this->identy = $expense->id;
        $this->description = $expense->description;
        $this->type = $expense->type;
        $this->amount = $expense->amount;
    }

    public function render()
    {
        return view('livewire.expense.expense-edit');
    }

    public function updateExpense()
    {
        $expense = Expense::find($this->identy);
        $this->validate();

        $expense->update([
            'description' => $this->description,
            'type' => $this->type,
            'amount' => $this->amount
        ]);

        $this->reset(['amount', 'description', 'type', 'id']);

        // session()->flash('message', 'Registro Atualizado com Sucesso!');

        $this->emit('expense::updated');

        return redirect()->route('expenses.list')->with('message', 'Registro Atualizado com Sucesso!');
    }
}
