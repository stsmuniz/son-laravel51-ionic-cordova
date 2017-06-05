@extends('app')

@section('content')
    <div class="container">
        <h3>Editando Cupons {{$cupom->name}}</h3>

        @include('errors._chech')

        {!! Form::model($cupom, ['route' => ['admin.cupons.update', $cupom->id], 'class' => 'form']) !!}

        @include('admin.cupons._form')

        <div class="form-group">
            {!! Form::submit('Salvar Cupom', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection