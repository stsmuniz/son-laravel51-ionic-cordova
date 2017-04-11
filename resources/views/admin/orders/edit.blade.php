@extends('app')

@section('content')
    <div class="container">
        <h3>Editando Pedido #{{$order->id}} - R$ {{$order->total}}</h3>
        <h3>Cliente: {{$order->client->user->name}}</h3>
        <h4>Data: {{$order->created_at}}</h4>

        <p>
            <b>Entregar em:</b><br>
            {{$order->client->address}} - {{$order->client->city}} / {{$order->client->state}}
        </p>

        @include('errors._chech')

        {!! Form::model($order, ['route' => ['admin.orders.update', $order->id], 'class' => 'form']) !!}

        @include('admin.orders._form')

        <div class="form-group">
            {!! Form::submit('Salvar Pedido', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection