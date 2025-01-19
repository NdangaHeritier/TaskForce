@extends('layout')

@section("contents")

<div class="top-notifications border" id="notiBar">
    <div class="not-title">
        Notifications
        <span class="fas fa-xmark close-notifications"
         onclick="document.getElementById('notiBar').style.display='none'"></span>
    </div>
    <div class="noti-container">
        <div class="notify">
            <div class="noti-icon">
                <span class="far fa-bell"></span>
            </div>
            <div class="noti-content">
                You're half way to reach your monthly budget for <span>Vegetables</span>. Please consider to reduce your expense to avoid overspending this month.
            </div>
        </div>
        <div class="notify">
            <div class="noti-icon">
                <span class="far fa-bell"></span>
            </div>
            <div class="noti-content">
               You have reached your Monthly budget for <span>Milk</span> this month. Avoid spending again on this expense or expand your budget wallet.
            </div>
        </div>
    </div>
</div>
<div class="bars">
    <div class="menus border-end">
        <div class="menu-bar border-bottom">
            <button type="button" class="menu-button">
                <span class="fas fa-bars"></span>
            </button>
        </div>
        <div class="navs">
            <div class="nav-item @yield('home')">
                <a class="item-icon" href="{{url('/dashboard')}}">
                    <span class="fas fa-house"></span>
                </a>
                <a class="item-text collapse" href="{{url('/dashboard')}}">
                    Home
                </a>
            </div>
            <div class="nav-item @yield('accounts')">
                <a class="item-icon" href="{{url('/accounts')}}">
                    <span class="fas fa-contact-card"></span>
                </a>
                <a class="item-text collapse" href="{{url('/accounts')}}">
                    Accounts
                </a>
            </div>
            <div class="nav-item @yield('expenses')">
                <a class="item-icon" href="{{url('/expenses')}}">
                    <span class="fas fa-gift"></span>
                </a>
                <a class="item-text collapse" href="{{url('/expenses')}}">
                    Expenses
                </a>
            </div>
            <div class="nav-item @yield('spend')">
                <a class="item-icon" href="{{url('/spend')}}">
                    <span class="fas fa-money-bill-trend-up"></span>
                </a>
                <a class="item-text collapse" href="{{url('/spend')}}">
                    Spend
                </a>
            </div>
            <div class="nav-item @yield('transactions')">
                <a class="item-icon" href="{{url('/transactions')}}">
                    <span class="fas fa-money-bill-transfer"></span>
                </a>
                <a class="item-text collapse" href="{{url('/transactions')}}">
                    Transactions
                </a>
            </div>
            <div class="nav-item @yield('reports')">
                <a class="item-icon" href="{{url('/reports')}}">
                    <span class="far fa-file-text"></span>
                </a>
                <a class="item-text collapse" href="{{url('/reports')}}">
                    Reports
                </a>
            </div>
            <div class="nav-item @yield('budgets')">
                <a class="item-icon" href="{{url('/set-budget')}}">
                    <span class="fas fa-hourglass"></span>
                </a>
                <a class="item-text collapse" href="{{url('/set-budget')}}">
                    Set Budget Limit
                </a>
            </div>
        </div>
    </div>
    <div class="body">

    <div class="notifications">
            @if(Session::has('fail message'))
                <div class="message">
                    <span class="far fa-circle-xmark message-icon"></span>
                    <div class="text">
                        {{Session::get('fail message')}}
                    </div>
                </div>
            @endif
            @if(Session::has('success message'))
                <div class="success-message">
                    <span class="far fa-circle-xmark message-icon"></span>
                    <div class="text">
                        {{Session::get('success message')}}
                    </div>
                </div>
            @endif
            @error("type")
                <div class="message">
                    <span class="far fa-circle-xmark message-icon"></span>
                    <div class="text">
                        {{$message}}
                    </div>
                </div>
            @enderror
            @error("title")
                <div class="message">
                    <span class="far fa-circle-xmark message-icon"></span>
                    <div class="text">
                        {{$message}}
                    </div>
                </div>
            @enderror
            @error("amount")
                <div class="message">
                    <span class="far fa-circle-xmark message-icon"></span>
                    <div class="text">
                        {{$message}}
                    </div>
                </div>
            @enderror
            @error("name")
                <div class="message">
                    <span class="far fa-circle-xmark message-icon"></span>
                    <div class="text">
                        {{$message}}
                    </div>
                </div>
            @enderror
            @error("account_id")
                <div class="message">
                    <span class="far fa-circle-xmark message-icon"></span>
                    <div class="text">
                        {{$message}}
                    </div>
                </div>
            @enderror
        </div>

        
        <!-- content placeholderr  -->
        @yield("body")
        <!-- end of contents placeholder start of footer.. -->


        <div class="footer border-top">
        <div class="copyright">
            <span class="fas fa-copyright gr-text"></span>
            Eric 2025, Allrights reserved.
        </div>
   </div>
    </div>
</div>
@endsection