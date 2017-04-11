@extends('app')

@section('content')
<div class="container">
    <h3>Categorias</h3>

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Nova Categoria</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Ação</td>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td><a href="{{route('admin.categories.edit', ['id' => $category->id])}}" class="btn btn-sm btn-default">Editar</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $categories->render() !!}
    <ul>

    </ul>
</div>
@endsection