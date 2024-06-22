<h1>Detalles</h1><strong>ref#:</strong>{{$dish->id}}

<div>
    <h2><strong>Categoria:</strong>{{$dish->category->name}}</h2>
    <p><strong>Nombre:</strong>{{$dish->name}}</p>
    <p><strong>Descripción:</strong>{{$dish->description}}</p>
    <p><strong>Precio:</strong>{{$dish->price}}</p>
</div>
<a href="{{route('dishes.edit', $dish)}}">Edit</a><br><br>
<form action="{{route('dishes.destroy',$dish)}}">
    @csrf
    @method('DELETE')

    <button>Eliminar Plato</button>

</form>
