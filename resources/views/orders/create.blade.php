


    <h1>Crear nueva orden</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <label for="mesa_id">Mesa:</label>
        <select name="table_id" id="mesa_id" required>
            @foreach ($tables as $table)
                <option value="{{ $table->id }}">{{ $table->name }} (Capacidad: {{ $table->capacity }})</option>
            @endforeach
        </select>
        <br><br>
        <label for="platos">Platos:</label>
        <div id="platos">
            @foreach ($dishes as $dish)
                <div>
                    <input type="checkbox" name="dishes[]" value="{{ $dish->id }}" id="plato-{{ $dish->id }}">
                    <label for="plato-{{ $dish->id }}">{{ $dish->name}} ({{ $dish->price }})</label>
                </div>
            @endforeach
        </div>
        <br><br>
        <button type="submit">Crear orden</button>
    </form>

