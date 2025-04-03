<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ChangeForgotPasswordControllerController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\ChangePasswordController;

//nuevos
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CronologiacursoController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GalleryschoolController;
use App\Http\Controllers\EventoorlandoController;
use App\Http\Controllers\AnilloController;
use App\Http\Controllers\AreteController;
use App\Http\Controllers\DijeController;
use App\Http\Controllers\JoyaController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\PulseraController;
use App\Http\Controllers\HerramientaController;
use App\Http\Controllers\SubcripcionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('register', [AuthController::class, 'register'])
//     ->name('register');

// Route::post('login', [AuthController::class, 'login'])
//     ->name('login');



Route::group(['middleware' => 'api'], function ($router) {

    // Auth
    require __DIR__ . '/api_routes/auth.php';

    // Contacts
    require __DIR__ . '/api_routes/contact.php';

   

    // Pagos
    require __DIR__ . '/api_routes/payment.php';

    // Category
    require __DIR__ . '/api_routes/category.php';

    // Profile
    require __DIR__ . '/api_routes/profile.php';

    // Post
    require __DIR__ . '/api_routes/post.php';

    // banner
    require __DIR__ . '/api_routes/banner.php';


    // subcripcion
    require __DIR__ . '/api_routes/subcripcion.php';


    // users
    require __DIR__ . '/api_routes/users.php';

    // documents
    require __DIR__ . '/api_routes/documents.php';

    // favorites
    require __DIR__ . '/api_routes/favorites.php';

    // specialities
    require __DIR__ . '/api_routes/specialities.php';
    // solicitud
    require __DIR__ . '/api_routes/solicitud.php';




 Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])
        ->name('forgot.password');

    Route::post('/change-forgot-password', [ChangeForgotPasswordControllerController::class, 'changeForgotPassword'])
        ->name('change.forgot.password');


    Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])
        ->name('reset.password');

    Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])
        ->name('change.password');

    Route::post('/contact/form', [ContactFormController::class, 'contactStore'])
        ->name('contact.store');

    //comandos desde la url del backend

    Route::get('/cache', function () {
        Artisan::call('cache:clear');
        return "Cache";
    });

    Route::get('/optimize', function () {
        Artisan::call('optimize:clear');
        return "Optimización de Laravel";
    });

    Route::get('/storage-link', function () {
        Artisan::call('storage:link');
        return "Storage Link";
    });


    Route::get('/migrate-seed', function () {
        Artisan::call('migrate:refresh --seed');
        return "Migrate seed";
    });

    Route::post('file', [imageController::class, 'file'])->name('fileUpload');
    Route::post('file/class/uploader', [imageController::class, 'fileClassUploader'])->name('fileUploaderClass');


    //rutas libres


    // Route::get('/categories', [CategoryController::class, 'index'])
    //     ->name('category.index');

    // Route::get('/banners', [BannerController::class, 'index'])
    //     ->name('banner.index');

    // Route::get('/cursos', [CursoController::class, 'index'])
    //     ->name('curso.index');

    // Route::get('/cursos/activos', [CursoController::class, 'activos'])
    //     ->name('curso.activos');

    // Route::get('/curso/show/{curso}', [CursoController::class, 'cursoShow'])
    //     ->name('curso.show');

   

    // Route::get('/posts', [PostController::class, 'index'])
    //     ->name('post.index');

    // Route::get('/publicacions', [PublicacionController::class, 'index'])
    //     ->name('publicacion.index');

    // Route::get('/subcripcion/store', [SubcripcionController::class, 'index'])
    //     ->name('subcripcion.index');

  

});
