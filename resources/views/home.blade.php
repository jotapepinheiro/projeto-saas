@extends('layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.home.home_title'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('labels.frontend.home.home_title') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @lang('auth.account_created')
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
