@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <img src="/uploads/avatars/{{ $user->avatar }}" class="media-object center-block img-rounded img-responsive" style="width: 262px; border-radius: 50%;margin-top: 20px;">

                <h3 class="panel-heading text-center">{{ $user->name }}<br>
                  <small class="text-muted">{{ $user->email }}</small>
                </h3>
                                
                <h3 class="panel-heading text-center">{{ $user->address }}</h3>
                <p class="text-center">
                    <a href="{{ route('user.edit') }}" class="btn btn-sm btn-info">Edit Profile</a>
                </p>

                <div class="panel-body text-center">
                    @include('alertify::alertify')
                    @component('components.who')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
