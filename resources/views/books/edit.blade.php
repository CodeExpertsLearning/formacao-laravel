@extends('layouts.app')

@section('title')
    Editar livro - {{ $book->title }}
@endsection

@section('content')
    <div class="container text-center">
        <form method="post" action="{{ route('book.update', ['id' => $book->id])}}">
            {{ method_field('PUT') }}
            @include('books.form')
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
