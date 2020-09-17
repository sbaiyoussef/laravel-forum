@extends('layouts.app')

@section('content')



<div class="card">
    <div class="card-header">

    <div class="d-flex justify-content-between">
      <div>
        <img style="border-radius: 50%" width="40px" height="40px" src="{{Gravatar::src($discussion->author->email)}}" alt="">
        <span class="ml-2 font-weight-bold" >{{$discussion->author->name}}</span>
      </div>
      {{-- <div>
      <a href="{{route('discussions.show',$discussion->slug)}}" class="btn btn-info btn-sm">View</a>
      </div> --}}
    </div>

    </div>

        <div class="card-body">
            <div class="text-center">
                <strong>
                  {{$discussion->title}}
                </strong>
            </div>

          <hr>

          {!! $discussion->content !!}


          @if ($discussion->bestReply)
              
        
          <div class="card bg-success my-5" style="color: white">
              <div class="card-header">
                  <div class="d-flex justify-content-between">
                      <div>
                          <img width="40px" height="40px" style="border-radius: 50%" src="{{Gravatar::src($discussion->bestReply->owner->email)}}" alt="">
                          <span class="ml-2 font-weight-bold">{{$discussion->bestReply->owner->name}}</span>
                      </div>
                      <div>
                        <span class="ml-2 font-weight-bold">Best Reply</span>
                    </div>
                  </div>
                  
              </div>

              <div class="card-body">
                  {!! $discussion->bestReply->content !!}
              </div>
          </div>
          @endif
        </div>
    </div>

    @foreach ($discussion->replies()->paginate(4) as $reply)


    <div class="card my-5">
      <div class="card-header">

       <div class="d-flex justify-content-between">
        <div>
           <img width="40px" height="40px" style="border-radius: 50%" src="{{Gravatar::src($reply->owner->email)}}" alt="">
           <span class="ml-2 font-weight-bold" >{{$reply->owner->name}}</span>
        </div>

        <div>
          @auth
            @if (auth()->user()->id == $discussion->user_id)

              <form action="{{route('discussions.best-Reply',['discussion'=>$discussion->slug,'reply'=>$reply->id])}}" method="POST">
                @csrf

              <button type="submit" class="btn btn-primary btn-sm" style="border-radius: 20%">Mark as best reply</button>

            </form>
            @endif
          @endauth
           
        </div>

       </div>

      </div>

      <div class="card-body">

        {!! $reply->content !!}

      </div>

    </div>

    @endforeach

    {{$discussion->replies()->paginate(4)->links()}}

    <div class="card my-5">
        <div class="card-header">

         Add Reply

        </div>

        <div class="card-body">
            @auth
        <form action="{{route('replies.store',$discussion->slug)}}" method="POST">
            @csrf
                 <input id="content" type="hidden" name="content">
                 <trix-editor input="content"></trix-editor>
                 <button type="submit" class="btn btn-success btn-sm my-2">Add Reply</button>
             </form>
            @else
               <a href="{{route('login')}}" class="btn btn-info">Sign In to Add Reply</a>
            @endauth

        </div>
    </div>

@endsection


@section('css')
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
@endsection