<div class="table-responsive">
    <table class="table" id="transactions-table">
        <thead>
        <tr>
            
        <th>Franchise Name </th>

        <th>Buyer Name</th>
        <th>Buyer Email</th>
        <th>Buyer Phone</th>
        <th>Franchise Share</th>
        <th>Marketer Share</th>

        <th>Amount</th>
        <th>Status</th>
        <th>Date</th>

        
        </thead>
        <tbody>
        @foreach($transactions as $transaction)
            <tr>
            {{-- <td><a class="text-info" href="{{ route('transactions.show', [$transaction->id]) }}"> --}}
                <td><a href="franchisemarketers/{{ $transaction->franchise->id}}">{{ $transaction->franchise_name}}</a> </td>

                <td class="text-info"><a href="marketers/{{ $transaction->marketer->id }}">{{ $transaction->buyer_name}} Referrer <small>{{ $transaction->marketer_name}} {{ $transaction->marketer_email}}  {{ $transaction->marketer_phone}} </a></small></td>
                <td>{{ $transaction->email}}</td>
                <td>{{ $transaction->phone}}</td>
                <td>₦{{ $transaction->franchise_share}}</td>
                <td>₦{{ $transaction->marketer_share}}</td>
           
                {{ $transaction->user['name'] }}</a></td>
            <td>₦{{ $transaction->amount }}</td>
           
            <td>{{ $transaction->status }} </td>
            <td>{{ $transaction->created_at->format('D d, M Y, H:i')}}</td>
                
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
