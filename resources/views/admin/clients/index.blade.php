@extends('app')

@section('content')
<div class="container">
    <h3>Clientes</h3>

    <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">Novo Cliente</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Ação</td>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{$client->id}}</td>
                <td>{{$client->user->name}}</td>
                <td><a href="{{route('admin.clients.edit', ['id' => $client->id])}}" class="btn btn-sm btn-default">Editar</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $clients->render() !!}
    <ul>

    </ul>
</div>
@endsection