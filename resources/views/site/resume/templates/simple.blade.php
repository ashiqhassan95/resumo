@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 simple-resume-left">
                <div class="simple-resume-image text-center pt-5 pb-4">
                    <img class="rounded-circle" src="{{$resume->profile->image}}" width="200px" height="200px">
                    <h4 class="mt-4 mb-2">{{ $resume->profile->name }}</h4>
                    <h6 class="mt-2 mb-2">{{ $resume->profile->tag_line }}</h6>
                </div>
                <div class="simple-resume-about mt-3 mb-3">
                    <h5 class="simple-resume-left-widget-header">
                        <i class="fas fa-user-circle"></i>About me
                    </h5>
                    <p class="mt-1 mb-1">{{ $resume->profile->bio }}</p>
                </div>
                <div class="simple-resume-contact mt-3 mb-3">
                    <h5 class="simple-resume-left-widget-header">
                        <i class="fas fa-user-circle"></i>Contact me
                    </h5>
                    <ul class="list-unstyled m-0">
                        <li>{{ $resume->profile->address() }}</li>
                        <li>{{ $resume->profile->email }}</li>
                        <li>{{ $resume->profile->phone }}</li>
                        @if ( !empty($resume->profile->website))
                            <li>{{ $resume->profile->website }}</li>
                        @endif
                    </ul>
                </div>
                <div class="simple-resume-skills mt-3 mb-3">
                    <h5 class="simple-resume-left-widget-header">
                        <i class="fas fa-user-circle"></i>My Skills
                    </h5>
                    @if (count($resume->skills) > 0)
                        <ul class="list-unstyled m-0">
                            @foreach($resume->skills as $skill)
                                <li>{{ $skill->title }} - {{ $skill->level }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="simple-resume-languages mt-3 mb-3">
                    <h5 class="simple-resume-left-widget-header">
                        <i class="fas fa-user-circle"></i>Languages
                    </h5>
                    @if (count($resume->languages) > 0)
                        <ul class="list-unstyled m-0">
                            @foreach($resume->languages as $language)
                                <li>{{ $language->name }} - {{ $language->level }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="col-md-8 simple-resume-right p-5">
                <div class="simple-resume-experiences">
                    <h5 class="simple-resume-right-widget-header">
                        <i class="fas fa-user-circle"></i>EXPERIENCE
                    </h5>
                    @if (count($resume->experiences) > 0)
                        <ul class="list-unstyled m-0">
                            @foreach($resume->experiences as $experience)
                                <li>
                                    <div class="simple-resume-experience-block">
                                        <h6 class="simple-resume-experience-title">
                                            <strong>{{ $experience->title }}</strong>
                                        </h6>
                                        <span>
                                            <i class="company-icon"></i>{{ $experience->company }}
                                            <i class="date-icon"></i>{{ date('M Y', strtotime($experience->start_date)) }} - {{ $experience->is_present ? 'Present' : date('M Y', strtotime($experience->end_date)) }}
                                        </span>
                                        <p>{{ $experience->description }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="simple-resume-educations mt-5">
                    <h5 class="simple-resume-right-widget-header">
                        <i class="fas fa-user-circle"></i>EDUCATIONS
                    </h5>
                    @if (count($resume->educations) > 0)
                        <ul class="list-unstyled m-0">
                            @foreach($resume->educations as $education)
                                <li>
                                    <div class="simple-resume-education-block">
                                        <h6 class="simple-resume-education-title">
                                            <strong>{{ $education->course }}</strong>
                                        </h6>
                                        <span>
                                            <i class="institute-icon"></i>{{ $education->institution }}
                                            <i class="date-icon"></i>{{ date('M Y', strtotime($education->start_date)) }} - {{ $education->is_present ? 'Present' : date('M Y', strtotime($education->end_date)) }}
                                        </span>
                                        <p>{{ $education->description }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="simple-resume-hobbies mt-5">
                    <h5 class="simple-resume-right-widget-header">
                        <i class="fas fa-user-circle"></i>HOBBIES
                    </h5>
                    @if (count($resume->hobbies) > 0)
                        @foreach($resume->hobbies as $hobby)
                            <a href="javascript:;">{{ $hobby->title }}</a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
