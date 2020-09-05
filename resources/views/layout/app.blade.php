
<!DOCTYPE html>
<html>

@section('htmlheader')
    @include('layout.partials.htmlheader')
@show


<body class="with-side-menu theme-picton-blue-white-ebony control-panel-compact" dir="{{ trans('message.lng_diraction_typ') }}" >

    @include('layout.partials.mainheader')

    @include('layout.partials.sidebar')
  
    <div class="page-content">
    
        <div class="container-fluid">
            @yield('main-content')
        </div><!--.container-fluid-->
    </div><!--.page-content-->

@section('scripts')
    @include('layout.partials.scripts')
@show

</body>
</html>
