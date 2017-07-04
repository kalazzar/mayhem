@extends('layouts.master')

@section('content')
<head>
    <style type="text/css">
        #app-layout{
            background-image: url("{{asset('img/city.jpg')}}"); 
            background-size: cover; background-position: top center;
        }
    </style>
</head>
<div class="main mainSign-raised" style="top: 80px;margin-bottom: 10px;">
        <div class="topSignCard">
                <h5>Sign-Up</h5>
            </div>

    <div class="row" style="margin-top: 90px;">

        <div class="col-md-12">

            

                <div class="signBody">

                    {!! Form::open(['route' => 'register' ,'method'=>'POST', 'class' => 'form-horizontal']) !!}                            
                            
                        <div class="input-field col s12">
                        <i class="material-icons prefix">account_box</i>
                        <label for="name">Full Name</label>
                        <input id="name" name="name" type="text" class="validate" value="{{ old('name') }}" autofocus>
                        </div>

                        <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <label for="email" data-error="wrong" data-success="right">Email</label>
                        <input id="email" name="email" type="email" class="validate" value="{{ old('email') }}">
                        </div>

                        <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <label for="password" data-error="wrong" data-success="right">Password</label>
                        <input id="password" name="password" type="password" class="validate">                        
                        </div>

                        <div class="input-field col s12">                  
                        <i class="material-icons prefix">lock</i>
                        <label for="password_confirmation" data-error="wrong" data-success="right">Confirm Password</label>   
                        <input id="password_confirmation" name="password_confirmation" type="password" class="validate">                            
                        </div>


                        <div class="form-group">
                            <div class="col-md-12" style="margin-top: 30px;">
                                <div align="center">
                                
                                {!! Form::reset(trans('Clear'), ['class' => 'btn btn-primary']) !!}
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                {!! Form::submit(trans('Register'), ['class' => 'btn btn-primary']) !!}
                                <br><br>
                                <a href="{!! URL('login') !!}">{{ trans('Already have an acccount?') }}</a>
                                </div>
                            </div><!--col-md-6-->
                        </div><!--form-group-->

                    {!! Form::close() !!}

                    
                </div><!-- sign body -->


        </div><!-- col-md-8 -->

    </div><!-- row -->
</div>


@endsection
