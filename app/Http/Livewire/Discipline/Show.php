<?php

namespace App\Http\Livewire\Discipline;

use App\Models\Profile;
use Livewire\Component;
use App\Models\Discipline;

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
    public bool $modalDelete;

    public function update()
    {
        //VALIDANDO ERROS
        $validatedData = $this->validate();
        //CONVERTENDO VALORES
        switch ($this->typeDiscipline) {
            case 'Personalizado':
                $this->typeDiscipline = 'personalized';
                break;
            case 'Geral':
                $this->typeDiscipline = 'general';
                break;
        }
        try {
            //ARRAY COM OS VALORES ATUALIZADOS
            $update = [
                'name' => $this->nameDiscipline,
                'description' => $this->descriptionDis,
                'type' => $this->typeDiscipline,
                'active' => $this->activeDiscipline
            ];
            //UPDATE
            Discipline::where('id',$this->idDiscipline)->update($update);            
            $this->dispatchBrowserEvent('toastr:success', ['message' => 'Matéria alterada com sucesso']);
        } catch (\Exception $th) {
            $this->dispatchBrowserEvent('toastr:error', ['message' => 'Ocorreu um erro inesperado: '.$th->getMessage()]);
        }
      
    }

    public function edit(Discipline $discipline)
    {
        //PROPRIEDADES RECEBENDO VALOR DO OBJETO
        $this->idDiscipline = $discipline->id;
        $this->nameDiscipline = $discipline->name;
        $this->descriptionDis = $discipline->description;
         //CONVERTENDO VALORES
        switch ($discipline->type) {
            case 'personalized':
                $this->typeDiscipline = 'Personalizado';
                break;
            case 'general':
                $this->typeDiscipline = 'Geral';
                break;
        }
        // MODAL
        $this->modalUpdating = true;
    }

    public function showModalDelete(Discipline $discipline)
    {
        $this->idDiscipline = $discipline->id;
        $this->modalDelete = true;
    }

    public function deleteDiscipline(Discipline $discipline)
    {
        try {
            Discipline::where('id',$discipline->id)->delete();            
            $this->dispatchBrowserEvent('toastr:success', ['message' => 'Matéria alterada com sucesso']);
            $this->modalDelete = false;
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('toastr:error', ['message' => 'Ocorreu um erro inesperado: '.$th->getMessage()]);
        }
    }
    
    public function render()
    {
        $this->discipline = Discipline::all();

        return view('livewire.discipline.show');
    }
}
