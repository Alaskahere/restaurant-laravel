
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
                <option value="{{ $table->id }}" {{ $table->id == $table->table_id ? 'selected' : '' }}>
                    {{ $table->name }} (Capacidad: {{ $table->capacity }})
                </option>
            @endforeach
        </select>
        <br>
        <label for="platos">Platos:</label>
        <select name="dishes[]" id="platos" multiple required>
            @foreach ($dishes as $dishe)
                <option value="{{ $dishe->id }}" {{ in_array($dishe->id, $order->dishes->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $dish->name }} ({{ $dish->price }})
                </option>
            @endforeach
        </select>
        <br>
        <button type="submit">Actualizar orden</button>
    </form>

