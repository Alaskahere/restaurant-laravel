


    <h1>Crear nueva orden</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        
        <label for="mesa_id">Mesa:</label>
        <select name="table_id" id="mesa_id" required>
            @foreach ($tables as $table)
                <option value="{{ $table->id }}">{{ $table->name }} (Capacidad: {{ $table->capacity}})</option>
            @endforeach
        </select>
        <br>
        <label for="platos">Platos:</label>
        <select name="dishes[]" id="platos" multiple required>
            @foreach ($dishes as $dish)
                <option value="{{ $dish->id }}">{{ $dish->name }} ({{ $dish->price }})</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Crear orden</button>
    </form>

