@extends('site.layouts.resume-create-master')
@section('resume-form')
    <h5 class="border-bottom border-success mt-2 mb-3 pb-1">Profile</h5>
    <form action="{{ route('resume.store.profile') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $profile->name ?? old('name') }}">
        </div>

        <div class="form-group">
            <label for="bio">Small Bio</label>
            <textarea name="bio" class="form-control" rows="2">{{ $profile->bio ?? old('bio') }}</textarea>
        </div>

        <div class="form-group">
            <label for="tag_line">Tag line</label>
            <input type="text" name="tag_line" class="form-control" value="{{ $profile->tag_line ?? old('tag_line') }}">
        </div>

        <div class="form-group">
            <label for="image">Profile Image</label>
            <input type="text" name="image" class="form-control" value="{{ $profile->image ?? old('image') }}">
        </div>

        <div class="d-flex flex-wrap">
            <div class="form-group mr-4 flex-grow-1">
                <label for="sex">Sex</label>
                <select name="sex" class="form-control">
                    <option value="0" {{ $profile->sex == 0 ? 'selected' : '' }}>Male</option>
                    <option value="1" {{ $profile->sex == 1 ? 'selected' : '' }}>Female</option>
                    <option value="2" {{ $profile->sex == 2 ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="form-group flex-grow-1">
                <label for="birth_date">Date of Birth</label>
                <input type="date" class="form-control" name="birth_date" value="{{ $profile->birth_date ?? old('birth_date') }}">
            </div>
        </div>

        <div class="d-flex flex-wrap">
            <div class="form-group mr-4 flex-grow-1">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $profile->email ?? old('email') }}">
            </div>
            <div class="form-group mr-4 flex-grow-1">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{ $profile->phone ?? old('phone') }}">
            </div>
            <div class="form-group flex-grow-1">
                <label for="website">Website</label>
                <input type="url" class="form-control" name="website" value="{{ $profile->website ?? old('website') }}">
            </div>
        </div>

        <div class="d-flex flex-wrap">
            <div class="form-group mr-4 flex-grow-1">
                <label for="street">Street</label>
                <input type="text" class="form-control" name="street" value="{{ $profile->street ??old('street') }}">
            </div>
            <div class="form-group flex-grow-1">
                <label for="city">City</label>
                <input type="text" class="form-control" name="city" value="{{ $profile->city ?? old('city') }}">
            </div>
        </div>

        <div class="d-flex flex-wrap">
            <div class="form-group mr-4 flex-grow-1">
                <label for="state">State</label>
                <input type="text" class="form-control" name="state" value="{{ $profile->state ?? old('state') }}">
            </div>
            <div class="form-group flex-grow-1">
                <label for="country">Country</label>
                <input type="text" class="form-control" name="country" value="{{ $profile->country ?? old('country') }}">
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
            <a href="{{ route('resume.create') }}" class="btn btn-outline-secondary pl-3 pr-3">Back</a>
            <button type="submit" class="btn btn-outline-primary pl-5 pr-5">Next</button>
        </div>
    </form>
@endsection