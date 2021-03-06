@extends('layouts.master')

@section('content')
<head>
    <style type="text/css">
        #app-layout{
            background-image: url("{{asset('img/city.jpg')}}"); 
            background-size: cover; 
            background-position: top center;
        }
    </style>
</head>

<div class="main mainSign-raised">
        <div class="topSignCard">
                <h5>Sign-In</h5>
            </div>

    <div class="row" style="margin-top: 70px;">

        <div class="col-md-12">

            

                <div class="signBody">

                    {!! Form::open(['route' => 'login','method'=>'POST', 'class' => 'form-horizontal']) !!}                            
                               {{ csrf_field() }}
                            <div class="input-field col s12">
                             <i class="material-icons prefix">email</i>
                             <label for="email" data-error="wrong" data-success="right">Email</label>
                            <input id="email" name="email" type="email" class="validate">
                          </div>
                          <div class="input-field col s12">
                             <i class="material-icons prefix">lock</i>
                             <label for="password" data-error="wrong" data-success="right">Password</label>
                        <input id="password" name="password" type="password" class="validate">   
                          </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3" style="margin-top: 30px;">
                                <div align="center">
                                {!! Form::submit(trans('Login'), ['class' => 'btn btn-primary']) !!}
                                <br><br>
                                {{-- {!! route('password.request', trans('Forgot Your Password?')) !!} --}}
                                <!-- <a href="{{ URL('/register')}} ">{{ trans('Register new account') }}</a> -->
                                </div>
                            </div><!--col-md-6-->
                        </div><!--form-group-->

                    {!! Form::close() !!}

                    
                </div><!-- sign body -->


        </div><!-- col-md-8 -->

    </div><!-- row -->
</div>

@endsection
