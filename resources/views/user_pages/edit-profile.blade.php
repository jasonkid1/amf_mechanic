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
                                
                <div class="panel-body">
                    @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('submit.user.edit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" s autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" s>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Home Address</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="address" placeholder="Home Address" s>{{ old('address') }}</textarea>
                                
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-md btn-primary">
                                    <i class="glyphicon glyphicon-edit"></i> Update Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

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
