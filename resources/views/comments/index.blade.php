@extends('layouts.app')

@section('content')
<div class="container">

<div class="row">
      <div class="medium-12 large-12 columns">
        <table class="stack">
          <thead>
            <tr>
              <th width="200">Id</th>
              <th width="200">Comment</th>
              <th width="200">Author</th>
            </tr>
          </thead>
          <tbody>

          @foreach( $comments as $comment )
              <tr>
                <td>{{ $comment->id}}</td>
                <td>{{ $comment->comment }}</td>
                <td>{{ $comment->author }}</td>
                <td class="d-flex">

                  <a class="btn" href="{{ route('comments.show', ['id' => $comment->id ]) }}">Show</a>
                  <a class="btn" href="{{ route('comments.edit', ['id' => $comment->id ]) }}">Edit</a>
                  <form action="{{route('comments.destroy', [ 'id' => $comment->id ])}}" method="post">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <div class="medium-4  columns">
                      <div class="offset-md-3">
                          <button type="submit" class="btn btn-primary">
                              Delete Comment
                          </button>
                      </div>
                    </div>
                  </form>
                </td>
              </tr>
          @endforeach

              
                      </tbody>
        </table>

        
      </div>
    </div>
  </div>
@endsection