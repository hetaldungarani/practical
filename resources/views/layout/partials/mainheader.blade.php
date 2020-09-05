  <header class="site-header">
    <style type="text/css">
      .site-logo{
        width: 16%;
      }
      .site-logo img{
        width: 100%;
      }
    </style>
    <div class="container-fluid">
        <div class="site-header-content">
          <div class="site-header-content-in">


            <div class="site-header-shown">  
              <h5 style="float:left"> 
                @if(Auth::check())
                Welcome {{(Auth::user('id')->name)}}
                @endif
              </h5>                     
              <div class="dropdown user-menu">                           
                <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ url('/logout') }}"  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <span class="font-icon glyphicon glyphicon-log-out"></span>Logout
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                  <input type="submit" value="logout" style="display: none;">
                </form>
              </div>
            </div> 


            <button class="hamburger hamburger--htla">
              <span>toggle menu</span>
            </button>
          </div><!--.site-header-shown-->



        </div><!--site-header-content-in-->
      </div><!--.site-header-content-->
    </div><!--.container-fluid-->
  </header><!--.site-header-->