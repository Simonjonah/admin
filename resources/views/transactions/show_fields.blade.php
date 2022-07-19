

<!-- Qrcode Id Field -->
<div class="col-sm-12">
    {!! Form::label('qrcode_id', 'Subject Name:') !!}
    <p>
       <b><a class="text-info" href="/qrcodes/{{ $transaction->qrcode['id'] }}"> {{ $transaction->qrcode['subject'] }} </a></b></p>
</div>
<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'Buyer Name:') !!}
    <p>
        <a href="/users/{{ $transaction->user['id'] }}"> {{ $transaction->user['name'] }} | {{ $transaction->user['email'] }} </a></p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>₦{{ $transaction->amount }}</p>
</div>

<!-- Transaction Id Field -->
<div class="col-sm-12">
    {!! Form::label('transaction_id', 'Qrcode Name:') !!}
    <p>{{ $transaction->transaction_id }}</p>
</div>

<!-- Owner Qrcode Id Field -->
<div class="col-sm-12">
    {!! Form::label('owner_qrcode_id', 'Owner Qrcode:') !!}
    <p><a href="/users/{{ $transaction->qrcode_owner['id'] }}">
        {{ $transaction->qrcode_owner['name'] }}</a></p>
</div>

<!-- Message Field -->
<div class="col-sm-12">
    {!! Form::label('message', 'Message:') !!}
    <p>{{ $transaction->message }}</p>
</div>



<!-- Qrcode Url Field -->
<div class="col-sm-12">
    {!! Form::label('qrcode_url', 'Qrcode Url:') !!}
    <p>{{ $transaction->qrcode_url }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $transaction->status }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $transaction->created_at->format('D d, M, Y, h:i') }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $transaction->updated_at->format('D d, M, Y, h:i') }}</p>
</div>

