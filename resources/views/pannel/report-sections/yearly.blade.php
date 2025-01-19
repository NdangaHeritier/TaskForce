<!-- Yearly rEPORT -->
<div class="yearly-section report-body">
            <div class="report-title">
                Yearly Transactions Report
            </div>
            <div class="report-content">
                <div class="body-title">Yearly Income report</div>
                @if(count($Yearly_in)>0)
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Account Title</th>
                            <th>Account Type</th>
                            <th>Amount Added</th>
                            <th>Date Of Transaction</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Yearly_in as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->account->title}}</td>
                            <td>{{$row->account->type}}</td>
                            <td>{{$row->amount}} Frw</td>
                            <td>{{date_format(date_create($row->created_at), 'd M Y')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="no-data">
                    No Income Transactions Made!
                </div>
               @endif 
            </div>
            <div class="report-content">
                <div class="body-title">Yearly Expenses Report</div>
                @if(count($Yearly_out)>0)
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Account Title</th>
                            <th>Account Type</th>
                            <th>Expense</th>
                            <th>Amount Spent</th>
                            <th>Date Of Transaction</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Yearly_out as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->account->title}}</td>
                            <td>{{$row->account->type}}</td>
                            <td>{{$row->category->name}}</td>
                            <td>{{$row->amount}} Frw</td>
                            <td>{{date_format(date_create($row->created_at), 'd M Y')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="no-data">
                    No Expense Transactions Made!
                </div>
               @endif 
            </div>
       </div>