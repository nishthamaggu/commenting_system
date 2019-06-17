@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
        <h4>'Add Answer'</h4>
        <form action="{{ route('storeSubReply') }}" method="post">
          {{ csrf_field() }}
          <!-- @csrf -->
              <br>
            
              <div class="medium-4  columns">
                  <label> Reply * </label>
                  <textarea id="reply" type="text"  name="reply"  rows="3"></textarea>

              </div>
              <br>
              <div class="medium-4  columns">
                  <label> Author * </label>
                  <input id="author" type="text"  name="author"  rows="3" >

              </div>
              <br>
          <div class="medium-4  columns">
            <div class="offset-md-3">
                <button type="submit" class="btn btn-primary">
                    Add Reply
                </button>
            </div>
          </div>
          
        </form>
</div>  
</div>

@endsection