<div class="container bg-white rounded-md mt-3 border-solid border-2 p-2">
    <h2>Criar disciplina</h2>
    <div class="container">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger col-12 col-lg-12 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-12 col-lg-4">
                <ul class="list-group">
                    <li class="list-group-item active">Dados da Matéria</li>
                    <li class="list-group-item">
                        <p><strong>Nome: </strong> {{$nameDiscipline}}</p>
                    </li>
                    <li class="list-group-item">
                        <p><strong>Descrição: </strong> {{$descriptionDis}}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <strong>Tipo: </strong>
                        @switch($typeDiscipline)
                            @case('personalized')
                                {{'Personalizada'}}
                                @break
                            @case('general')
                                {{'Geral'}}
                                @break
                            @default
                                {{'Geral'}}
                        @endswitch
                    </li>
                </ul>
            </div>
            <div class="col-12 col-lg-8 border-solid border-2 p-2 rounded-md">
                <form wire:submit.prevent="store">
                    <div class="form-group">
                      <label for="">Nome: </label>
                      <input type="text" class="form-control" wire:model='nameDiscipline' placeholder="Nome da matéria">
                    </div>
                    <div class="form-group">
                      <label for="">Descrição:</label>
                      <textarea class="form-control" wire:model='descriptionDis' cols="20" rows="8"></textarea>
                      <small id="emailHelp" class="form-text text-muted">Uma descrição sobre a matéria</small>
                    </div>
                    <div class="form-group">
                        <label for="">Tipo:</label>
                        <select wire:model='typeDiscipline' class="form-control">
                            <option value="0">--Selecione--</option>
                            <option value="personalized">Personalizada</option>
                            <option value="general">Geral</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">
                       <i class="fa fa-save"></i> Cadastrar
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>
