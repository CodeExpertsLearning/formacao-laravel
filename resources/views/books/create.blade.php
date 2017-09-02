@extends('layouts.app')

@section('title')
    Livros
@endsection

@section('content')
    <div class="container text-center">
      <form method="post" action="{{ route('livros.store')}}">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-6 form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="col-md-6 form-group">
            <label for="author">Autor</label>
            <input type="text" class="form-control" name="author" id="author" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 form-group">
            <label for="edition">Edição</label>
            <input type="number" class="form-control" id="edition" name="edition" required>
          </div>
          <div class="col-md-4 form-group">
            <label for="year">Ano</label>
            <input type="number" class="form-control" name="year" id="year" max="{{ date('Y') }}" required>
          </div>
          <div class="col-md-4 form-group">
            <label for="quantity">Quantidade</label>
            <input type="number" class="form-control" name="quantity" id="quantity" min="1" required>
          </div>
        </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="publisher_id">Editora</label>
              <select class="select-menu form-control" id="publisher_id" name="publisher_id" required>
                @foreach($publishers as $publisher)
                  <option value="{{ $publisher->id}} "> {{ $publisher->name }}</option>
                @endforeach
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <input type="submit" value="Salvar" class="btn btn-success pull-right"></input>
            </div>
          </div>
        </div>
      </form>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            @if($errors->all())
              @foreach($errors->all() as $error => $content)
                <p>Erro: {{$content}}</p>
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
@endsection
