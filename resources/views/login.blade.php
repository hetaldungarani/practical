@extends('layout.auth')
@section('content')
<body>
    <div class="page-center">
        <div class="page-center-in sign-in-page">
            <div class="container-fluid"> 
               <div class="sign-avatar text-center">
               </div>


               <form class="sign-box" action="{{url('post-login')}}" method="post">
                 {{ csrf_field() }}
                 <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                    <input class="form-control py-4" id="inputEmailAddress" name="email" type="email" placeholder="Enter email address" />
                    @if ($errors->has('email'))
                    <span class="error text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="inputPassword">Password</label>
                    <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                    @if ($errors->has('password'))
                    <span class="error text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
                <div><a href="{{url('register')}}">Need an account? Sign up!</a></div>

                @if (Session::has('success'))
                  <div class="alert alert-success">
                     {{ Session::get('success') }}
                  </div>
                @endif

            </form>

        </div>
        
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
</div>
@include('layout.partials.scripts')
</body>
@endsection
