<div class="table-responsive">
    <table class="table" id="accounts-table">
        <thead>
        <tr>
            <th>User Id</th>
        <th>Balance</th>
        <th>Total Credit</th>
        <th>Total Debit</th>
        <th>Status</th>

     
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($accounts as $account)
            <tr>
                <td><a href="{{ route('accounts.show', [$account->id]) }}">
                           
                           {{ $account->user['email'] }} by <small>{{ $account->user['name'] }}
                        </a> </td>
            <td>₦{{ number_format($account->balance, 2) }}</td>
            <td>₦{{ number_format($account->total_credit, 2) }}</td>
            <td>₦{{ number_format($account->total_debit, 2) }}</td>
            <td>@if($account->applied_for_payout == 1)
                    Paymeny Pending    
                @elseif($account->paid == 1)
                    Paid
            @endif
            </td>

           
                <td width="120">
                    {!! Form::open(['route' => ['accounts.destroy', $account->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                       
                        <a href="{{ route('accounts.edit', [$account->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        <!-- {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} -->
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
