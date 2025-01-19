@extends("pannel.dashboard")

@section("transactions")
active
@endsection

@section("body")
<div class="transactions-container">
    <div class="transactions-header">
        <h1 class="title">Transactions</h1>
    </div>
    <div class="select-account border-bottom">
       @foreach($accounts as $account)

       <button type="button" class="account-btn">
        <span class="fas fa-credit-card"></span>{{$account->title}}        
       </button>
       
       @endforeach
    </div>
    <div class="tabs">
        @foreach($accounts as $account)
            <div class="transaction-body">
                <div class="title">All Transactions On {{$account->type}} <span class="account-spanner">{{$account->title}}</span></div>
                <div class="tables">
                    <div class="table-title"><span class="fas fa-chevron-right"></span>Incoming Transactions</div>
                    <table border="1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Amount</th>
                                <th>Done At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($account->ins as $in)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$in->amount}} Frw</td>
                                    <td>{{$in->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="table-title"><span class="fas fa-chevron-right"></span>Outgoing Transactions</div>
                    <table border="1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Amount</th>
                                <th>Expense</th>
                                <th>Done At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($account->outs as $in)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$in->amount}} Frw</td>
                                    <td>{{$in->category->name}}</td>
                                    <td>{{$in->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection