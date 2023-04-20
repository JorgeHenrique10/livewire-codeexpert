<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use Livewire\Component;

class PlanList extends Component
{
    public function render()
    {
        $plans = Plan::paginate(10);
        return view('livewire.plan.plan-list', ['plans' => $plans]);
    }
}
