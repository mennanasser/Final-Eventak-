@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::user()->name }}’s Profile</div>

                <div class="panel-body">
                    
                    <img src="{{asset($user->image)}}" style= width:"120px"; height="140px"; border-radius:50% ;>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
