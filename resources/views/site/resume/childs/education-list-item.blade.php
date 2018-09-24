<li>
    <div class="resume-item-card mb-2">
        <div class="resume-item-card-header">
            <strong>{{ $education_item->institution }}</strong> - from {{ $education_item->start_date }} to {{ $education_item->is_present ? 'Present' : $education_item->end_date }}
        </div>
        <div class="resume-item-card-body">
            {{ $education_item->course }}
        </div>
        <div class="resume-item-card-action d-inline-block mt-1">
            <a class="btn btn-secondary btn-sm" href="{{ route('resume.create.education', $education_item->id) }}">Edit</a>
            <a class="btn btn-secondary btn-sm" href="#">Delete</a>
        </div>
    </div>
</li>