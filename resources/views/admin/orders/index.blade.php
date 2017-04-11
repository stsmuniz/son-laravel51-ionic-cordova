@extends('app')

@section('content')
<div class="container">
    <h3>Pedidos</h3>

    <table class="table table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Ação</td>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td><a href="{{route('admin.orders.edit', ['id' => $order->id])}}" class="btn btn-sm btn-default">Editar</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $orders->render() !!}
    <ul>

    </ul>
</div>
@endsection