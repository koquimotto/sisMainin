<div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Almacenes</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('modules') }}">Módulos</a></li>
                        <li class="breadcrumb-item active">Almacenes</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <!-- start container almacenes -->
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Almacenes registrados</h4>
                        <div class="px-3 form-group d-flex">
                            <span style="font-size: 1rem; " class="p-2 text-dark"><i class="fa fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control " wire:model='search'
                                placeholder="Buscar almacen...">
                        </div>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <button wire:click.prevent="addAlmacen" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i> &nbsp;
                                    Nuevo almacen
                                </button>
                            </div>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="table-responsive mt-4 mt-xl-0">
                                    <table
                                        class="table table-hover table-striped align-middle table-nowrap table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center" scope="col">ID</th>
                                                <th style="text-align: center" scope="col">Nombre de almacén</th>
                                                <th scope="col" class="text-center">Pais</th>
                                                <th scope="col" class="text-center">Ciudad</th>
                                                <th scope="col">Direccion</th>
                                                <th scope="col">Telefono</th>
                                                <th scope="col" class="text-center">Estado</th>
                                                <th scope="col" class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $contador = 1; @endphp
                                            @foreach ($almacenes as $almacen)
                                            <tr>
                                                <td class="text-center">{{ $contador ++ }} </td>
                                                <td>{{ $almacen->almacen }}</td>
                                                <td class="text-center">{{ $almacen->Pais->pais }}</td>
                                                <td class="text-center">{{ $almacen->Ciudad->ciudad }}</td>
                                                <td>{{ $almacen->direccion }}</td>
                                                <td>{{ $almacen->telefono }}</td>
                                                @if ($almacen->estado ==1)
                                                <td class="text-success text-center">ACTIVO</td>
                                                @else
                                                <td class="text-danger text-center">INACTIVO</td>
                                                @endif
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        wire:click='updateAlmacen({{ $almacen->id }})'>
                                                        <i class="fas fa-edit    "></i>
                                                        Editar
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        wire:click='deleteAlmacen({{ $almacen->id }})'>
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                        Eliminar
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="text-center">
                                <br>
                                {{ $almacenes->links() }}
                            </div>
                        </div>
                        <!--end row-->
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!--end row-->
    </div>
    <!-- end container almacenes -->

    {{-- Modal --}}
    <div id="form" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <form autocomplete="off" wire:submit.prevent="{{ $almacen_seleccionado? 'update' : 'create' }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ $almacen_seleccionado? 'Actualizar almacén': 'Crear almacén'}}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-5">
                        <div class="mb-3 row">
                            <label for="nombre" class="col-sm-2 col-form-label">Nombre del almacén</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre" wire:model.defer='almacen'>
                                @error('almacen')
                                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="pais" class="col-sm-2 col-form-label">Pais</label>
                            <div class="col-sm-10">
                                <select class="form-select " id="pais" wire:model.defer='pais_id'>
                                    <option value=""> Seleccione un pais</option>
                                    @foreach ($paises as $pais)
                                    <option value="{{ $pais->id }}"> {{ $pais->pais }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('pais_id')
                                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="ciudad" class="col-sm-2 col-form-label">Ciudad</label>
                            <div class="col-sm-10">
                                <select class="form-select " id="ciudad" wire:model.defer='ciudad_id'>
                                    <option value=""> Seleccione una ciudad</option>
                                    @foreach ($ciudades as $ciudad)
                                    <option value="{{ $ciudad->id }}">
                                        {{ $ciudad->ciudad }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('ciudad_id')
                                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="direccion" wire:model.defer='direccion'>
                                @error('direccion')
                                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="telefono" wire:model.defer='telefono'>
                                @error('telefono')
                                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                            <div class="col-sm-10">
                                <select class="form-select " id="estado" wire:model.defer='estado'>
                                    <option value=""> Seleccione un estado</option>
                                    <option value="1"> Activo</option>
                                    <option value="0"> Inactivo</option>
                                </select>
                                @error('estado')
                                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="file" class="col-sm-2 col-form-label">Imagen</label>
                            <div class="col-sm-10">
                                <input type="file" id="file" wire:model='file'>

                                @if ($file)
                                <img class="w-100" src="{{ $file->temporaryUrl() }}">
                                @else
                                @if ($almacen_seleccionado)
                                <img class="w-100" src="{{ asset('storage/almacenes/'.$almacen_seleccionado->photo) }}">
                                @endif
                                @endif

                                @error('file')
                                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary ">
                            {{ $almacen_seleccionado? 'Actualizar': 'Crear' }}
                        </button>
                        <span wire:loading wire:target='file'>Cargando ...</span>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    {{-- End Modal --}}

    @push('scripts')
    <script>
        const $formulario = new bootstrap.Modal(document.getElementById('form'));
            Livewire.on('show-form', ()=>{ $formulario.show(); })
            Livewire.on('close-form', ()=>{ $formulario.hide(); })
    </script>

    <script>
        Livewire.on('confirm-message', (msg)=>{
                Swal.fire( 'Buen trabajo!', msg, 'success')
            })

        Livewire.on('delete-message', (msg)=>{
                Swal.fire({
                    title: 'Estas seguro?',
                    text: msg,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminarlo!',
                    cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.emit('delete');
                    }
                })
            })
    </script>
    @endpush

</div>