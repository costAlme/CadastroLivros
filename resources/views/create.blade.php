@extends('template')

@section('content')
  <h1 class="text-center">
    Cadastrar
    </h1>

  <div class="col-8 m-auto ">
    
        @if(isset($errors) && count($errors)>0)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">
          @foreach($errors->all() as $erro)
          {{$erro}}<br/>
          @endforeach
        </div>
      @endif

      
      <form name="formCad" id="formCad" method="post" action="{{url('books')}}">
      
      @csrf
      <input class="form-control mt-3 mb-4" type="text" name="title" id="price" id="title" placeholder="Titulo" required>

      <select class="form-control " name="id_user" id="id_user">
            <option value="{{$book->relUsers->id ?? ''}}">{{$book->relUsers->name ?? 'Autor'}}</option>
        @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select><br>

      <input class="form-control mb-4" type="pages" name="pages" id="pages" placeholder="Paginas" required>
      <input class="form-control mt-3 mb-4" type="price" name="price" id="price" placeholder="Preço"  required>

      <input class="btn btn-primary" type="submit" value= "Cadastrar">

      </form>

      <a href="/books"><input class=" mt-3 btn btn-dark" type="submit" value= "Retornar"></a>

  </div>
@endsection