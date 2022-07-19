<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $role->name }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Joined:') !!}
    <p>{{ $role->created_at->format('D d, M Y h:i') }}</p>
</div>
<h3 style="text-align: center;">Users that belongs to this role</h3>
@include('users.table')