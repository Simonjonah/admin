<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use App\Http\Controllers\Franchise\FranchiseController;
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Markerter\MarketerController;
use App\Http\Controllers\PrimvideoController;
use App\Http\Controllers\SecondvideoController;
use App\Http\Controllers\FlutterwaveController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MarwithdrwalController;
use App\Models\Payment;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;
use App\Models\Primvideo;
use App\Models\Secondvideo;
use App\Models\Withdrawal;
use App\Models\Transaction;






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

Route::get('/', function () {

    //$primvideos = Primvideo::all();
    $primvideos = Primvideo::latest()->limit(3)->get();
    //show the video on the welcome page three
    $secondvideos = Secondvideo::latest()->limit(3)->get();
    return view('welcome')->with('primvideos', $primvideos)->with('secondvideos', $secondvideos);;
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



 
//ANY PERSON THAT LOCKIN WILL VIEW THE BELOW
Route::group(['middleware'=>'auth'], function() {

//API ROUTE ACCESS
    Route::get('/users/api', function() {

        return view('users.token');
    
    })->name('users.api');



    Route::resource('primvideos', App\Http\Controllers\PrimvideoController::class);


    Route::resource('secondvideos', App\Http\Controllers\SecondvideoController::class);


    Route::resource('transactions', App\Http\Controllers\TransactionController::class)->except(['show']);


    Route::resource('qrcodes', App\Http\Controllers\QrcodeController::class)->except(['show']);


    Route::resource('affiliates', App\Http\Controllers\AffiliateController::class);
    Route::get('/allbuyers', [MarketerController::class, 'allbuyers'])->name('allbuyers');
    Route::get('/allfrachise', [FranchiseController::class, 'allfrachise'])->name('allfrachise');
    Route::get('/franchisemarketers/{id}', [FranchiseController::class, 'franchisemarketers'])->name('franchisemarketers');
    Route::get('/buyerstable', [HomeController::class, 'buyerstable'])->name('buyerstable');
    Route::get('/marketerstable', [HomeController::class, 'marketerstable'])->name('marketerstable');
    Route::get('/frachisetable', [HomeController::class, 'frachisetable'])->name('frachisetable');
    Route::get('/subjectpayment', [PaymentController::class, 'subjectpayment'])->name('subjectpayment');
    Route::get('/viewbuyer/{id}', [PaymentController::class, 'viewbuyer'])->name('viewbuyer');

    
    
    Route::resource('accounts', App\Http\Controllers\AccountController::class)->except(['show']);
    Route::get('/accounts/show/{id?}', [App\Http\Controllers\AccountController::class, 'show'])->name('accounts.show');

    Route::resource('accountHistories', App\Http\Controllers\AccountHistoryController::class);

    Route::resource('marketers', App\Http\Controllers\MarketerController::class);

    Route::resource('users', App\Http\Controllers\UserController::class);

    Route::group(['middleware'=>'checkmoderator'], function() {
        Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
}); 

Route::post('/accounts/apply_for_payment', [App\Http\Controllers\AccountController::class, 'apply_for_payment'])->name('accounts.apply_for_payment');

// Route::post('/accounts/mark_as_paid', [App\Http\Controllers\AccountController::class, 'mark_as_paid'])
// ->name('accounts.mark_as_paid')->middleware('checkmoderator');

Route::get('/accounts', [App\Http\Controllers\AccountController::class, 'index'])->name('accounts.index')
->middleware('checkmoderator');
Route::get('/accounts/create', [App\Http\Controllers\AccountController::class, 'create'])->name('accounts.create')
->middleware('admin');


Route::get('/accountHistories', [App\Http\Controllers\AccountHistoryController::class, 'index'])->name('accountHistories.index')
->middleware('checkmoderator');
Route::get('/accountHistories/create', [App\Http\Controllers\AccountHistoryController::class, 'create'])->name('accountHistories.create')
->middleware('admin');

// only the admins can see access the roles
Route::resource('roles', App\Http\Controllers\RoleController::class)->middleware('admin');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');

});


//routes accessible when log out
Route::get('/qrcodes/show/{id?}', [App\Http\Controllers\QrcodeController::class, 'show'])->name('qrcodes.show');

Route::post('/pay', [App\Http\Controllers\FlutterwaveController::class, 'initialize'])->name('pay');
// The callback url after a payment
Route::get('/rave/callback', [App\Http\Controllers\FlutterwaveController::class, 'callback'])->name('callback');
Route::post('/qrcodes/show_payment_page', [App\Http\Controllers\QrcodeController::class, 'show_payment_page'])->name('qrcodes.show_payment_page');

//Route::get('/qrcodes/pay', [App\Http\Controllers\QrcodeController::class, 'pay'])->name('');

Route::get('transaction/{id}', [\App\Http\Controllers\Transaction::class, 'show'])->name('transactions.show');                         


//the beginning of custom login 

Route::prefix('franchise')->name('franchise.')->group(function() {

    Route::middleware(['guest:franchise'])->group(function() {

        Route::view('/login', 'dashboard.franchise.login')->name('login');
        Route::view('/register','dashboard.franchise.register')->name('register');
        Route::post('/createwithdrawal',[FranchiseController::class, 'createwithdrawal'])->name('createwithdrawal');
        Route::post('/marketercreate', [FranchiseController::class, 'marketercreate'])->name('marketercreate');
        Route::post('/create', [FranchiseController::class, 'create'])->name('create');
        Route::post('/check', [FranchiseController::class, 'check'])->name('check');

    });
    
    Route::middleware(['auth:franchise'])->group(function() {
        Route::post('/createwithdrawal', [WithdrawalController::class, 'createwithdrawal'])->name('createwithdrawal');
        Route::view('/home','dashboard.franchise.home')->name('home');
        Route::view('/admarketer','dashboard.franchise.admarketer')->name('admarketer');
        Route::view('/withdrawal','dashboard.franchise.withdrawal')->name('withdrawal');
        Route::get('/home', [FranchiseController::class, 'home'])->name('home');
        Route::get('/franchiseprofile', [FranchiseController::class, 'franchiseprofile'])->name('franchiseprofile');

        Route::get('/withdrawalhistory', [FranchiseController::class, 'withdrawalhistory'])->name('withdrawalhistory');
        
        
        Route::get('/yourmarketers', [FranchiseController::class, 'yourmarketers'])->name('yourmarketers');
        Route::get('/access',[FranchiseController::class, 'access'])->name('access');
        Route::get('/add-post', [FranchiseController::class, 'addPost'])->name('addPost');
        Route::get('/add-marketer/{id}', [FranchiseController::class, 'addMarketer'])->name('addMarketer');
        Route::get('/logout', [FranchiseController::class, 'logout'])->name('logout');   
    });
});



Route::prefix('buyer')->name('buyer.')->group(function() {

    Route::middleware(['guest:buyer'])->group(function() {
        Route::view('/login', 'dashboard.buyer.login')->name('login');
        Route::view('/register','dashboard.buyer.register')->name('register');
        Route::post('/ref', [BuyerController::class, 'ref'])->name('ref');
        Route::post('/check', [BuyerController::class, 'check'])->name('check');
        Route::post('/checkreg1', [BuyerController::class, 'checkreg1'])->name('checkreg1');
        Route::view('/register1', 'dashboard.buyer.register1')->name('register1');
    });
    
    Route::middleware(['auth:buyer'])->group(function() {
        Route::view('/home','dashboard.buyer.home')->name('home');
        Route::get('/secondarysection', [BuyerController::class, 'secondarysection'])->name('secondarysection');
        
        Route::get('/primary1subjects/{id}', [BuyerController::class, 'primary1subjects'])->name('primary1subjects');
        Route::get('/primarysection', [BuyerController::class, 'primarysection'])->name('primarysection');
        Route::get('/home', [BuyerController::class, 'home'])->name('home');
        Route::get('/transactions', [BuyerController::class, 'transactions'])->name('transactions');
        Route::get('/logout', [BuyerController::class, 'logout'])->name('logout');
        Route::get('/buyerprofile',[BuyerController::class, 'buyerprofile'])->name('buyerprofile');
        Route::get('/singlesubject/{id}',[BuyerController::class, 'singlesubject'])->name('singlesubject');
        Route::get('/buyprimvideos',[BuyerController::class, 'buyprimvideos'])->name('buyprimvideos');
        Route::get('/buysecondaryvideos', [BuyerController::class, 'buysecondaryvideos'])->name('buysecondaryvideos');
        Route::get('/primary1g2', [BuyerController::class, 'primary1g2'])->name('primary1g2');
        Route::get('/primary2g3', [BuyerController::class, 'primary2g3'])->name('primary2g3');
        Route::get('/primary3g4', [BuyerController::class, 'primary3g4'])->name('primary3g4');
        Route::get('/primary4g5', [BuyerController::class, 'primary4g5'])->name('primary4g5');
        Route::get('/primary5g6', [BuyerController::class, 'primary5g6'])->name('primary5g6');
        Route::get('/primary6', [BuyerController::class, 'primary6'])->name('primary6');
        Route::get('/buyertransactions', [BuyerController::class, 'buyertransactions'])->name('buyertransactions');
        Route::get('/primary1english', [BuyerController::class, 'primary1english'])->name('primary1english');
        Route::get('/primary1Quantitative', [BuyerController::class, 'primary1Quantitative'])->name('primary1Quantitative');
        Route::get('/primary3Verbal', [BuyerController::class, 'primary3Verbal'])->name('primary3Verbal');
        Route::get('/primary3english', [BuyerController::class, 'primary3english'])->name('primary3english');
        Route::get('/primary3Quantitative', [BuyerController::class, 'primary3Quantitative'])->name('primary3Quantitative');
        Route::get('/primary1Quantitative', [BuyerController::class, 'primary1Quantitative'])->name('primary1Quantitative');
        
        Route::get('/primary4Verbal', [BuyerController::class, 'primary4Verbal'])->name('primary4Verbal');
        Route::get('/primary4english', [BuyerController::class, 'primary4english'])->name('primary4english');
        Route::get('/primary4Quantitative', [BuyerController::class, 'primary4Quantitative'])->name('primary4Quantitative');
        
        Route::get('/viewprim6subjects', [BuyerController::class, 'viewprim6subjects'])->name('viewprim6subjects');
        Route::get('/primary6Verbal', [BuyerController::class, 'primary6Verbal'])->name('primary6Verbal');
        Route::get('/primary6english', [BuyerController::class, 'primary6english'])->name('primary6english');
        Route::get('/primary6Quantitative', [BuyerController::class, 'primary6Quantitative'])->name('primary6Quantitative');
        Route::get('/primary6Verbal', [BuyerController::class, 'primary6Verbal'])->name('primary6Verbal');

        Route::get('/primary5Verbal', [BuyerController::class, 'primary5Verbal'])->name('primary5Verbal');
        Route::get('/primary5english', [BuyerController::class, 'primary5english'])->name('primary5english');
        Route::get('/primary5Quantitative', [BuyerController::class, 'primary5Quantitative'])->name('primary5Quantitative');
        Route::get('/viewprim5subjects', [BuyerController::class, 'viewprim5subjects'])->name('viewprim5subjects');

        Route::get('/viewprim4subjects', [BuyerController::class, 'viewprim4subjects'])->name('viewprim4subjects');

        Route::get('/viewprim3subjects', [BuyerController::class, 'viewprim3subjects'])->name('viewprim3subjects');
        Route::get('/primary2Verbal', [BuyerController::class, 'primary2Verbal'])->name('primary2Verbal');

        Route::get('/primary2Quantitative', [BuyerController::class, 'primary2Quantitative'])->name('primary2Quantitative');

        Route::get('/primary2english', [BuyerController::class, 'primary2english'])->name('primary2english');

        Route::get('/viewprim2subjects', [BuyerController::class, 'viewprim2subjects'])->name('viewprim2subjects');

        Route::get('/primary1Verbal', [BuyerController::class, 'primary1Verbal'])->name('primary1Verbal');
        
        Route::get('/thankyou', [BuyerController::class, 'thankyou'])->name('thankyou');
        Route::get('/jss1subject', [BuyerController::class, 'jss1subject'])->name('jss1subject');
        Route::get('/jss2subject', [BuyerController::class, 'jss2subject'])->name('jss2subject');
        Route::get('/jss3subject', [BuyerController::class, 'jss3subject'])->name('jss3subject');
        Route::get('/ss1subject', [BuyerController::class, 'ss1subject'])->name('ss1subject');
        Route::get('/ss2subject', [BuyerController::class, 'ss2subject'])->name('ss2subject');
        Route::get('/ss3subject', [BuyerController::class, 'ss3subject'])->name('ss3subject');
        Route::get('/secondarysingle/{id}',[BuyerController::class, 'secondarysingle'])->name('secondarysingle');
        Route::get('/youref',[BuyerController::class, 'youref'])->name('youref');
        Route::get('/viewprim1subjects',[BuyerController::class, 'viewprim1subjects'])->name('viewprim1subjects');

        Route::any('/payment-page/{id}',[PaymentController::class, 'index'])->name('pay');

        // The route that the button calls to initialize payment
        Route::post('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');
        // The callback url after a payment
        Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');
    });
});

Route::prefix('marketer')->name('marketer.')->group(function() {

    Route::middleware(['guest:marketer'])->group(function() {
        Route::view('/login', 'dashboard.marketer.login')->name('login');
        Route::view('/register','dashboard.marketer.register')->name('register');
        //Route::post('/create', [MarketerController::class, 'create'])->name('create');
        
        Route::post('/check', [MarketerController::class, 'check'])->name('check');
        Route::post('/ref', [MarketerController::class, 'ref'])->name('ref');
    });
    
    Route::middleware(['auth:marketer'])->group(function() {
        Route::post('/createmarketerwithdrawal', [MarwithdrwalController::class, 'createmarketerwithdrawal'])->name('createmarketerwithdrawal');
        Route::view('/home','dashboard.marketer.home')->name('home');
        ///Route::post('/ref', [MarketerController::class, 'ref'])->name('ref');
// ->middleware('checkreferral')
        //Route::get('/ref/{id}', [MarketerController::class, 'ref'])->name('ref');
        Route::get('/marketerprofile',[MarketerController::class, 'marketerprofile'])->name('marketerprofile');
        Route::get('/access',[MarketerController::class, 'access'])->name('access');
        Route::get('/home', [MarketerController::class, 'home'])->name('home');
        Route::get('/marketerref', [MarketerController::class, 'marketerref'])->name('marketerref');
        Route::get('/marketerwithdrawalhistory', [MarwithdrwalController::class, 'marketerwithdrawalhistory'])->name('marketerwithdrawalhistory');

        
        Route::get('/profile',[MarketerController::class, 'profile'])->name('profile');
        Route::get('/yourbuyers',[MarketerController::class, 'yourbuyers'])->name('yourbuyers');
        Route::view('/marketerwithdrawal','dashboard.marketer.marketerwithdrawal')->name('marketerwithdrawal');
        //Route::get('/', [MarwithdrwalController::class, 'marketerwithdrawal'])->name('marketerwithdrawal');
        Route::get('/logout', [MarketerController::class, 'logout'])->name('logout');

    });

});
//Route::post('/markaspaid', [MarwithdrwalController::class, 'markaspaid'])->name('marketers.markaspaid');
Route::post('/marketers/markaspaid{id}',[
    'uses'=>'\App\Http\Controllers\MarwithdrwalController@markaspaid',
    'as'=>'approvedWithdrawal'
  ]);
  
Route::get('transumary', [App\Http\Controllers\MarketerController::class, 'transumary'])->name('marketers.transumary');
Route::get('withdrawaltable', [App\Http\Controllers\MarketerController::class, 'withdrawaltable'])->name('marketers.withdrawaltable');

Route::get('marwithdrawaltable', [App\Http\Controllers\MarketerController::class, 'marwithdrawaltable'])->name('marketers.marwithdrawaltable');

Route::get('viewpayment/{id}', [App\Http\Controllers\MarketerController::class, 'viewpayment'])->name('marketers.viewpayment');

Route::get('allmarketer', [App\Http\Controllers\MarketerController::class, 'allmarketer'])->name('marketers.marketers');
Route::get('alltransactions', [App\Http\Controllers\MarketerController::class, 'alltransactions'])->name('marketers.alltransactions');


Route::get('buyerofmarketer', [App\Http\Controllers\MarketerController::class, 'buyerofmarketer'])->name('marketers.buyerofmarketer');


Route::get('/secondaryclasses', function () {
    return view('pages.secondaryclasses');
});


Route::get('/primaryclasses', function () {
    return view('pages.primaryclasses');
});

Route::get('/primary1', function () {

    $primaryvideos = DB::table('primvideos')->select('id', 'class', 'subject', 'amount')
        ->where('class', 'Primary 1/ Preparatory1')->get();
    return view('pages.primary1')->with('primaryvideos', $primaryvideos);
});



Route::get('/primary2', function () {
    $primaryvideos = DB::table('primvideos')->select('id', 'class', 'subject', 'amount')
        ->where('class', 'Primary 2/ Grade 1')->get();
    return view('pages.primary2')->with('primaryvideos', $primaryvideos);
});

Route::get('/primary3', function () {
    $primaryvideos = DB::table('primvideos')->select('id', 'class', 'subject', 'amount')
        ->where('class', 'Primary 3/ Grade 2')->get();
    return view('pages.primary3')->with('primaryvideos', $primaryvideos);
});

Route::get('/primary4', function () {
    $primaryvideos = DB::table('primvideos')->select('id', 'class', 'subject', 'amount')
        ->where('class', 'Primary 4/ Grade 3')->get();
    return view('pages.primary4')->with('primaryvideos', $primaryvideos);
});

Route::get('/primary5', function () {
    $primaryvideos = DB::table('primvideos')->select('id', 'class', 'subject', 'amount')
        ->where('class', 'Primary 5/ Grade 4')->get();
    return view('pages.primary5')->with('primaryvideos', $primaryvideos);
});

Route::get('/primary6', function () {
    $primaryvideos = DB::table('primvideos')->select('id', 'class', 'subject', 'amount')
        ->where('class', 'Primary 6/ Grade 5')->get();
    return view('pages.primary6')->with('primaryvideos', $primaryvideos);
});

Route::get('/js1', function () {
    $secondaryvideos = DB::table('secondvideos')->select('id', 'class', 'subject', 'amount')
        ->where('class', 'JSS 1')->get();
    return view('pages.js1')->with('secondaryvideos', $secondaryvideos);
});

Route::get('/jss2', function () {
    $secondaryvideos = DB::table('secondvideos')->select('id', 'class', 'subject', 'amount')
        ->where('class', 'JSS 2')->get();
    return view('pages.jss2')->with('secondaryvideos', $secondaryvideos);
});

Route::get('/jss3', function () {
    $secondaryvideos = DB::table('secondvideos')->select('id', 'class', 'subject', 'amount')
        ->where('class', 'JSS 3')->get();
    return view('pages.jss3')->with('secondaryvideos', $secondaryvideos);
});

Route::get('/ss1', function () {
    $secondaryvideos = DB::table('secondvideos')->select('id', 'class', 'subject', 'amount')
        ->where('class', 'SSS 1')->get();
    return view('pages.ss1')->with('secondaryvideos', $secondaryvideos);
});

Route::get('/ss2', function () {
    $secondaryvideos = DB::table('secondvideos')->select('id', 'class', 'subject', 'amount')
        ->where('class', 'SSS 2')->get();
    return view('pages.ss2')->with('secondaryvideos', $secondaryvideos);
});

Route::get('/ss3', function () {
    $secondaryvideos = DB::table('secondvideos')->select('id', 'class', 'subject', 'amount')
        ->where('class', 'SSS 3')->get();
    return view('pages.ss3')->with('secondaryvideos', $secondaryvideos);
});
Route::get('/logout', [UserController::class, 'logout'])->name('logout');   



