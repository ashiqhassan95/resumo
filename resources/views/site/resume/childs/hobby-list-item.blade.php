<li>
    <div class="resume-item-card mb-2">
        <div class="resume-item-card-header">
            <strong>{{ $hobby_item->title }}</strong>
        </div>
        <div class="resume-item-card-action d-inline-block mt-1">
            <a class="btn btn-secondary btn-sm" href="{{ route('resume.create.hobby', $hobby_item->id) }}">Edit</a>
            <a class="btn btn-secondary btn-sm" href="#">Delete</a>
        </div>
    </div>
</li>