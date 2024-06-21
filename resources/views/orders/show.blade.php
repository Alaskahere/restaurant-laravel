
    <h1>Orden #{{ $order->id }}</h1>
    <p>Estado: {{ $order->state }}</p>
    <p>Mesa: {{ $order->table->name }} (Capacidad: {{ $order->table->capacity }})</p>
    <p>Platos:</p>
    <ul>
        @foreach ($order->dishes as $dish)
            <li>{{ $dish->name }} - {{ $dish->price }}</li>
        @endforeach
    </ul>
    <a href="{{ route('orders.edit', $order) }}">Editar</a>
    <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>

