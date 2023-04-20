<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use App\Services\PagSeguro\Plan\PlanCreateService;
use Livewire\Component;

class PlanCreate extends Component
{
    public $plan = [];

    protected $rules = [
        'plan.name' => ['required', 'min:3', 'max:150'],
        'plan.description' => ['required', 'min:3', 'max:150'],
        'plan.slug' => ['required', 'min:3', 'max:150'],
        'plan.price' => ['required', 'numeric'],
    ];

    public function render()
    {
        return view('livewire.plan.plan-create');
    }

    public function createPlan()
    {
        $this->validate();
        $plan = $this->plan;

        $codPlan = (new PlanCreateService)->createPlanPagSeguro($plan);

        if ($codPlan == null) {
            session()->flash('message', 'Error ao Cadastrar o Plano no PagSeguro!');
            return;
        }
        $plan['reference'] = $codPlan['code'];
        Plan::create($plan);

        // session()->flash('message', 'Plano Cadastrado com Sucesso!');

        $this->reset(['plan']);

        $this->emit('plan::created');

        return redirect()->route('plan.list')->with('message', 'Plano Cadastrado com Sucesso!');
    }
}
