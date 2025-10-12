@extends('include.header')
@section('title', 'Registration | Vazhithunai Matrimony')
@section('content')

@section('content')

    <body class="contact-page">
        @include('include.nav-header')

        <main class="main">
            <div id="multiStepWizard">
                <div class="wizard-container">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="wizard-title">Create your profile</h1>
                            <p class="hint">Fill each step. You can revisit completed steps from the header.</p>
                        </div>

                        <!-- Step headers -->
                        <div class="steps" id="stepHeaders" role="tablist" aria-label="Registration steps">
                            <div class="step-item" data-step="0" role="tab" aria-selected="true" aria-current="step">
                                <div class="step-circle">1</div>
                                <div class="step-label">Basic Details</div>
                            </div>
                            <div class="step-item" data-step="1" role="tab" aria-selected="false">
                                <div class="step-circle">2</div>
                                <div class="step-label">Personal Details</div>
                            </div>
                            <div class="step-item" data-step="2" role="tab" aria-selected="false">
                                <div class="step-circle">3</div>
                                <div class="step-label">Family Details</div>
                            </div>
                            <div class="step-item" data-step="3" role="tab" aria-selected="false">
                                <div class="step-circle">4</div>
                                <div class="step-label">Horoscope Details</div>
                            </div>
                        </div>

                        <form id="multiStepForm" method="POST" novalidate>
                            @csrf
                            <div class="card-body">

                                {{-- Step 0 --}}
                                <section class="form-step active" data-step="birth">
                                    <h5>பிறப்பு விவரங்கள் / Birth Details
                                    </h5>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="first_name">பெயர் / Name</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><span
                                                        class="bi bi-person"></span></span>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ Auth::user()->name ?? '' }}" aria-describedby="basic-addon1"
                                                    required disabled>
                                            </div>
                                            <div class="error-text">Name is required</div>
                                        </div>
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="last_name">பிறந்த தேதி / Birth Date
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><span
                                                        class="bi bi-calendar-date"></span></span>
                                                <input type="date" id="birth_date" name="dob" class="form-control"
                                                    aria-describedby="basic-addon1" required>
                                            </div>
                                            <div class="error-text">Birth date is required</div>
                                        </div>
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="birth_time">பிறந்த நேரம் / Birth Time</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><span
                                                        class="bi bi-stopwatch"></span></span>
                                                <input type="time" class="form-control" aria-describedby="basic-addon1"
                                                    required name="birth_time">
                                            </div>
                                            <div class="error-text">Birth time is required</div>
                                        </div>
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="age">வயது / Age</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><span
                                                        class="bi bi-calendar-heart"></span></span>
                                                <input type="text" id="age" name="age" class="form-control"
                                                    value="{{ Auth::user()->userDetails->age ?? '' }}" disabled
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="birth_place">பிறந்த ஊர் / Birth Place</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><span
                                                        class="bi bi-geo-alt"></span></span>
                                                <input type="text" class="form-control"
                                                    aria-describedby="basic-addon1" required name="birth_place">
                                            </div>
                                            <div class="error-text">Birth Place is required</div>
                                        </div>

                                        <!-- பாலினம் / Gender -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="gender">பாலினம் / Gender</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-gender-ambiguous"></span></span>
                                                <select class="form-control" id="gender" required name="gender">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['genders'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="error-text">Gender is required</div>
                                        </div>

                                    </div>
                                    <br>
                                    <h5>கல்வி மற்றும் தொழில் விவரங்கள் / Education & Occupation Details
                                    </h5>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <!--  Education Details -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="highest_education">உயர்ந்த கல்வி / Highest
                                                Education</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-mortarboard"></span></span>
                                                <select class="form-control" id="highest_education"
                                                    name="highest_education" required>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['educations'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="error-text">Highest Education is required</div>
                                        </div>

                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="education_field">பிரிவு / Education
                                                Field</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-journal-bookmark"></span></span>
                                                <select class="form-control" id="education_field" name="education_field">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    <option value="engineering">Engineering</option>
                                                    <option value="medicine">Medicine</option>
                                                    <option value="arts">Arts</option>
                                                    <option value="science">Science</option>
                                                    <option value="commerce">Commerce</option>
                                                    <option value="law">Law</option>
                                                    <option value="management">Management</option>
                                                    <option value="others">Others</option>
                                                </select>
                                            </div>
                                            {{-- <div class="error-text">Education Field is required</div> --}}
                                        </div>

                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="specialization">சிறப்பு /
                                                Specialization</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-lightbulb"></span></span>
                                                <select class="form-control" id="specialization" name="specialization">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                </select>
                                            </div>
                                            {{-- <div class="error-text">Specialization is required</div> --}}
                                        </div>

                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="institution">கல்லூரி / பல்கலைக்கழகம் /
                                                Institution</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-building"></span></span>
                                                <input type="text" class="form-control" id="institution"
                                                    name="institution">
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="completion_year">பட்டம் பெற்ற ஆண்டு / Year of
                                                Completion</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-calendar-event"></span></span>
                                                <select class="form-control" id="completion_year" name="completion_year">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @for ($i = 2000; $i <= $curYear; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="certifications">கூடுதல் தகுதிகள் / Additional
                                                Qualifications</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-award"></span></span>
                                                <input type="text" class="form-control" id="certifications"
                                                    name="additional_qualifications">
                                            </div>
                                        </div>

                                        <!-- 💼 Occupation Details -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="occupation_category">தொழில் வகை / Occupation
                                                Category</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-briefcase"></span></span>
                                                <select class="form-control" id="occupation_category"
                                                    name="occupation_category" required>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['jobs'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="error-text">Occupation Category is required</div>
                                        </div>

                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="job_title">பணி / Job Title</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-person-badge"></span></span>
                                                <input type="text" class="form-control" id="job_title"
                                                    name="job_title" required>
                                            </div>
                                            <div class="error-text">Job Title is required</div>
                                        </div>

                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="company_name">நிறுவனம் / Company Name</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-building-check"></span></span>
                                                <input type="text" class="form-control" name="company_name"
                                                    id="company_name">
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="employment_type">வேலை வகை / Employment
                                                Type</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-card-checklist"></span></span>
                                                <select class="form-control" id="employment_type" name="employment_type">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['employmentTypes'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="industry">தொழில் துறை / Industry</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-diagram-3"></span></span>
                                                <select class="form-control" id="industry" name="industry">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['industries'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="work_location">பணியிடம் / Work Location</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-geo-alt"></span></span>
                                                <input type="text" class="form-control" id="work_location"
                                                    name="work_location" required>
                                            </div>
                                            <div class="error-text">Work Location is required</div>
                                        </div>

                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="annual_income">மாத வருமானம் / Monthly
                                                Income</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-currency-rupee"></span></span>
                                                <select class="form-control" id="annual_income" name="annual_income">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['salaries'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="experience_years">அனுபவம் / Years of
                                                Experience</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-hourglass-split"></span></span>
                                                <select class="form-control" id="experience_years"
                                                    name="experience_years">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @for ($i = 0; $i < 20; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </section>

                                {{-- Step 1 --}}
                                <section class="form-step" data-step="personal">
                                    <h5>சொந்த விவரங்கள் / Personal Details
                                    </h5>
                                    <hr>
                                    <br>

                                    <div class="row">
                                        <!-- ஜாதகரின் உயரம் / Height -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="height">ஜாதகரின் உயரம் / Height</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-arrows-vertical"></span></span>
                                                <select class="form-control" id="height" name="height" required>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['heights'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                    <option value="NotSpecified">Not Specified</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Height is required</div>
                                        </div>

                                        <!-- ஜாதகரின் நிறம் / Color -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="color">ஜாதகரின் நிறம் / Complexion</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-palette"></span></span>
                                                <select class="form-control" id="color" required name="color">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['complexions'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="error-text">Complexion is required</div>
                                        </div>

                                        <!-- ஜாதகரின் உட்பிரிவு / Caste -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="caste">ஜாதகரின் உட்பிரிவு / Caste</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-people"></span></span>
                                                <input type="text" class="form-control" id="caste" required
                                                    name="caste">
                                            </div>
                                            <div class="error-text">Caste is required</div>
                                        </div>

                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="caste">ஜாதகரின் மதம் / Religion</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-people"></span></span>
                                                <select class="form-control" id="religion" required name="religion">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['religions'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="error-text">Caste is required</div>
                                        </div>

                                        <!-- திருமண நிலை / Marital Status -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="marital_status">திருமண நிலை / Marital
                                                Status</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-heart"></span></span>
                                                <select class="form-control" id="marital_status" name="marital_status"
                                                    required>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['maritalStatuses'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="error-text">Marital Status is required</div>
                                        </div>

                                        <!-- நகரம் / City -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="city">நகரம் / City</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-geo-alt"></span></span>
                                                <select class="form-control" id="city" name="city" required>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['cities'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['tamil_name'] . ' - ' . $refData['value'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="error-text">City is required</div>
                                        </div>

                                        <!-- முகவரி / Address -->
                                        <div class="form-group col-12">
                                            <label class="form-label" for="address">முகவரி / Address</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-house-door"></span></span>
                                                <textarea class="form-control" id="address" rows="2" required name="address"></textarea>
                                            </div>
                                            <div class="error-text">Address is required</div>
                                        </div>

                                        <!-- கூடுதல் தனிப்பட்ட விவரங்கள் / Additional Personal Details -->

                                        <!-- உடல் அமைப்பு / Body Type -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="body_type">உடல் அமைப்பு / Body Type</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-person-standing"></span></span>
                                                <select class="form-control" id="body_type" name="body_type">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['bodyTypes'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- உடல் நிலை / Physical Status -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="physical_status">உடல் நிலை / Physical
                                                Status</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-heart-pulse"></span></span>
                                                <select class="form-control" id="physical_status" name="physical_status">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['physicalStatus'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- தாய்மொழி / Mother Tongue -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="mother_tongue">தாய்மொழி / Mother Tongue</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-translate"></span></span>
                                                <select class="form-control" id="mother_tongue" name="mother_tongue"
                                                    required>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['languagesKnown'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="error-text">Mother Tongue is required</div>
                                        </div>



                                        <!-- Interests -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="interests">விருப்பங்கள் / Interests</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-star"></span></span>
                                                <select id="interests" name="interests[]" class="form-control" multiple>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['interests'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Hobbies -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="hobbies">பொழுதுபோக்குகள் / Hobbies</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-heart"></span></span>
                                                <select id="hobbies" name="hobbies[]" class="form-control" multiple>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['hobbies'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Favourite Cuisine -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="fav_cuisine">விருப்பமான சமையல் / Favourite
                                                Cuisine</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-egg-fried"></span></span>
                                                <select id="fav_cuisine" name="favorite_cuisine[]" class="form-control"
                                                    multiple>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['cuisines'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Favourite Music Genre -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="fav_music">விருப்பமான இசை வகை / Favourite Music
                                                Genre</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-music-note-beamed"></span></span>
                                                <select id="fav_music" name="favorite_music[]" class="form-control"
                                                    multiple>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['musicGenres'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Sports / Fitness -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="sports">விளையாட்டு / உடற்பயிற்சி / Sports /
                                                Fitness</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-bicycle"></span></span>
                                                <select id="sports" name="sports[]" class="form-control" multiple>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['sportsFitness'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Pet Preference -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="pet_pref">செல்லப்பிராணி விருப்பம் / Pet
                                                Preference</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-postage-heart"></span></span>
                                                <select id="pet_pref" name="pet_preference" class="form-control">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['petPreferences'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Travel Preference -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="travel_pref">பயண விருப்பம் / Travel
                                                Preference</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-airplane"></span></span>
                                                <select id="travel_pref" name="travel_preference" class="form-control">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>

                                                    @foreach ($referenceData['travelPreferences'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Dietary Preference -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="diet">உணவு விருப்பம் / Dietary
                                                Preference</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-egg"></span></span>
                                                <select id="diet" name="diet_preference" class="form-control">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>

                                                    @foreach ($referenceData['dietaryPreferences'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Smoking Habit -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="smoking">புகைபிடிக்கும் பழக்கம் / Smoking
                                                Habit</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-slash-circle"></span></span>
                                                <select id="smoking" name="smoking_habits" class="form-control">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['smokingHabits'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Drinking Habit -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="drinking">மது அருந்தும் பழக்கம் / Drinking
                                                Habit</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-cup-straw"></span></span>
                                                <select id="drinking" name="drinking_habits" class="form-control">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['drinkingHabits'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Languages Known -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="languages">தெரிந்த மொழிகள் / Languages
                                                Known</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-translate"></span></span>
                                                <select id="languages" name="languages_known[]" class="form-control"
                                                    multiple>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['languagesKnown'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>



                                        {{-- <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="first_name">தொலைபேசி எண் / Mobile
                                                Number</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><span
                                                        class="bi bi-telephone"></span></span>
                                                <input type="text" class="form-control"
                                                    aria-describedby="basic-addon1" name="mobile" required>
                                            </div>
                                            <div class="error-text">Mobile Number is required</div>
                                        </div>
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="first_name">மின்னஞ்சல் முகவரி / E-mail</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                <input type="text" class="form-control"
                                                    aria-describedby="basic-addon1" name="email" required>
                                            </div>
                                            <div class="error-text">E-mail is required</div>
                                        </div> --}}
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="f_book">FaceBook Profile</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                <input type="text" class="form-control"
                                                    aria-describedby="basic-addon1" name="facebook_profile_url">
                                            </div>
                                        </div>
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="instagram_profile_url">Instagram profile
                                                url</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                <input type="text" class="form-control"
                                                    aria-describedby="basic-addon1" name="instagram_profile_url">
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="instagram_profile_url">Twitter profile
                                                url</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                <input type="text" class="form-control"
                                                    aria-describedby="basic-addon1" name="twitter_profile_url">
                                            </div>
                                        </div>

                                        <!-- Life Motto -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="life_motto">உங்களை பற்றி / About You</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-quote"></span></span>
                                                <textarea type="text" class="form-control" id="life_motto" name="life_motto"
                                                    placeholder="உங்களை பற்றி / About You">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                {{-- Step 2 --}}
                                <section class="form-step" data-step="family">
                                    <div class="row">
                                        <!-- குடும்ப நிலை / Family Status -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="family_status">குடும்ப நிலை / Family
                                                Status</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-people"></span></span>
                                                <select class="form-control" id="family_status" name="family_status"
                                                    required>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['familyStatus'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['value'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="error-text">Family Status is required</div>
                                        </div>

                                        <!-- குலதெய்வம் / Family God -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="family_god">குலதெய்வம் / Family God</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-flower1"></span></span>
                                                <input type="text" class="form-control" id="family_god"
                                                    name="family_god">
                                            </div>
                                        </div>

                                        <!-- தகப்பனார் / Father - உண்டு / இல்லை -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="father_alive">தகப்பனார் / Father</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-person"></span></span>
                                                <select class="form-control" id="father_alive" name="father_alive"
                                                    required>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    <option value="1">உண்டு / Alive</option>
                                                    <option value="0">இல்லை / Not Alive</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Father status is required</div>
                                        </div>

                                        <!-- தாயார் / Mother - உண்டு / இல்லை -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="mother_alive">தாயார் / Mother</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-person-fill"></span></span>
                                                <select class="form-control" id="mother_alive" name="mother_alive"
                                                    required>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    <option value="1">உண்டு / Alive</option>
                                                    <option value="0">இல்லை / Not Alive</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Mother status is required</div>
                                        </div>

                                        <!-- மொபைல் எண் (பெற்றோர் அல்லது கார்டியன்) -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="parent_mobile">மொபைல் எண் (பெற்றோர்/கார்டியன்)
                                                / Mobile Number (Parent/Guardian)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-telephone"></span></span>
                                                <input type="tel" class="form-control" id="parent_mobile"
                                                    name="parent_mobile" required>
                                            </div>
                                            <div class="error-text">Parent/Guardian mobile number is required</div>
                                        </div>

                                        <!-- தகப்பனரின் தொழில், மாத வருமானம் -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="father_work">தகப்பனரின் தொழில், மாத வருமானம் /
                                                Father Work, Monthly Salary</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-briefcase"></span></span>
                                                <input type="text" class="form-control" name="father_work"
                                                    id="father_work">
                                            </div>
                                        </div>

                                        <!-- தாயார் தொழில், மாத வருமானம் -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="mother_work">தாயார் தொழில், மாத வருமானம் /
                                                Mother Work, Monthly Salary</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-briefcase-fill"></span></span>
                                                <input type="text" class="form-control" id="mother_work"
                                                    name="mother_work">
                                            </div>
                                        </div>

                                        <!-- உடன் பிறந்தவர்களின் விபரம் -->
                                        <h5>உடன் பிறந்தவர்களின் விபரம் / Siblings Details
                                        </h5>
                                        <hr>
                                        <br>
                                        <!-- ஆண் எண்ணிக்கை -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="brothers_count">ஆண் எண்ணிக்கை / Number of
                                                Brothers</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-gender-male"></span></span>
                                                <input type="number" class="form-control" id="brothers_count"
                                                    min="0" name="brothers_count">
                                            </div>
                                        </div>

                                        <!-- பெண் எண்ணிக்கை -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="sisters_count">பெண் எண்ணிக்கை / Number of
                                                Sisters</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-gender-female"></span></span>
                                                <input type="number" class="form-control" id="sisters_count"
                                                    min="0" name="sisters_count">
                                            </div>
                                        </div>

                                        <!-- திருமணம் ஆன ஆண் எண்ணிக்கை -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="married_brothers">திருமணம் ஆன ஆண் / Married
                                                Brothers</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-gender-male"></span></span>
                                                <input type="number" class="form-control" id="married_brothers"
                                                    min="0" name="married_brothers">
                                            </div>
                                        </div>

                                        <!-- திருமணம் ஆன பெண் எண்ணிக்கை -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="married_sisters">திருமணம் ஆன பெண் / Married
                                                Sisters</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-gender-female"></span></span>
                                                <input type="number" class="form-control" id="married_sisters"
                                                    min="0" name="married_sisters">
                                            </div>
                                        </div>

                                        <!-- வீடு / Own House -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="own_house">வீடு / Own House</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-house"></span></span>
                                                <select class="form-control" id="own_house" required name="own_house">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    <option value="1">உண்டு / Yes</option>
                                                    <option value="0">இல்லை / No</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Own House status is required</div>
                                        </div>

                                        <!-- கூடுதல் குடும்ப விவரங்கள் -->
                                        <div class="form-group col-12 col-md-8 mb-3">
                                            <label class="form-label" for="family_notes">கூடுதல் குடும்ப விவரங்கள் /
                                                Additional Family Details</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-file-text"></span></span>
                                                <textarea class="form-control" name="family_notes" id="family_notes" rows="2"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </section>

                                {{-- Step 3 --}}
                                <section class="form-step" data-step="horoscope">
                                    <div class="row">
                                        <!-- ஜென்ம நட்சத்திரம் / Birth Star -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="birth_star">ஜென்ம நட்சத்திரம் / Birth
                                                Star</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-stars"></span></span>
                                                <select class="form-control" id="birth_star" name="birth_star" required>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['birthStars'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['tamil_name'] . ' - ' . $refData['value'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="error-text">Birth Star is required</div>
                                        </div>

                                        <!-- ராகு & கேது / Rahu & Ketu -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="rahu_ketu">ராகு & கேது / Rahu & Ketu</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-moon-stars"></span></span>
                                                <select class="form-control" id="rahu_ketu" required name="rahu_ketu">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    <option value="1">உண்டு / Present</option>
                                                    <option value="0">இல்லை / Not Present</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Rahu & Ketu status is required</div>
                                        </div>

                                        <!-- செவ்வாய் / Chevvai (Mars) -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="chevvai">செவ்வாய் / Chevvai (Mars)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-circle-half"></span></span>
                                                <select class="form-control" id="chevvai" required name="chevvai">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    <option value="1">உண்டு / Present</option>
                                                    <option value="0">இல்லை / Not Present</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Chevvai status is required</div>
                                        </div>

                                        <!-- ஜென்ம ராசி / Zodiac Sign -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="zodiac_sign">ஜென்ம ராசி / Zodiac Sign</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-brightness-high"></span></span>
                                                <select class="form-control" id="zodiac_sign" name="zodiac_sign"
                                                    required>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['zodiacs'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['tamil_name'] . ' - ' . $refData['value'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="error-text">Zodiac Sign is required</div>
                                        </div>

                                        <!-- ஜென்ம லக்கினம் / Birth Lagnam -->
                                        <div class="form-group col-12 col-md-3 mb-3">
                                            <label class="form-label" for="birth_lagnam">ஜென்ம லக்கினம் / Birth
                                                Lagnam</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-sun"></span></span>
                                                <select class="form-control" id="birth_lagnam" name="birth_lagnam"
                                                    required>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    @foreach ($referenceData['zodiacs'] as $refData)
                                                        <option value="{{ $refData['id'] }}">
                                                            {{ $refData['tamil_name'] . ' - ' . $refData['value'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="error-text">Birth Lagnam is required</div>
                                        </div>

                                        <!-- சுயவிவர படம் / Profile Picture -->
                                        <div class="form-group col-12 col-md-4 mb-3">
                                            <label class="form-label" for="profile_picture">சுயவிவர படம் / Profile
                                                Picture</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-person-circle"></span></span>
                                                <input type="file" class="form-control" id="profile_picture"
                                                    accept="image/*" name="profile_picture[]" multiple required>
                                            </div>
                                            <div class="error-text">Profile Picture is required</div>
                                        </div>

                                        <!-- ஜாதகம் படம் / Horoscope Picture -->
                                        <div class="form-group col-12 col-md-4 mb-3">
                                            <label class="form-label" for="horoscope_picture">ஜாதக படம் / Horoscope
                                                Picture</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-image"></span></span>
                                                <input type="file" class="form-control" id="horoscope_picture"
                                                    accept="image/*" multiple name="horoscope_picture[]">
                                            </div>
                                        </div>

                                        <!-- விண்ணப்பதாரர் எதிர்பார்க்கும் தகுதி / Expectations -->
                                        <div class="form-group col-12">
                                            <label class="form-label" for="expectations">எதிர்பார்ப்புகள் /
                                                Expectations</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-chat-left-text"></span></span>
                                                <textarea class="form-control" id="expectations" rows="3"
                                                    placeholder="Describe your expectations for a partner" name="expectations"></textarea>
                                            </div>
                                        </div>

                                        <!-- முன்பே திருமணமானவராயின் அதுபற்றி விவரம் / Previous Marriage Details -->
                                        <div class="form-group col-12">
                                            <label class="form-label" for="previous_marriage">முன்பே திருமணமானவராயின்
                                                அதுபற்றி விவரம் / Previous Marriage Details</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-journal-text"></span></span>
                                                <textarea class="form-control" id="previous_marriage" name="previous_marriage" rows="3"
                                                    placeholder="If applicable, provide details"></textarea>
                                            </div>
                                        </div>

                                        <!-- கூடுதல் ஜாதக விவரங்கள் / Additional Horoscope Details -->
                                        <div class="form-group col-12">
                                            <label class="form-label" for="additional_horoscope">கூடுதல் ஜாதக விவரங்கள் /
                                                Additional Horoscope Details</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-file-earmark-text"></span></span>
                                                <textarea class="form-control" id="additional_horoscope" rows="3" name="additional_horoscope"></textarea>
                                            </div>
                                        </div>

                                        <!-- Terms & condition -->
                                        <div class="terms_condition">
                                            <input type="checkbox" id="terms_condition">
                                            <label for="terms_condition">
                                                I agree to the <span id="tc_modal">Terms & Conditions</span>
                                            </label>
                                        </div>
                                    </div>
                                </section>

                            </div>

                            <div class="card-footer">
                                <button type="button" class="btn btn-ghost" id="prevBtn">Previous</button>
                                <button type="button" class="btn btn-primary" id="nextBtn">Next step</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        @include('include.login-modal')
        @include('include.footer')
        @include('include.script')
        @include('include.success-profile')

    </body>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", () => {
        $("#highest_education").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#occupation_category").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#employment_type").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#industry").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#annual_income").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#education_field").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#body_type").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#color").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#body_type").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#marital_status").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#physical_status").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#interests").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#hobbies").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#fav_cuisine").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#fav_music").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#sports").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#pet_pref").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#travel_pref").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#diet").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#smoking").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#drinking").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#languages").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#mother_tongue").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#height").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#specialization").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#completion_year").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#experience_years").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#gender").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#religion").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#city").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#family_status").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#father_alive").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#mother_alive").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#own_house").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });

        $("#birth_star").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#rahu_ketu").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#chevvai").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#zodiac_sign").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        $("#birth_lagnam").select2({
            placeholder: "தேர்வு செய்யவும் / Select",
            width: "100%",
        });
        const form = document.getElementById("multiStepForm");
        const steps = Array.from(document.querySelectorAll(".form-step"));
        const headerItems = Array.from(document.querySelectorAll(".step-item"));
        const prevBtn = document.getElementById("prevBtn");
        const nextBtn = document.getElementById("nextBtn");
        let current = 0;

        function prefillForm(data) {
            console.log(data);
            Object.entries(data).forEach(([key, value]) => {
                console.log(key, value);
                const input = document.querySelector(`[name="${key}"]`);
                if (!input) return;

                const isSelect2 = $(input).hasClass("select2-hidden-accessible");
                const isMultiple = input.hasAttribute("multiple");
                if (isSelect2 && isMultiple) {
                    console.log(
                        'ajsdlfkjasldkfjalsdkfjlasdkfjlasdkfjlakdjflaskdfjalsdfkjalsdfkjalsdfkjasdlfkj'
                    );
                    // Multi-select with comma-separated values
                    if (typeof value === "string") {
                        const valuesArray = value.split(',').map(v => v.trim());
                        console.log(valuesArray);
                        $(input).val(valuesArray).trigger("change");
                    } else if (Array.isArray(value)) {
                        $(input).val(value).trigger("change");
                    }
                } else if (isSelect2) {
                    // Single select
                    $(input).val(value).trigger("change");
                } else if (input.tagName === "TEXTAREA" || input.tagName === "INPUT") {
                    input.value = value ?? '';
                }
            });
        }



        $.ajax({
            type: "GET",
            url: "../user-details", // Adjust if needed
            success: function(response) {
                if (response.status === 200) {
                    const data = response.data;
                    prefillForm(data);
                }
            },
            error: function(xhr) {
                console.error("Failed to load user details:", xhr.responseText);
            }
        });

        // Initialize
        updateUI();

        // Navigation buttons
        prevBtn.addEventListener("click", () => go(-1));
        nextBtn.addEventListener("click", () => go(1));

        // Clickable headers — allow going back to completed steps
        headerItems.forEach((item) => {
            item.addEventListener("click", () => {
                const target = parseInt(item.dataset.step, 10);
                if (target <= current) {
                    showStep(target);
                }
            });
        });

        // Modal
        // document.addEventListener("DOMContentLoaded", function() {
        const tcModalTrigger = document.getElementById('tc_modal');
        tcModalTrigger.addEventListener('click', function() {
            console.log('in')
            const modal = new bootstrap.Modal(document.getElementById('termsModal'));
            modal.show();
        });
        // });

        function go(dir) {
            if (dir === 1 && !validateStep(current)) return;

            const nextIndex = current + dir;
            if (nextIndex < 0 || nextIndex > steps.length) return;

            if (dir === 1) {
                const formData = new FormData();
                const stepEl = steps[current];
                const inputs = stepEl.querySelectorAll(".form-control, input[type='file'], select, textarea");

                inputs.forEach(input => {
                    if (input.type === "file") {
                        for (let i = 0; i < input.files.length; i++) {
                            formData.append(input.name, input.files[i]);
                        }
                    } else {
                        formData.append(input.name, input.value);
                    }
                });

                formData.append("step", stepEl.dataset.step);
                formData.append("_token", $('meta[name="csrf-token"]').attr("content"));

                if (nextIndex >= steps.length) {
                    const termsAccepted = document.getElementById('terms_condition').checked;
                    if (!termsAccepted) {
                        alert("Please accept the terms and conditions.");
                        return;
                    }

                    const profileFiles = document.getElementById('profile_picture').files;
                    for (let i = 0; i < profileFiles.length; i++) {
                        formData.append("profile_picture[]", profileFiles[i]);
                    }

                    const horoscopeFiles = document.getElementById('horoscope_picture').files;
                    for (let i = 0; i < horoscopeFiles.length; i++) {
                        formData.append("horoscope_picture[]", horoscopeFiles[i]);
                    }
                }

                $.ajax({
                    type: "POST",
                    url: "../register",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response.status === 200) {
                            if (nextIndex >= steps.length) {
                                const modalElement = document.getElementById('profileSuccessModal');
                                const modal = new bootstrap.Modal(modalElement);
                                modal.show();
                            } else {
                                showToast(response.message);
                                showStep(nextIndex);
                            }
                        } else {
                            showToast(response.message, 'error');
                        }
                    },
                    error: function(xhr) {
                        console.error("AJAX Error:", xhr.responseText);
                    }
                });
            } else {
                // Just navigate back without submitting
                showStep(nextIndex);
            }
        }

        function showStep(index) {
            if (index < 0 || index >= steps.length) return;
            steps[current].classList.remove("active");
            steps[index].classList.add("active");
            current = index;
            updateUI();
        }

        function updateUI() {
            // Header states
            headerItems.forEach((el, i) => {
                el.setAttribute("aria-selected", i === current ? "true" : "false");
                el.setAttribute("aria-current", i === current ? "step" : "false");
                el.classList.toggle("completed", i < current);
            });

            // Buttons
            prevBtn.disabled = current === 0;
            nextBtn.textContent = current === steps.length - 1 ? "Submit" : "Next step";
            console.log(current)
        }

        function validateStep(stepIndex) {
            const stepEl = steps[stepIndex];
            if (!stepEl) return true;

            const groups = Array.from(stepEl.querySelectorAll(".form-group"));
            let valid = true;

            groups.forEach(group => {
                const input = group.querySelector(".form-control");
                const errorText = group.querySelector(".error-text");
                if (!input) return;

                // Reset state
                group.classList.remove("error");

                // Required check
                if (input.hasAttribute("required")) {
                    const value = input.value.trim();
                    let fieldValid = value !== "";

                    // Basic type checks
                    if (fieldValid && input.type === "email") {
                        const emailOk = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
                        fieldValid = emailOk;
                        if (!emailOk && errorText) errorText.textContent =
                            "Enter a valid email address";
                    }

                    if (!fieldValid) {
                        group.classList.add("error");
                        if (errorText && errorText.textContent === "") {
                            errorText.textContent = "This field is required";
                        }
                        valid = false;
                    }
                }
            });

            return valid;
        }

        // Set max date to today minus 18 years
        const dobInput = document.getElementById('birth_date');
        const today = new Date();
        const minAgeDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
        dobInput.max =
            minAgeDate.toISOString().split('T')[0];

        // Auto-calculate age when DOB changes
        dobInput.addEventListener('change', function() {
            const dob = new Date(this.value);
            if (!isNaN(dob)) {
                let age = today.getFullYear() - dob.getFullYear();
                const monthDiff = today.getMonth() - dob.getMonth();

                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                    age--;
                }

                document.getElementById('age').value = age;
            } else {
                document.getElementById('age').value = '';
            }
        });


        const specializationOptions = {
            engineering: [
                "Computer Science Engineering",
                "Information Technology",
                "Electronics & Communication",
                "Electrical Engineering",
                "Mechanical Engineering",
                "Civil Engineering",
                "Biotechnology",
                "Chemical Engineering"
            ],
            medicine: [
                "MBBS (General Medicine)",
                "BDS (Dentistry)",
                "BAMS (Ayurveda)",
                "BHMS (Homeopathy)",
                "BUMS (Unani)",
                "Physiotherapy",
                "Pharmacy",
                "Nursing"
            ],
            arts: [
                "English Literature",
                "History",
                "Political Science",
                "Sociology",
                "Psychology",
                "Philosophy",
                "Fine Arts",
                "Performing Arts"
            ],
            science: [
                "Computer",
                "Physics",
                "Chemistry",
                "Mathematics",
                "Statistics",
                "Biotechnology",
                "Microbiology",
                "Environmental Science",
                "Forensic Science"
            ],
            commerce: [
                "Accounting & Finance",
                "Banking & Insurance",
                "Economics",
                "Business Administration",
                "Taxation",
                "International Business"
            ],
            law: [
                "Criminal Law",
                "Corporate Law",
                "Constitutional Law",
                "Intellectual Partner Law",
                "International Law"
            ],
            management: [
                "Human Resource Management",
                "Marketing",
                "Finance",
                "Operations Management",
                "Logistics & Supply Chain",
                "Entrepreneurship"
            ],
            others: [
                "Fashion Design",
                "Interior Design",
                "Animation & Multimedia",
                "Journalism & Mass Communication",
                "Photography",
                "Game Design"
            ]
        };

        $('#education_field').on('change', function() {
            console.log('changes');
            const selectedField = $(this).val();
            const specializationSelect = $('#specialization');

            specializationSelect.empty().append('<option value="">Select specialization</option>');

            if (specializationOptions[selectedField]) {
                specializationOptions[selectedField].forEach(spec => {
                    specializationSelect.append(
                        $('<option>', {
                            value: spec,
                            text: spec
                        })
                    );
                });
            }

            // If specialization is also Select2, refresh it
            specializationSelect.trigger('change.select2');
        });
    });
</script>
