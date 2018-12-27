@extends('layouts.profile')

@section('page_name') Profile  @endsection

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

@section('heading') <div style="font-size: 16px" class="panel-heading text-center text-danger">Registration&nbsp;&nbsp;<i class="fa fa-arrow-right">&nbsp;&nbsp;<b>Create Profile</b> &nbsp;&nbsp;</i> <i class="fa fa-arrow-right">&nbsp;&nbsp;Payment Confirmation&nbsp;&nbsp; </i> <i class="fa fa-arrow-right">&nbsp;&nbsp;Search Profile</i></div> @endsection
@section('content')
        @if(Session::has('success'))
            <div class="alert alert-success"> {{Session::get('success')}} </div> 
        @endif
        @if(Session::has('message')) 
            <div class="alert alert-info"> {{Session::get('message')}} </div> 
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger"> {{Session::get('error')}} </div> 
        @endif
<div class="card offset-xl-2 col-xl-8 border border-danger rounded mb-5">
    <div class="card-header bg-white mt-2">
        <div class="form-top">
            <div class="form-top-left">
                <h3 class="text-center"><strong>Step 1 / 4</strong></h3>
                <p class="text-center"><strong>Personal Details - சொந்த விவரங்கள்</strong></p>
                <h3 class="text-center"><strong>Step 2 / 2</strong></h3>
            </div>
        </div>
        {!! Form::model($user, ['method' => 'PATCH', 'url' => ['/personal2'],'role'=>'form','class' => 'was-validated','files' => true ]) !!}
        <div class="form-bottom">
            
            <div class="form-group row{{ $errors->has('degree') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('degree', 'Degree (பட்டம்)', ['class' => 'control-label']) !!} {!! Form::select('degree', $graduateArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Select Degree (பட்டம்)-']) !!} {!! $errors->first('degree', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('profession') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('profession', 'Profession (தொழில்முறை)', ['class' => 'control-label']) !!} {!! Form::select('profession', $professionalArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Select Profession (தொழில்முறை)-']) !!} {!! $errors->first('profession', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('mother_tongue') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('mother_tongue', 'Mother Tongue (தாய் மொழி)', ['class' => 'control-label']) !!} {!! Form::select('mother_tongue', $mothers_tongueArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Select Mother Tongue (தாய் மொழி)-']) !!} {!! $errors->first('mother_tongue', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('height') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    {!! Form::label('height', 'Height (உயரம்) in CM', ['class' => 'control-label']) !!}
                    <!-- {!! Form::number('height', null, ['placeholder'=>'Height (உயரம்) in CM','class' => 'form-control']) !!} -->
                    <input type="text" name="height" onkeyup="checkInput(this)" / maxlength="3" placeholder="Height (உயரம்) in CM" required value="<?php echo $user->height; ?>" class="form-control"> {!! $errors->first('height', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('weight') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    {!! Form::label('weight', 'Weight (எடை) in KG', ['class' => 'control-label']) !!}
                    <!-- {!! Form::number('weight', null, ['placeholder'=>'Weight (எடை) in KG','class' => 'form-control']) !!} -->
                    <input type="text" name="weight" onkeyup="checkInput(this)" / maxlength="3" required placeholder="Weight (எடை) in KG" value="<?php 
                            echo $user->weight; ?>" class="form-control"> {!! $errors->first('weight', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('qualification') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('qualification', 'Qualification (கல்வி தகுதி)', ['class' => 'control-label']) !!} {!! Form::text('qualification', null, ['required' => 'required','placeholder'=>'Qualification (கல்வி தகுதி)','class' => 'form-control']) !!} {!! $errors->first('qualification', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('district') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('district', 'District (மாவட்டம்)', ['class' => 'control-label']) !!} {!! Form::select('district', $districtArray, null, ['class' => 'form-control','required','placeholder'=>'Select District']) !!} {!! $errors->first('district', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('monthly_income') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('monthly_income', 'Monthly Income (மாதாந்திர வருமானம்)', ['class' => 'control-label']) !!} {!! Form::text('monthly_income', null, ['required' => 'required','placeholder'=>'Monthly Income (மாதாந்திர வருமானம்)','class' => 'form-control']) !!} {!! $errors->first('monthly_income', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group row{{ $errors->has('religion') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('religion', 'Religion (மதம்)', ['class' => 'control-label']) !!} {!! Form::text('religion', null, ['required' => 'required','placeholder'=>'Religion (மதம்)','class' => 'form-control']) !!} {!! $errors->first('religion', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            
            <div class="form-group row{{ $errors->has('gothram') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    {!! Form::label('gothram', 'SubCaste/Kulam/Gothram ( துணை சாதி/குலம் / கோத்ரம்)', ['class' => 'control-label']) !!} {!! Form::text('gothram', null, ['placeholder'=>'SubCaste/Kulam/Gothram ( துணை சாதி/குலம் / கோத்ரம்)','class' => 'form-control']) !!} {!! $errors->first('gothram', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('marital_status') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('marital_status', 'Marital Status (திருமண நிலை)', ['class' => 'control-label']) !!} {!! Form::select('marital_status', $marital_statusArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Marital Status (திருமண நிலை)-']) !!} {!! $errors->first('marital_status', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="row">
                <div class="offset-md-4 offset-lg-5 col-lg-3 offset-4 col-4 offset-xl-4">
                    <button type="submit" class="pull-right btn btn-primary">Save and Continue</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!} 
    </div>
</div>
@endsection

