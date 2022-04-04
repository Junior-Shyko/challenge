<?php

namespace App\Http\Livewire\Discipline;

use App\Models\Discipline;
use Livewire\Component;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Ramsey\Uuid\Type\Integer;

class Edit extends Component
{
    public $nameDiscipline = "";
    public $descriptionDis = "";
    public $typeDiscipline = "";
    public $active = "";

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
        //VERIFICAR SE É ADIMIN
       
       
        // echo $id;
        // dump(Request::path());
        $path = Request::path();
        $new = explode('/',$path);
        $id = intval($new[1]);
        // dump( request()->id);
        // dd(request()->route()->parameters);
        $disc = Discipline::find($id);

        $this->nameDiscipline = $disc->name;
        $this->descriptionDis = $disc->description;
        switch ($disc->typeDiscipline) {
            case 'personalized':
                $this->typeDiscipline = 'Personalizada';
                break;
            case 'general':
                $this->typeDiscipline = 'Geral';
                break;            
            default:
            $this->typeDiscipline = 'Geral';
                break;
        }
        $this->active = $disc->active;

        return view('livewire.discipline.edit');
    }

    public function update()
    {
        dump('update');
    }
}
