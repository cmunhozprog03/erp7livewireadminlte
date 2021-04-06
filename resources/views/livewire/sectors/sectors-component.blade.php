<div>
    <div class="row">
        <div class="col-md-3">
            <h2>Setores <span class="badge badge-secondary">{{ $sectors->count() }}</span></h2>
        </div>
        <div class="col-md-2 mt-3">
            <button class="btn w3-dark-gray" data-toggle="modal" data-target="#sectorModal"><i class="fas fa-plus-circle"></i>&nbsp; &nbsp; Adicionar</button>
        </div>
        <div class=" offset-2 col-md-5  mt-3">
            <input type="text" class="form-control" placeholder="Buscar" wire:model="search">
        </div>
    </div>
    <!-- Modal Delete -->
    <div class="modal fade" id="modalFormDelete" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalFormDelete" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header w3-red">
            <h5 class="modal-title" id="staticBackdropLabel"><b>Deseja Excluir?</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-white" aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <h3>Deseja realmente excluir este registro?</b></h3>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button wire:click="delete" type="button" class="btn btn-danger">Sim</button>
            </div>
        </div>
        </div>
    </div>
    <div class="row justify-content-center mt-2">
        <div class="col-md-11">
            <div class="w3-card-4">
                @if ($sectors->count())
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="w3-dark-gray">
                                <tr>
                                    <th width="30%" class="w3-center">Setor</th>
                                    <th width="18%" class="w3-center">Imagem</th>
                                    <th width="22%" class="w3-center">Empresa</th>
                                    <th width="5%" class="w3-center">O</th>
                                    <th width="5%" class="w3-center">A</th>
                                    <th width="20%" class="w3-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sectors as $sector)
                                    <tr>
                                        <td>{{ $sector->name }}</td>
                                        <td class="w3-center">
                                            @if (!empty($sector->image))
                                            <img src="{{ url('storage/sectors/'. $sector->image) }}" style="width: 120px; height: 80px;" alt="">
                                            @else
                                                Sem Imagem
                                            @endif
                                        </td>
                                        <td>{{ $sector->company->name }}</td>
                                        <td class="w3-center">{{ $sector->position }}</td>
                                        <td>
                                            @if ($sector->active == 'Y')
                                                <button class="btn">
                                                    <i class="fas fa-toggle-on w3-text-green"></i>
                                                </button>

                                            @else
                                            <button class="btn">
                                                <i class="fas fa-toggle-off text-danger"></i>
                                            </button>
                                            @endif


                                        </td>
                                        <td class="w3-center">
                                            <button class="btn w3-indigo" wire:click="selectedItem({{ $sector->id }}, 'update')">
                                                <i class=" 	fas fa-pen-alt"></i>
                                            </button>
                                            <button class="btn w3-red" wire:click="selectedItem({{ $sector->id }}, 'delete')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $sectors->links() }}

                    </div>
                @else
                    <div class="w3-container w3-dark-gray">Nenhum registro encontrado.</div>
                @endif

        </div>

    </div>
  <!-- Modal sector create -->
  <div class="modal fade" id="sectorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog w3-animate-zoom modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header w3-dark-gray">
          <h5 class="modal-title" id="exampleModalLabel">Novo Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @livewire('sectors.sectors-form')
        </div>

      </div>
    </div>
  </div>
</div>
