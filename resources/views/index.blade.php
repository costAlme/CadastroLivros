@extends('template')

@section('content')
  <h1 class="text-center mt-3 mb-4">Crud</h1>

  <div class="text-center mt-3 mb-4">
    <a href="{{url('/book/create')}}" >
      <button class="btn btn-success">Cadastrar</button>
    </a>
  </div>

  <div class="col-8 m-auto">
  
  <table class="table text-center">
  <thead class="thead-dark">
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Titulo</th>
          <th scope="col">Autor</th>
          <th scope="col">Preço</th>
          <th scope="col">Action</th>
        </tr>
  </thead>

  <tbody>

    @foreach($book as $books)
    
      @php
        $user=$books->find($books->id)->relUsers;
      @endphp
        
    <tr>
      <th scope="row">{{$books->id}}</th>
      <td>{{$books->title}}</td>
      <td>{{$user->name}}</td>
      <td>{{$books->price}}</td>
      <td>
          <a href="{{url("books/$books->id")}}">
              <button class="btn btn-dark">Visualizar</button>
          </a>

          <a href="{{url("books/$books->id/edit")}}">
              <button class="btn btn-primary">Editar</button>
          </a>
          
          <form class="d-inline" action="books/{{$books->id}}" method="post">
              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-danger ">Deletar</button>
        </form>
      </td>
    </tr>
     @endforeach


        </tbody>
      </table>
    {{$book->links()}}
    </div>
@endsection