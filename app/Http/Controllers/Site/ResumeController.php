<?php

namespace App\Http\Controllers\Site;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Hobby;
use App\Models\Language;
use App\Models\Profile;
use App\Models\Resume;
use App\Models\Skill;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        return view('site.resume.index');
    }

    public function createProfile()
    {
        if (Auth::check()) {
            $user = Auth::user();

            $resume = Resume::query()
                ->firstOrCreate(['user_id' => Auth::id()]);

            $profile = $resume->profile()->firstOrCreate(['resume_id' => $resume->id], [
                'name' => $user->name,
                'email' => $user->email
            ]);

            return view('site.resume.create.profile', compact('profile'));
        }

        return 'Unauthorized';
    }

    public function storeProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'tag_line' => 'nullable',
            'image' => 'nullable',
            'sex' => 'required',
            'birth_date' => 'required',
            'bio' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required'
        ]);

        $resume =  Resume::query()
            ->where('user_id', Auth::id())
            ->first();

        $profile = $resume->profile()->updateOrCreate(['resume_id' => $resume->id], [
            'name' => $request->get('name'),
            'tag_line' => $request->get('tag_line'),
            'image' => $request->get('image'),
            'sex' => $request->get('sex'),
            'birth_date' => $request->get('birth_date'),
            'bio' => $request->get('bio'),
            'email' => $request->get('email'),
            'website' => $request->get('website', null),
            'phone' => $request->get('phone'),
            'street' => $request->get('street'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'country' => $request->get('country'),
        ]);

        return redirect()->route('resume.create.experience');
    }

    public function createExperience(Experience $experience = null)
    {
        $resume = Resume::query()
            ->where('user_id', Auth::id())
            ->first();
        if($resume) {
            $experiences = Experience::query()->where('resume_id', $resume->id)->get();
        }
        return view('site.resume.create.experience', compact('experiences', 'experience'));
    }

    public function storeExperience(Request $request, Experience $experience = null)
    {
        $next_procedure = $request->get('next');
        $resume = Resume::query()
            ->where('user_id', Auth::id())
            ->first();
        $validator = Validator::make($request->all(), [
            'company' => 'required',
            'title' => 'required',
            'description' => 'nullable',
            'start_date' => 'required',
            'end_date' => 'nullable',
            'is_present' => 'nullable',
            'location' => 'nullable'
        ]);

        if($validator->fails()) {
            if($next_procedure == 'save_and_new') {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            return redirect()->route('resume.create.education');
        }


        $experience = $experience ?? new Experience;
        $experience->company =  $request->get('company');
        $experience->title = $request->get('title');
        $experience->description = $request->get('description');
        $experience->location = $request->get('location');
        $experience->start_date = $request->get('start_date');
        $experience->end_date = $request->get('is_present') == null ? $request->get('end_date') : null ;

        if($request->get('is_present') == 'on' || $request->get('end_date') == null)
            $experience->is_present = true;
        else
            $experience->is_present = false;

        $experience->resume_id = $resume->id;
        $experience->save();

        if($request->has('next')) {
            if($request->get('next') == 'save_and_new') {
                return redirect()->route('resume.create.experience');
            }
        }

        return redirect()->route('resume.create.education');
    }

    public function createEducation(Education $education = null)
    {
        $resume = Resume::query()
            ->where('user_id', Auth::id())
            ->first();
        if($resume) {
            $educations = Education::query()->where('resume_id', $resume->id)->get();
        }
        return view('site.resume.create.education', compact('educations', 'education'));
    }

    public function storeEducation(Request $request, Education $education = null)
    {
        $next_procedure = $request->get('next');
        $resume = Resume::query()
            ->where('user_id', Auth::id())
            ->first();
        $validator = Validator::make($request->all(), [
            'institution' => 'required',
            'course' => 'required',
            'description' => 'nullable',
            'location' => 'nullable',
            'start_date' => 'required',
            'end_date' => 'nullable',
            'is_present' => 'nullable'
        ]);

        if($validator->fails()) {
            if($next_procedure == 'save_and_new') {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            return redirect()->route('resume.create.skill');
        }

        $education = $education ?? new Education;
        $education->institution = $request->get('institution');
        $education->course = $request->get('course');
        $education->description = $request->get('description');
        $education->location = $request->get('location');
        $education->start_date = $request->get('start_date');
        $education->end_date = $request->get('is_present') == null ? $request->get('end_date') : null ;

        if($request->get('is_present') == 'on' || $request->get('end_date') == null)
            $education->is_present = true;
        else
            $education->is_present = false;

        $education->resume_id = $resume->id;
        $education->save();

        if($request->has('next')) {
            if($request->get('next') == 'save_and_new') {
                return redirect()->route('resume.create.education');
            }
        }

        return redirect()->route('resume.create.skill');
    }

    public function createSkill(Skill $skill = null)
    {
        $resume = Resume::query()
            ->where('user_id', Auth::id())
            ->first();
        if($resume) {
            $skills = Skill::query()->where('resume_id', $resume->id)->get();
        }
        return view('site.resume.create.skill', compact('skills', 'skill'));
    }

    public function storeSkill(Request $request, Skill $skill)
    {
        $next_procedure = $request->get('next');
        $resume = Resume::query()
            ->where('user_id', Auth::id())
            ->first();

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'level' => 'required',
        ]);

        if($validator->fails()) {
            if($next_procedure == 'save_and_new') {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            return redirect()->route('resume.create.language');
        }


        $skill = Skill::query()
            ->updateOrCreate(['id' => $skill->id ?? ''], [
                'title' => $request->get('title'),
                'level' => $request->get('level'),
                'resume_id' => $resume->id
            ]);

        if($request->has('next')) {
            if($request->get('next') == 'save_and_new') {
                return redirect()->route('resume.create.skill');
            }
        }

        return redirect()->route('resume.create.language');
    }

    public function createLanguage(Language $language = null)
    {
        $resume = Resume::query()
            ->where('user_id', Auth::id())
            ->first();
        if($resume) {
            $languages = Language::query()->where('resume_id', $resume->id)->get();
        }
        return view('site.resume.create.language', compact('languages', 'language'));
    }

    public function storeLanguage(Request $request, Language $language = null)
    {
        $next_procedure = $request->get('next');
        $resume = Resume::query()
            ->where('user_id', Auth::id())
            ->first();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'level' => 'required',
        ]);

        if($validator->fails()) {
            if($next_procedure == 'save_and_new') {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            return redirect()->route('resume.create.hobby');
        }

        $language = Language::query()
            ->updateOrCreate(['id' => $language->id ?? null], [
                'name' => $request->get('name'),
                'level' => $request->get('level'),
                'resume_id' => $resume->id
            ]);

        if($request->has('next')) {
            if($request->get('next') == 'save_and_new') {
                return redirect()->route('resume.create.language');
            }
        }

        return redirect()->route('resume.create.hobby');
    }

    public function createHobby(Hobby $hobby = null)
    {
        $resume = Resume::query()
            ->where('user_id', Auth::id())
            ->first();
        if($resume) {
            $hobbies = Hobby::query()->where('resume_id', $resume->id)->get();
        }
        return view('site.resume.create.hobby', compact('hobbies', 'hobby'));
    }

    public function storeHobby(Request $request, Hobby $hobby = null)
    {
        $next_procedure = $request->get('next');
        $resume = Resume::query()
            ->where('user_id', Auth::id())
            ->first();

        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if($validator->fails()) {
            if($next_procedure == 'save_and_new') {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            return redirect()->route('resume.show', $resume->id);
        }


        $hobby = Hobby::query()
            ->updateOrCreate(['id' => $hobby->id ?? ''], [
                'title' => $request->get('title'),
                'resume_id' => $resume->id
            ]);

        if($request->has('next')) {
            if($request->get('next') == 'save_and_new') {
                return redirect()->route('resume.create.language');
            }
        }

        return redirect()->route('resume.show', $resume->id);
    }

    public function show(Resume $resume)
    {
        $resume = Resume::query()
            ->find($resume->id)
            ->with(['profile', 'experiences', 'educations', 'skills', 'hobbies'])->first();
        return view('site.resume.templates.simple', compact('resume'));
    }

    public function edit(Resume $resume)
    {

    }

    public function update(Request $request, Resume $resume)
    {

    }

    public function destroy(Resume $resume)
    {

    }
}
