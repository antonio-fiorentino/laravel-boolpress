@extends('base')

@section('title', 'Create Post')

@section('content')

@dump($author)

<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    @method('POST')
    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control" id="title-post" name='title' placeholder="Titolo Articolo">
    </div>

    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control" id="body" name='body' rows="6"></textarea>
    </div>
  </form>

  <button type="submit" class="btn btn-primary mb-2">Submit</button>
@endsection