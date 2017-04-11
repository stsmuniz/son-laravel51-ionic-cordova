@extends('app')

@section('content')
<div class="container">
    <h3>Cupons</h3>

    <a href="{{ route('admin.cupons.create') }}" class="btn btn-primary">Novo Cupom</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Código</td>
            <td>Valor</td>
            <td>Ação</td>
        </tr>
        </thead>
        <tbody>
        @foreach($cupons as $cupom)
            <tr>
                <td>{{$cupom->id}}</td>
                <td>{{$cupom->code}}</td>
                <td>{{$cupom->value}}</td>
                <td><a href="{{route('admin.cupons.edit', ['id' => $cupom->id])}}" class="btn btn-sm btn-default">Editar</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $cupons->render() !!}
    <ul>

    </ul>
</div>
@endsection