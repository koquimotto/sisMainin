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
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <button wire:click.prevent="addUser" class="btn btn-primary">Nuevo usuario</button>
                            </div>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="table-responsive mt-4 mt-xl-0">
                                    <table class="table table-hover table-striped align-middle table-nowrap table-bordered mb-0">
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
                                            @foreach ($usuarios as $usuario)
                                            @php
                                                $contador = 1;    
                                            @endphp
                                                <tr>
                                                    <td style="text-align: center">{{ $contador++ }}</td>
                                                    <td style="text-align: center"><img src="{{ asset('/uploads/photos/'.$usuario->photo) }}" alt="" style="width:30px"></td>
                                                    <td>{{ $usuario->nombres }}</td>
                                                    <td>{{ $usuario->apellidos }}</td>
                                                    <td>{{ $usuario->dni }}</td>
                                                    <td>{{ $usuario->email }}</td>
                                                    <td>{{ $usuario->type!='admin'?'Almacenero':'Administrador' }}</td>
                                                    <td></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div><!--end row-->
    </div>

    {{-- Modal --}}
        {{-- <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#myModal">Standard Modal</button> --}}
        <div id="form" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <form autocomplete="off" wire:submit.prevent="{{ $showModal ? 'update' : 'create' }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">{{ $modalTitle }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5 class="fs-15">
                                Overflowing text to show scroll behavior
                            </h5>
                            <p class="text-muted">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections.</p>
                            <p class="text-muted">The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me?" he thought.</p>
                            <p class="text-muted">It wasn't a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary ">Save Changes</button>
                        </div>

                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    {{-- End Modal --}}

</div>
