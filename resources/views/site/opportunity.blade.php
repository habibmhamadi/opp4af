@extends('layouts.site.app')

@section('content')
    <div class="w-full py-16 relative" style="background-image: url('{{ asset('img/cover.png') }}');">
        <div class="bg-white p-5 shadow lg:mx-56 mx-12 rounded">
            <div class="flex flex-col sm:flex-row gap-4">
                <img class="w-28 h-28 rounded bg-cover" src="{{asset('img/cover.png')}}" alt="">
                <div class="flex flex-col justify-around gap-1.5">
                    <h1 class="text-2xl">OCIS Master’s and PhD Scholarships for Students from Islamic Countries at the University of Oxford</h1>
                        <div class="flex items-center text-gray-400">
                            <svg class="w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                            <p class="text-sm">Scholarship</p><br>
                        </div>
                    <div class="text-xs font-semibold">
                        <span class="mr-0.5">Scholarship,</span>
                        <span class="mr-0.5">Scholarship,</span>
                        <span class="mr-0.5">Scholarship,</span>
                        <span class="mr-0.5">Scholarship,</span>
                        <span class="mr-0.5">Scholarship,</span>
                        <span class="mr-0.5">Scholarship,</span>
                        <span class="mr-0.5">Scholarship</span>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="w-full bg-white sm:px-24 px-4 py-16">
        <h1 class="text-2xl uppercase font-bold pb-4 border-b border-gray-500 inline">Opportunity Details</h1>
        <div class="grid grid-cols-1 sm:grid-cols-3 mt-16">
            <div class="sm:col-span-2 grid grid-cols-1 gap-y-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6">
                    <div class="flex items-center text-gray-400">
                        <svg class="w-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
                        <p>University of Melborn</p>
                    </div>

                    <div class="flex items-center text-gray-400">
                        <svg class="w-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                        <p>Scholarship</p>
                    </div>

                    <div class="flex items-center text-gray-400">
                        <svg class="w-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        <p>Bachelor, Master</p>
                    </div>

                    <div class="flex items-center text-gray-400">
                        <svg class="w-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p>Fully Funded</p>
                    </div>
                </div>
                <div class="jobsearch-description">
                    <h3>Scholarship overview</h3>
                    <p>The applications are currently open for the Oxford Center for Islamic Studies (OCIS) full-time masters and DPhil/PhD scholarships for the A.Y. of 2021/21. The scholarships have been designated by the OCIS to provide graduates with an opportunity to pursue an education of benefit to the Muslim world. &nbsp;And, OCIS is a Recognized Independent Centre of the <a href="https://www.o4af.com/organization/oxford-university/">University of Oxford</a> founded to encourage the scientific study of Islam and the Islamic world. At Oxford, the Center contributes to the multi-disciplinary and cross-disciplinary study of the Islamic world.</p>
                    <p>So, apply for these scholarships to study at the world’s No.1 University.</p>
                    <h3>Details</h3>
                    <p>Application start: Last quarter of 2021</p>
                    <p>Application deadline: different course-related deadline until January 2022</p>
                    <p>Host Institution: Oxford Center for Islamic Studies, <a href="https://www.o4af.com/organization/oxford-university/">Oxford University</a></p>
                    <p>Country: UK</p>
                    <p>Degree levels: Mater’s and DPhil (Doctor of Philosophy)</p>
                    <p>Subjects: All</p>
                    <p>Number of awards: 4 to 5</p>
                    <p>Coverage: Partially-funded</p>
                    <h3>Benefits</h3>
                    <p><strong>The scholarship offers awards which cover: </strong></p>
                    <ul>
                        <li>100% course fees, and</li>
                        <li>A stipend of £15,280 for living expenses.</li>
                    </ul>
                    <p>Awards are allocated for the full duration of your fee liability for the agreed course. Moreover, awards may be offered in conjunction with other sources of funding</p>
                    <h3>Eligibility</h3>
                    <p><strong>Candidates wishing to apply to study at OCIS must be either:</strong></p>
                    <ul>
                        <li>ordinarily living in the United Kingdom and from&nbsp;a Muslim community (with priority given to those from a financially underprivileged household), or</li>
                        <li>a citizen of, <b>and ordinarily</b>&nbsp;resident in, one of the below countries in Asia and Africa:</li>
                    </ul>
                    <ul>
                        <li>Scholars should intend to return to their home country after the completion of their studies.</li>
                        <li>Academic excellence is crucial to the applicant’s chance to win a scholarship.</li>
                        <li>Applicants should be planning to carry out the study in a field emanating from or of relevance to the Islamic tradition, or which is of importance and/or benefit to the Muslim world.</li>
                        <li>The scholarship is not for postgraduate certificate or postgraduate diploma courses, part-time courses, or non-matriculated courses.</li>
                        <li>To qualify for consideration for this scholarship, candidates must be successful in receiving an offer for a place on their course after consideration of applications obtained by the relevant January deadline.</li>
                    </ul>
                    <h3>Communication of decisions</h3>
                    <p>Successful applicants will be contacted by June 2021, but individual feedback will not be provided due to the volume of the applications.</p>
                    <h3>How to apply?</h3>
                    <p>To be considered for this scholarship, you must complete the following steps:</p>
                    <ul>
                        <li>Tick the box for the&nbsp;‘<em>Oxford Centre for Islamic Studies Scholarship</em>’ in the University of Oxford Scholarships section of the University’s graduate application form;</li>
                        <li>Submit your application for graduate study by the deadline. See the relevant&nbsp;<a href="https://www.ox.ac.uk/admissions/graduate/courses/courses-a-z-listing" target="_blank" rel="noopener noreferrer"><span style="color: #ff0000">course</span> </a>page for&nbsp;the deadline applicable to your course; and</li>
                        <li>Complete an&nbsp;OICS Scholarships <span style="color: #ff0000"><a style="color: #ff0000" href="https://www.ox.ac.uk/sites/files/oxford/field/field_document/OCIS%20Supporting%20Statement%202021-22.docx" target="_blank" rel="noopener noreferrer">Supporting Statements</a> </span>and upload it, together with your graduate<span style="color: #ff0000"> <a style="color: #ff0000" href="https://evision.ox.ac.uk/urd/sits.urd/run/siw_ipp_lgn.login?process=siw_ipp_app_crs">application form</a></span>, by the deadline.</li>
                    </ul>
                    <h3>Required documents</h3>
                    <ul>
                        <li>Official transcripts</li>
                        <li>Statement of purpose/research proposal</li>
                        <li>Written work</li>
                    </ul>
                    <p><strong>Other documents (may differ depending upon each course):</strong></p>
                    <ul>
                        <li>CV/résumé</li>
                        <li>English language test score report/certificate (TOEFL, IELTS, Cambridge C1 Advanced (CAE) or C2 Proficiency (CPE)</li>
                        <li>Certificate of language proficiency</li>
                        <li>GRE certificate</li>
                        <li>Scholarship supporting statement</li>
                        <li>Portfolio</li>
                        <li>Admissions exercises</li>
                    </ul>
                    <p>You must submit your supporting documentation by the deadline to which you are applying. Documents should be submitted as part of your application.</p>
                    <p><strong>All of your required documents should meet the following criteria:</strong></p>
                    <ul>
                        <li>Be in PDF, .jpg or .png format;</li>
                        <li>Smaller than 4MB (to upload to your application form).&nbsp;;</li>
                        <li>written in English, except otherwise allowed by the department;</li>
                        <li>Completely your own work, except where obviously indicated.</li>
                        <li>Readable and easy to understand.</li>
                    </ul>
                    <p><span style="color: #ff0000"><a style="color: #ff0000" href="https://www.ox.ac.uk/admissions/graduate/applying-to-oxford/application-guide/starting-your-application">Apply now</a></span></p>
                    <p>For more details and specifics of your application documents, visit <span style="color: #ff0000"><a style="color: #ff0000" href="https://www.ox.ac.uk/admissions/graduate/fees-and-funding/fees-funding-and-scholarship-search/oxford-centre-islamic-studies-ocis-scholarships" target="_blank" rel="noopener noreferrer">here</a></span>.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
