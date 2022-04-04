<div class="container bg-white rounded-md mt-3 border-solid border-2 p-2">
    {{-- The Master doesn't talk, he acts. --}}
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title"><strong>Nome: </strong>{{$nameDiscipline}}</h5>
                      <h6 class="card-subtitle mt-2 text-muted">Descrição</h6>
                      <p class="card-text">{{$descriptionDis}}</p>
                      <a href="#" class="card-link">Card link</a>
                      <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form wire:submit.prevent="store">
                            <div class="form-group">
                              <label for="">Nome: </label>
                              <input type="text" value="{{$nameDiscipline}}" wire:blur="update" class="form-control" placeholder="Nome da matéria">
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
    </div>
    
</div>
