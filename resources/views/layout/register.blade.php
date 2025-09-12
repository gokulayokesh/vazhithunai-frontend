@extends('include.header')

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
                                <section class="form-step active" data-step="0">
                                    <h5>பிறப்பு விவரங்கள் / Birth Details
                                    </h5>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="first_name">பெயர் / Name</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><span
                                                        class="bi bi-person"></span></span>
                                                <input type="text" name="name" class="form-control" aria-describedby="basic-addon1"
                                                    required>
                                            </div>
                                            <div class="error-text">Name is required</div>
                                        </div>
                                        <div class="form-group col-12 col-md-6 mb-3">
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
                                        <div class="form-group col-12 col-md-4 mb-3">
                                            <label class="form-label" for="email">பிறந்த நேரம் / Birth Time</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><span
                                                        class="bi bi-stopwatch"></span></span>
                                                <input type="time" class="form-control" aria-describedby="basic-addon1"
                                                    required name="birth_time">
                                            </div>
                                            <div class="error-text">Birth time is required</div>
                                        </div>
                                        <div class="form-group col-12 col-md-4 mb-3">
                                            <label class="form-label" for="email">வயது / Age</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><span
                                                        class="bi bi-calendar-heart"></span></span>
                                                <input type="text" id="age" name="age" class="form-control" disabled
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="email">பிறந்த ஊர் / Birth Place</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><span
                                                        class="bi bi-geo-alt"></span></span>
                                                <input type="text" class="form-control" aria-describedby="basic-addon1"
                                                    required name="birth_place">
                                            </div>
                                            <div class="error-text">Birth Place is required</div>
                                        </div>

                                    </div>
                                    <br>
                                    <h5>கல்வி மற்றும் தொழில் விவரங்கள் / Education & Occupation Details
                                    </h5>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <!--  Education Details -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="highest_education">உயர்ந்த கல்வி / Highest
                                                Education</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-mortarboard"></span></span>
                                                <select class="form-control" id="highest_education" name="highest_education" required>
                                                    <option value="">Select</option>
                                                    <option>Doctorate / PhD</option>
                                                    <option>Postgraduate / Master's</option>
                                                    <option>Graduate / Bachelor's</option>
                                                    <option>Diploma</option>
                                                    <option>Higher Secondary</option>
                                                    <option>Secondary</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Highest Education is required</div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="education_field">பிரிவு / Education
                                                Field</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-journal-bookmark"></span></span>
                                                <select class="form-control" id="education_field" name="education_field" required>
                                                    <option value="">Select</option>
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
                                            <div class="error-text">Education Field is required</div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="specialization">சிறப்பு /
                                                Specialization</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-lightbulb"></span></span>
                                                <select class="form-control" id="specialization" required name="specialization">
                                                    <option value="">Select specialization</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Specialization is required</div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="institution">கல்லூரி / பல்கலைக்கழகம் /
                                                Institution</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-building"></span></span>
                                                <input type="text" class="form-control" id="institution" name="institution">
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="completion_year">பட்டம் பெற்ற ஆண்டு / Year of
                                                Completion</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-calendar-event"></span></span>
                                                <input type="number" class="form-control" id="completion_year"
                                                    min="1950" max="2099" name="completion_year">
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="certifications">கூடுதல் தகுதிகள் / Additional
                                                Qualifications</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-award"></span></span>
                                                <input type="text" class="form-control" id="certifications" name="additional_qualifications">
                                            </div>
                                        </div>

                                        <!-- 💼 Occupation Details -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="occupation_category">தொழில் வகை / Occupation
                                                Category</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-briefcase"></span></span>
                                                <select class="form-control" id="occupation_category" name="occupation_category" required>
                                                    <option value="">Select</option>
                                                    <option>IT Professional</option>
                                                    <option>Government Employee</option>
                                                    <option>Business Owner</option>
                                                    <option>Teacher</option>
                                                    <option>Doctor</option>
                                                    <option>Engineer</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Occupation Category is required</div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="job_title">பணி / Job Title</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-person-badge"></span></span>
                                                <input type="text" class="form-control" id="job_title" name="job_title" required>
                                            </div>
                                            <div class="error-text">Job Title is required</div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="company_name">நிறுவனம் / Company Name</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-building-check"></span></span>
                                                <input type="text" class="form-control" name="company_name" id="company_name">
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="employment_type">வேலை வகை / Employment
                                                Type</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-card-checklist"></span></span>
                                                <select class="form-control" id="employment_type" name="employment_type">
                                                    <option value="">Select</option>
                                                    <option>Permanent</option>
                                                    <option>Contract</option>
                                                    <option>Self-employed</option>
                                                    <option>Freelancer</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="industry">தொழில் துறை / Industry</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-diagram-3"></span></span>
                                                <select class="form-control" id="industry" name="industry">
                                                    <option value="">Select</option>
                                                    <option>IT</option>
                                                    <option>Healthcare</option>
                                                    <option>Education</option>
                                                    <option>Manufacturing</option>
                                                    <option>Finance</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="work_location">பணியிடம் / Work Location</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-geo-alt"></span></span>
                                                <input type="text" class="form-control" id="work_location" name="work_location" required>
                                            </div>
                                            <div class="error-text">Work Location is required</div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="annual_income">வருடாந்திர வருமானம் / Annual
                                                Income</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-currency-rupee"></span></span>
                                                <select class="form-control" id="annual_income" name="annual_income">
                                                    <option value="">Select</option>
                                                    <option>Below ₹3 LPA</option>
                                                    <option>₹3–5 LPA</option>
                                                    <option>₹5–10 LPA</option>
                                                    <option>₹10–20 LPA</option>
                                                    <option>Above ₹20 LPA</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="experience_years">அனுபவம் / Years of
                                                Experience</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-hourglass-split"></span></span>
                                                <input type="number" class="form-control" id="experience_years"
                                                    min="0" name="experience_years">
                                            </div>
                                        </div>
                                    </div>

                                </section>

                                {{-- Step 1 --}}
                                <section class="form-step" data-step="1">
                                    <h5>சொந்த விவரங்கள் / Personal Details
                                    </h5>
                                    <hr>
                                    <br>

                                    <div class="row">
                                        <!-- பாலினம் / Gender -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="gender">பாலினம் / Gender</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-gender-ambiguous"></span></span>
                                                <select class="form-control" id="gender" required name="gender">
                                                    <option value="">Select</option>
                                                    <option>ஆண் / Male</option>
                                                    <option>பெண் / Female</option>
                                                    <option>மற்றவை / Other</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Gender is required</div>
                                        </div>

                                        <!-- ஜாதகரின் உயரம் / Height -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="height">ஜாதகரின் உயரம் / Height</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-arrows-vertical"></span></span>
                                                <select class="form-control" id="height" name="height" required>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    <option value="4ft-121cm">4ft - 121 cm</option>
                                                    <option value="4ft1in-124cm">4ft 1in - 124 cm</option>
                                                    <option value="4ft2in-127cm">4ft 2in - 127 cm</option>
                                                    <option value="4ft3in-129cm">4ft 3in - 129 cm</option>
                                                    <option value="4ft4in-132cm">4ft 4in - 132 cm</option>
                                                    <option value="4ft5in-134cm">4ft 5in - 134 cm</option>
                                                    <option value="4ft6in-137cm">4ft 6in - 137 cm</option>
                                                    <option value="4ft7in-139cm">4ft 7in - 139 cm</option>
                                                    <option value="4ft8in-142cm">4ft 8in - 142 cm</option>
                                                    <option value="4ft9in-144cm">4ft 9in - 144 cm</option>
                                                    <option value="4ft10in-147cm">4ft 10in - 147 cm</option>
                                                    <option value="4ft11in-149cm">4ft 11in - 149 cm</option>
                                                    <option value="5ft-152cm">5ft - 152 cm</option>
                                                    <option value="5ft1in-154cm">5ft 1in - 154 cm</option>
                                                    <option value="5ft2in-157cm">5ft 2in - 157 cm</option>
                                                    <option value="5ft3in-160cm">5ft 3in - 160 cm</option>
                                                    <option value="5ft4in-162cm">5ft 4in - 162 cm</option>
                                                    <option value="5ft5in-165cm">5ft 5in - 165 cm</option>
                                                    <option value="5ft6in-167cm">5ft 6in - 167 cm</option>
                                                    <option value="5ft7in-170cm">5ft 7in - 170 cm</option>
                                                    <option value="5ft8in-172cm">5ft 8in - 172 cm</option>
                                                    <option value="5ft9in-175cm">5ft 9in - 175 cm</option>
                                                    <option value="5ft10in-177cm">5ft 10in - 177 cm</option>
                                                    <option value="5ft11in-180cm">5ft 11in - 180 cm</option>
                                                    <option value="6ft-182cm">6ft - 182 cm</option>
                                                    <option value="6ft1in-185cm">6ft 1in - 185 cm</option>
                                                    <option value="6ft2in-187cm">6ft 2in - 187 cm</option>
                                                    <option value="6ft3in-190cm">6ft 3in - 190 cm</option>
                                                    <option value="6ft4in-193cm">6ft 4in - 193 cm</option>
                                                    <option value="6ft5in-195cm">6ft 5in - 195 cm</option>
                                                    <option value="6ft6in-198cm">6ft 6in - 198 cm</option>
                                                    <option value="6ft7in-200cm">6ft 7in - 200 cm</option>
                                                    <option value="6ft8in-203cm">6ft 8in - 203 cm</option>
                                                    <option value="6ft9in-205cm">6ft 9in - 205 cm</option>
                                                    <option value="6ft10in-208cm">6ft 10in - 208 cm</option>
                                                    <option value="6ft11in-210cm">6ft 11in - 210 cm</option>
                                                    <option value="7ft-213cm">7ft - 213 cm</option>
                                                    <option value="NotSpecified">Not Specified</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Height is required</div>
                                        </div>

                                        <!-- ஜாதகரின் நிறம் / Color -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="color">ஜாதகரின் நிறம் / Complexion</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-palette"></span></span>
                                                <select class="form-control" id="color" required name="color">
                                                    <option value="">Select</option>
                                                    <option>வெள்ளை / Fair</option>
                                                    <option>மிதமான / Wheatish</option>
                                                    <option>கருப்பு / Dark</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Complexion is required</div>
                                        </div>

                                        <!-- ஜாதகரின் உட்பிரிவு / Caste -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="caste">ஜாதகரின் உட்பிரிவு / Caste</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-people"></span></span>
                                                <input type="text" class="form-control" id="caste" required name="caste">
                                            </div>
                                            <div class="error-text">Caste is required</div>
                                        </div>

                                        <!-- திருமண நிலை / Marital Status -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="marital_status">திருமண நிலை / Marital
                                                Status</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-heart"></span></span>
                                                <select class="form-control" id="marital_status" name="marital_status" required>
                                                    <option value="">Select</option>
                                                    <option>திருமணம் ஆகாதவர் / Never Married</option>
                                                    <option>விவாகரத்து / Divorced</option>
                                                    <option>விதவை / Widowed</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Marital Status is required</div>
                                        </div>

                                        <!-- நகரம் / City -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="city">நகரம் / City</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-geo-alt"></span></span>
                                                <input type="text" class="form-control" id="city" name="city" required>
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
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="body_type">உடல் அமைப்பு / Body Type</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-person-standing"></span></span>
                                                <select class="form-control" id="body_type" name="body_type">
                                                    <option value="">Select</option>
                                                    <option>மெல்லிய / Slim</option>
                                                    <option>சராசரி / Average</option>
                                                    <option>உடல் வலிமை / Athletic</option>
                                                    <option>பருமன் / Heavy</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- உடல் நிலை / Physical Status -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="physical_status">உடல் நிலை / Physical
                                                Status</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-heart-pulse"></span></span>
                                                <select class="form-control" id="physical_status" name="physical_status">
                                                    <option value="">Select</option>
                                                    <option>சாதாரணம் / Normal</option>
                                                    <option>உடல் குறைபாடு / Physically Challenged</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- தாய்மொழி / Mother Tongue -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="mother_tongue">தாய்மொழி / Mother Tongue</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-translate"></span></span>
                                                <select class="form-control" id="mother_tongue" name="mother_tongue"
                                                    required>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    <option value="tamil">தமிழ் / Tamil</option>
                                                    <option value="english">ஆங்கிலம் / English</option>
                                                    <option value="Assamese">অসমীয়া / Assamese</option>
                                                    <option value="Bengali">বাংলা / Bengali</option>
                                                    <option value="Bodo">बर' / Bodo</option>
                                                    <option value="Dogri">डोगरी / Dogri</option>
                                                    <option value="English">English</option>
                                                    <option value="Gujarati">ગુજરાતી / Gujarati</option>
                                                    <option value="Hindi">हिन्दी / Hindi</option>
                                                    <option value="Kannada">ಕನ್ನಡ / Kannada</option>
                                                    <option value="Kashmiri">कॉशुर / Kashmiri</option>
                                                    <option value="Konkani">कोंकणी / Konkani</option>
                                                    <option value="Maithili">मैथिली / Maithili</option>
                                                    <option value="Malayalam">മലയാളം / Malayalam</option>
                                                    <option value="Manipuri">মেইতেইলোন্ / Manipuri (Meitei)</option>
                                                    <option value="Marathi">मराठी / Marathi</option>
                                                    <option value="Nepali">नेपाली / Nepali</option>
                                                    <option value="Odia">ଓଡ଼ିଆ / Odia</option>
                                                    <option value="Punjabi">ਪੰਜਾਬੀ / Punjabi</option>
                                                    <option value="Sanskrit">संस्कृतम् / Sanskrit</option>
                                                    <option value="Santali">ᱥᱟᱱᱛᱟᱲᱤ / Santali</option>
                                                    <option value="Sindhi">سنڌي / Sindhi</option>
                                                    <option value="Telugu">తెలుగు / Telugu</option>
                                                    <option value="Urdu">اردو / Urdu</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Mother Tongue is required</div>
                                        </div>



                                        <!-- Interests -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="interests">விருப்பங்கள் / Interests</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-star"></span></span>
                                                <select id="interests" name="interests[]" class="form-control" multiple>
                                                    <option value="reading">வாசிப்பு / Reading</option>
                                                    <option value="cooking">சமையல் / Cooking</option>
                                                    <option value="travel">பயணம் / Travel</option>
                                                    <option value="music">இசை / Music</option>
                                                    <option value="sports">விளையாட்டு / Sports</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Hobbies -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="hobbies">பொழுதுபோக்குகள் / Hobbies</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-heart"></span></span>
                                                <select id="hobbies" name="hobbies[]" class="form-control" multiple>
                                                    <option value="gardening">தோட்டப் பணி / Gardening</option>
                                                    <option value="photography">புகைப்படம் / Photography</option>
                                                    <option value="writing">எழுத்து / Writing</option>
                                                    <option value="dancing">நடனம் / Dancing</option>
                                                    <option value="yoga">யோகா / Yoga</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Favourite Cuisine -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="fav_cuisine">விருப்பமான சமையல் / Favourite
                                                Cuisine</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-egg-fried"></span></span>
                                                <select id="fav_cuisine" name="favorite_cuisine[]" class="form-control"
                                                    multiple>
                                                    <option value="south_indian">தென்னிந்திய / South Indian</option>
                                                    <option value="north_indian">வடஇந்திய / North Indian</option>
                                                    <option value="chinese">சீன / Chinese</option>
                                                    <option value="italian">இத்தாலிய / Italian</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Favourite Music Genre -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="fav_music">விருப்பமான இசை வகை / Favourite Music
                                                Genre</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-music-note-beamed"></span></span>
                                                <select id="fav_music" name="favorite_music[]" class="form-control" multiple>
                                                    <option value="carnatic">கர்நாடக / Carnatic</option>
                                                    <option value="western">மேற்கத்திய / Western</option>
                                                    <option value="bollywood">பாலிவுட் / Bollywood</option>
                                                    <option value="folk">நாட்டுப்புற / Folk</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Sports / Fitness -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="sports">விளையாட்டு / உடற்பயிற்சி / Sports /
                                                Fitness</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-bicycle"></span></span>
                                                <select id="sports" name="sports[]" class="form-control" multiple>
                                                    <option value="cricket">கிரிக்கெட் / Cricket</option>
                                                    <option value="yoga">யோகா / Yoga</option>
                                                    <option value="gym">உடற்பயிற்சி கூடம் / Gym</option>
                                                    <option value="swimming">நீச்சல் / Swimming</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Pet Preference -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="pet_pref">செல்லப்பிராணி விருப்பம் / Pet
                                                Preference</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-postage-heart"></span></span>
                                                <select id="pet_pref" name="pet_preference" class="form-control">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    <option value="likes_pets">செல்லப்பிராணிகளை விரும்புகிறேன் / Likes Pets
                                                    </option>
                                                    <option value="no_pets">செல்லப்பிராணி இல்லை / No Pets</option>
                                                    <option value="specific">குறிப்பிட்டவை / Specific Animals</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Travel Preference -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="travel_pref">பயண விருப்பம் / Travel
                                                Preference</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-airplane"></span></span>
                                                <select id="travel_pref" name="travel_preference" class="form-control">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    <option value="loves_travel">பயணம் விரும்புகிறேன் / Loves Travelling
                                                    </option>
                                                    <option value="occasional">அவ்வப்போது / Occasionally</option>
                                                    <option value="rarely">அரிதாக / Rarely</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Dietary Preference -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="diet">உணவு விருப்பம் / Dietary
                                                Preference</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-egg"></span></span>
                                                <select id="diet" name="diet_preference" class="form-control">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    <option value="veg">சைவம் / Vegetarian</option>
                                                    <option value="non_veg">அசைவம் / Non-Vegetarian</option>
                                                    <option value="eggetarian">முட்டை சைவம் / Eggetarian</option>
                                                    <option value="vegan">முழுச் சைவம் / Vegan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Smoking Habit -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="smoking">புகைபிடிக்கும் பழக்கம் / Smoking
                                                Habit</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-slash-circle"></span></span>
                                                <select id="smoking" name="smoking_habits" class="form-control">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    <option value="never">ஒருபோதும் இல்லை / Never</option>
                                                    <option value="occasional">அவ்வப்போது / Occasionally</option>
                                                    <option value="regular">வழக்கமாக / Regularly</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Drinking Habit -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="drinking">மது அருந்தும் பழக்கம் / Drinking
                                                Habit</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-cup-straw"></span></span>
                                                <select id="drinking" name="drinking_habits" class="form-control">
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    <option value="never">ஒருபோதும் இல்லை / Never</option>
                                                    <option value="occasional">அவ்வப்போது / Occasionally</option>
                                                    <option value="social">சமூகமாக / Socially</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Languages Known -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="languages">தெரிந்த மொழிகள் / Languages
                                                Known</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-translate"></span></span>
                                                <select id="languages" name="languages_known[]" class="form-control" multiple>
                                                    <option value="tamil">தமிழ் / Tamil</option>
                                                    <option value="english">ஆங்கிலம் / English</option>
                                                    <option value="">தேர்வு செய்யவும் / Select</option>
                                                    <option value="Assamese">অসমীয়া / Assamese</option>
                                                    <option value="Bengali">বাংলা / Bengali</option>
                                                    <option value="Bodo">बर' / Bodo</option>
                                                    <option value="Dogri">डोगरी / Dogri</option>
                                                    <option value="English">English</option>
                                                    <option value="Gujarati">ગુજરાતી / Gujarati</option>
                                                    <option value="Hindi">हिन्दी / Hindi</option>
                                                    <option value="Kannada">ಕನ್ನಡ / Kannada</option>
                                                    <option value="Kashmiri">कॉशुर / Kashmiri</option>
                                                    <option value="Konkani">कोंकणी / Konkani</option>
                                                    <option value="Maithili">मैथिली / Maithili</option>
                                                    <option value="Malayalam">മലയാളം / Malayalam</option>
                                                    <option value="Manipuri">মেইতেইলোন্ / Manipuri (Meitei)</option>
                                                    <option value="Marathi">मराठी / Marathi</option>
                                                    <option value="Nepali">नेपाली / Nepali</option>
                                                    <option value="Odia">ଓଡ଼ିଆ / Odia</option>
                                                    <option value="Punjabi">ਪੰਜਾਬੀ / Punjabi</option>
                                                    <option value="Sanskrit">संस्कृतम् / Sanskrit</option>
                                                    <option value="Santali">ᱥᱟᱱᱛᱟᱲᱤ / Santali</option>
                                                    <option value="Sindhi">سنڌي / Sindhi</option>
                                                    <option value="Telugu">తెలుగు / Telugu</option>
                                                    <option value="Urdu">اردو / Urdu</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Life Motto -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="life_motto">வாழ்க்கை குறிக்கோள் / Life
                                                Motto</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-quote"></span></span>
                                                <input type="text" class="form-control" id="life_motto"
                                                    name="life_motto"
                                                    placeholder="உங்கள் வாழ்க்கை குறிக்கோள் / Your life motto">
                                            </div>
                                        </div>




                                        <div class="form-group col-12 col-md-6 mb-3">
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
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="first_name">மின்னஞ்சல் முகவரி / E-mail</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                <input type="text" class="form-control"
                                                    aria-describedby="basic-addon1" name="email" required>
                                            </div>
                                            <div class="error-text">E-mail is required</div>
                                        </div>
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="f_book">FaceBook Profile</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                <input type="text" class="form-control"
                                                    aria-describedby="basic-addon1" name="facebook_profile_url" required>
                                            </div>
                                            <div class="error-text">FaceBook Profile Required</div>
                                        </div>
                                            <div class="form-group col-12 col-md-6 mb-3">
                                                <label class="form-label" for="instagram_profile_url">Instagram profile url</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1">@</span>
                                                    <input type="text" class="form-control"
                                                        aria-describedby="basic-addon1" required name="instagram_profile_url">
                                                </div>
                                                <div class="error-text">instagram Profile Required</div>
                                        </div>

                                            <div class="form-group col-12 col-md-6 mb-3">
                                                <label class="form-label" for="instagram_profile_url">Twitter profile url</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1">@</span>
                                                    <input type="text" class="form-control"
                                                        aria-describedby="basic-addon1" name="twitter_profile_url" required>
                                                </div>
                                                <div class="error-text">Twitter Profile Required</div>
                                        </div>
                                    </div>
                                </section>

                                {{-- Step 2 --}}
                                <section class="form-step" data-step="2">
                                    <div class="row">
                                        <!-- குடும்ப நிலை / Family Status -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="family_status">குடும்ப நிலை / Family
                                                Status</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-people"></span></span>
                                                <select class="form-control" id="family_status" name="family_status" required>
                                                    <option value="">Select</option>
                                                    <option>சாதாரணம் / Middle Class</option>
                                                    <option>மேல்நிலை நடுத்தர / Upper Middle Class</option>
                                                    <option>செல்வந்தர் / Rich</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Family Status is required</div>
                                        </div>

                                        <!-- குலதெய்வம் / Family God -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="family_god">குலதெய்வம் / Family God</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-flower1"></span></span>
                                                <input type="text" class="form-control" id="family_god" name="family_god">
                                            </div>
                                        </div>

                                        <!-- தகப்பனார் / Father - உண்டு / இல்லை -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="father_alive">தகப்பனார் / Father</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-person"></span></span>
                                                <select class="form-control" id="father_alive" name="father_alive" required>
                                                    <option value="">Select</option>
                                                    <option>உண்டு / Alive</option>
                                                    <option>இல்லை / Not Alive</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Father status is required</div>
                                        </div>

                                        <!-- தாயார் / Mother - உண்டு / இல்லை -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="mother_alive">தாயார் / Mother</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-person-fill"></span></span>
                                                <select class="form-control" id="mother_alive" name="mother_alive" required>
                                                    <option value="">Select</option>
                                                    <option>உண்டு / Alive</option>
                                                    <option>இல்லை / Not Alive</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Mother status is required</div>
                                        </div>

                                        <!-- மொபைல் எண் (பெற்றோர் அல்லது கார்டியன்) -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="parent_mobile">மொபைல் எண் (பெற்றோர்/கார்டியன்)
                                                / Mobile Number (Parent/Guardian)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-telephone"></span></span>
                                                <input type="tel" class="form-control" id="parent_mobile" name="parent_mobile" required>
                                            </div>
                                            <div class="error-text">Parent/Guardian mobile number is required</div>
                                        </div>

                                        <!-- தகப்பனரின் தொழில், மாத வருமானம் -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="father_work">தகப்பனரின் தொழில், மாத வருமானம் /
                                                Father Work, Monthly Salary</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-briefcase"></span></span>
                                                <input type="text" class="form-control" name="father_work" id="father_work">
                                            </div>
                                        </div>

                                        <!-- தாயார் தொழில், மாத வருமானம் -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="mother_work">தாயார் தொழில், மாத வருமானம் /
                                                Mother Work, Monthly Salary</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-briefcase-fill"></span></span>
                                                <input type="text" class="form-control" id="mother_work" name="mother_work">
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
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="own_house">வீடு / Own House</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-house"></span></span>
                                                <select class="form-control" id="own_house" required name="own_house">
                                                    <option value="">Select</option>
                                                    <option>உண்டு / Yes</option>
                                                    <option>இல்லை / No</option>
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
                                <section class="form-step" data-step="3">
                                    <div class="row">
                                        <!-- ஜென்ம நட்சத்திரம் / Birth Star -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="birth_star">ஜென்ம நட்சத்திரம் / Birth
                                                Star</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-stars"></span></span>
                                                <input type="text" class="form-control" id="birth_star" name="birth_star" required>
                                            </div>
                                            <div class="error-text">Birth Star is required</div>
                                        </div>

                                        <!-- ராகு & கேது / Rahu & Ketu -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="rahu_ketu">ராகு & கேது / Rahu & Ketu</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-moon-stars"></span></span>
                                                <select class="form-control" id="rahu_ketu" required name="rahu_ketu">
                                                    <option value="">Select</option>
                                                    <option>உண்டு / Present</option>
                                                    <option>இல்லை / Not Present</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Rahu & Ketu status is required</div>
                                        </div>

                                        <!-- செவ்வாய் / Chevvai (Mars) -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="chevvai">செவ்வாய் / Chevvai (Mars)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-circle-half"></span></span>
                                                <select class="form-control" id="chevvai" required name="chevvai">
                                                    <option value="">Select</option>
                                                    <option>உண்டு / Present</option>
                                                    <option>இல்லை / Not Present</option>
                                                </select>
                                            </div>
                                            <div class="error-text">Chevvai status is required</div>
                                        </div>

                                        <!-- ஜென்ம ராசி / Zodiac Sign -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="zodiac_sign">ஜென்ம ராசி / Zodiac Sign</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span
                                                        class="bi bi-brightness-high"></span></span>
                                                <input type="text" class="form-control" id="zodiac_sign" name="zodiac_sign" required>
                                            </div>
                                            <div class="error-text">Zodiac Sign is required</div>
                                        </div>

                                        <!-- ஜென்ம லக்கினம் / Birth Lagnam -->
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="birth_lagnam">ஜென்ம லக்கினம் / Birth
                                                Lagnam</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-sun"></span></span>
                                                <input type="text" class="form-control" id="birth_lagnam" name="birth_lagnam" required>
                                            </div>
                                            <div class="error-text">Birth Lagnam is required</div>
                                        </div>

                                        <!-- சுயவிவர படம் / Profile Picture -->
                                        <div class="form-group col-12 col-md-6 mb-3">
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
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label class="form-label" for="horoscope_picture">ஜாதகம் படம் / Horoscope
                                                Picture</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><span class="bi bi-image"></span></span>
                                                <input type="file" class="form-control" id="horoscope_picture"
                                                    accept="image/*" multiple name="horoscope_picture[]">
                                            </div>
                                        </div>

                                        <!-- விண்ணப்பதாரர் எதிர்பார்க்கும் தகுதி / Expectations -->
                                        <div class="form-group col-12">
                                            <label class="form-label" for="expectations">விண்ணப்பதாரர் எதிர்பார்க்கும்
                                                தகுதி / Expectations</label>
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
                                                <textarea class="form-control" id="previous_marriage" name="previous_marriage" rows="3" placeholder="If applicable, provide details"></textarea>
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

                                        <!-- Terms & Conditions Modal -->
                                        <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="termsModalLabel">Terms & Conditions</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Add your terms and conditions content here -->
                                                        <p>Terms & Conditions content goes here...</p>
                                                    </div>
                                                </div>
                                            </div>
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

        @include('include.login')
        @include('include.footer')
        @include('include.script')

    </body>
@endsection
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            console.log('hi');
            const form = document.getElementById("multiStepForm");
            const steps = Array.from(document.querySelectorAll(".form-step"));
            const headerItems = Array.from(document.querySelectorAll(".step-item"));
            const prevBtn = document.getElementById("prevBtn");
            const nextBtn = document.getElementById("nextBtn");
            let current = 0;

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
                if (nextIndex < 0) return;
                if (nextIndex >= steps.length) {
                    // Submit safely
                    var termsandconditionsAccepted = document.getElementById('terms_condition').checked;
                    if (!termsandconditionsAccepted) {
                        alert("Please accept the terms and conditions.");
                        return;
                    }
                    if (validateStep(current)) {
                        // form.submit();
                        const formData = new FormData(form); 

                        const profileFiles = document.getElementById('profile_picture').files;
for (let i = 0; i < profileFiles.length; i++) {
    formData.append("profile_picture1[]", profileFiles[i]);
}

// Add horoscope images manually
const horoscopeFiles = document.getElementById('horoscope_picture').files;
for (let i = 0; i < horoscopeFiles.length; i++) {
    formData.append("horoscope_picture1[]", horoscopeFiles[i]);
}

                        $.ajax({
                            type: "POST",
                            url: "../register", // Your actual endpoint
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                            },
                            data: formData,
                            processData: false,  // Important for FormData
                            contentType: false,  // Important for FormData
                            success: function (response) {
                                console.log(response);
                                if (response.status == 200) {
                                    // window.location.href = "../user/user_dashboard";
                                } else if (response.status == "404") {
                                    alert(response.message);
                                }
                            },
                            error: function (xhr) {
                                console.error("AJAX Error:", xhr.responseText);
                            }
                        });
                    }
                    return;
                }
                showStep(nextIndex);
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
                return valid;
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

            // document.getElementById('birth_date').addEventListener('change', function() {
            //     const dob = new Date(this.value);
            //     if (!isNaN(dob)) {
            //         const today = new Date();
            //         let age = today.getFullYear() - dob.getFullYear();
            //         const monthDiff = today.getMonth() - dob.getMonth();

            //         // Adjust if birthday hasn't occurred yet this year
            //         if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            //             age--;
            //         }

            //         document.getElementById('age').value = age;
            //     } else {
            //         document.getElementById('age').value = '';
            //     }
            // });

            // Set max date to today minus 18 years
            const dobInput = document.getElementById('birth_date');
            const today = new Date();
            const minAgeDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
            dobInput.max = minAgeDate.toISOString().split('T')[0];

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
@endpush
