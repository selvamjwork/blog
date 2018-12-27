@extends('layouts.guest')

@section('page_name') Registration  @endsection

@section('css')
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection

@section('marquee')
<div class="container pt-5" id="marquee">
    <div class="row mt-5">
        @if(isset($scrollingmessage))
            @foreach($scrollingmessage as $message)
                <div class="col alert alert-warning">
                    <marquee class="text-danger" behavior="scroll" direction="left" scrollamount="8">
                        <h4>{{$message->scrolling_message}}</h4>
                    </marquee>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection

@section('heading') <div style="font-size: 16px" class="panel-heading text-center text-danger"><b> Registration&nbsp;&nbsp;</b><i class="fa fa-arrow-right">&nbsp;&nbsp;Create Profile &nbsp;&nbsp;</i> <i class="fa fa-arrow-right">&nbsp;&nbsp;Payment Confirmation&nbsp;&nbsp; </i> <i class="fa fa-arrow-right">&nbsp;&nbsp;Search Profile</i> </div> @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 align-content-center">
            <div class="basicform">
                @if(Session::has('message')) <div class="alert alert-info"> {{Session::get('message')}} </div> @endif

                <div class="card offset-xl-2 col-xl-8 border border-danger rounded mb-5">
                    <div class="card-header bg-white mt-2">
                        <form class="was-validated" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-sm-3 col-form-label">Name <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span></label>
                                <div class="col-xl-8 col-sm-9">
                                    <input id="name" type="text" class="form-control" placeholder="Enter Your Name" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('gender') ? ' has-error ': '' }}">
                                <label for="gender" class="col-sm-3 col-form-label">Gender <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span></label>
                                <div class="col-xl-9 col-sm-9">
                                    <label class="radio-inline"><input id="gender" type="radio" value="1" required name="gender">Male</label>
                                    <label class="radio-inline ml-3"><input id="gender" type="radio" value="2" required name="gender">Female</label>
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('dob') ? ' has-error' : '' }}">
                                <label for="dob" class="col-sm-3 col-form-label">DOB <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span></label>
                                <div class="col-xl-8 col-sm-9">
                                    <input id="dob" type="text" class="form-control" placeholder="dd-mm-yyyy" name="dob" value="{{ old('dob') }}" required autofocus>

                                    @if ($errors->has('dob'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('dob') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <label for="mobile" class="col-sm-3 col-form">Mobile Number <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span></label>

                                <div class="col-md-8 col-sm-9">
                                    <input id="mobile" placeholder="9078563412" type="number" maxlength="10" class="form-control" name="mobile" value="{{ old('mobile') }}" required autofocus>

                                    @if ($errors->has('mobile'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-3 control-label">{{ __('E-Mail Address') }}<i class="glyphicon glyphicon-asterisk text-danger"></i></span></label>

                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('caste') ? ' has-error' : '' }}">
                                <label for="caste" class="col-md-3 control-label">Caste <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span></label>

                                <div class="col-md-8">
                                {!! Form::select('caste', $casteArray, null, ['class' => 'form-control','required','placeholder'=>'Select Caste']) !!}
                                    @if ($errors->has('caste'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('caste') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('district') ? ' has-error' : '' }}">
                                <label for="district" class="col-md-3 control-label">District <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span></label>

                                <div class="col-md-8">
                                {!! Form::select('district', $districtArray, null, ['class' => 'form-control','required','placeholder'=>'Select District']) !!}
                                    @if ($errors->has('district'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('district') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-3 control-label">Password <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span></label>

                                <div class="col-md-8">
                                    <input id="password" placeholder="************" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-3 control-label">Confirm Password <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span></label>

                                <div class="col-md-8">
                                    <input id="password-confirm" placeholder="************" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="offset-xl-5 col-xl-1 offset-lg-5 col-lg-1 col-md-1 offset-md-5 offset-sm-5 col-sm-1 offset-4 col-2">
                                    <button type="submit" class="btn btn-success">{{ __('Register') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
<script>
    $('#dob').datepicker({
        format: 'dd-mm-yyyy',
        uiLibrary: 'bootstrap4'
    });
</script>
@endsection