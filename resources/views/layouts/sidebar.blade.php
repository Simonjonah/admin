<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/home') }}" class="brand-link">
        <img src="/photos/logo.jpg"
             alt="{{ config('app.name') }} Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
        
    </a>
    <a  href=""><i class="fa fa-circle text-success"></i>
        @if(!Auth::guest() && (Auth::user()->role_id == 1))
            Admin
        @elseif( !Auth::guest() && (Auth::user()->role_id == 2))
            Moderator
        @elseif(!Auth::guest() && (Auth::user()->role_id == 3))
            Affiliates
        @elseif(!Auth::guest() && (Auth::user()->role_id == 4))
            Marketer
        @elseif(!Auth::guest() && (Auth::user()->role_id == 5))
            Buyer 
        @endif

</a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>
</aside>
