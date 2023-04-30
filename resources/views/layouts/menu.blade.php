<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('my-shares.index') }}" class="nav-link {{ Request::is('my-shares*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-chart-bar"></i>
        <p>My Shares</p>
    </a>
</li>
