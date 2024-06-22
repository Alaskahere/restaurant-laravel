<h1>Agregar Plato</h1>
<form action="{{ route('dishes.store') }}" method="POST">
    @csrf
    <div>
        <label>Nombre
            <input type="text" name="name" required>
        </label>
    </div>
    <div>

        <label>Descripcion:</label><br>
        <textarea name="description" id="" cols="20" rows="10" required></textarea>
    </div>
    <div>

        <label>Precio:
            <input type="number" name="price" required>
        </label>
    </div>
    <div>
        <label >Categoria:

        <select name="category_id" required>
            <option >Elige una opción</option>
            @foreach ($categories as $category)
               <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach

        </select>
    </label>
    </div><br>
    <button>Enviar</button>


</form>
