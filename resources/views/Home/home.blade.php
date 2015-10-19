@extends('Layouts.homelayout')
@section('content')
<div class="row">
    <div class="col-sm-6 phone">
        <img src="assets/img/iphone.png" alt="">
    </div>
    <div class="col-sm-5 form-box">
        <div class="form-top">
            <div class="form-top-left">
                <h3>Login</h3>
                <p>Login to get instant access:</p>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        There were some problems with your input.<br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            </div>
            <div class="form-top-right">
                <i class="fa fa-pencil"></i>
            </div>
        </div>
        <div class="form-bottom">
            <form role="form" action="{{ URL::route('LoginPage') }}" method="post" class="registration-form">
                <div class="form-group">
                    <label class="sr-only" for="form-first-name">First name</label>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {!! Form::text('email',null,array('class'=>'form-email form-control','placeholder'=>'Email/Username','id'=>'form-first-name')) !!}
                </div>
                <div class="form-group">
                    <label class="sr-only" for="form-last-name">Password</label>
                    {!! Form::password('password', array('class' => 'form-control','placeholder'=>'password')) !!}
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection