@extends('layouts.app')

@section('content')



      @foreach ($discussions as $discussion)
          
     

    <div class="card my-5">
    <div class="card-header">
    
    <div class="d-flex justify-content-between">
      <div>
        <img style="border-radius: 50%" width="40px" height="40px" src="{{Gravatar::src($discussion->author->email)}}" alt="">
        <span class="ml-2 font-weight-bold" >{{$discussion->author->name}}</span>    
      </div>
      <div>
      <a href="{{route('discussions.show',$discussion->slug)}}" class="btn btn-info btn-sm">View</a>
      </div>
    </div>

    </div>

        <div class="card-body">
          <div class="text-center">
            <strong>
              {{$discussion->title}}
            </strong>
          </div>
          
        </div>
    </div>
    @endforeach

    {{$discussions->links()}}
@endsection
