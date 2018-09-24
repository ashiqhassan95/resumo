@extends('layouts.app')

@section('content')
    <div class="row" style="border-top: 5px solid #586bff">
        <div class="col pt-3 pb-5" style="background: white">
            <h2 class="mb-3">Create resume</h2>
            {{--<div class="resume-progress d-flex flex-wrap mb-4">--}}
                {{--<div class="resume-progress-bar completed flex-grow-1" role="progressbar">--}}
                    {{--Personal--}}
                {{--</div>--}}
                {{--<div class="resume-progress-bar flex-grow-1">--}}
                    {{--Education--}}
                {{--</div>--}}
                {{--<div class="resume-progress-bar flex-grow-1">--}}
                    {{--Experience--}}
                {{--</div>--}}
                {{--<div class="resume-progress-bar flex-grow-1">--}}
                    {{--Skills--}}
                {{--</div>--}}
                {{--<div class="resume-progress-bar flex-grow-1">--}}
                    {{--Hobbies--}}
                {{--</div>--}}
            {{--</div>--}}
            @yield('resume-form')
        </div>
    </div>
@endsection