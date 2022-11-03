@extends('layouts.app')

@section('title', 'ইউজার তালিকা')

@section('content')
    <div class="container-fluid px-0">
        <div class="card mb-3">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills justify-content-between">
                    <li class="nav-item">{{__('messages.ইউজার তালিকা')}}</li>
                    <li class="nav-item"><a class="btn btn-success text-white btn-sm" href="{{route('admin.users.create')}}">
                            <svg class="icon me-2 text-white">
                                <use xlink:href="{{asset('assets/coreui/vendors/@coreui/icons/svg/free.svg#cil-plus')}}"></use>
                            </svg>{{__('messages.নতুন')}}</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                @if($errors->count() > 0)
                    <ul class="list-group notification-object">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item text-danger">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                @endif
                {{--@if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button class="btn-close" type="button" data-coreui-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif--}}
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="user">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col" style="width: 5rem;">{{__('messages.ক্রমিক নং')}}</th>
                            <th scope="col">{{__('messages.নাম')}}</th>
                            <th scope="col">{{__('messages.ইমেইল')}}</th>
                            <th scope="col" class="text-center" >{{__('messages.অ্যাকশন')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key=>$user)
                            <tr>
                                <td>{{ ++ $key }}</td>
                                <td>
                                    <div class="d-grid gap-2 d-md-flex justify-content-start">
                                        <div>
                                            <div class="avatar avatar-md">
                                                <img style="height: 40px;" class="avatar-img" src="{{(!empty($user->avatar))? asset($user->avatar) : asset('assets/coreui/assets/img/avatars/8.jpg')}}" alt="image">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="row">
                                                <span class="small text-primary">{{$user->name}}</span>
                                            </div>
                                            <div class="row">
                                                @forelse ($user->getRoleNames() as $role)
                                                    <span class="small">{{ $role }}</span>
                                                @empty
                                                    <span class="small">Guide</span>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle"><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                                <td class="text-center">
                                    <div class="d-grid gap-2 d-md-flex justify-content-center">
                                        @can('user-edit')
                                        <a class="btn btn-purple btn-sm" href="{{route('admin.users.edit', $user->id)}}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @endcan
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm show_confirm">
                                                <svg class="icon  text-white">
                                                    <use xlink:href="{{asset('assets/coreui/vendors/@coreui/icons/svg/free.svg#cil-trash')}}"></use>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
               {{-- {{ $users->links('vendor.pagination.custom') }}--}}
            </div>
        </div>


    </div>
@endsection

@section('language-filter-js')
    <script>
        // alertify delete
        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            event.preventDefault();
            alertify.confirm('Whoops!', 'Are you sure you want to Delete? all User related data will be deleted',
                function(){
                    form.submit();
                    // alertify.success('Ok')
                },
                function(){
                    // alertify.error('Cancel')
                });
        });

        $(document).ready(function() {
            $('#user').DataTable();
        } );

    </script>
@endsection

