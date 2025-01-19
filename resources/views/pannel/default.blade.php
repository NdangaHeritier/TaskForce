@extends("pannel.dashboard")

@section("home")
active
@endsection

@section("body")
    <div class="default-container">
        <div class="welcome">
            <span class="far fa-user-circle"></span>
            <div class="welcome-text">
                Welcome To your Dashboard! Manage well and save more.
            </div>
        </div>

        <div class="default-cards">
            <div class="card border-all">
                <div class="card-icon ">
                    <span class="fas fa-sack-dollar "></span>
                </div>
                <div class="card-contents">
                    <div class="card-title">
                        All Accounts Balance
                    </div>
                    <div class="card-desc">
                        {{$balance}} Frw
                    </div>
                    <div class="">
                    <a href="#" class="link decoration-none">
                        <span class="fas fa-circle-chevron-right"></span>
                    </a>
                    </div>
                </div>
            </div>

            <div class="card border-all">
                <div class="card-icon ">
                    <span class="fas fa-contact-card "></span>
                </div>
                <div class="card-contents">
                    <div class="card-title">
                        Your Accounts
                    </div>
                    <div class="card-desc">
                        {{$accounts}}
                    </div>
                    <div class="">
                    <a href="{{url('/accounts')}}" class="link decoration-none">
                        <span class="fas fa-circle-chevron-right"></span>
                    </a>
                    </div>
                </div>
            </div>

            <div class="card border-all">
                <div class="card-icon ">
                    <span class="fas fa-money-bill-transfer "></span>
                </div>
                <div class="card-contents">
                    <div class="card-title">
                        Total Transactions Made
                    </div>
                    <div class="card-desc">
                        {{$transactions}}
                    </div>
                    <div class="">
                    <a href="#" class="link decoration-none">
                        <span class="fas fa-circle-chevron-right"></span>
                    </a>
                    </div>
                </div>
            </div>

            <div class="card border-all">
                <div class="card-icon ">
                    <span class="fas fa-coins "></span>
                </div>
                <div class="card-contents">
                    <div class="card-title">
                       Current Monthly Expenses
                    </div>
                    <div class="card-desc">
                        {{$expenses}} Frw - Jan 2025
                    </div>
                    <div class="">
                    <a href="#" class="link decoration-none">
                        <span class="fas fa-circle-chevron-right"></span>
                    </a>
                    </div>
                </div>
            </div>

            <div class="card border-all">
                <div class="card-icon ">
                    <span class="fas fa-pie-chart "></span>
                </div>
                <div class="card-contents">
                    <div class="card-title">
                        Monthly Budget Status
                    </div>
                    <div class="card-desc">
                        You're saving money this month.
                    </div>
                    <div class="">
                    <a href="#" class="link decoration-none">
                        <span class="fas fa-circle-chevron-right"></span>
                    </a>
                    </div>
                </div>
            </div>

            <div class="card border-all">
                <div class="card-icon ">
                    <span class="fas fa-coins "></span>
                </div>
                <div class="card-contents">
                    <div class="card-title">
                        Total Savings of This Year.
                    </div>
                    <div class="card-desc">
                        {{$savings}} Frw
                    </div>
                    <div class="">
                    <a href="#" class="link decoration-none">
                        <span class="fas fa-circle-chevron-right"></span>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection