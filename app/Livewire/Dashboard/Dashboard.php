<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\User;


class Dashboard extends Component
{

    public function render()
    {
        return view('livewire.dashboard.dashboard');
    }
}
