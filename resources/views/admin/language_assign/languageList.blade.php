@extends('layouts.app')

@section('title', '')

@section('content')
    <div class="container-fluid px-0">
        <div class="card mb-3">
            <div class="card-header">
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" data-toggle="tooltip" data-placement="top" title="Back">
                            <a class="btn btn-sm btn-success" href="{{route('admin.dashboard' )}}">
                                <i class="fas fa-arrow-left text-white"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">{{__('messages.অর্পিত ভাষা')}}</li>
                    </ol>
                </nav>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="directedTopic">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{__('messages.বিষয়')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($totalLang as $key=> $languageItem)
                            <tr>
                                <th scope="row">{{  ++ $key }}</th>
                                <td class="">{{$languageItem->language->name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('language-filter-js')
    <script>
        $(document).ready(function() {
            $('#directedTopic').DataTable();
        } );
    </script>

@endsection

