<?php

namespace App\Http\Livewire\Discipline;

use Livewire\Component;
use App\Models\Discipline;

class Create extends Component
{
    public $nameDiscipline = "";
    public $descriptionDis = "";
    public $typeDiscipline = "";

    protected $rules = [
        'nameDiscipline' => 'required|min:6',
        'descriptionDis' => 'required|min:6',
        'typeDiscipline' => 'required',
    ];

    protected $messages = [
        'nameDiscipline.required' => 'O campo nome é obrigatório',
        'descriptionDis.required' => 'O Campo de descrição é obrigatório',
        'typeDiscipline.required' => 'O Tipo é obrigatório',
    ];

    public function render()
    {
        return view('livewire.discipline.create');
    }

    public function store()
    {
        try {
           
            $validatedData = $this->validate();
            
            Discipline::create($validatedData);
            $this->reset();
            $this->dispatchBrowserEvent('toastr:success', ['message' => 'Requerimento cadastrado com sucesso']);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('toastr:error', ['message' => 'Ocorreu um erro inesperado']);
        }
        
    }
}
