@extends("pannel.dashboard")

@section("budgets")
active
@endsection

@section("body")
<div class="transactions-container">
    <div class="transactions-header">
        <h1 class="title">Set Budget Limits</h1>
    </div>
    <div class="budget-container">
        <div class="limits-list">
            <div class="limits-title">
                <span class="fas fa-hourglass"></span>Your Budget Limits
            </div>
            <div class="limits">
                @if(count($limits)>0)
                @foreach($limits as $limit)
                <div class="limit">
                    <div class="limit-expense">
                        {{$limit->expense->name}}
                    </div>
                    <div class="limit-amount">
                        {{$limit->limit_amount}} Frw
                    </div>
                </div>
                @endforeach
                @else
                <div class="no-limits">
                    <div class="message">
                        No Budget Limits set for your spending!
                    </div>
                </div>
                @endif
            </div>
                <div class="add-new-limit">
                    <div class="add-limit-label">
                        Consider adding some budget not to exceed while spending your money monthly!
                    </div>
                </div>

                <div class="form-container set-limit-form">
                    <form action="{{route('setBudget.post')}}" method="post">
                        @csrf
                        <label for="expense" class="form-label">
                            select the expense for which you want to set limit on:
                        </label>
                        <select name="expense" id="expense" class="account-title-field">
                            <option value="">select expense</option>
                            @foreach($expenses as $expense)
                            <option value="{{$expense->id}}">{{$expense->name}}</option>
                            @endforeach
                        </select>

                        <label for="amount" class="form-label">set Limit amount in rwf:</label>
                        <input type="number" name="amount" id="amount" class="account-title-field">

                        <div class="buttons">
                            <button type="submit" class="save-account">Set</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection