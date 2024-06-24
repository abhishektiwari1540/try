<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\adminpnlx\LanguageSettingsController as AdminLanguageSettingsController;
use App\Http\Controllers\frontend\HomeController as HomeController;
use App\Http\Controllers\adminpnlx\EmailtemplateController as AdminEmailtemplateController;
use App\Http\Controllers\adminpnlx\DesignationsController as AdminDesignationsController;
use App\Http\Controllers\adminpnlx\AdminDashboardController as AdminDashboardController;
use App\Http\Controllers\adminpnlx\LanguagesController as AdminLanguagesController;
use App\Http\Controllers\adminpnlx\EventsController as AdminEventsController;
use App\Http\Controllers\adminpnlx\ContactUsController as ContactUsController;
use App\Http\Controllers\adminpnlx\EmailLogsController as AdminEmailLogsController;
use App\Http\Controllers\adminpnlx\CmspagesController as AdminCmspagesController;
use App\Http\Controllers\adminpnlx\SettingsController as AdminSettingsController;
use App\Http\Controllers\adminpnlx\LookupsController as AdminLookupsController;
use App\Http\Controllers\adminpnlx\SeoPageController as AdminSeoPageController;
use App\Http\Controllers\adminpnlx\LoginController as AdminLoginController;
use App\Http\Controllers\adminpnlx\StaffController as AdminStaffController;
use App\Http\Controllers\adminpnlx\UsersController as AdminUsersController;
use App\Http\Controllers\adminpnlx\AddUserController as AdminAddUserController;
use App\Http\Controllers\adminpnlx\FaqController as AdminFaqController;
use App\Http\Controllers\adminpnlx\AclController as AdminAclController;
use App\Http\Controllers\adminpnlx\TestimonialsController as AdminTestimonials;
use App\Http\Controllers\adminpnlx\EventsAdminController as EventsController;
use App\Http\Controllers\adminpnlx\ClassController as AdminClassController;
use App\Http\Controllers\adminpnlx\SystemDocmentController as AdminSystemDocemunt;

Route::get('clear-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('optimize:clear');
});


Route::prefix('adminpnlx')->group(function () {
    Route::match(['get', 'post'], '', [AdminLoginController::class, 'login'])->name('adminpnlx');
    Route::match(['get', 'post'], 'forget_password', [AdminLoginController::class, 'forgetPassword'])->name('forgetPassword');
    Route::match(['get', 'post'], 'reset_password/{validstring}', [AdminLoginController::class, 'resetPassword'])->name('reset_password/{validstring}');
    Route::match(['get', 'post'], 'save_password', [AdminLoginController::class, 'save_password'])->name('save_password');

    Route::middleware(['AuthAdmin'])->group(function () {
        // Dashboard Route
        Route::get('dashboard', [AdminDashboardController::class, 'showdashboard'])->name('dashboard');
        Route::get('logout', [AdminLoginController::class, 'logout'])->name('logout');
        Route::match(['get', 'post'], 'myaccount', [AdminDashboardController::class, 'myaccount'])->name('myaccount');
        Route::match(['get', 'post'], 'changedPassword', [AdminDashboardController::class, 'changedPassword'])->name('changedPassword');

        // Resource Route Group
        Route::resources([

            'Add_user'                       =>          AdminAddUserController::class,
            'cms-manager'                       =>      AdminCmspagesController::class,
            'languages'                         =>      AdminLanguagesController::class,
            'language-settings'                 =>      AdminLanguageSettingsController::class,
            'email-templates'                   =>      AdminEmailtemplateController::class,
            'settings'                          =>      AdminSettingsController::class,
            'acl'                               =>      AdminAclController::class,
            'staff'                             =>      AdminStaffController::class,
            'events'                             =>      AdminEventsController::class,
            'security'                          =>      AdminSecurityController::class,
            'Events'                          =>      EventsController::class,
            'Class'                          =>      AdminClassController::class,
            'testimonials'                          =>      AdminTestimonials::class,
            'system_documents'                          =>      AdminSystemDocemunt::class,


        ]);

        // system Docemuent Route
        Route::get('system_documents/update-status/{id}/{status}', [AdminClassController::class, 'changeStatus'])->name('Class.status');
        Route::get('system_documents/delete/{endesid}', [AdminClassController::class, 'destroy'])->name('Class.delete');



         // Add user Route
         Route::get('Add_user/destroy/{enuserid?}', [AdminAddUserController::class, 'destroy'])->name('Add_user.delete');
         Route::get('Add_user/update-status/{id}/{status}', [AdminAddUserController::class, 'changeStatus'])->name('Add_user.status');


          //Staff routes
          Route::get('staff/update-status/{id}/{status}', [AdminStaffController::class, 'changeStatus'])->name('staff.status');
          Route::get('staff/destroy/{enstfid?}', [AdminStaffController::class, 'destroy'])->name('staff.delete');
          Route::match(['get', 'post'], 'staff/changed-password/{enstfid?}', [AdminStaffController::class, 'changedPassword'])->name('staff.changerpassword');
          Route::match(['get', 'post'], 'staff/get-designations', [AdminStaffController::class, 'getDesignations'])->name('staff.getDesignations');
          Route::match(['get', 'post'], 'staff/get-staff-permission', [AdminStaffController::class, 'getStaffPermission'])->name('staff.getStaffPermission');
        //Staff routes


        // Lookups manager Route
        Route::match(['get', 'post'], '/lookups-manager/{type}', [AdminLookupsController::class, 'index'])->name('lookups-manager.index');
        Route::match(['get', 'post'], '/lookups-manager/add/{type}', [AdminLookupsController::class, 'add'])->name('lookups-manager.add');
        Route::get('lookups-manager/destroy/{enlokid?}', [AdminLookupsController::class, 'destroy'])->name('lookups-manager.delete');
        Route::get('lookups-manager/update-status/{id}/{status}', [AdminLookupsController::class, 'changeStatus'])->name('lookups-manager.status');
        Route::match(['get', 'post'], 'lookups-manager/{type?}/edit/{enlokid?}', [AdminLookupsController::class, 'update'])->name('lookups-manager.edit');

         // events Route
         Route::get('events/destroy/{enuserid?}', [AdminEventsController::class, 'destroy'])->name('events.delete');
         Route::get('events/update-status/{id}/{status}', [AdminEventsController::class, 'changeStatus'])->name('events.status');
        //  AdminTestimonials
        Route::get('testimonials/destroy/{enuserid?}', [AdminTestimonials::class, 'destroy'])->name('testimonials.delete');
        Route::get('testimonials/update-status/{id}/{status}', [AdminTestimonials::class, 'changeStatus'])->name('testimonials.status');

        // CMS Manage Route
        Route::get('cms-manager/destroy/{encmsid?}', [AdminCmspagesController::class, 'destroy'])->name('cms-manager.delete');


        //Designations routes
        Route::match(['get', 'post'], '/designations',[AdminDesignationsController::class, 'index'])->name('designations.index');
        Route::match(['get', 'post'], 'designations/add',[AdminDesignationsController::class, 'add'])->name('designations.add');
        Route::match(['get', 'post'], 'designations/edit/{endesid?}',[AdminDesignationsController::class, 'update'])->name('designations.edit');
        Route::get('designations/update-status/{id}/{status}',[AdminDesignationsController::class, 'changeStatus'])->name('designations.status');
        Route::get('designations/delete/{endesid}',[AdminDesignationsController::class, 'delete'])->name('designations.delete');
        //Designations routes



        // Language Route
        Route::match(['get', 'post'], 'language-settings/update1/{id?}', [AdminLanguageSettingsController::class, 'update1'])->name('language-settings.update1');
        Route::get('languages/update-status/{id}/{status}',[AdminLanguagesController::class, 'changeStatus'])->name('languages.status');

        // Email Templates Route
        Route::match(['get', 'post'], 'email-templates/get-constant',[AdminEmailtemplateController::class, 'getConstant'])->name('email-templates.getConstant');

        // Email Logs Route
        Route::match(['get', 'post'], 'email-logs', [AdminEmailLogsController::class, 'index'])->name('emaillogs.listEmail');
        Route::match(['get', 'post'], 'email-logs/email_details/{enmailid?}', [AdminEmailLogsController::class, 'emailDetail'])->name('emaillogs.emailDetail');

        // Setting Route
        Route::match(['get', 'post'], '/settings/prefix/{enslug?}', [AdminSettingsController::class, 'prefix'])->name('settings.prefix');
        Route::get('settings/destroy/{ensetid?}', [AdminSettingsController::class, 'destroy'])->name('settings.delete');

        // Acl Route
        Route::get('acl/destroy/{enaclid?}', [AdminAclController::class, 'destroy'])->name('acl.delete');
        Route::get('acl/update-status/{id}/{status}', [AdminAclController::class, 'changeStatus'])->name('acl.status');
        Route::post('acl/add-more/add-more', [AdminAclController::class, 'addMoreRow'])->name('acl.addMoreRow');
        Route::get('acl/delete-function/{id}', [AdminAclController::class, 'delete_function'])->name('acl.delete_function');


        // Lookups manager Route
        Route::match(['get', 'post'], '/lookups-manager/{type}', [AdminLookupsController::class, 'index'])->name('lookups-manager.index');
        Route::match(['get', 'post'], '/lookups-manager/add/{type}', [AdminLookupsController::class, 'add'])->name('lookups-manager.add');
        Route::get('lookups-manager/destroy/{enlokid?}', [AdminLookupsController::class, 'destroy'])->name('lookups-manager.delete');
        Route::get('lookups-manager/update-status/{id}/{status}', [AdminLookupsController::class, 'changeStatus'])->name('lookups-manager.status');
        Route::match(['get', 'post'], 'lookups-manager/{type?}/edit/{enlokid?}', [AdminLookupsController::class, 'update'])->name('lookups-manager.edit');
// contact-us-inquiry work
        Route::get('contact-us-inquiry', [ContactUsController::class, 'index'])->name('Contact_us.index');
        Route::get('contact-us-inquiry/{id}', [ContactUsController::class, 'View'])->name('Contact_us.show');
        Route::get('contact-us-inquiry/destroy/{id}', [ContactUsController::class, 'destroy'])->name('Contact_us.delete');
        // Seo Route
        Route::match(['get', 'post'],'seo-page-manager', [AdminSeoPageController::class, 'index'])->name('SeoPage.index');
        Route::get('seo-page-manager/add-doc', [AdminSeoPageController::class, 'addDoc'])->name('SeoPage.create');
        Route::post('seo-page-manager/add-doc', [AdminSeoPageController::class, 'saveDoc'])->name('SeoPage.save');
        Route::get('seo-page-manager/edit-doc/{id}', [AdminSeoPageController::class, 'editDoc'])->name('SeoPage.edit');
        Route::post('seo-page-manager/edit-doc/{id}', [AdminSeoPageController::class, 'updateDoc'])->name('SeoPage.update');
        Route::any('seo-page-manager/delete-page/{id}', [AdminSeoPageController::class, 'deletePage'])->name('SeoPage.delete');

        // class route
        Route::get('Class/update-status/{id}/{status}', [AdminClassController::class, 'changeStatus'])->name('Class.status');
        Route::get('Class/delete/{endesid}', [AdminClassController::class, 'destroy'])->name('Class.delete');

 // events page
        Route::get('Events/update-status/{id}/{status}', [EventsController::class, 'changeStatus'])->name('Events.status');
        Route::get('Events/delete/{endesid}', [EventsController::class, 'destroy'])->name('Events.delete');


    });
});

Route::get('/base/uploder', [App\Http\Controllers\Controller::class, 'saveCkeditorImages']);
Route::post('/base/uploder', [App\Http\Controllers\Controller::class, 'saveCkeditorImages']);
Route::post('/contact-us', [HomeController::class, 'contactus_store'])->name('front.store');

// class admin route
// Route::resource('admin/Class', App\Http\Controllers\admin\ClassController::class);


// frontend routes
Route::get('/', [HomeController::class, 'index'])->name('front.index');
Route::get('/classes', [HomeController::class, 'classes'])->name('front.classes');
Route::get('/events', [HomeController::class, 'events'])->name('front.events');
Route::get('/about-us', [HomeController::class, 'about'])->name('front.about');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('front.contact');
Route::get('/events/{name?}', [HomeController::class, 'yoga_darshan'])->name('front.yoga_darshan');
Route::get('/thank-you', [HomeController::class, 'thank_you'])->name('front.thank_you');
Route::get('/about-author', [HomeController::class, 'about_author'])->name('front.about_author');
Route::get('/invoice', [HomeController::class, 'invoice'])->name('front.invoice');
Route::get('/checkout-classes', [HomeController::class, 'checkout_classes'])->name('front.checkout_classes');
Route::get('/elements', [HomeController::class, 'elements'])->name('front.elements');
Route::get('/login', [HomeController::class, 'login'])->name('front.login');
Route::get('/register', [HomeController::class, 'register'])->name('front.register');
Route::get('/privacy-policy', [HomeController::class, 'privacy_policy'])->name('front.privacy_policy');
Route::get('/TermConditions', [HomeController::class, 'Refund_policy'])->name('front.Refund_policy');
// Auth Routes Page
Route::get('/login', [HomeController::class, 'login_page'])->name('front.login_page');
Route::post('/login', [HomeController::class, 'login_user'])->name('front.login_page');
Route::get('/sign-up', [HomeController::class, 'sign_up_page'])->name('front.sign_up_page');
Route::post('/sign-up', [HomeController::class, 'create_user'])->name('front.sign_up_page');
Route::get('/verify-email', [HomeController::class, 'verify_account_mail'])->name('front.verify_account_mail');
Route::get('/logout', [HomeController::class, 'logout'])->name('front.logout');
Route::post('/lagn-change', [HomeController::class, 'lang_change'])->name('front.langchange');
