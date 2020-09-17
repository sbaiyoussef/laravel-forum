@extends('layouts.app')

@section('content')



    <div class="card">
        <div class="card-header">Add discussion</div>

        <div class="card-body">
        <form action="{{route('discussions.store')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" value="">  
            </div>

            <div class="form-group">
                <input id="content" type="hidden" name="content">
                 <trix-editor input="content"></trix-editor>
            </div>

            <div class="form-group">
                <label for="channel">Channels</label>
                <select class="form-control" id='channel' name="channel">
                    @foreach ($channels as $channel)
                      <option value="{{$channel->id}}">
                           {{$channel->name}}
                      </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Create Descussion</button>
        </form>
        </div>
    </div>

@endsection


@section('css')
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
@endsection