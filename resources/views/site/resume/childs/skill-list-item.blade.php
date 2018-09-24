<li>
    <div class="resume-item-card mb-2">
        <div class="resume-item-card-header">
            <strong>{{ $skill_item->title }}</strong> -  {{ $skill_item->levelText() }}
        </div>
        <div class="resume-item-card-action d-inline-block mt-1">
            <a class="btn btn-secondary btn-sm" href="{{ route('resume.create.skill', $skill_item->id) }}">Edit</a>
            <a class="btn btn-secondary btn-sm" href="#">Delete</a>
        </div>
    </div>
</li>