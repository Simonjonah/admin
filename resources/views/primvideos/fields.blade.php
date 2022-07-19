<!-- User Id Field -->
<div class="form-group col-sm-6">
    {{-- {!! Form::label('user_id', 'User Id:') !!} --}}
    {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
</div>

<!-- Primvideo Id Field -->
<div class="form-group col-sm-6">
    {{-- {!! Form::label('primvideo_id', 'Primvideo Id:') !!} --}}
    {!! Form::hidden('primvideo_id', Auth::user()->id, ['class' => 'form-control']) !!}
</div>

<!-- Subject Count Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject_count', 'Subject Count:') !!}
    {!! Form::number('subject_count', null, ['class' => 'form-control']) !!}
</div>

<!-- Class Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('class', 'Class:') !!}
    {!! Form::text('class', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div> --}}
<!-- Subject Field -->
<div class="form-group col-sm-6">
    {!! Form::label('class', 'Class:') !!}
    <select class="form-control" name="class" >
        <option>Primary 1/ Preparatory1</option>
        <option>Primary 2/ Grade 1</option>
        <option>Primary 3/ Grade 2</option>
        <option>Primary 4/ Grade 3</option>
        <option>Primary 5/ Grade 4</option>
        <option>Primary 6/ Grade 5</option>

    </select>
</div>

<!-- Subject Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('subject', 'Subject:') !!}
    {!! Form::text('subject', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div> --}}
<div class="form-group col-sm-6">
    {!! Form::label('subject', 'Subject:') !!}
    <select class="form-control" name="subject" >
        <option>Mathematics</option>
        <option>English</option>
        <option>Quantitative Analysis</option>
        <option>Verbal</option>
    </select>
</div>

<!-- Video Field -->
<div class="form-group col-sm-6">
    {!! Form::label('video', 'Video:') !!}
    <input type="file"  name="video">
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

<!-- Prim Topic Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prim_topic', 'Prim Topic:') !!}
    {!! Form::text('prim_topic', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- View Count Field -->
<div class="form-group col-sm-6">
    {!! Form::label('view_count', 'View Count:') !!}
    {!! Form::number('view_count', null, ['class' => 'form-control']) !!}
</div>