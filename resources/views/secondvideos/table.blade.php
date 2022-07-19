<div class="table-responsive">
    <table class="table" id="secondvideos-table">
        <thead>
        <tr>
            <th>User Id</th>
        <th>Subject Id</th>
        <th>Subject Count</th>
        <th>Class</th>
        <th>Subject</th>
        <th>Video</th>
        <th>Photo</th>
        <th>Amount</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($secondvideos as $secondvideo)
            <tr>
            <td>{{ $secondvideo->user_id }}</td>
            <td>{{ $secondvideo->subject_id }}</td>
            <td>{{ $secondvideo->subject_count }}</td>
            <td>{{ $secondvideo->class }}</td>
            <td>{{ $secondvideo->subject }}</td>
            <td><video width="320" height="240" controls>
                    <source src="{{ URL::asset("/public/../$secondvideo->video")}}" type="video/mp4">
                </video>
            </td>
            <td>{{ $secondvideo->photo }}</td>
            <td>{{ $secondvideo->amount }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['secondvideos.destroy', $secondvideo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('secondvideos.show', [$secondvideo->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('secondvideos.edit', [$secondvideo->id]) }}"
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
