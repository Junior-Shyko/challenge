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

