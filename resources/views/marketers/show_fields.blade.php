
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <!-- Firstname Field -->
            <div class="col-sm-12">
                {!! Form::label('firstname', 'Firstname:') !!}
                <p>{{ $marketer->firstname }}</p>
            </div>

            <!-- Lastname Field -->
            <div class="col-sm-12">
                {!! Form::label('lastname', 'Lastname:') !!}
                <p>{{ $marketer->lastname }}</p>
            </div>

            <!-- Email Field -->
            <div class="col-sm-12">
                {!! Form::label('email', 'Email:') !!}
                <p>{{ $marketer->email }}</p>
            </div>

            

            
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <!-- Phone Field -->
            <div class="col-sm-12">
                {!! Form::label('phone', 'Phone:') !!}
                <p>{{ $marketer->phone }}</p>
            </div>

            <!-- Email Verified At Field -->
            <div class="col-sm-12">
                {!! Form::label('email_verified_at', 'Email Verified At:') !!}
                <p>{{ $marketer->email_verified_at }}</p>
            </div>

            <!-- Affiliate Code Field -->
            <div class="col-sm-12">
                {!! Form::label('username', 'Franchise Who Refered:') !!}
                <p><a href="../franchisemarketers/{{ $marketer->id }}">{{ $marketer->firstname }}</a></p>
            </div>

            <!-- Marketer Count Field -->
            <div class="col-sm-12">
                {!! Form::label('marketer_count', 'Marketer Count:') !!}
                <p>{{ $marketer->marketer_count }}</p>
            </div>
        </div>
    </div>
</div>

