@extends('layouts.front')

@section('content')
  <div class="container">
    <hr color="#c0c0c0">
    @if (!is_null($nameline))
      <div class="row">
        <div class="headline col-md-10 mx-auto">
          <div class="row">
            <div class="col-md-6">
              <div class="name p-2">
                <h1>{{ str_limit($nameline->name,50)}}</h1>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <p class="gender mx-auto">{{str_limit($nameline->gender,50)}}</p>
          </div>
          <div class="col-md-6">
            <p class="hobby mx-auto">{{str_limit($nameline->hobby,50)}}</p>
          </div>
          <div class="col-md-6">
            <p class="introduction mx-auto">{{str_limit($nameline->introduction,650)}}</p>
          </div>
        </div>
      </div>
    @endif
    
    <hr color="#c0c0c0">
    <div class="row">
      <div class="posts col-md-8 mx-atuo mt-3">
        @foreach($posts as $post)
        <div class="post">
          <div class="row">
            <div class="text col-md-6">
              <div class="date">
                {{$post->updated_at->format('Y月m月d日')}}
              </div>
              <div class="name">
                {{str_limit($post->name,150) }}
              </div>
              <div class="gender mt-3">
                {{str_limit($post->gender,150)}}
              </div>
              <div class="hobby mt-3">
                {{str_limit($post->hobby,150)}}
              </div>
              <div class="introduction mt-3">
                {{str_limit($post->introduction,1500)}}
              </div>
            </div>
            
          </div>
        </div>
        <hr color="#c0c0c0">
        @endforeach
      </div>
    </div>
  </div>
  
@endsection