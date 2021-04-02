<div>

    <div class="row">
        <div class="col-md-3">
            <h2>Empresas</h2>
        </div>
        <div class="col-md-2 mt-3">
            <button class="btn w3-dark-gray" data-toggle="modal" data-target="#companyModal"><i class="fas fa-plus-circle"></i>&nbsp; &nbsp; Adicionar</button>
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
                @if ($companies->count())
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="w3-dark-gray">
                                <tr>
                                    <th width="60%" class="w3-center">Empresa</th>
                                    <th width="20%" class="w3-center">Logo</th>
                                    <th width="20%" class="w3-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->logo }}</td>
                                        <td>
                                            <button class="btn w3-indigo" wire:click="selectedItem({{ $company->id }}, 'update')">
                                                <i class=" 	fas fa-pen-alt"></i>
                                            </button>
                                            <button class="btn w3-red" wire:click="selectedItem({{ $company->id }}, 'delete')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $companies->links() }}
                    </div>
                @else
                    <div class="w3-container w3-dark-gray">Nenhum registro encontrado.</div>
                @endif

        </div>

    </div>
  <!-- Modal company create -->
  <div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog w3-animate-zoom modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header w3-dark-gray">
          <h5 class="modal-title" id="exampleModalLabel">Novo Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @livewire('companies.companies-form')
        </div>

      </div>
    </div>
  </div>

</div>
