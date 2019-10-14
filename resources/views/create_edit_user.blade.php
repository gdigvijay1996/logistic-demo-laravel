@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $is_edit ? 'Edit user' : 'Add New User' }}
                    <a href="{{ url()->previous() }}" class="m-2 btn btn-outline-info btn-sm">Back</a>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ $is_edit ? url('/home/new-users/edit',$users->id) : url('/home/new-users/create') }}" enctype="multipart/form-data">

                        {{ $is_edit ? method_field('PATCH') : ''}}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="userName">User Name</label>
                            <input type="text" name="name" value="{{ $is_edit ? $users->name : old('name') }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" placeholder="Enter user name" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" value="{{ $is_edit ? $users->email : old('email') }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="Enter email" />
                        </div>
                        <div class="form-group">
                            <label for="email">Mobile Number</label>
                            <input type="text" name="mobile_number" value="{{ $is_edit ? $users->mobile_number : old('mobile_number') }}" class="form-control {{ $errors->has('mobile_number') ? 'is-invalid' : ''}}" placeholder="Enter mobile number" />
                        </div>

                        <div class="btn-submit p-2">
                            <button type="submit" class="btn btn-outline-success">{{ $is_edit ? 'Edit user' : 'Add user' }}</button>
                        </div>

                        {{-- for validation error  --}}
                        @if ($errors->any())
                        <div class="alert alert-warning">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                    </form>

                    @if ($is_edit)
                    <form method="POST" action="{{ url('home/new-users',$users->id) }}">
                        @method('DELETE')
                        @csrf

                        <div class="btn-submit p-2">
                            <button type="submit" class="btn btn-outline-danger">Delete User</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection