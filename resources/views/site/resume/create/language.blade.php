@extends('site.layouts.resume-create-master')
@section('resume-form')
    @if(!empty($languages) && count($languages) > 0)
        <h5 class="border-bottom border-success mt-2 mb-3 pb-1">Skills</h5>
        <ul class="list-unstyled">
            @foreach($languages as $language_item)
                @include('site.resume.childs.language-list-item')
            @endforeach
        </ul>
    @endif
    <h5 class="border-bottom border-success mt-2 mb-3 pb-1">
        {{ empty($language) ? 'Add new language' : 'Update existing language' }}
    </h5>
    <form action="{{ route('resume.store.language', $language->id ?? '') }}" method="post">
        @csrf
        <div class="d-flex flex-wrap">
            <div class="form-group flex-grow-1 mr-3">
                <label for="name">Language</label>
                <input type="text" class="form-control" name="name" value="{{  $language->name ?? old('name') }}">
            </div>
            <div class="form-group flex-grow-1">
                <label for="level">Level</label>
                <?php
                    $level = '1';
                    if(!empty($language) && !is_null($language->level))
                        $level = $language->level;
                    else
                        $level = old('level');
                ?>
                <select name="level" class="form-control">
                    <option value="1" {{ $level == 1 ? 'selected' : '' }}>Beginner</option>
                    <option value="2" {{ $level == 2 ? 'selected' : '' }}>Competent</option>
                    <option value="3" {{ $level == 3 ? 'selected' : '' }}>Intermediate</option>
                    <option value="4" {{ $level == 4 ? 'selected' : '' }}>Advanced</option>
                    <option value="5" {{ $level == 5 ? 'selected' : '' }}>Expert</option>
                </select>
            </div>
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
            <a href="{{ route('resume.create.skill') }}" class="btn btn-outline-secondary pl-3 pr-3">Back</a>
            <button type="submit" name="next" value="save_and_new" class="btn btn-outline-primary pl-2 pr-2">Save and Add another</button>
            <button type="submit" class="btn btn-outline-primary pl-5 pr-5">Next</button>
        </div>

    </form>
@endsection