<?php

namespace App\Http\Livewire\Discipline;

use App\Models\Discipline;
use Livewire\Component;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

class Edit extends Component
{
    public Discipline $discipline; 

    public $modalUpdating = false;

    public function edit(Discipline $discipline)
    {
        $this->modalUpdating = true;

        $this->discipline = $discipline;
    }

    public function hideModalUp()
    {
        $this->modalUpdating = false;
    }

    public function up($event)
    {
        dump($event);
        dd($this);
    }

    public function render()
    {
        return view('livewire.discipline.edit');
    }
   
}
