{{-- @extends('layouts.app')

@section('content') --}}
    <h1>Órdenes</h1>
    <a href="{{ route('orders.create') }}">Crear nueva orden</a>
    <ul>
        @foreach ($orders as $order)
            <li>
                <a href="{{ route('orders.show', $order) }}">Orden #{{ $order->id }} - {{ $order->state }}</a>
                <a href="{{ route('orders.edit', $order) }}">Editar</a>
                <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
                <form action="{{ route('orders.completar', $order) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Completar</button>
                </form>
            </li>
        @endforeach
    </ul>
{{-- @endsection --}}
