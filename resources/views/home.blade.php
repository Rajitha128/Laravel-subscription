@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->stripe_id)
                        <p>Post your job vacancy advertisements : <a class="nav-link" href="">Click Here</a></p>
                    @else
                        <p>You must have an active subscription to post your job vacancy advertisements.<br>
                            Please choose our subscription plans : <a class="nav-link" href="{{ route('payments') }}">Click Here</a></p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
