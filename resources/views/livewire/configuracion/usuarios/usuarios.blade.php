<div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Usuarios</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('modules') }}">Módulos</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Lista de usuarios</h4>
                        <div class="px-3 form-group d-flex">
                            <span style="font-size: 1rem; " class="p-2 text-dark"><i class="fa fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control " wire:model='search' placeholder="Search...">
                        </div>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <button wire:click.prevent="addUser" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i> &nbsp;
                                    Nuevo usuario
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
                                                <th style="text-align: center" scope="col">Foto</th>
                                                <th scope="col">Apellidos</th>
                                                <th scope="col">Nombres</th>
                                                <th scope="col">DNI</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $contador = 1;
                                            @endphp
                                            @foreach ($usuarios as $usuario)
                                            <tr>
                                                <td style="text-align: center">{{ $contador++ }}</td>
                                                <td style="text-align: center"><img
                                                        src="{{ asset('/uploads/photos/'.$usuario->photo) }}" alt=""
                                                        style="width:30px"></td>
                                                <td>{{ $usuario->nombres }}</td>
                                                <td>{{ $usuario->apellidos }}</td>
                                                <td>{{ $usuario->dni }}</td>
                                                <td>{{ $usuario->email }}</td>
                                                <td>{{ $usuario->type!='admin'?'Almacenero':'Administrador' }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-primary"
                                                        wire:click='updateUser({{$usuario->id}})'>
                                                        {{-- <i data-feather="edit-2"></i> --}}
                                                        <i class="fas fa-edit    "></i>
                                                    </button>
                                                    &nbsp;
                                                    <button class="btn btn-sm btn-danger"
                                                        wire:click='deleteUser({{$usuario->id}})'>
                                                        {{-- <i data-feather="trash-2"></i </button> --}}
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
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
                                {{ $usuarios->links() }}
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

    {{-- Modal --}}
    <div id="form" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <form autocomplete="off" wire:submit.prevent="{{ $modeUpdate? 'update' : 'create' }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">
                            {{ $modeUpdate? 'Actualizar usuario': 'Crear usuario'}}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-5">
                        <div class="mb-3 row">
                            <label for="nombres" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombres" id="nombres"
                                    wire:model.defer="nombres">
                                @error('nombres') <div class="alert alert-danger" role="alert"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="apellidos" id="apellidos"
                                    wire:model.defer="apellidos">
                                @error('apellidos') <div class="alert alert-danger" role="alert"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="dni" class="col-sm-2 col-form-label">DNI</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="dni" id="dni" wire:model.defer="dni"
                                    placeholder="Ejem. 73123456">
                                @error('dni') <div class="alert alert-danger" role="alert"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="tipo" class="col-sm-2 col-form-label">Tipo</label>
                            <div class="col-sm-10">
                                <select name="tipo" class="form-select " id="tipo" wire:model.defer="tipo">
                                    <option value=""> Seleccione un tipo</option>
                                    <option value="admin">Administrador</option>
                                    <option value="warehouseman">Almacenero</option>
                                </select>
                                @error('tipo') <div class="alert alert-danger" role="alert"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Correo electronico</label>
                            <div class="col-sm-10 ">
                                <input type="email" class="form-control" name="email" id="email"
                                    wire:model.defer="email" placeholder="uncorreo@dominio.com">
                                @error('email') <div class="alert alert-danger" role="alert"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Ingrese una contraseña" wire:model.defer="password">
                                @error('password') <div class="alert alert-danger" role="alert"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary ">
                            {{ $modeUpdate? 'Actualizar': 'Crear' }}
                        </button>
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