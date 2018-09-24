@extends('site.layouts.resume-create-master')
@section('resume-form')
    @if(!empty($hobbies) && count($hobbies) > 0)
        <h5 class="border-bottom border-success mt-2 mb-3 pb-1">Hobbies</h5>
        <ul class="list-unstyled">
            @foreach($hobbies as $hobby_item)
                @include('site.resume.childs.hobby-list-item')
            @endforeach
        </ul>
    @endif
    <h5 class="border-bottom border-success mt-2 mb-3 pb-1">
        {{ empty($skill) ? 'Add new hobby' : 'Update existing hobby' }}
    </h5>
    <form action="{{ route('resume.store.hobby', $hobby->id ?? '') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Hobby</label>
            <input type="text" class="form-control" name="title" value="{{ $hobby->title ?? old('title') }}">
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group text-right">
            <a href="{{ route('resume.create.language') }}" class="btn btn-outline-secondary pl-3 pr-3">Back</a>
            <button type="submit" name="next" value="save_and_new" class="btn btn-outline-primary pl-2 pr-2">Save and Add another</button>
            <button type="submit" class="btn btn-outline-primary pl-5 pr-5">Next</button>
        </div>
    </form>
@endsection