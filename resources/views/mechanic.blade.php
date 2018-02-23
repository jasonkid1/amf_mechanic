@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <img src="/uploads/avatars/{{ $user->avatar }}" class="media-object img-rounded img-responsive" style="width: 262px;">
                <form enctype="multipart/form-data" action="{{ route('update.avatar') }}" method="POST">
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
                    @component('components.who')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
