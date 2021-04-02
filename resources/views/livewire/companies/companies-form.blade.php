<div>
    <div class="form-group">
        <label for="">Nome:</label>
        <input wire:model="name" type="text" class="form-control">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Logotipo:</label>
        <input wire:model="logo" type="text" class="form-control">
        @error('logo')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="row justify-content-around">
        <button class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
        <button wire:click="save" class="btn btn-dark">Salvar</button>
    </div>
</div>
