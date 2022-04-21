<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div class="container "> 
        <div class="row">
            <div class="mt-2">
                <h3>Todas as matérias</h3>
            </div>
            <x-jet-input 
            id="searchInput"
            class="block mt-3 mb-2 w-full" 
            type="text" 
            name="search" 
            placeholder="Digite um nome de matéria"
            wire:model="search"
            autocomplete="current-password" autofocus />
        </div>
        <div wire:loading>
            Pesquisando
            <i class="fa fa-spinner fa-spin fa-fw"></i>
        </div>
        <div class="row">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark ">
                  <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ativo</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Ação</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($discipline as $item)
                        <tr>
                            <td> {{$item->name}}</td>
                            <td>{{$item->description}}</td>
                            <td>
                                @if ($item->active ==  1)
                                {{__('Ativo')}}
                                @else
                                {{__('Inativo')}}
                                @endif
                            </td>
                            <td>
                                @if ($item->type ==  'general')
                                {{__('Geral')}}
                                @else
                                {{__('Personalizado')}}
                                @endif
                            <td>
                                <x-jet-secondary-button>
                                    <i class="fa fa-edit"> </i>
                                </x-jet-secondary-button>
                                <x-jet-danger-button>
                                    <i class="fa fa-trash"> </i>
                                </x-jet-danger-button>
                            </td>
                          </tr>
                    @endforeach
                </tbody>
              </table>

        </div>
        <div class="row">
            <div  class="inline-flex items-center -space-x-px">
                {{ $discipline->links() }}
            </div>
        </div>
    </div>
</div>
