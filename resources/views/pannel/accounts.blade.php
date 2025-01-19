@extends('pannel.dashboard')

@section("accounts")
active
@endsection

@section('body')
    <div class="accounts-container">
        <div class="account-header">
            <span class="fas fa-vcard intro-icon"></span>
            <h1 class="title">Accounts</h1>
        </div>
        <div class="accounts">
            <!-- iterating over accounts -->
            @if(count($accounts)==0)
           <div class="no-accounts">
            <span class="no-accounts-icon fas fa-credit-card"></span>
            <span class="no-text">
                No Accounts Found!
            </span>
            <div class="link">
                <button type="button" class="add-account">
                    <span class="fas fa-contact-card"></span>
                    Add Account
                </button>
            </div>
           </div>

           @else

            @foreach($accounts as $account)
            <div class="account">
                <div class="account-icon">
                    <span class="fas fa-credit-card"></span>
                </div>
                <div class="account-content">
                    <h3 class="account-title">{{$account->title}}</h3>
                    <div class="small-content">
                        <div class="account-type">{{$account->type}}.</div>
                        <div class="account-balance">Balance: {{$account->balance}} Frw</div>
                        <div class="transactions">
                            <a href="{{url('/transactions')}}" class="view-transactions">
                                <span class=" fas fa-money-bill-transfer fa-lg"></span> {{$account->transactions}}
                            </a>
                        </div>
                        <div class="recharge">
                            <a onclick="showRecharge('recharge-account-0{{$account->id}}')" class="recharge-button">
                                <span class=" fas fa-square-plus"></span>
                                money
                            </a>
                        </div>
                        <form action="{{route('recharge.post')}}" method="post" class="recharge-form" id="recharge-account-0{{$account->id}}">
                        @csrf
                            <div class="head-in">
                               
                                <div class="form-title">
                                    <span class="fas fa-credit-card"></span>
                                    {{$account->title}}
                                </div>
                                <button type="button" class="close-form fas fa-xmark"></button>
                            </div>
                            <label for="recharge-input" class="recharge-label">
                               Amount of money to add on account balance in <span class="gr-text">Rwf</span>
                            </label>
                           <div class="inputs">
                                <input type="hidden" name="account_id" value="{{$account->id}}">
                                <input type="number" name="amount" id="recharge-input" class="recharge-input" placeholder="enter amount">
                                <button type="submit" class="add-recharges">Recharge</button>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

            @endif
        </div>
        <div class="spend">
            <p class="spend-desc">
                Want to spend some money based on your expenses?
            </p>
            <div class="spend-links">
                <button class="spend-button"><span class="fas fa-arrow-right"></span>Spend</button>
                
                <button type="button" class="add-account">
                    <span class="fas fa-contact-card"></span>
                    Add Account
                </button>
            </div>
            
        </div>
    </div>

    <div class="add-account-form-container">
        <form method="post" action="{{route('account.post')}}" class="holder">
            @csrf
            <div class="container-head">
                <div class="add-title">
                    Add New Income Account.
                </div>
                <div class="close-model">
                    <button type="button" class="close-btn cancel-model">
                        <span class="fas fa-xmark"></span>
                    </button>
                </div>
            </div>
            <div class="model-form">
                <label for="" class="recharge-label">Choose correct account type.</label>
                <select name="type" id="" class="type-field">
                    <option value="" class="placeholder">Select account type</option>
                    <option value="MoMo Account">Mobile Money Account</option>
                    <option value="Bank Account">Bank Account</option>
                    <option value="Money In Cash">Money in Cash</option>
                    <option value="Other Account">Other Account</option>
                </select>
                <label for="" class="recharge-label">Enter your account title or number:</label>
                <input type="text" name="title" id="title" class="account-title-field" placeholder="ex: +250 750000000">
            </div>
            <div class="model-buttons border-top">
                <button type="reset" class="cancel-account-model cancel-model">
                    Cancel
                </button>
                <button type="submit" class="save-account">
                    Add Account
                </button>
            </div>
        </form>
    </div>
@endsection