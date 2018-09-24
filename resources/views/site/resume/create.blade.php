@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col pt-3 pb-5" style="background: white">
            <h2 class="mb-3">Create resume</h2>
            <form action="{{ route('resume.store') }}" method="post">

            </form>
        </div>
    </div>
@endsection