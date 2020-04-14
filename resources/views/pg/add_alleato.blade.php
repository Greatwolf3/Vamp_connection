@extends('master')

@section('sub_content')

@if (session('msg'))
    <div class="row" id="msg">
        <div class="col-12 alert alert-success" >{{ session('msg') }}</div>
    </div>
@endif
    <form method="post" action="{{ route("save_alleato") }}">
        <input name="_token" value="{{ csrf_token() }}" type="hidden">
        <input type="hidden" name="id_pg" id="id_pg" value="{{session()->get("id_pg")}}">
        <div class="row">

            <div class="col-3">
                <label for="nome_alleato" class="label_size">{{ trans('user.name_alleato')  }}</label>
                <input type="text" id="nome_alleato" name="nome_alleato" value="">
                @if ($errors->has('nome_alleato')) <p class="help-block" style="color:red;">
                    {{ $errors->first('nome_alleato') }}</p>
                @endif

            </div>

            <div class="col-3">
                <label for="tipologia" class="label_size">{{ trans('user.title_tipologie')  }}</label>
                <select class="selectpicker " name="tipologia" id="tipologia" data-live-search="true"
                        data-style="btn-custom btn-dark">
                    <option value=""></option>
                    @foreach($tipologie as $tipologia)
                        <option value="{{ $tipologia->id }}">{{ $tipologia->nome_tipologia }}</option>
                    @endforeach

                </select>
                @if ($errors->has('tipologia')) <p class="help-block" style="color:red;">
                    {{ $errors->first('tipologia') }}</p>
                @endif

            </div>

            <div class="col-12 text-center pt-3">
                <button class="btn btn-info">{{ trans('user.btn_submit') }}</button>

            </div>


        </div>
    </form>
    <script>
jQuery( document ).ready(function() {
    setTimeout(function(){
        jQuery("#msg").hide();
    }, 2000)

});
    </script>
@endsection
