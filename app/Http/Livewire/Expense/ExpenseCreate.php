<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ExpenseCreate extends Component
{

    use WithFileUploads;

    public  $description = null;
    public  $type = null;
    public  $amount = null;
    public  $photo = null;
    public  $expenseDate = null;

    protected $rules = [
        'amount' => ['required', 'numeric'],
        'type' => ['required', 'int'],
        'description' => ['required', 'min:3', 'max:150'],
        'photo' => ['image', 'nullable'],
        'expenseDate' => ['date']
    ];

    public function render()
    {
        return view('livewire.expense.expense-create');
    }


    public function createExpense()
    {
        $this->validate();

        if ($this->photo) {

            $photo = $this->photo->store('expenses_photos', 'public');
        }

        Auth::user()->expenses()->create([
            'description' => $this->description,
            'type' => $this->type,
            'amount' => $this->amount,
            'photo' => $photo ?? null,
            'expense_date' => $this->expenseDate
        ]);

        $this->reset(['amount', 'type', 'description, exponseDate', 'photo']);
        $this->emit('expense::create');

        session()->flash('message', 'Registro Criado com sucesso!');
    }
}
