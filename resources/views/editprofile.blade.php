@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <input type="hidden" name="id" value="{{Auth::user()->id}}" >
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name </label>
                            <div class="col-md-6">
		                   <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autofocus>	
		                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail </label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                        
                        
                       <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
	                    <div class="form-group">
							<label for="image" class="col-md-4 control-label">Upload Your Image :</label>
							<input type="file" name="image" value="image" >
							
							   @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                              </div>
						</div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" name="save" value="save" class="btn btn-success">
                                   Save
                                </button>
                                
                                <button type="submit" name="cancel" value="cancel" class="btn btn-danger">
                                   Cancel
                                </button>
                                
                            </div>
                  </form>
             </div>
          </div>
        </div>
       </div>
    </div>
@endsection