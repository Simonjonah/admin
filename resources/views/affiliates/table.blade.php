<div class="table-responsive">
    <table class="table" id="affiliates-table">
        <thead>
        <tr>
            <th>User Id</th>
        <th>Affiliate Id</th>
        <th>Marketer Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Email Verified At</th>
        <th>Affiliate Code</th>
        <th>Marketer Count</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($affiliates as $affiliate)
            <tr>
                <td>{{ $affiliate->user_id }}</td>
            <td>{{ $affiliate->affiliate_id }}</td>
            <td>{{ $affiliate->marketer_id }}</td>
            <td>{{ $affiliate->firstname }}</td>
            <td>{{ $affiliate->lastname }}</td>
            <td>{{ $affiliate->email }}</td>
            <td>{{ $affiliate->phone }}</td>
            <td>{{ $affiliate->email_verified_at }}</td>
            <td>{{ $affiliate->affiliate_code }}</td>
            <td>{{ $affiliate->marketer_count }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['affiliates.destroy', $affiliate->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('affiliates.show', [$affiliate->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('affiliates.edit', [$affiliate->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
