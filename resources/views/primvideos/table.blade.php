<div class="table-responsive">
    <table class="table" id="primvideos-table">
        <thead>
        <tr>
            <th>User Id</th>
        <th>Primvideo Id</th>
        <th>Subject Count</th>
        <th>Class</th>
        <th>Subject</th>
        <th>Video</th>
        <th>Photo</th>
        <th>Amount</th>
        <th>Prim Topic</th>
        <th>Description</th>
        <th>View Count</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($primvideos as $primvideo)
            <tr>
                <td>{{ $primvideo->user_id }}</td>
            <td>{{ $primvideo->primvideo_id }}</td>
            <td>{{ $primvideo->subject_count }}</td>
            <td>{{ $primvideo->class }}</td>
            <td>{{ $primvideo->subject }}</td>
            

            <td><video width="400" height="240" oncontextmenu="return false;" id="myVideo" controls controlsList="nodownload">
                <source src="{{ URL::asset("/public/../$primvideo->video")}}" type="video/mp4">
            </video></td>
            
        </td>
            <td>{{ $primvideo->photo }}</td>
            <td>{{ $primvideo->amount }}</td>
            <td>{{ $primvideo->prim_topic }}</td>
            <td>{{ $primvideo->description }}</td>
            <td>{{ $primvideo->view_count }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['primvideos.destroy', $primvideo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('primvideos.show', [$primvideo->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('primvideos.edit', [$primvideo->id]) }}"
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
