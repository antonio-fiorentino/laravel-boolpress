@extends('base')

@section('title', 'Create Post')

@section('content')


<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    @method('POST')
    <div class="form-group">
        <label for="author_id">Autori</label>
        <select class="form-control" name="author_id" id="author_id">
          <option>-->Scegli un Autore<--</option>
          @foreach ($authors as $author)
            <option value="{{ $author->id }}">{{ $author->surname }}</option>
          @endforeach  
        </select>
      </div>
    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control" id="title-post" name='title' placeholder="Titolo Articolo">
    </div>

    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control" id="body" name='body' rows="6"></textarea>
    </div>

    <!--<div class="form-group">
      <label for="picture">Immagine</label>
      <input type="file" name="picture" class="form-control" id="">
    </div>-->

    <div class="form-group">
      <label for="tags[]">Tags</label>
      <select class="custom-select" id="tags" name="tags[]" multiple>
        @foreach ($tags as $tag)
          <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
      </select>  
    </div>

    <button type="submit" class="btn btn-primary mb-2">Submit</button>
  </form>

@endsection