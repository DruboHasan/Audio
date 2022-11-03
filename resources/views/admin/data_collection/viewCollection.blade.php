@extends('layouts.app')

@section('content')
    <div class="container-fluid pl-0 px-0">
        <div class="card mb-3">
            <div class="card-header">
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.data_collections.index')}}">{{__('messages.তথ্য সংগ্রহ')}}</a></li>
                        @if($collection->type_id== 1)
                            <li class="breadcrumb-item">{{__('messages.নির্দেশিত')}}</li>
                            <li class="breadcrumb-item active" aria-current="page">{{$collection->dcDirected->topic->name}}</li>
                        @else
                            <li class="breadcrumb-item">{{__('messages.স্বতঃস্ফূর্ত')}}</li>
                            <li class="breadcrumb-item active" aria-current="page">{{$collection->dcSpontaneous->spontaneous->word}}</li>
                        @endif
                    </ol>
                </nav>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-3 col-sm-3 col-form-label" >{{__('messages.বিষয়ঃ')}} </label>
                            <div class=" col-md-9 col-sm-9 col-form-label">
                                @if(!empty($collection->dcDirected))
                                {{$collection->dcDirected->topic->name}}
                                @else
                                    {{$collection->dcSpontaneous->spontaneous->word}}
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-sm-3 col-form-label" >{{__('messages.অডিও')}} </label>
                            <div class=" col-md-9 col-sm-9 col-form-label">
                                @if(!empty($collection->dcDirected))
                                    <input type="hidden" id="audio" value="{{$collection->dcDirected->dcSentence->audio}}">
                                    <div id="waveform"></div>
                                    <div id="waveform-time-indicator">
                                        <span class="time">00:00:00</span>
                                    </div>
                                    <input type="button" id="btn-play" value="Play" disabled="disabled"/>
                                    <input type="button" id="btn-pause" value="Pause" disabled="disabled"/>
                                    <input type="button" id="btn-stop" value="Stop" disabled="disabled" />
                                @else
                                    <input type="hidden" id="audio" value="{{$collection->dcSpontaneous->audio}}">
                                    <div id="waveform"></div>
                                    <div id="waveform-time-indicator">
                                        <span class="time">00:00:00</span>
                                    </div>
                                    <input type="button" id="btn-play" value="Play" disabled="disabled"/>
                                    <input type="button" id="btn-pause" value="Pause" disabled="disabled"/>
                                    <input type="button" id="btn-stop" value="Stop" disabled="disabled" />
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-sm-3 col-form-label" >{{__('messages.ভাষাঃ')}} </label>
                            <div class=" col-md-9 col-sm-9 col-form-label">
                                {{isset($collection->language->name)? $collection->language->name: ''}}
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-sm-3 col-form-label" > {{__('messages.অবস্থানঃ')}}</label>
                            <div class=" col-md-9 col-sm-9 col-form-label">
                                {{$collection->district->name}}
                            </div>
                        </div>
                        @if(!empty($collection->dcDirected))
                        <div class="row mb-2">
                            <label class="col-md-3 col-sm-3 col-form-label" >{{__('messages.বাংলাঃ')}} </label>
                            <div class=" col-md-9 col-sm-9 col-form-label">
                                {{$collection->dcDirected->dcSentence->directed->sentence}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-md-3 col-sm-3 col-form-label" >{{__('messages.ইংরেজীঃ')}}</label>
                            <div class=" col-md-9 col-sm-9 col-form-label">
                                {{$collection->dcDirected->dcSentence->directed->english}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-md-3 col-sm-3 col-form-label" >{{__('messages.উচ্চারণ')}} </label>
                            <div class=" col-md-9 col-sm-9 col-form-label">
                                {{$collection->dcDirected->dcSentence->transcription}}
                            </div>
                        </div>
                        @else
                            <div class="row mb-2">
                                <label class="col-md-3 col-sm-3 col-form-label" > {{__('messages.বাংলা')}}</label>
                                <div class=" col-md-9 col-sm-9 col-form-label">
                                    {{$collection->dcSpontaneous->bangla}}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-md-3 col-sm-3 col-form-label" >{{__('messages.ইংরেজী')}} </label>
                                <div class=" col-md-9 col-sm-9 col-form-label">
                                    {{$collection->dcSpontaneous->english}}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-md-3 col-sm-3 col-form-label" >{{__('messages.উচ্চারণ')}} </label>
                                <div class=" col-md-9 col-sm-9 col-form-label">
                                    {{$collection->dcSpontaneous->transcription}}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="row mb-3">
                            <label class="col-md-3 col-sm-3 col-form-label" >{{__('messages.গ্রুপের নামঃ')}} </label>
                            <div class=" col-md-9 col-sm-9 col-form-label">
                                {{isset($collection->taskAssign->group)? $collection->taskAssign->group->name: ''}}
                            </div>
                        </div>
                        <hr>
                        <div class="row ">
                            <label class="col-md-3 col-sm-3 col-form-label" >{{__('messages.কালেক্টর নামঃ')}} </label>
                            <div class=" col-md-9 col-sm-9 col-form-label">
                                {{$collection->collector->name}}
                            </div>
                        </div>
                        <div class="row ">
                            <label class="col-md-3 col-sm-3 col-form-label" >{{__('messages.ইমেইলঃ')}} </label>
                            <div class=" col-md-9 col-sm-9 col-form-label">
                                <a href="mail:{{$collection->collector->email}}">{{$collection->collector->email}}</a>
                            </div>
                        </div>
                        <div class="row ">
                            <label class="col-md-3 col-sm-3 col-form-label" > {{__('messages.ফোনঃ')}}</label>
                            <div class=" col-md-9 col-sm-9 col-form-label" >
                                <a href="tel:{{$collection->collector->phone}}">{{$collection->collector->phone}}</a>
                            </div>
                        </div>
                        <hr>
                        <div class="row ">
                            <label class="col-md-3 col-sm-3 col-form-label" > {{__('messages.স্পিকার নামঃ')}}</label>
                            <div class=" col-md-9 col-sm-9 col-form-label">
                                {{$collection->speaker->name}}
                            </div>
                        </div>
                        <div class="row ">
                            <label class="col-md-3 col-sm-3 col-form-label" > {{__('messages.বয়সঃ')}}</label>
                            <div class=" col-md-9 col-sm-9 col-form-label">
                                {{$collection->speaker->age}}
                            </div>
                        </div>
                        <div class="row ">
                            <label class="col-md-3 col-sm-3 col-form-label" > {{__('messages.পেশাঃ')}}</label>
                            <div class=" col-md-9 col-sm-9 col-form-label">
                                {{$collection->speaker->occupation}}
                            </div>
                        </div>
                        <div class="row ">
                            <label class="col-md-3 col-sm-3 col-form-label" >{{__('messages.লিঙ্গঃ')}}</label>
                            <div class=" col-md-9 col-sm-9 col-form-label">
                                @if($collection->speaker->gender == 0)
                                    {{__('messages.পুরুষ')}}
                                @elseif($collection->speaker->gender== 1)
                                    {{__('messages.মহিলা')}}
                                @else
                                    {{__('messages.অন্যান্য')}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('language-filter-js')
    <script src="https://unpkg.com/wavesurfer.js"></script>
    <script src="https://unpkg.com/wavesurfer.js/dist/plugin/wavesurfer.regions.min.js"></script>

    <script type="text/javascript">

        var baseUrl = {!! json_encode(url('/')) !!}+ '/';
        var filePath = $('#audio').val();
        let audioPath = baseUrl+filePath;
        var buttons = {
            play: document.getElementById("btn-play"),
            pause: document.getElementById("btn-pause"),
            stop: document.getElementById("btn-stop")
        };

        var Spectrum = WaveSurfer.create({
            container: '#waveform',
            waveColor: '#8eea8e',
            progressColor: "#CACACA",
        });

        buttons.play.addEventListener("click", function(){
            Spectrum.play();
            buttons.stop.disabled = false;
            buttons.pause.disabled = false;
            buttons.play.disabled = true;
        }, false);

        buttons.pause.addEventListener("click", function(){
            Spectrum.pause();
            buttons.pause.disabled = true;
            buttons.play.disabled = false;
        }, false);


        buttons.stop.addEventListener("click", function(){
            Spectrum.stop();
            buttons.pause.disabled = true;
            buttons.play.disabled = false;
            buttons.stop.disabled = true;
        }, false);


        Spectrum.on('ready', function () {
            buttons.play.disabled = false;
        });

        window.addEventListener("resize", function(){
            var currentProgress = Spectrum.getCurrentTime() / Spectrum.getDuration();

            Spectrum.empty();
            Spectrum.drawBuffer();
            Spectrum.seekTo(currentProgress);
            buttons.pause.disabled = true;
            buttons.play.disabled = false;
            buttons.stop.disabled = false;
        }, false);

        Spectrum.load(audioPath);


        Spectrum.on('ready', updateTimer)
        Spectrum.on('audioprocess', updateTimer)

        Spectrum.on('seek', updateTimer)

        function updateTimer() {
            var formattedTime = secondsToTimestamp(Spectrum.getCurrentTime());
            $('#waveform-time-indicator .time').text(formattedTime);
        }

        function secondsToTimestamp(seconds) {
            seconds = Math.floor(seconds);
            var h = Math.floor(seconds / 3600);
            var m = Math.floor((seconds - (h * 3600)) / 60);
            var s = seconds - (h * 3600) - (m * 60);

            h = h < 10 ? '0' + h : h;
            m = m < 10 ? '0' + m : m;
            s = s < 10 ? '0' + s : s;
            return h + ':' + m + ':' + s;
        }



    </script>
@endsection
