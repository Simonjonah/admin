<li class="nav-item">
    <a href="/users/{{ !Auth::guest() && Auth::user()->id }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p>My Profile</p>
    </a>
</li>
<!-- <li class="nav-item">
    <a href="/accounts/{{ !Auth::guest() && Auth::user()->id }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p>My Account</p>
    </a>
</li> -->


<!-- <li class="nav-item">
    <a href="{{ route('accounts.show') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p>My Account</p>
    </a>
</li> -->

<li class="nav-item">
    <a href="{{ route('transactions.index') }}"
       class="nav-link {{ Request::is('transactions*') ? 'active' : '' }}">
        <p>Transactions</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('primvideos.index') }}"
       class="nav-link {{ Request::is('primvideos*') ? 'active' : '' }}">
        <p>Primvideos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('secondvideos.index') }}"
       class="nav-link {{ Request::is('secondvideos*') ? 'active' : '' }}">
        <p>Secondvideos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('qrcodes.index') }}"
       class="nav-link {{ Request::is('qrcodes*') ? 'active' : '' }}">
        <p>Qrcodes</p>
    </a>
</li>
<!-- <li class="nav-item">
    <a href="{{ route('accounts.index') }}"
       class="nav-link {{ Request::is('accounts*') ? 'active' : '' }}">
        <p>My Account</p>
    </a>
</li>  -->



{{-- marketer --}}
@if(!Auth::guest() && (Auth::user()->role_id < 4))
<li class="nav-item">
    <a href="{{ route('marketers.index') }}"
       class="nav-link {{ Request::is('marketers*') ? 'active' : '' }}">
        <p>Marketers</p>
    </a>
</li>

@endif



{{-- Moderator --}}
@if(!Auth::guest() && (Auth::user()->role_id < 3))


<li class="nav-item">
    <a href="{{ route('accounts.index') }}"
       class="nav-link {{ Request::is('accounts*') ? 'active' : '' }}">
        <p>Accounts</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('accountHistories.index') }}"
       class="nav-link {{ Request::is('accountHistories*') ? 'active' : '' }}">
        <p>Account Histories</p>
    </a>
</li>

<li class="nav-item">
    <a href="subjectpayment"
       class="nav-link ">
        <p>Payments</p>
    </a>
</li>
<li class="nav-item">
    <a href="allbuyers"
    class="nav-link">
        <p> Customers</p>
    </a>
</li>

{{-- <li class="nav-item">
    <a href="{{ route('transactions.allbuyers') }}"
    class="nav-link {{ Request::is('transactions*') ? 'active' : '' }}">
        <p> Customers</p>
    </a>
</li> --}}
@endif

{{-- Admin --}}
{{-- 
@if( !Auth::guest() && (Auth::user()->role_id == 1))
<li class="nav-item">
    <a href="{{ route('roles.index') }}"
       class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
        <p>Roles</p>
    </a>
</li>

@endif --}}



