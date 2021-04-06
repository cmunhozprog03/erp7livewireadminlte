<div>

    <div class="form-group">
        <label for="">Setor</label>
        <input wire:model="name" type="text" class="form-control">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="from-group">
        <label for="">Empresa</label>
        <select class="form-control" name="option">
            <option value="">Escolha uma empresa...</option>
            @foreach ($companies->sortBy('name') as $company)
                <option value="" wire:model="company_id">{{ $company->name }}</option>
            @endforeach
        </select>
        @error('company_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Descrição</label>
        <input wire:model="description" type="text" class="form-control">
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Imagem:</label>
        <input wire:model="image" type="file" class="form-control">
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="row">

        <div class="form-group">
            <label for="">Ordem</label>
            <input wire:model="position" type="number" class="form-control">
            @error('position')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group form-check">

            <input type="checkbox" class="form-check-input" id="">
            <label class="form-check-label" for="exampleCheck1" wire:model="active"><b>Ativo<b></label>
        </div>
    </div>

    <div class="row justify-content-around">
        <button class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
        <button wire:click="save" class="btn btn-dark">Salvar</button>
    </div>
</div>
