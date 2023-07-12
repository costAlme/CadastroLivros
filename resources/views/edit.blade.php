@extends('template')

@section('content')

  <h1 class="text-center">Editar</h1>

  <div class="col-8 m-auto ">
    
        @if(isset($errors) && count($errors)>0)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">
          @foreach($errors->all() as $erro)
          {{$erro}}<br/>
          @endforeach
        </div>
      @endif
     
      <form name="formCad" id="formCad" method="post" action="/books/{{$book->id}}/update">
      @csrf
      @method('PUT')

      <label for="title">Titulo:</label>
      <input class="form-control mt-3 mb-4" type="text" name="title" id="price" id="title" placeholder="Titulo" value="{{$book->title}}" required>

      <label for="title">Autor:</label>
      <select class="form-control mt-3  mb-4" name="id_user" id="id_user">
        <option value="{{$book->relUsers->id ?? ''}}">{{$book->relUsers->name ?? 'Autor'}}</option>
       @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach
      </select><br>
     
      <label for="title">Paginas:</label>
      <input class="form-control mt-3 mb-4" type="pages" name="pages" id="pages" placeholder="Paginas" value="{{$book->pages }}" required>

      <label for="title">Preço:</label>
      <input class="form-control mt-3 mb-4" type="price" name="price" id="price" placeholder="Preço" value="{{$book->price}}" required>
      
      <input class="btn btn-primary" type="submit" value= "Editar Evento">

      </form>

  </div>
@endsection