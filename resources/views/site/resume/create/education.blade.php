@extends('site.layouts.resume-create-master')
@section('resume-form')
    @if(!empty($educations) && count($educations) > 0)
        <h5 class="border-bottom border-success mt-2 mb-3 pb-1">Educations</h5>
        <ul class="list-unstyled">
            @foreach($educations as $education_item)
                @include('site.resume.childs.education-list-item')
            @endforeach
        </ul>
    @endif
    <h5 class="border-bottom border-success mt-2 mb-3 pb-1">
        {{ empty($education) ? 'Add new education' : 'Update existing education' }}
    </h5>
    <?php
        $checked = '';
        $disabled = '';
        if (!empty($education) && !is_null($education->is_present)) {
            $checked = $education->is_present == true ? 'checked' : '';
            $disabled = $education->is_present == true ? 'disabled' : '';
        }
        else {
            $checked = 'null';
        }
    ?>
    <form class="mt-3" action="{{ route('resume.store.education', $education->id ?? '') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="institution">Institution Name</label>
            <input type="text" class="form-control" name="institution" value="{{ $education->institution ?? old('institution') }}">
        </div>
        <div class="form-group">
            <label for="course">Course / Field</label>
            <input type="text" class="form-control" name="course" value="{{ $education->course ?? old('course') }}">
        </div>
        <div class="d-flex flex-wrap">
            <div class="form-group mr-3">
                <label for="start_date">Start data</label>
                <input type="date" class="form-control" name="start_date" value="{{ $education->start_date ?? old('start_date') }}">
            </div>
            <div class="form-group">
                <label for="end_date">End date</label>
                <input type="date" class="form-control js-end-date" name="end_date"
                       value="{{ $education->end_date ?? old('end_date') }}" {{ $disabled }}>
            </div>
        </div>

        <div class="form-group ">
            <div class="form-check">
                <input id="js-is-present-radio-button" class="form-check-input" type="checkbox" name="is_present" {{ $checked }}>
                <label class="form-check-label" for="is_present">I Currently study here</label>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="2">{{ $education->description ?? old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" name="location" value="{{ $education->location ?? old('location') }}">
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
            <a href="{{ route('resume.create.experience') }}" class="btn btn-outline-secondary pl-3 pr-3">Back</a>
            <button type="submit" name="next" value="save_and_new" class="btn btn-outline-primary pl-2 pr-2">Save and Add another</button>
            <button type="submit" class="btn btn-outline-primary pl-5 pr-5">Next</button>
        </div>
    </form>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#js-is-present-radio-button').click(function () {
                if (this.checked) {
                    $('.js-end-date').prop( "disabled", true );
                }
                else {
                    $('.js-end-date').prop( "disabled", false );
                }
            });
        })
    </script>
@endsection