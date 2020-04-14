@extends('layouts.app')

@section('content')
    <div class="container" style="display: flex; justify-content: center; align-items: center; height: 100vh">
       <div class="row text-center" >
           <div class="col-12 " style="border:2px solid limegreen"> {{ $pg[0]->nome_pg }}</div>
           <div class="col-12 text-center my-1"><i class="far fa-arrow-alt-circle-down"></i></div>
           @if($alleati)<div class="col-12 alert-info" id="alleati">Alleati</div>@endif
           @if($contatti)<div class="col-12 alert-secondary" id="contatti_generici">Contatti Generici</div>@endif
       </div>
    </div>
    <div id="div_alleati" style="display:none; position:absolute; top:50px; left:50px; border: 2px solid #bee5eb;">
        <div class="row " style="width:300px">
            <div class="col-12 text-center font-weight-bold">Alleati</div>
            <div class="col-12">
                <div class="row">
                    <div class="col font-weight-bold">Nome</div>
                    <div class="col font-weight-bold">Tipologia</div>
                </div>
            </div>
            @foreach($alleati  as $alleato)
                <div class="col-12">
<div class="row px-1">
    <div class="col">{{ $alleato->nome_alleato }}</div>
    <div class="col">{{ $alleato->nome_tipologia }}</div>
</div>
                </div>
        @endforeach

    </div>
    </div>
    <div id="div_contatti_generici" style="display:none; position:absolute; top:50px; right:150px;">
        <div class="row " style="width:300px">
            <div class="col-12 text-center font-weight-bold">Contatti Generici</div>
            <div class="col-12">
                <div class="row">
                    <div class="col font-weight-bold">Nome</div>
                    <div class="col font-weight-bold">Tipologia</div>
                </div>
            </div>
            @foreach($contatti  as $contatto)
                <div class="col-12">
                    <div class="row px-1">
                        <div class="col">{{ $contatto->nome_contatto }}</div>
                        <div class="col">{{ $contatto->nome_tipologia }}</div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
<script>
    jQuery("#alleati").click(function(){
        var bg_color=jQuery(this).css("background-color");
        console.log(bg_color);
        jQuery("#div_alleati").css("background-color",bg_color);
        jQuery("#div_alleati").toggle();
    });
    jQuery("#contatti_generici").click(function(){
        var bg_color=jQuery(this).css("background-color");
        console.log(bg_color);
        jQuery("#div_contatti_generici").css("background-color",bg_color);
        jQuery("#div_contatti_generici").toggle();
    });
</script>
@endsection
