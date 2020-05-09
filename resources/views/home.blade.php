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
                        {{$user->name}} <br>
                    You are logged in!
                    @if (Auth::guard('admin')->check())
                    Anda login sebagai admin
                    @elseif (Auth::guard('web')->check())
                    Anda login sebagai User
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
