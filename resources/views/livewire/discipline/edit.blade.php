<div class="container">
    <div class="row">
        <div class="col-12 col-lg-4">
            <button class="btn btn-light" wire:click="edit({{ $discipline }})" title="Editar Matéria">
                <i class="fa fa-edit"></i>
            </button>
        </div>
        <div class="col-12 col-lg-4">
            <a href="#"  class="btn btn-light"  wire:click="notActive({{ $discipline }})" title="Habilitar ou Desabilitar">
                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
            </a>
        </div>
        <div class="col-12 col-lg-4">
            <a href="#" class="btn btn-danger" class="text-danger" wire:click="delete({{ $discipline }})" title="Excluir Matéria">
                <i class="fa fa-trash"></i>
            </a>
        </div>
    </div>
</div>
{{-- MODAL PARA EDIÇÃO DE MATERIA --}}
<x-jet-dialog-modal wire:model="modalUpdating">
    <x-slot name="title">
        Delete Account
    </x-slot>

    <x-slot name="content">

            <div class="form-group">
              <label for="">Nome: {{$discipline->name}}</label>
              <x-jet-input type="text" class="form-control" wire:change="up($event)" value="{{$discipline->name}}" />
              {{-- <input type="text" class="" wire:model.defer='discipline.name' placeholder="Nome da matéria"> --}}
            </div>
            <div class="form-group">
              <label for="">Descrição:</label>
              <textarea class="form-control" wire:model.defer='discipline.description' cols="20" rows="8"></textarea>
              <small id="emailHelp" class="form-text text-muted">Uma descrição sobre a matéria</small>
            </div>
            <div class="form-group">
                <label for="">Tipo:</label>
                <select wire:model.defer='discipline.type' class="form-control">
                    <option value="0">--Selecione--</option>
                    <option value="personalized">Personalizada</option>
                    <option value="general">Geral</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">
               <i class="fa fa-save"></i> Cadastrar
            </button>
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modalUpdating')" wire:loading.attr="disabled">
            Nevermind
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
            Delete Account
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
