@extends('layouts.app')

@section('content')
    <div class="row">
    @if(!session()->get("id_pg"))
        <div class="col-12 alert alert-danger text-center"> Nessun PG selezionato</div>
        @else
            <div class="col-12 alert alert-success text-center">PG selezionato <strong>{{ session()->get("nome_pg") }} </strong> da ora fino al reset della selezione pg ogni azione sarà riferita al pg selezionato</div>
    @endif
    </div>
<div class="row px-3">
    <div class="col-2">
        <div class="row">


                    <div class="col-12"><a class="btn btn_primary" href="{{ route('crea_pg_admin') }}"> Crea Pg</a></div>
                 <div class="col-12"><a class="btn btn_primary" href="{{ route('seleziona_pg_admin') }}"> Seleziona Pg</a></div>
                    <div class="col-12"><a class="btn btn_primary" href="{{ route("add_alleato") }}"> Add Alleati</a></div>
                    <div class="col-12"><a class="btn btn_primary" href="{{ route("add_contatto_generico") }}"> Add contatto generico</a></div>
                    <div class="col-12"><a class="btn btn_primary" href="{{ route('user_connection') }}"> Visualizza connessioni</a></div>

        </div>
        <div class="row mt-2">


            <div class="col-12"><a class="btn btn_primary" href="{{ route('crea_pg_admin') }}"> Crea Evento</a></div>
        </div>
    </div>
    <div class="col-10">
        @section('sub_content')

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Dashboard</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            You are in ADMIN Dashboard!

                        </div>
                    </div>
                </div>
            </div>

        @show
    </div>

</div>
@endsection
