<div class="modal fade" id="directedForm" tabindex="-1" aria-labelledby="directedFormTitle" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('admin.directeds.store')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('messages.নতুন নির্দেশিত')}}</h5>
                    <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label" for="name">{{__('messages.বিষয়')}}</label>
                        <div class="col-sm-9">
                            <input class="form-control  @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="{{__('messages.বিষয়')}}" value="{{old('name')}}" required>
                            @error('name')
                            <span class="invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="field_wrapper">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label" for="sentence">{{__('messages.বাক্য')}}</label>
                                            <div class="col-sm-9">
                                                <input class="form-control @error('sentence[0]') is-invalid @enderror" id="sentence" name="sentence[]" type="text" value="{{old('sentence')}}" placeholder="{{__('messages.বাংলা বাক্য')}}" required>
                                                @error('sentence[0]')
                                                <span class="invalid-feedback">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label" for="english">{{__('messages.ইংরেজী')}}</label>
                                            <div class="col-sm-9">
                                                <input class="form-control @error('english[0]') is-invalid @enderror" id="english" name="english[]" type="text" value="{{old('english')}}" placeholder="{{__('messages.ইংরেজী বাক্য')}}" required>
                                                @error('english[0]')
                                                <span class="invalid-feedback">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 mt-4">
                                        <a href="javascript:void(0);" class="btn btn-success btn-sm rounded-circle add_button">
                                            <svg class="icon" style="width: 0.5rem;">
                                                <use xlink:href="{{asset('assets/coreui/vendors/@coreui/icons/svg/free.svg#cil-plus')}}"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-sm text-white" type="button" data-coreui-dismiss="modal">{{__('messages.বন্ধ করুন')}}</button>
                    <button class="btn btn-success btn-sm text-white" type="submit">{{__('messages.জমা দিন')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>
