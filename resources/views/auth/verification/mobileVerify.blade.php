@extends('layouts.guest')
@section('page_name') Mobile Verification  @endsection
@section('heading')<div style="font-size: 16px" class="panel-heading text-center text-danger"><b> Mobile Number Verification</b></div> @endsection
@section('content')
<div class="card offset-xl-2 col-xl-8 border border-danger rounded mb-5">
    <div class="card-header bg-white mt-2">
        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success"> {{Session::get('success')}} </div> 
        @endif
        @if(Session::has('message')) 
            <div class="alert alert-info"> {{Session::get('message')}} </div> 
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger"> {{Session::get('error')}} </div> 
        @endif

        {!! Form::open(['url' => 'verify-code','method'=>'PATCH', 'class' => 'was-validated']) !!}
        {{ csrf_field() }}

        <div class="form-group row {{ $errors->has('verification_code') ? 'has-error' : ''}}">
            {!! Form::label('verification_code', 'Verification Code', ['class' => 'col-sm-3 col-form-label']) !!}
            <div class="col-md-6">
                {!! Form::number('verification_code', null, ['required','placeholder'=>'Enter Verification Code','class' => 'form-control']) !!}
                {!! $errors->first('verification_code', '<p class="help-block">:message</p>') !!}
            </div>
        </div>


        <div class="row">

            <div class="offset-xl-4 offset-lg-4 offset-md-4 offset-sm-4 offset-3"> <br>
                {!! Form::submit('Verify', ['class' => 'btn btn-success']) !!} or 
                <a class="btn btn-primary" href="{{ url('/resend-code') }}"
                onclick="event.preventDefault();
                document.getElementById('resend-code').submit();">Resend</a>                            
            </div>
        </div>
        {!! Form::close() !!}
        <form id="resend-code" action="{{ url('/resend-code') }}" method="POST" style="display: none;">
                {{ csrf_field() }}

            <input type="hidden" name="_method" value="PATCH">
        </form>
    </div>
</div>
@endsection