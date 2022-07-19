
    {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}



    {!! Form::hidden('qrcode_id', Auth::user()->id, ['class' => 'form-control']) !!}



    {!! Form::hidden('transaction_id', Auth::user()->id, ['class' => 'form-control']) !!}



    {!! Form::hidden('owner_qrcode_id', Auth::user()->id, ['class' => 'form-control']) !!}


<!-- Message Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('message', 'Message:') !!}
    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Qrcode Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qrcode_url', 'Qrcode Url:') !!}
    {!! Form::text('qrcode_url', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>