@extends('master')

@section('sub_content')
    <form method="post" action="{{ route("save_pg") }}">
        <input name="_token" value="{{ csrf_token() }}" type="hidden">
        <input type="hidden" name="id_user" id="id_user" value="{{auth()->user()->id}}">
        <div class="row">

         <div class="col-3">
                <label for="user" class="label_size">{{ trans('user.utente')  }}</label>
                <select class="selectpicker " name="user" id="user" data-live-search="true"
                        data-style="btn-custom btn-dark">
                    <option value="">{{ trans('user.select_clan') }}</option>
                    @foreach($utenti as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach

                </select>
                @if ($errors->has('user')) <p class="help-block" style="color:red;">
                    {{ $errors->first('user') }}</p>
                @endif

            </div>
            <div class="col-3 pt-2">
                <label for="nome_pg" class="label_size">{{ trans('user.pg_name')  }}</label>
                <input type="text" id="nome_pg" name="nome_pg" value="">
                @if ($errors->has('nome_pg')) <p class="help-block" style="color:red;">
                    {{ $errors->first('nome_pg') }}</p>
                @endif

            </div>
            <div class="col-3">
                <label for="id_clan" class="label_size">{{ trans('user.select_clan_title')  }}</label>
                <select class="selectpicker " name="id_clan" id="id_clan" data-live-search="true"
                        data-style="btn-custom btn-dark">
                    <option value="">{{ trans('user.select_clan') }}</option>
                    @foreach($clan as $single_clan)
                        <option value="{{ $single_clan->id }}">{{ $single_clan->name_clan }}</option>
                    @endforeach

                </select>
                @if ($errors->has('id_clan')) <p class="help-block" style="color:red;">
                    {{ $errors->first('id_clan') }}</p>
                @endif

            </div>
            <div class="col-3">
                <label for="id_citta" class="label_size">{{ trans('user.select_citta_title')  }}</label>
                <select class="selectpicker" name="id_citta" id="id_citta" data-live-search="true"
                        data-style="btn-custom btn-dark">
                    <option value="">{{ trans('user.select_citta') }}</option>
                    @foreach($citta as $single_city)
                        <option value="{{ $single_city->istat }}">{{ $single_city->comune }}</option>
                    @endforeach

                </select>
                @if ($errors->has('id_citta')) <p class="help-block" style="color:red;">
                    {{ $errors->first('id_citta') }}</p>
                @endif


            </div>
            <div class="col-3 mt-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="attivo" name="attivo">
                    <label class="form-check-label" for="attivo">Attivo</label>
                </div>
            </div>
            <div class="col-12 text-center pt-3">
                <button class="btn btn-info">{{ trans('user.btn_submit') }}</button>

            </div>


        </div>
    </form>
    <div class="row text-center mt-3">
        <div class="col"> PG NON ATTIVI</div>
    </div>
    <div class="row text-center mt-3">
    @foreach($pg_inactive as $pg)
        <div class="col">{{ $pg->nome_pg }}</div>
    @endforeach
    </div>
@endsection
