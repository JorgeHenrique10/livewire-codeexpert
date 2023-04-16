<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ExpenseEdit extends Component
{
    use AuthorizesRequests, WithFileUploads;

    public $identity;
    public $description;
    public $type;
    public $amount;
    public $photo;
    public  $expenseDate = null;

    protected $rules = [
        'amount' => ['required', 'numeric'],
        'type' => ['required', 'int'],
        'description' => ['required', 'min:3', 'max:150'],
        'photo' => ['nullable', 'image']
    ];

    public function mount(Expense $expense)
    {
        $this->authorize('update', $expense);

        $this->identity = $expense->id;
        $this->description = $expense->description;
        $this->type = $expense->type;
        $this->amount = $expense->amount;
        $this->photo = $expense->photo;
        $this->expenseDate = $expense->expense_date;
    }

    public function render()
    {
        return view('livewire.expense.expense-edit');
    }

    public function updateExpense()
    {
        $expense = Expense::find($this->identity);
        $this->validate();

        if ($this->photo) {
            if (Storage::disk('public')->exists($expense->photo))
                Storage::disk('public')->delete($expense->photo);

            $this->photo = $this->photo->store('expenses_photos', 'public');
        }

        $expense->update([
            'description' => $this->description,
            'type' => $this->type,
            'amount' => $this->amount,
            'photo' => $this->photo ?? $expense->photo,
            'photo' => $this->expenseDate
        ]);

        $this->reset(['amount', 'type', 'description, exponseDate', 'photo']);


        // session()->flash('message', 'Registro Atualizado com Sucesso!');

        $this->emit('expense::updated');

        return redirect()->route('expenses.list')->with('message', 'Registro Atualizado com Sucesso!');
    }
}
