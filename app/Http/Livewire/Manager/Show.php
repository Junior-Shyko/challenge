<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;
use App\Models\Discipline;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        //sleep(1);
        //$discipline = Discipline::where('type' , 'personalized')->get();
        return view('livewire.manager.show',
        [
            'discipline' => Discipline::where('name', 'like', '%'.$this->search.'%')->paginate(5),
        ]);
    }
}
