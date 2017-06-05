@extends('app')

@section('content')
<div class="container">
    <h3>Produtos</h3>

    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Novo Produto</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Produto</td>
            <td>Categoria</td>
            <td>Preço</td>
            <td>Ação</td>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="{{route('admin.products.edit', ['id' => $product->id])}}" class="btn btn-sm btn-default">Editar</a>
                    <a href="{{route('admin.products.destroy', ['id' => $product->id])}}" class="btn btn-sm btn-default">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $products->render() !!}
    <ul>

    </ul>
</div>
@endsection