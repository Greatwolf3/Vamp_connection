@extends('layouts.app')

@section('content')

    <div class="row px-3">
        <div class="col-2">
            <div class="row">
                @if(!session()->get("id_pg"))

                    <div class="col-12"><a class="btn btn_primary" href="{{ route('crea_pg') }}"> Crea Pg</a></div>
                @else
                    <div class="col-12"><a class="btn btn_primary" href="{{ route('user_connection') }}"> Visualizza
                            connessioni</a></div>
                @endif
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

                                You are in PLAYER Dashboard!

                            </div>
                        </div>
                    </div>
                </div>

            @show
        </div>

    </div>
@endsection
