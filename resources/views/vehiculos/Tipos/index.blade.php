@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Tipos de Vehiculos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" >
                            <a href="{{route('tipos.create')}}" class="btn btn-warning mb-0 mt-1">Nuevo</a>
                            <a href="{{route('vehiculos.index')}}" class="btn btn-success mb-0 mt-1 ml-1"> Vehiculos</a>

                        <div class="titulo mt-3 mb-1">Lista de tipos</div>
                        
                        <div class="table-responsive">  
                         @include('vehiculos/Tipos.DatatableTipo')
                     </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
