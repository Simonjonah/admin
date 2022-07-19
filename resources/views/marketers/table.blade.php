<div class="table-responsive">
    <table class="table" id="marketers-table">
        <thead>
        <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Username</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date Joined</th>
        {{-- <th>Email Verified At</th>
        
        <th>Marketer Count</th> --}}
        
        
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($marketers as $marketer)
            <tr>
                <td>{{ $marketer->firstname }}</td>
                <td>{{ $marketer->lastname }}</td>
                <td>{{ $marketer->username }}</td>

                <td>{{ $marketer->email }}</td>
                <td>{{ $marketer->phone }}</td>
                <td>{{ $marketer->created_at->format('D d, M Y, H:i')}}</td>

               
                <td width="120">
                    {!! Form::open(['route' => ['marketers.destroy', $marketer->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('marketers.show', [$marketer->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('marketers.edit', [$marketer->id]) }}"
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
