<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\applicantcontroller;
use App\Http\Controllers\jobcontroller;
use App\Http\Controllers\signincontroller;
use App\Http\Controllers\applicationscontroller;
use App\Http\Controllers\applicantaccountcontroller;
use App\Http\Controllers\hrapplicants;
use App\Http\Controllers\hrcontroller;
use App\Http\Controllers\applicantprofile;
use App\Http\Controllers\deptheadcontroller;
use App\Http\Controllers\mrfcontroller;
use App\Http\Controllers\jobposting;
use App\Http\Controllers\jobview;
use App\Http\Controllers\resignationcontroller;
use App\Http\Controllers\evaluationcontroller;
use App\Http\Controllers\hrapplicationscontroller;
use App\Http\Controllers\notificationcontroller;
use App\Http\Controllers\deptheadapplicationscontroller;
use App\Http\Controllers\transferringcontroller;
use App\Http\Controllers\consentcontroller;
use App\Http\Controllers\bypassingcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//FOR ALL USER SIGIN VALIDATION ROUTES
Route::get('/visitors/apply/form',[signincontroller::class,'visitorapply']);
Route::get('/Login',[signincontroller::class,'applicantindex'])->name('loginpage');
Route::get('/Register',[signincontroller::class,'applicantsignup'])->name('signup');
Route::get('/User/login',[signincontroller::class,'loginaccount'])->name('user.logging');
Route::post('/applicant/register',[signincontroller::class,'registeraccount'])->name('new.register');
Route::get('/applicant/logout',[signincontroller::class,'logout'])->name('user.logout');
Route::post('/privacy/consent',[consentcontroller::class,'uploaduserip'])->name('get.ip');

//FOR HIRING PAGES
Route::get('/',[jobcontroller::class,'listofhirings'])->name('hiring.main');
Route::get('/Job/Name',[jobcontroller::class,'viewjobdetail'])->name('hiring.view');


//HIRING PAGE IF LOGGEDIN
Route::get('/find/jobs',[jobcontroller::class,'findjobshere'])->name('find.jobs');
Route::get('/search/jobs',[jobcontroller::class,'searchjobshere'])->name('search.jobs');
Route::get('/Find/job',[jobcontroller::class,'ajaxforjob'])->name('find.jd');


//APPLICATIONS
Route::get('/apply/form',[applicationscontroller::class,'applyJOB'])->name('hiring.apply');
Route::get('/applicant/apply/form',[applicationscontroller::class,'userapply'])->name('user.apply');
Route::post('/submit/consent',[applicationscontroller::class,'submitconsentform'])->name('submit.consent');
Route::post('/applicantion/submit',[applicationscontroller::class,'submitapplications'])->name('form.submit');
Route::get('/application/id',[applicationscontroller::class,'viewapplicationdetail'])->name('application.view');
Route::get('/list/applications',[applicationscontroller::class,'submittedapplications'])->name('user.applications');
Route::post('/submit/answer',[applicationscontroller::class,'submitexamanswers'])->name('answer.submit');
Route::post('/upload/requirements',[applicationscontroller::class,'submitrequirments'])->name('document.submit');
Route::post('/post/reply',[applicationscontroller::class,'replymessage'])->name('reply.submit');

//PROFILE
Route::get('/applicant/profile',[applicantaccountcontroller::class,'applicantdashboard'])->name('profile');
Route::get('/applicant/edit/profile',[applicantaccountcontroller::class,'editprofiledetails'])->name('edit.profile');
Route::post('/profile/update',[applicantprofile::class,'completeprofileform'])->name('profile.update');
Route::get('/Delete/Education',[applicantaccountcontroller::class,'deleteeducattainmetn'])->name('educattainment.delete');
Route::get('/Delete/Family',[applicantaccountcontroller::class,'deletefamily'])->name('family.delete');
Route::post('/upload/resume',[applicantaccountcontroller::class,'submitresume'])->name('submit.resume');











//THESE ARE FOR HR DASHBOARD
Route::post('/HR/Login',[hrcontroller::class,'hrlogin'])->name('hr.authlogin');
Route::get('/HR/dashboard',[hrcontroller::class,'hrdashboard'])->name('hr.dashboard');

Route::get('/HR/shortlisted',[hrcontroller::class,'displayshortlisted'])->name('hr.shortlist');
Route::get('/HR/processing',[hrcontroller::class,'displayforprocessing'])->name('hr.processing');
Route::get('/HR/job/posting',[jobposting::class,'displayjobsposting'])->name('hr.jobposting');



//HR REQUESTS FROM DEPT HEAD
Route::get('/HR/Requests',[hrcontroller::class,'displaydeptheadrequest'])->name('hr.request');
Route::get('/ajax/getmrfrequests',[hrcontroller::class,'getapplicationdata'])->name('ajax.mrfrequests');



Route::get('/HR/For-Evaluation',[hrcontroller::class,'displayforevaluation'])->name('hr.eveluation');
Route::get('/HR/Onboarding',[hrcontroller::class,'displayforonboarding'])->name('hr.onboarding');


//HR transfer to e201
Route::get('/HR/Transfer/e201',[transferringcontroller::class,'displayfortransferring'])->name('e201.display');
Route::get('/ajax/fore201',[transferringcontroller::class,'transfertoe201page'])->name('ajax.e201');
Route::post('/add/fore201',[transferringcontroller::class,'addtolist'])->name('e201.add');
Route::get('/HR/Transfer/{application_id}',[transferringcontroller::class,'e201form'])->name('e201.transfer');
Route::post('/Proceeed/e201',[transferringcontroller::class,'transfertokp'])->name('e201.proceed');


//HR JOBS
Route::get('/ajax/getjob',[jobview::class,'ajaxjobview'])->name('ajax.viewjob');
Route::get('/ajax/createjob',[jobview::class,'ajaxcreatejob'])->name('ajax.createjob');
Route::post('/post/job',[jobview::class,'postnewjob'])->name('post.job');


//HR APPLICANTS
Route::get('/ajax/getapplicant',[hrapplicants::class,'getapplicationdata'])->name('ajax.applicant');
Route::get('/ajax/manageapplicant',[hrapplicants::class,'manageapplicant'])->name('ajax.manage');
Route::get('/ajax/manageapplicantforprocess',[hrapplicants::class,'manageapplicantforprocessing'])->name('ajax.manageprocess');


//APPLICATIONS
Route::post('/update/application',[hrapplicationscontroller::class,'updateapplicationstatus'])->name('update.status');


//FOR EVALUATION
Route::get('/ajax/save/evaluation',[evaluationcontroller::class,'saveevaluation'])->name('save.evaluation');
Route::get('/ajax/criteria/evaluation',[evaluationcontroller::class,'getapplicantforevaluation'])->name('ajax.evaluation');









//THESE ARE FOR department head

//BYPASSING AUTHENTICATION
Route::get('/depthead/authentication',[bypassingcontroller::class,'authenticatelogin'])->name('depthead.authentication');
Route::get('/Err',[bypassingcontroller::class,'notallowed']);
Route::get('/flush',[bypassingcontroller::class,'flushsessions']);

//MAIN
Route::get('/Dept/Head/dashboard',[deptheadcontroller::class,'deptheaddashboard'])->name('head.dashboard');
Route::get('/Dept/Head/MRF',[mrfcontroller::class,'listoffilednonacad'])->name('head.mrf');


//APPLICATIONS
Route::get('/Dept/Head/applications',[deptheadapplicationscontroller::class,'getsecondinterviewapplications'])->name('head.applications');
Route::get('/Dept/save/evaluation',[deptheadapplicationscontroller::class,'saveevaluation'])->name('DEPT.evaluation');


//Resigned
Route::get('/Dept/Head/Resigned',[resignationcontroller::class,'listofresigneds'])->name('head.dashboard');


Route::get('/ajax/getresigned',[deptheadcontroller::class,'manageresigned'])->name('ajax.resigned');
Route::get('/ajax/filed/NonAcad',[deptheadcontroller::class,'filenonacad'])->name('ajax.nonacad');
Route::get('/ajax/view/NonAcad',[deptheadcontroller::class,'viewfiledmrf'])->name('ajax.viewnonacad');
Route::post('/upload/nonacad',[mrfcontroller::class,'submitNONACAD'])->name('submit.NONACAD');
Route::get('/test/exec',[mrfcontroller::class,'exec']);









//FOR NOTIFICATIONS
Route::get('/ajax/notification',[notificationcontroller::class,'getnotifications'])->name('ajax.resigned');

//SEARCH JOB FUNCTIONS
Route::get('/search/job',[jobcontroller::class,'searchvacancies'])->name('hiring.job');

//TEST
Route::get('/test', function () { return view('test'); });