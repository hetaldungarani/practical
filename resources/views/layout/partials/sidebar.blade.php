<nav class="side-menu">
    <ul class="side-menu-list"> 
        <li class="{{ Request::is('/users') ? 'active' : '' }}"><a href="{{ url('/users') }}"><span class="lbl">Users</span></a></li>
    </ul>
</nav><!--.side-menu-->
