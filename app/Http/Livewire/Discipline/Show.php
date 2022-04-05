<?php

namespace App\Http\Livewire\Discipline;

use App\Models\Discipline;
use Livewire\Component;

class Show extends Component
{
    public $discipline; 
    public $idDiscipline; 
    public $nameDiscipline = "";
    public $descriptionDis = "";
    public $typeDiscipline = "";
    public $activeDiscipline = true;

    protected $rules = [
        'nameDiscipline' => 'required|min:6',
        'descriptionDis' => 'required|min:6',
        'typeDiscipline' => 'required|min:2',

    ];

    protected $messages = [
        'nameDiscipline.required' => 'O campo nome é obrigatório',
        'descriptionDis.required' => 'O Campo de descrição é obrigatório',
        'typeDiscipline.required' => 'O Tipo é obrigatório',

    ];

    public bool $modalUpdating;

    public function update()
    {
        // $validatedDate = $this->validate([
        //     'descriptionDis.required' => 'O Campo de descrição é obrigatório',
        // ]);
        // session()->flash('message', $validatedDate);
       //dd($this->idDiscipline);
        $validatedData = $this->validate();
        switch ($this->typeDiscipline) {
            case 'Personalizado':
                $this->typeDiscipline = 'personalized';
                break;
            case 'Geral':
                $this->typeDiscipline = 'general';
                break;
        }
        try {
            $update = [
                'name' => $this->nameDiscipline,
                'description' => $this->descriptionDis,
                'type' => $this->typeDiscipline,
                'active' => $this->activeDiscipline
            ];
            Discipline::where('id',$this->idDiscipline)->update($update);            
            $this->dispatchBrowserEvent('toastr:success', ['message' => 'Matéria alterada com sucesso']);
        } catch (\Exception $th) {
            $this->dispatchBrowserEvent('toastr:error', ['message' => 'Ocorreu um erro inesperado: '.$th->getMessage()]);
        }
      
    }

    // public function mount(Discipline $discipline)
    // {
    //     $this->discipline = $discipline;
    // }

    public function edit(Discipline $discipline)
    {
        $this->idDiscipline = $discipline->id;
        $this->nameDiscipline = $discipline->name;
        $this->descriptionDis = $discipline->description;
        switch ($discipline->type) {
            case 'personalized':
                $this->typeDiscipline = 'Personalizado';
                break;
            case 'general':
                $this->typeDiscipline = 'Geral';
                break;
        }
        // dd($this);
        $this->modalUpdating = true;
        //dd($this->discipline->name);
    }

    public function hideModalUp()
    {
        $this->modalUpdating = false;
    }    
    
    public function showModalUp()
    {
        $this->modalUpdating = true;
    }


    public function render()
    {
     
        $this->discipline = Discipline::all();

        return view('livewire.discipline.show');
    }
}
