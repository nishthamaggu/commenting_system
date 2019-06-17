@extends('layouts.app')

@section('content')
<div class="container">

<div class="row">
      <div class="medium-12 large-12 columns">
        <h5>By {{$listingData['author']}}</h5>
        <ul>{{$listingData['comment']}}
          <form action="{{route('reply')}}" method="post">
            {{ csrf_field() }}
            <div class="medium-4  columns">
              <div class="offset-md-3">
                  <button type="submit" class="btn btn-primary">
                      Reply
                  </button>
              </div>
            </div>
          </form>
          <div>
            <ul>
            @foreach($listingData['replies'] as $replies)
              <li>{{$replies['reply']."(".$replies['author'].")"}}
                <form action="{{route('subReply', ['parent_reply_id' => $replies['id']])}}" method="post">
                  {{ csrf_field() }}
                  <div class="medium-4  columns">
                    <div class="offset-md-3">
                        <button type="submit" class="btn btn-primary">
                            Reply
                        </button>
                    </div>
                  </div>
                </form>
              </li>
                <ul>
                @foreach($replies['subReply'] as $subreply)
                  <li>{{$subreply['reply']."(".$subreply['author'].")"}}</li>
                @endforeach
                </ul>
            @endforeach
            </ul>
          </div>
        </ul>
      </div>

</div>
@endsection