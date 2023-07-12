@extends('template')

@section('content')
  <h1 class="text-center mt-3 mb-4">Visualizar</h1>

  <div class="col-8 m-auto">
    
@php
 $user=$book->find($book->id)->relUsers;
@endphp

      Titulo: {{$book->title}}<br>
      Paginas: {{$book->pages}}<br>
      Preco: {{$book->price}}<br>
      Autor: {{$user->name}}<br>
      Email do autor: {{$user->email}}<br>

     
        <a href="/books"><button  class="btn btn-dark  mt-3 mb-4">Retornar</button></a>
      
</div>
@endsection