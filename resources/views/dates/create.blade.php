@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Date
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Date</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('dates.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('date.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
