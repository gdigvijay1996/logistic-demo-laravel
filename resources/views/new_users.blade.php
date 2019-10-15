@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>New Users List</h1>
                        <a href="{{ url()->previous() }}" class="m-2 btn btn-outline-info btn-sm">Back</a>
                        <a href="{!! url('/home/new-users/add') !!}" class="m-2 btn btn-outline-info btn-sm">Add New User</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered data-table" id="users_datatable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile number</th>
                                <th>Referance code</th>
                                <th>#</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile number</th>
                                <th>Referance code</th>
                                <th>#</th>
                                <th>#</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript" src="{{ asset('js/all.js') }}"></script>
@endpush

@push('style')
<link href="{{ asset('css/all.css') }}" rel="stylesheet">
@endpush