{{-- @extends('layouts.app')

@section('content') --}}
    <h1>Lista de Órdenes para adm</h1>
    <a href="{{ route('orders.create') }}">Crear nueva orden</a>
    <ul>
        @foreach ($orders as $order)
            <li>
                <a href="{{ route('orders.show', $order) }}">Orden #{{ $order->id }} - {{ $order->state }}</a><br>


                <form action="{{ route('orders.completar', $order) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Completar</button>
                </form>
            </li><br>
        @endforeach
    </ul>
{{-- @endsection --}}
