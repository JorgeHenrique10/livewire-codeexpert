<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use Livewire\Component;

class PlanCreate extends Component
{
    public $plan = [];

    protected $rules = [
        'plan.name' => ['required', 'min:3', 'max:150'],
        'plan.description' => ['required', 'min:3', 'max:150'],
        'plan.slug' => ['required', 'min:3', 'max:150'],
        'plan.price' => ['required', 'integer'],
    ];

    public function render()
    {
        return view('livewire.plan.plan-create');
    }

    public function createPlan()
    {
        $this->validate();
        $plan = $this->plan;
        $plan['reference'] = "PAGSEGURO-REFERENCE";

        Plan::create($plan);

        session()->flash('message', 'Plano Cadastrado com Sucesso!');

        $this->emit('plan::created');
    }
}
