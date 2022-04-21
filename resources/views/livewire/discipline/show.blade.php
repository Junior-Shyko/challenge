<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div>
                    <x-jet-application-logo class="block h-12 w-auto" />
                </div>
            
                <div class="mt-8 text-2xl">
                    Dashboard Chanllege 
                </div>
            
                <div class="mt-6 text-gray-500 mb-4">
                    
                    <div class="row">
                        <div class="col-6">
                            <p>
                                MATÉRIAS SEM FACULDADE
                            </p>
                        </div>
                        <div class="col-6">
                           <div class="row">
                            <div class="col-6 col-lg-6">
                                <a href="{{url('criar-disciplina')}}" class="btn btn-secondary pull-right" title="Cria uma nova matéria">Criar Matéria</a>
                        
                            </div>
                            <div class="col-6 col-lg-6">
                                <a href="{{url('gerenciar-disciplina')}}" class="btn btn-light pull-right" title="Gerencias Matérias">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                </a>
                            </div>
                           </div>
                        </div>
                    </div>
                    
                </div>
            
                <div class="container">
                    <div class="row">
                        {{-- IMPRIMINDO AS MATERIAS PERSONALIZADA --}}
                        @foreach ($discipline as $item)
                            @if ($item->type == 'personalized')
                            <div class="col-12 col-lg-4 col-md-6">
                                <div class="card mb-3" style="width: 18rem;">
                                    <img class="card-img-top" src="https://img.freepik.com/vetores-gratis/professores-minusculos-com-ferramentas-educacionais-e-ilustracao-vetorial-plana-de-papelaria-isolada-professores-de-desenho-animado-de-diferentes-disciplinas-como-geografia-matematica-e-cultura-fisica-educacao-e-conceito-de-escola_74855-13261.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title" title="{{$item->name}}">{{ substr($item->name,0,25) }} </h5>
                                        <p class="card-text">
                                            {{ substr($item->description,0,60) }}
                                        </p>
                                        {{-- <div>
                                            @livewire('discipline.edit', ['discipline' => $item] , key($item->id))
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-12 col-lg-4 col-md-4 mb-2">
                                                <button class="btn btn-light" wire:click="edit({{ $item->id }})" title="Editar Matéria">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4 mb-2">
                                                <a href="#"  class="btn btn-light"  wire:click="notActive({{ $item->id }})" title="Habilitar ou Desabilitar">
                                                    <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4 mb-2">
                                                <a href="#" class="btn btn-danger" class="text-danger" wire:click="showModalDelete({{ $item->id }})" title="Excluir Matéria">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                        <x-jet-dialog-modal wire:model="modalUpdating">
                            <x-slot name="title">
                                Alterar matéria: {{$nameDiscipline}}
                            </x-slot>
                            
                            <x-slot name="content">
                                <form wire:submit.prevent="update">
                                    <div class="form-group">
                                      <label for="">Nome:</label>                                     
                                      <input type="text" class="form-control" wire:model='nameDiscipline' placeholder="Nome da matéria">
                                      @error('nameDiscipline') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                      <label for="">Descrição:</label>
                                      <textarea class="form-control" wire:model.defer='descriptionDis' cols="20" rows="8"></textarea>
                                      <small class="form-text text-muted">Uma descrição sobre a matéria</small>
                                      @error('descriptionDis') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tipo:</label>
                                        <select wire:model="typeDiscipline" class="form-control">
                                            <option value="">--Selecione--</option>
                                            <option value="personalized" {{ $this->typeDiscipline === 'Personalizado' ? 'selected' : '' }} >Personalizado</option>
                                            <option value="general" {{ $this->typeDiscipline == 'Geral' ? 'selected' : '' }} >Geral</option>
                                        </select>
                                        @error('typeDiscipline') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ativo:</label>
                                        <select wire:model="activeDiscipline" class="form-control">
                                            <option value="">--Selecione--</option>
                                            <option value="1">Sim</option>
                                            <option value="0" >Não</option>
                                        </select>
                                        @error('typeDiscipline') <span class="error text-danger">{{ $message }}</span> @enderror
                                   
                                        <input type="text" wire:model="idDiscipline">
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Cadastrar
                                     </button>
                                    <x-jet-secondary-button wire:click="$toggle('modalUpdating')" wire:loading.attr="disabled">
                                        Sair
                                    </x-jet-secondary-button>
                                </form>
                            </x-slot>
                        
                            <x-slot name="footer">
                               
                               
                            </x-slot>

                        </x-jet-dialog-modal>
                        {{-- MODAL DE EXCLUSAO --}}
                        <x-jet-dialog-modal wire:model="modalDelete">
                            <x-slot name="title">
                               EXCLUIR MATÉRIA
                            </x-slot>
                        
                            <x-slot name="content" class="text-center">
                                <p class="text-danger text-center">Deseja realmente excluir essa matéria?</p>
                               <p class="text-center">
                                   Essa ação não será refeita.
                               </p>
                            </x-slot>
                        
                            <x-slot name="footer">
                                <x-jet-secondary-button wire:click="$toggle('modalDelete')" wire:loading.attr="disabled">
                                   Não, desistir
                                </x-jet-secondary-button>
                        
                                <x-jet-danger-button class="ml-2" wire:click="deleteDiscipline('{{$idDiscipline}}')" wire:loading.attr="disabled">
                                    Sim
                                </x-jet-danger-button>
                            </x-slot>
                        </x-jet-dialog-modal>
                        {{-- FIM MODAL DE EXCLUSAO --}}
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-200 bg-opacity-25">
                <div class="container">
                    <div class="col-12 pt-3 pb-3">
                        <h3>MATÉRIAS GERAIS</h3>
                    </div>
                    <div class="row pt-3 pb-3">
                        @foreach ($discipline as $item)
                            @if ($item->type == 'general')
                            <div class="col-12 col-lg-4 col-md-6">
                                <div class="card mb-3" style="width: 18rem;">
                                    <img class="card-img-top" src="https://static.quizur.com/i/b/55942dbc5a9793.1418773555942dbc488044.49267744.jpg" alt="Card image cap">
                                        
                                    <div class="card-body">
                                        <h5 class="card-title" title="{{$item->name}}">{{ substr($item->name,0,25) }} </h5>
                                        <p class="card-text">
                                            {{ substr($item->description,0,60) }}
                                        </p>
                                        <a href="{{url('materia/'.$item->id)}}" title="Todos os datalhes dessa matéria" >
                                            Detalhes
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
