@extends('app')

@section('content')
    <div class="container">
        <h3>Novo Cupom</h3>

        @include('errors._chech')

        {!! Form::open(['route' => 'admin.cupons.store', 'class' => 'form']) !!}

        @include('admin.cupons._form')

        <div class="form-group">
            {!! Form::submit('Criar Cupom', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection