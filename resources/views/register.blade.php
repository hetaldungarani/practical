@extends('layout.auth')
@section('content')
<body>
    <div class="page-center">
        <div class="page-center-in sign-in-page">
            <div class="container-fluid"> 
             <div class="sign-avatar text-center">
             </div>
             
                {!! Form::open(array('url' => 'post-register','method'=>'post','class'=>'sign-box')) !!}
                    {{ csrf_field() }}
                    <div class="form-group">
                        {!!Form::label('name', 'Name')!!}
                        {!!Form::text('name', old('name'),array('class'=>'form-control py-4','id'=>'name','placeholder'=>'Enter Name'))!!}
                        @if ($errors->has('name'))
                        <span class="error text-danger">{{ $errors->first('name') }}</span>
                        @endif  
                    </div>
                    <div class="form-group">
                        {!!Form::label('email', 'Email')!!}
                        {!!Form::email('email', old('email'),array('class'=>'form-control py-4','id'=>'email','placeholder'=>'Enter Email'))!!}
                        @if ($errors->has('email'))
                        <span class="error text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('password', 'Password')!!}
                        {!!Form::password('password',array('class'=>'form-control py-4','id'=>'password','placeholder'=>'Enter Password'))!!}
                        @if ($errors->has('password'))
                        <span class="error text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>  
                    <div class="form-group">
                        {!!Form::label('confirm_password', 'Confirm Password')!!}
                        {!!Form::password('confirm_password',array('class'=>'form-control py-4','id'=>'confirm_password','placeholder'=>'Enter Confirm Password'))!!}
                        @if ($errors->has('confirm_password'))
                        <span class="error text-danger">{{ $errors->first('confirm_password') }}</span>
                        @endif
                    </div>  
                    <div class="form-group">
                        {!!Form::label('gender', 'Gender')!!}
                        {!!Form::radio('gender', '1','true')!!}Male
                        {!!Form::radio('gender', '0')!!}Female
                        @if ($errors->has('gender'))
                        <span class="error text-danger">{{ $errors->first('gender') }}</span>
                        @endif
                    </div> 
                    <div class="form-group">
                        {!!Form::label('hobbies', 'Hobbies')!!}
                        @foreach ( $hobbies as $i => $hobby )
                        {!! Form::checkbox( 'hobbies[]', $i,
                                          ) !!}
                        {!! Form::label($hobby,  $hobby) !!}
                        @endforeach
                        @if ($errors->has('hobbies'))
                        <span class="error text-danger">{{ $errors->first('hobbies') }}</span>
                        @endif
                    </div>
                    <div class="form-group mt-4 mb-0">
                        <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                    </div>
                {!! Form::close() !!}

        </div>
        
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
</div>
@include('layout.partials.scripts')
</body>
@endsection
