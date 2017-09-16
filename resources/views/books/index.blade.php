@extends('layouts.app')

@section('title')
    Livros
@endsection

@section('content')
    <div class="container text-center">
        <div class="row">
          <div class="col-md-12">
            <h2>
              <a href="{{ route('book.create')}}" class="btn btn-success pull-right">Novo Livro</a>
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
                  <th class="text-center">Opções</th>
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
                  <td class="form-inline">
                      <div class="form-group">
                          <form method="get"
                                action="{{ route('book.edit', ['id' => $book->id]) }}"
                                role="form"
                                id="form-edit">
                              <button type="submit" class="btn btn-primary">
                                  <i class="glyphicon glyphicon-pencil"></i> Editar
                              </button>
                          </form>
                      </div>
                      <div class="form-group">
                          <form method="post"
                                action="{{ route('book.delete', ['id' => $book->id]) }}"
                                role="form"
                                id="form-delete">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button type="submit" class="btn btn-danger">
                                  Excluir
                              </button>
                          </form>
                      </div>
                  </td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>
        </div>
        <div class="row">
            {{ $books->render() }}
        </div>
    </div>
@endsection
