<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p><a href="{{ route('users.show', [$user->id]) }}">
    {{ $user->name }}

    <a class="btn btn-primary float-right"
        href="{{ route('users.edit', [$user->id]) }}">
        Edit
    </a>
</a>

       </p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>




<!-- Role Id Field -->
<div class="col-sm-12">
    {!! Form::label('role_id', 'Role Id:') !!}
    <p>{{ $user->role['name'] }}</p>
</div>

<!-- Remember Token Field -->
<div class="col-sm-12">
    {!! Form::label('create_at', 'Joined') !!}
    <p>{{ $user->created_at->format('D d, M, Y, h:i') }}</p>
</div>




@if($user->id == Auth::user()->id || Auth::user()->role_id < 4)
    <div class="col-sm-12 text-center">
        <h3 class="text-info">Transactions done by {{$user->name}}</h3>
        @include('transactions.table')
    </div>

    <div class="col-sm-12 text-center">
        <h3 class="text-info">Qrcodes done by {{$user->name}}</h3>
        @include('qrcodes.table')
    </div>
@endif