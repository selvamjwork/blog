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
                <h3 class="text-center"><strong>Step 1 / 2</strong></h3>
            </div>
        </div>
        {!! Form::model($user, ['method' => 'PATCH', 'url' => ['/personal1'],'role'=>'form','class' => 'was-validated','files' => true ]) !!}
        <div class="form-bottom">
            <div class="form-group row{{ $errors->has('name') ? 'has-error' : ''}}">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('name', 'Name (பெயர்)', ['class' => 'control-label']) !!} {!! Form::text('name', null, ['disabled','required' => 'required','placeholder'=>'Name (பெயர்)','class' => 'form-control']) !!} {!! $errors->first('name', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('mobile') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>{!! Form::label('mobile', 'Mobile Number (கைபேசி எண்)', ['class' => 'control-label']) !!} {!! Form::number('mobile', null, ['disabled','required' => 'required','placeholder'=>'Mobile Number (கைபேசி எண்)','class' => 'form-control']) !!} {!! $errors->first('mobile', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('email') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    {!! Form::label('email', 'Email Address (மின்னஞ்சல் முகவரி)', ['class' => 'control-label']) !!} {!! Form::email('email', null, ['disabled','placeholder'=>'Email Address (மின்னஞ்சல் முகவரி)','class' => 'form-control']) !!} {!! $errors->first('email', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('caste') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('caste', 'Caste (சாதி)', ['class' => 'control-label']) !!} {!! Form::select('caste', $casteArray, null, ['disabled' => 'required','class' => 'form-control','placeholder'=>'-Caste (சாதி)-']) !!} {!! $errors->first('caste', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('subsect') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('subsect', 'Subsect (உட்பிரிவு)', ['class' => 'control-label']) !!} {!! Form::select('subsect', [], null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Subsection (உட்பிரிவு)-']) !!} {!! $errors->first('subsect', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div id="remove" class="form-group row{{ $errors->has('othersubsect') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('othersubsect', 'Ohter Subsect (மற்ற உட்பிரிவு)', ['class' => 'control-label']) !!} {!! Form::text('othersubsect', null, ['placeholder'=>'Ohter Subsect (மற்ற உட்பிரிவு)','class' => 'form-control']) !!} {!! $errors->first('othersubsect', '
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
@section('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    function goBack() {
        window.history.back();
    }
    
    $('#caste').on('change',function(){
        var val = ($(this).val());
        
        $.ajax({
            url:'/get-subsect/'+val,
            success:function(res){
               console.log(res);
               attach(res);
            },
        });
    });

    $(document).ready(function(){
        var val = $('#caste').val();
        if(!(val=='')){
            $.ajax({
                url:'/get-subsect/'+val,
                success:function(res){
                    attach(res);
                },
            });
        }
    });
    
    function attach(res){
        $('#subsect').find('option')
            .remove()
            .end();

        $('#subsect').append(res);

        $("#subsect").append('<option value="others">Others</option>');

        var subset = {{auth()->user()->subsect}}

        if(subset!=''){
            $('#subsect').val(subset);
        }
    }
    $(document).ready(function(){
        checkSubsectStatus();
       
        $('#subsect').on('change',function(){
            checkSubsectStatus();
        });
    });

    function changeSubsectLook(status){
        $('#othersubsect').parentsUntil('form').css({'display':status});
    }

    function checkSubsectStatus(){
        var val = $('#subsect').val();
        if(val != 'others'){
            document.getElementById("remove").classList.add("d-none");
        }else{
            document.getElementById("remove").classList.remove("d-none");
        }
    }


    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
    function checkInput(ob) {
        var invalidChars = /[^0-9]/gi
        if(invalidChars.test(ob.value)) {
            ob.value = ob.value.replace(invalidChars,"");
        }
    }
</script>
@endsection
