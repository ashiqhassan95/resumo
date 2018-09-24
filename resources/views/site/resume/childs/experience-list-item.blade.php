<li>
    <div class="resume-item-card mb-2">
        <div class="resume-item-card-header">
            <strong>{{ $experience_item->company }}</strong> - from {{ $experience_item->start_date }} to {{ $experience_item->is_present ? 'Present' : $experience_item->end_date }}
        </div>
        <div class="resume-item-card-body">
            {{ $experience_item->title }}
        </div>
        <div class="resume-item-card-action d-inline-block mt-1">
            <a class="btn btn-secondary btn-sm" href="{{ route('resume.create.experience', $experience_item->id) }}">Edit</a>
            <a class="btn btn-secondary btn-sm" href="#">Delete</a>
        </div>
    </div>
</li>