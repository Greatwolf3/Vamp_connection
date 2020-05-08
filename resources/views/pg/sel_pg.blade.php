@extends('master')

@section('sub_content')
    <form method="post" action="{{ route("mem_sel_pg_admin") }}">
        <input name="_token" value="{{ csrf_token() }}" type="hidden">

        <div class="row">

            <div class="col-3">
                <label for="user" class="label_size">{{ trans('user.pg_name')  }}</label>
                <select class="selectpicker " name="id_pg" id="id_pg" data-live-search="true"
                        data-style="btn-custom btn-dark">
                    <option value="">{{ trans('user.pg_name') }}</option>
                    @foreach($pg as $personaggio)
                        <option value="{{ $personaggio->id }}">{{ $personaggio->nome_pg }}</option>
                    @endforeach

                </select>
                @if ($errors->has('id_pg')) <p class="help-block" style="color:red;">
                    {{ $errors->first('id_pg') }}</p>
                @endif

            </div>

            <div class="col-12 text-center pt-3">
                <button class="btn btn-info">Memorizza PG selezionato</button>
                <a class="btn btn-primary" href="{{ route('reset_sel_pg_admin') }}" role="button">Reset selezione pg</a>
            </div>


        </div>
    </form>
@endsection
