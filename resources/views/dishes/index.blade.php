<h1>Registro de Platos</h1>
<a href="{{route('dishes.create')}}">Agregar Patlos</a>

<ul>
    @foreach ($dishes as $dish )
    <li><strong>Caregoria: {{$dish->category->name}}</strong> <br>
        <a href="{{route('dishes.show',$dish)}}">{{$dish->name}} - ${{$dish->price}}</li><br></a>

    @endforeach
</ul>
