@extends('layouts/account')
@section('title')
  Projects
@endsection

@section('content')
<div>
  <h1>{{$project->title}}</h1>
  <h6>This is where all your projects are located - @ {{$project->user->name}}</h6>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="row">
          <div class="col-md-10">
              <div class="img-section">
                <div class="row">
                    @foreach ($project->inspirations as $inspiration)

                    <div class="col-md-3">
                      <div class="box">
                        <div style="position: relative; background: url('{{ $inspiration->image_url }}') no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; height: 200px;">
                        </div>
                      </div>
                    </div>

                    @endforeach
                </div>
              </div>
              <a href="/account/projects/{{$project->id}}/edit" onclick="confirm()" class="edit-btn">Edit</a>
              <a href="/account/projects/{{$project->id}}/delete" onclick="confirm()" class="delete-btn">Delete</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>

@endsection