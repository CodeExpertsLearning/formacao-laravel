@extends('layouts.app')

@section('title')
    Livros
@endsection

@section('content')
    <div class="container text-center">
        <div class="row">
          <div class="col-md-12">
            <h2>
              <a href="{{ route('livros.create')}}" class="btn btn-success pull-right">Novo Livro</a>
              <span class="pull-left">Acervo de Livros</span>
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Título</th>
                  <th class="text-center">Autor</th>
                  <th class="text-center">Edição</th>
                  <th class="text-center">Editora</th>
                  <th class="text-center">Ano</th>
                  <th class="text-center">Quantidade</th>
                  <th class="text-center">Disponível</th>
                </tr>
              </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                  <td>{{ $book->id }}</td>
                  <td>{{ $book->title }}</td>
                  <td>{{ $book->author }}</td>
                  <td>{{ $book->edition }}</td>
                  <td>{{ $book->publisher->name }}
                  <td>{{ $book->year }}</td>
                  <td>{{ $book->quantity }}</td>
                  <td>{{ $book->available }}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>
        </div>
    </div>
@endsection
