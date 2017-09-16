{{ csrf_field() }}
<div class="row">
    <div class="col-md-6 form-group">
        <label for="title">Título</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ isset($book->title) ? $book->title : null }}" required>
    </div>
    <div class="col-md-6 form-group">
        <label for="author">Autor</label>
        <input type="text" class="form-control" name="author" id="author" value="{{ isset($book->author) ? $book->author : null }}" required>
    </div>
</div>
<div class="row">
    <div class="col-md-4 form-group">
        <label for="edition">Edição</label>
        <input type="number" class="form-control" id="edition" name="edition" value="{{ isset($book->edition) ? $book->edition : null }}" required>
    </div>
    <div class="col-md-4 form-group">
        <label for="year">Ano</label>
        <input type="number" class="form-control" name="year" id="year" max="{{ date('Y') }}" value="{{ isset($book->year) ? $book->year : null }}" required>
    </div>
    <div class="col-md-4 form-group">
        <label for="quantity">Quantidade</label>
        <input type="number" class="form-control" name="quantity" id="quantity" min="1" value="{{ isset($book->quantity) ? $book->quantity : null }}" required>
    </div>
</div>
<div class="row">
    <div class="col-md-12 form-group">
        <label for="publisher_id">Editora</label>
        <select class="select-menu form-control" id="publisher_id" name="publisher_id" required>
            @foreach($publishers as $publisher)
                <option value="{{ $publisher->id}}" @if(isset($book) && $publisher->id == $book->publisher->id) selected @endif> {{ $publisher->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <input type="submit" value="Salvar" class="btn btn-success pull-right">
    </div>
</div>
</div>
