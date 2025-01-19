@extends("pannel.dashboard")

@section("spend")
active
@endsection

@section("body")
    <div class="spend-container">
        <div class="spend-container-title">
            Spend Your Money Today
        </div>

        <!-- Container Steps to spend -step1:Choose account
          -step2:Choose expense category -step3: Enter amount to spend by the day 
          -step4: finish. -->

          @if(Session::has("step1"))
            <div class="form-container">
                <form action="{{route('step1.post')}}" method="post" class="form-element">
                    @csrf
                    <div class="form-title">
                        <span class="fas fa-arrow-right title-icon"></span>
                        <span class="title-text">Choose Account</span>
                    </div>
                    <label for="account" class="form-label">
                        Select account for which you're going to use for your expense:
                    </label>
                    <div class="accounts">
                        @if(count($accounts)>0)
                           @foreach($accounts as $account)
                           <input type="radio" name="account_id" id="id-{{$account->id}}" value="{{$account->id}}" hidden>
                            <label id="account-{{$account->id}}" class="account choose-account" for="id-{{$account->id}}" onclick="activate('account-{{$account->id}}')">
                                <div class="account-icon">
                                    <span class="fas fa-credit-card"></span>
                                </div>
                                <div class="account-content">
                                    <div class="account-name">{{$account->title}}</div>
                                    <div class="account-type">{{$account->type}}</div>
                                </div>
                            </label>

                            @endforeach

                            <div class="buttons">
                                <button type="reset" class="cancel-account-model">
                                    cancel
                                </button>
                                <button type="submit" class="save-account">
                                    Next
                                </button>

                            </div>
                        @else
                        <div class="no-accounts">
                            <div class="no-icon">
                                <span class="fas fa-vcard"></span>
                            </div>
                            <div class="no-text">
                                No Account found!
                            </div>
                            <div class="no-link">
                                <a href="{{url('/accounts')}}" class="add-account-btn">
                                    <span class="fas fa-vcard"></span>
                                    <span>Add Account</span>
                                </a>
                            </div>
                        </div>

                        @endif
                    </div>
                </form>
            </div>
          @elseif(Session::has("step2"))
          <div class="form-container">
                <form action="{{route('step2.post')}}" method="post" class="form-element">
                    @csrf
                    <div class="form-title">
                        <span class="fas fa-arrow-right title-icon"></span>
                        <span class="title-text">Choose Expense Category and Sub category</span>
                    </div>
                    <label for="account" class="form-label">
                        Select expense category for which you're going spend in:
                    </label>
                    <div class="accounts">
                        @if(count($categories)>0)
                           @foreach($categories as $category)
                            <div class="category">
                                <div class="category-title">
                                    <span class="dropdown-arrow fas fa-chevron-right" onclick="showSub('subs-{{$category->id}}')"></span>
                                    <span class="title">{{$category->name}}</span>
                                </div>
                                <div id="subs-{{$category->id}}" class="sub-categories border-bottom border-start border-end">
                                    @foreach($category->subs as $sub)
                                    <input type="radio" name="category" id="sub-{{$sub->id}}" value="{{$sub->id}}" hidden>
                                    <label for="sub-{{$sub->id}}" class="sub-label">
                                        {{$sub->name}}
                                    </label>
                                    @endforeach
                                </div>
                            </div>

                            @endforeach

                            <div class="buttons">
                                <button type="reset" class="cancel-account-model">
                                    back
                                </button>
                                <!-- back it can be a link that delete the current sessions and delete current data.. -->
                                <button type="submit" class="save-account">
                                    Next
                                </button>

                            </div>
                        @else
                        <div class="no-accounts">
                            <div class="no-icon">
                                <span class="fas fa-vcard"></span>
                            </div>
                            <div class="no-text">
                                No Account found!
                            </div>
                            <div class="no-link">
                                <a href="{{url('/accounts')}}" class="add-account-btn">
                                    <span class="fas fa-vcard"></span>
                                    <span>Add Account</span>
                                </a>
                            </div>
                        </div>

                        @endif
                    </div>
                </form>
            </div>
          @elseif(Session::has("step3"))
          <div class="form-container">
                <form action="{{route('finish.post')}}" method="post" class="form-element">
                    @csrf
                    <div class="form-title">
                        <span class="fas fa-arrow-right title-icon"></span>
                        <span class="title-text">Set Expense cost</span>
                    </div>
                    <label for="amount" class="form-label">
                        Enter the amount of money to spend on your expense in Rwf:
                    </label>
                    <div class="accounts">
                           <input type="number" name="amount" id="amount" class="expense-title-field">

                            <div class="buttons">
                                <button type="reset" class="cancel-account-model">
                                    cancel
                                </button>
                                <button type="submit" class="save-account">
                                    Next
                                </button>

                            </div>
                    </div>
                </form>
            </div>
          @else

          <!-- End of steps and else -->
        <div class="spend-circle">
            <div class="circle-content">
                <div class="circle-img">
                    <span class="fas fa-money-bill-trend-up"></span>
                </div>
                <form action="{{route('start.spend')}}" method="post">
                    @csrf
                    <button type="submit" class="start-spend">
                        <span class="fas fa-arrow-right"></span>
                        Start Spending
                    </button>
                </form>
            </div>
        </div>

        @endif
    </div>
@endsection