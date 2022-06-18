@extends('layouts.base')
@section('title','Módulos')

@section('styles')
@endsection

@php
  $title = "Módulos";
@endphp

    @section('content')
          <!-- start page title -->
          <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ $title }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div>

                </div>
            </div>
          </div>
          <!-- end page title -->

          <div class="row">
            <div class="col-xxl-12">
                <div class="d-flex flex-column h-100">
                    <div class="row">
                      <div class="col-xxl-3 col-lg-6">
                        <a href="{{ route('almacen.almacenes') }}">
                          <div class="card card-body text-center">
                            <div class="avatar-sm mx-auto mb-3">
                                <div class="avatar-title bg-soft-success text-success rounded" style="font-size:36px">
                                    <i class="ri-home-5-line"></i>
                                </div>
                            </div>
                            <h4 class="card-title">Almacén</h4>
                        </div>
                        </a>
                      </div><!-- end col -->
                      <div class="col-xxl-3 col-lg-6">
                        <a href="{{ route('configuracion.usuarios') }}">
                          <div class="card card-body text-center">
                            <div class="avatar-sm mx-auto mb-3">
                                <div class="avatar-title bg-soft-primary text-primary rounded" style="font-size:36px">
                                    <i class="ri-settings-5-line"></i>
                                </div>
                            </div>
                            <h4 class="card-title">Configuración</h4>
                        </div>
                        </a>
                      </div><!-- end col -->
                    </div> <!-- end row-->
                </div>
            </div> <!-- end col-->
          </div> <!-- end row-->

      </section>
      <!--/ Style variation -->
    @endsection


@section('scripts')
@endsection