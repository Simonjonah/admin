@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="pull-left">Account 
                    <p>
                        
                    </p>
                    </h1>
                    <h1 class="pull-right">
                    @if(Auth::user()->id == $account->user_id && $account->applied_for_payout != 1)
                        {!! Form::open(['route' => ['accounts.apply_for_payment'], 'method' => 'post']) !!}
                            <input type="hidden" value="{{ $account->id }}" name="apply_for_payment">
                            {!! Form::button('<i class="far fa-credit-card"> Applied for Payment</i>', ['type' => 'submit', 'class' => 'btn btn-primary', 'onclick' => "return confirm('Are you sure you wish to apply for Payment?')"]) !!}
                        {!! Form::close() !!}
                    @endif
                        @if(Auth::user()->role_id < 3 && $account->paid != 1)
                            {!! Form::open(['route' => ['accounts.mark_as_paid'], 'method' => 'post']) !!}
                            <input type="hidden" value="{{ $account->id }}" name="mark_as_paid">
                                {!! Form::button('<i class="far fa-trash-alt"> Mark as Paid</i>', ['type' => 'submit', 'class' => 'btn btn-primary', 'onclick' => "return confirm('Are you sure you wish to Confirm Payment?')"]) !!}
                            {!! Form::close() !!}
                         @endif 
                    </h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('accounts.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('accounts.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
