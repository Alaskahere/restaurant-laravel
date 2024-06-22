
    <h1>Editar orden #{{ $order->id }}</h1>
    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- <label for="estado">Estado:</label>
        <input type="text" name="state" id="estado" value="{{ $order->state }}" required>
        <br> --}}

        <label for="mesa_id">Mesa:</label>
        <select name="table_id" id="mesa_id" required>
            @foreach ($tables as $table)
                <option value="{{ $table->id }}" {{ $table->id == $order->table_id ? 'selected' : '' }}>
                    {{ $table->name }} (Capacidad: {{ $table->capacity }})
                </option>
            @endforeach
        </select>
        <br>
        <label for="platos">Platos:</label>
        <div id="platos">
            @foreach ($dishes as $dish)
                <div>
                    <input type="checkbox" name="dishes[]" value="{{ $dish->id }}" id="dish-{{ $dish->id }}"
                    {{ in_array($dish->id, $order->dishes->pluck('id')->toArray()) ? 'checked' : '' }}>
                    <label for="dish-{{ $dish->id }}">{{ $dish->name }} ({{ $dish->price }})</label>
                </div>
            @endforeach
        </div>
        <br>
        <button type="submit">Actualizar orden</button>
    </form>

