@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Date
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Date</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('dates.update', $date->id_date) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('date.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
