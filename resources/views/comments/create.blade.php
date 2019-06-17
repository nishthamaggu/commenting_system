@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
        <h4>{{ $modify == 1 ? 'Modify Comment' : 'Add Comment' }}</h4>
        <form action="{{ $modify == 1 ? route('comments.update', [ 'id' => $comment->id ]) : route('comments.store') }}" method="post">
          {{ csrf_field() }}
          @csrf

            @if ($modify)
                @method('PUT')
            @endif
              <br>
              <div class="medium-4  columns">
                  <label> Comment * </label>
                  <textarea id="comment" type="text"  name="comment"  rows="3" required>{{ old('comment') ? old('comment') : ($modify ? $comment->comment : '') }}</textarea>

              </div>
              <br>
              <div class="medium-4  columns">
                  <label> Author * </label>
                  <input id="author" type="text"  name="author"  rows="3" value="{{ old('author') ? old('author') : ($modify ? $comment->author : '') }}" required>

              </div>
              <br>
          <div class="medium-4  columns">
            <div class="offset-md-3">
                <button type="submit" class="btn btn-primary">
                    {{$modify ? "Update" : "Add"}} Comment
                </button>
            </div>
          </div>
          
        </form>
</div>  
</div>

@endsection