@extends('master')

@section('sub_content')
    <form method="post" action="{{ route("save_pg") }}">
        <input name="_token" value="{{ csrf_token() }}" type="hidden">
        <input type="hidden" name="id_user" id="id_user" value="{{auth()->user()->id}}">
        <div class="row">

            <div class="col-3">
                <label for="nome_giocatore" class="label_size">{{ trans('user.pg_name')  }}</label>
                <input type="text" id="nome_giocatore" name="nome_giocatore" value="">
                @if ($errors->has('nome_giocatore')) <p class="help-block" style="color:red;">
                    {{ $errors->first('nome_giocatore') }}</p>
                @endif

            </div>
            <div class="col-3">
                <label for="nome_pg" class="label_size">{{ trans('user.pg_name')  }}</label>
                <input type="text" id="nome_pg" name="nome_pg" value="">
                @if ($errors->has('nome_pg')) <p class="help-block" style="color:red;">
                    {{ $errors->first('nome_pg') }}</p>
                @endif

            </div>
            <div class="col-3">
                <label for="id_clan" class="label_size">{{ trans('user.select_clan_title')  }}</label>
                <select class="selectpicker " name="id_clan" id="clan_pg" data-live-search="true"
                        data-style="btn-custom btn-dark">
                    <option value="">{{ trans('clan.select_clan') }}</option>
                    @foreach($clan as $single_clan)
                        <option value="{{ $single_clan->id }}">{{ $single_clan->name_clan }}</option>
                    @endforeach

                </select>
                @if ($errors->has('clan_pg')) <p class="help-block" style="color:red;">
                    {{ $errors->first('clan_pg') }}</p>
                @endif

            </div>
            <div class="col-3">
                <label for="id_citta" class="label_size">{{ trans('user.select_citta_title')  }}</label>
                <select class="selectpicker" name="id_citta" id="id_citta" data-live-search="true"
                        data-style="btn-custom btn-dark">
                    <option value="">{{ trans('citta.select_citta') }}</option>
                    @foreach($citta as $single_city)
                        <option value="{{ $single_city->istat }}">{{ $single_city->comune }}</option>
                    @endforeach

                </select>
                @if ($errors->has('citta_pg')) <p class="help-block" style="color:red;">
                    {{ $errors->first('citta_pg') }}</p>
                @endif


            </div>
            <div class="col-12 text-center pt-3">
                <button class="btn btn-info">{{ trans('user.btn_submit') }}</button>

            </div>


        </div>
    </form>
@endsection
