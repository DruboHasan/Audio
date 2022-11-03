@extends('layouts.app')

@section('content')
    <div class="container-fluid pl-0 px-0">
        <div class="card mb-3">
            <div class="card-header">
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.permissions.index')}}">পারমিশন তালিকা</a></li>
                        <li class="breadcrumb-item active" aria-current="page">নতুন</li>
                    </ol>
                </nav>
            </div>
            <div class="card-body">
                <form action="{{route('admin.permissions.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="row mb-3">
                                <label class="col-md-2 col-sm-3 col-form-label" for="name">পারমিশন নাম</label>
                                <div class=" col-md-10 col-sm-9">
                                    <input class="form-control @error('name') is-invalid @enderror" name="name" id="name" type="text" value="{{old('name')}}" placeholder="example-user-list" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-12 text-end">
                                    <button class="btn btn-success text-white" type="submit">জমা দিন</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
