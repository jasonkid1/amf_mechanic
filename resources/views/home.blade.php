@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <img src="/uploads/avatars/{{ $user->avatar }}" class="media-object img-rounded img-responsive" style="width: 262px;">
                <form enctype="multipart/form-data" action="{{ route('profile') }}" method="POST">
                    <label>Update Profile Image</label>
                    <input type="file" name="avatar" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-xs btn-primary">
                </form>
                <div class="panel-heading">{{ $user->name }}</div>

                <div class="panel-body">
                    @component('components.who')
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form action="/home/search" method="GET" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" placeholder="Seach Mechanics"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span>Go</span>
                                </button>
                            </span>    
                        </div>
                    </form>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-warning">
                            {{ session('status') }}
                        </div>
                    @else
                    @foreach ($mechanics as $mechanic)
                    <div class="row" style="border-top: 1px dashed #ccc;padding-top: 10px; padding-bottom: 10px;">
                        <div href="#" >
                            <div class="media col-md-3 hidden-sm">
                                <figure class="pull-left">
                                    <img class="media-object img-rounded img-responsive" src="/uploads/avatars/{{ $mechanic->avatar }}" alt="placehold.it/350x250">
                                </figure>
                            </div>

                            <div class="col-md-6 hidden-xs">
                                <h4 class="list-group-item-heading"><a href="{{ route('user.mechanic',$mechanic->id) }}"> {{ $mechanic->name }} </a></h4>
                                <p class="list-group-item-text">
                                 {{ $mechanic->address }} <strong>{{ $mechanic->zipcode }}</strong>        
                                </p>
                                <p>
                                    <strong>Featured Skills</strong>
                                    @foreach ($mechanic->mechanicSkills as $skill)
                                      <p class="list-group-item-text">{{ $skill->skill }}</p>
                                    @endforeach
                                </p>
                                <p>
                                    @if($mechanic->verified == 1)
                                    <span style="font-size: 12px;" class="label label-success">Verified Account</span>
                                    @endif 
                                </p>
                            </div>
                            <div class="col-md-3 text-center">
                                <h4> 
                                        {{ number_format($mechanic->getAllMechanicTotal($mechanic->id),0) }} 
                                    <small>
                                        @if($mechanic->getAllMechanicTotal($mechanic->id) > 1) 
                                        Stars
                                        @else
                                        Star
                                        @endif 
                                    </small>
                                        {{ number_format($mechanic->getAllMechanicComments($mechanic->id),0) }}
                                    <small>
                                        @if($mechanic->getAllMechanicComments($mechanic->id) > 1)
                                        Comments
                                     @else
                                        Comment
                                     @endif
                                    </small>
                                </h4>

                                    <span class="stars" data-rating="{{ number_format($mechanic->getAllMechanicAverage($mechanic->id),0) }}" data-num-stars="{{ number_format($mechanic->getAllMechanicAverage($mechanic->id),1) }}" ></span>
                                
                                <p><strong>Rating</strong> {{ number_format($mechanic->getAllMechanicAverage($mechanic->id),1) }} <small> / </small> 5 </p>
                                    @if($mechanic->status == 1)
                                    <a href="{{ route('user.mechanic',$mechanic->id) }}" type="button" class="btn btn-success btn-lg btn-block">Available</a> 
                                    @else
                                    <a href="{{ route('user.mechanic',$mechanic->id) }}" type="button" class="btn btn-danger btn-lg btn-block">Unavailable</a> 
                                    @endif
                            </div>
                        </div> 
                    </div>
                    @endforeach

                    <div class="row">
                        <div class="col-md-12 text-right">
                                {{ $mechanics->links() }}
                        </div>
                    </div>
                    @endif
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
