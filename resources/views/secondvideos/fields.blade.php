<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::hidden('user_id',  Auth::user()->id, ['class' => 'form-control']) !!}
</div>

<!-- Subject Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('secondvideo_id', 'Subject Id:') !!}
    {!! Form::hidden('secondvideo_id',  Auth::user()->id, ['class' => 'form-control']) !!}
</div>

<!-- Subject Count Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject_count', 'Subject Count:') !!}
    {!! Form::number('subject_count', null, ['class' => 'form-control']) !!}
</div>

<!-- Class Field -->
<div class="form-group col-sm-6">
    {!! Form::label('class', 'Class:') !!}
    <select class="form-control" name="class">
        <option>JSS 1</option>
        <option>JSS 2</option>
        <option>JSS 3</option>
        <option>SSS 1</option>
        <option>SSS 2</option>
        <option>SSS 3</option>


    </select>
    {{-- {!! Form::text('class', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!} --}}
</div>

<!-- Subject Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject', 'Subject:') !!}
    <select class="form-control" name="subject">
        <option>Mathematics</option>
        <option>English Language</option>
        <option>Basic Science</option>
        <option>Physics</option>
        <option>Chemistry </option>
        <option>Biology </option>
        <option>Economics </option>

    </select>
    {{-- {!! Form::text('subject', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!} --}}
</div>

<!-- Video Field -->
<div class="form-group col-sm-6">
    {!! Form::label('video', 'Video:') !!}
    {!! Form::file('video', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::text('photo', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>