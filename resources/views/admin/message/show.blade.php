@extends('admin.layouts')
@section('title', 'Message')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Message</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Message
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="btn btn-primary">
                            <a href="{{ route('message') }}" class="text-white"><i class="fa fa-arrow-circle-left"></i>
                                Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h2>Subject : <b>{{ $message->subject }}</b></h2>
                        <p>From : {{ $message->user->name }} </p>
                        <h2>Message : </h2>
                        <div>
                            {{ $message->message }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
