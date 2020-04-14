@extends('master')

@section('sub_content')


    <div class="row text-center" id="msg">
        <div class="col-12 alert alert-danger" >ERRORE SESSIONE PG </div>

    </div>
    <div class="row text-center">
        <div class="col">
    @if($utente->role==0)
        <a class="btn btn-primary" href="{{ route('superadmin') }}" role="button">Home</a>
    @elseif ($utente->role==1)
        <a class="btn btn-primary" href="{{ route('master') }}" role="button">Home</a>
    @elseif($utente->role==2)
        <a class="btn btn-primary" href="{{ route('player') }}" role="button">Home</a>
    @else
        <a class="btn btn-primary" href="{{ route('logout') }}" role="button">Home</a>
    @endif
    </div>
    </div>
    <script>
jQuery( document ).ready(function() {
    setTimeout(function(){
        jQuery("#msg").hide();
    }, 2000)

});
    </script>
@endsection
