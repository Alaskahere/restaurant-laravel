<h1>Actualizar Plato</h1>
<form action="{{ route('dishes.update',$dish) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label>Nombre
            <input type="text" name="name" value="{{$dish->name}}" required>
        </label>
    </div>
    <div>

        <label>Descripcion:</label><br>
        <textarea name="description" id="" cols="20" rows="10" required>{{$dish->description}}</textarea>
    </div>
    <div>

        <label>Precio:
            <input type="number" name="price" value="{{$dish->price}}" required>
        </label>
    </div>
    <div>
        <label >Categoria:

        <select name="category_id" required>
            @foreach ($categories as $category)
               <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach

        </select>
    </label>
    </div><br>
    <button>Actualizar</button>


</form>
