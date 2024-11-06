<?php

use App\Http\Controllers\Shopcontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',[Shopcontroller::class,'home_view']);
Route::get('/contact',[Shopcontroller::class,'contact_view']);
Route::get('/admincontact',[Shopcontroller::class,'admincontact_view']);
Route::get('/login',[Shopcontroller::class,'login_view']);
Route::get('/registerform',[Shopcontroller::class,'registerform_view']);
Route::post('/registeraction',[Shopcontroller::class,'registration_submit']);
Route::post('/logaction',[Shopcontroller::class,'login_submit']);
Route::get('/logout',[Shopcontroller::class,'logout_submit']);
Route::get('/userhome',[Shopcontroller::class,'userhome_view']);
Route::get('/adminhome',[Shopcontroller::class,'adminhome_view']);
Route::get('/adminpanel',[Shopcontroller::class,'adminpanel_view']);

Route::get('/limitedsection',[Shopcontroller::class,'limitedsec_view']);
Route::get('/snekarsection',[Shopcontroller::class,'senkaesection_view']);
Route::get('/sportsection',[Shopcontroller::class,'sportsection_view']);
Route::get('/slippersection',[Shopcontroller::class,'slippersection_view']);
Route::get('/womensection',[Shopcontroller::class,'womensection_view']);
Route::get('/tshirtsection',[Shopcontroller::class,'tshirtsection_view']);

Route::get('/userinfo',[Shopcontroller::class,'userinfo_view']);
Route::get('/block{bl}',[Shopcontroller::class,'block_sub']);
Route::get('/unblock{unbl}',[Shopcontroller::class,'unblock_submit']);

Route::get('/limitedadd',[Shopcontroller::class,'limitedadd_view']);
Route::post('/limitedaddaction',[Shopcontroller::class,'limitedadd_submit']);
Route::get('/limitedsectioneditview',[Shopcontroller::class,'lmitedsecedit_view']);
Route::get('/lim_del{lmdel}',[Shopcontroller::class,'limiteditem_delete']);
Route::get('/limited_edit{lmed}',[Shopcontroller::class,'limited_ed_view']);
Route::post('/limitededitaction',[Shopcontroller::class,'limitededitaction_sub']);

Route::get('/sneakeradd',[Shopcontroller::class,'sneakeradd_view']);
Route::post('/sneakeraddaction',[Shopcontroller::class,'sneakeradd_submit']);
Route::get('/sneakersectioneditview',[Shopcontroller::class,'sneaksecedit_view']);
Route::get('/sneaker_del{snk_del}',[Shopcontroller::class,'sneaker_delete']);
Route::get('/sneaker_edit{sned}',[Shopcontroller::class,'sneak_ed_view']);
Route::post('/sneakeditaction',[Shopcontroller::class,'sneakeditaction_sub']);

Route::get('/slipperadd',[Shopcontroller::class,'slipperadd_view']);
Route::post('/slipperaddaction',[Shopcontroller::class,'slipperadd_submit']);
Route::get('/slippersectioneditview',[Shopcontroller::class,'slippersecedit_view']);
Route::get('/slipper_del{sldel}',[Shopcontroller::class,'slipper_delete']);
Route::get('/slipper_edit{sliped}',[Shopcontroller::class,'slipper_edit_view']);
Route::post('/slippereditaction',[Shopcontroller::class,'slippereditaction_sub']);

Route::get('/sportadd',[Shopcontroller::class,'sportadd_view']);
Route::post('/sportaddaction',[Shopcontroller::class,'sportadd_submit']);
Route::get('/sportsectioneditview',[Shopcontroller::class,'sportsecedit_view']);
Route::get('/sport_del{spdel}',[Shopcontroller::class,'sport_delete']);
Route::get('/sport_edit{sped}',[Shopcontroller::class,'sport_ed_view']);
Route::post('/sporteditaction',[Shopcontroller::class,'sporteditaction_sub']);

Route::get('/womenshoeadd',[Shopcontroller::class,'womenshoeadd_view']);
Route::post('/womenshoeaddaction',[Shopcontroller::class,'womenshoeadd_submit']);
Route::get('/womensectioneditview',[Shopcontroller::class,'womensecedit_view']);
Route::get('/women_del{wodel}',[Shopcontroller::class,'womenshoe_delete']);
Route::get('/women_edit{woed}',[Shopcontroller::class,'womenseedit_view']);
Route::post('/womeneditaction',[Shopcontroller::class,'womenedit_submit']);

Route::get('/tshirtadd',[Shopcontroller::class,'tshirtadd_view']);
Route::post('/tshirtaddaction',[Shopcontroller::class,'tshirtadd_submit']);
Route::get('/tshirtsectioneditview',[Shopcontroller::class,'tshirtsecedit_view']);
Route::get('/tshirt_del{tsdel}',[Shopcontroller::class,'tshirt_delete']);
Route::get('/tshirt_edit{tsed}',[Shopcontroller::class,'tshirt_ed_view']);
Route::post('/tshirteditaction',[Shopcontroller::class,'tshirtedit_submit']);

Route::get('/newarrivalsection',[Shopcontroller::class,'newarrivalsction_view']);
Route::get('/newarrivaladd',[Shopcontroller::class,'newarrivaladd_view']);
Route::post('/newarrivaladdaction',[Shopcontroller::class,'newarrivaladd_submit']);
Route::get('/newarrivaleditview',[Shopcontroller::class,'newarrivaledit_view']);
Route::get('/newarr_del{newarrdel}',[Shopcontroller::class,'newarrival_delete']);

Route::get('/jacketsection',[Shopcontroller::class,'jacketsection_view']);
Route::get('/jacketadd',[Shopcontroller::class,'jacketadd_view']);
Route::post('/jacketaddaction',[Shopcontroller::class,'jacketadd_submit']);
Route::get('/jacketeditview',[Shopcontroller::class,'jacketedit_view']);
Route::get('/jacket_del{jadl}',[Shopcontroller::class,'jacketdelete_submit']);

Route::get('/basketballsection',[Shopcontroller::class,'basketballsec_view']);
Route::get('/basketballadd',[Shopcontroller::class,'basketballadd_view']);
Route::post('/basketballaddaction',[Shopcontroller::class,'basketballadd_submit']);
Route::get('/basketballeditview',[Shopcontroller::class,'basketballedit_view']);
Route::get('/basketball_del{bsktdel}',[Shopcontroller::class,'basketball_delete']);

Route::get('/myinfo',[Shopcontroller::class,'myinfo_view']);
Route::get('/changepassword',[Shopcontroller::class,'changepass_view']);
Route::post('/changepassaction',[Shopcontroller::class,'changepass_submit']);
Route::get('/userinfoedit',[Shopcontroller::class,'useredit_view']);
Route::post('/usereditaction',[Shopcontroller::class,'useredit_submit']);

Route::get('/limitedviewpage',[Shopcontroller::class,'limitedpage_view']);
Route::get('/sneakerviewpage',[Shopcontroller::class,'sneakerpage_view']);
Route::get('/slipperviewpage',[Shopcontroller::class,'slipperview_page']);
Route::get('/sportshoeviewpage',[Shopcontroller::class,'sportsview_page']);
Route::get('/womenshoeviewpage',[Shopcontroller::class,'womenshoeview_page']);
Route::get('/tshirtviewpage',[Shopcontroller::class,'tshirtview_page']);
Route::get('/mensection',[Shopcontroller::class,'mensection_view']);
Route::get('/womensectionview',[Shopcontroller::class,'women_section_view']);
Route::get('/shopview',[Shopcontroller::class,'shop_view']);
Route::get('/jacketviewpage',[Shopcontroller::class,'jacketview_page']);
Route::get('/basketballviewpage',[Shopcontroller::class,'basketballview_page']);

Route::post('/feedbackaction',[Shopcontroller::class,'feedback_submit']);
Route::get('/feedbackpage',[Shopcontroller::class,'feedbackpage_view']);
Route::get('/feeddelete{fdel}',[Shopcontroller::class,'feedback_delete']);
Route::post('/addcart',[Shopcontroller::class,'addto_cart']);
Route::get('/cartview',[Shopcontroller::class,'cart_view']);
Route::get('/cartremove{cartrem}',[Shopcontroller::class,'cart_remove']);
Route::get('/orderpage',[Shopcontroller::class,'orderpage_view']);
Route::post('/ordersubmitaction',[Shopcontroller::class,'order_submit']);
Route::get('/ordersummery',[Shopcontroller::class,'ordersummery_view']);
Route::get('/billdownload{bilid}',[Shopcontroller::class,'bill_view']);
Route::get('/allorderview',[Shopcontroller::class,'allorder_view']);
Route::get('/cancelorder/{cancelord}',[Shopcontroller::class,'Cancelorder_action']);
Route::get('/buynow',[Shopcontroller::class,'buynow_view']);
Route::post('/buynowaction',[Shopcontroller::class,'buynow_sub']);
Route::post('/buynoworderaction',[Shopcontroller::class,'buynoworder_submit']);


//_____________________________________________________________________________________________________________________________________
//-------------------------FOR DELIVERY PARTNER URL-------------------------------------------------------------------------------------
//_______________________________________________________________________________________________________________________________________

Route::get('/deliverylogin',[Shopcontroller::class,'deliverylogin_view']);
Route::post('/deliveryloginaction',[Shopcontroller::class,'deliverylogin_submit']);
Route::get('/deliverysection',[Shopcontroller::class,'deliverysection_view']);
Route::get('/deliveryparttadd',[Shopcontroller::class,'deliverypartregister_view']);
Route::post('/deliverypartaddaction',[Shopcontroller::class,'deliverypartregister_submit']);
Route::get('/deliverypartview',[Shopcontroller::class,'deliverypartner_view']);
Route::get('/deliverypartnerhome',[Shopcontroller::class,'deliverypartnerhome_view']);
Route::get('/deliveryassignview',[Shopcontroller::class,'deliveryassign_viewpage']);
Route::post('/assignorderaction',[Shopcontroller::class,'assignorder_submit']);
Route::get('/deliverypartnerorderview',[Shopcontroller::class,'delivery_partner_order_view']);
Route::get('/deliverorder{deliord}',[Shopcontroller::class,'delivered_submit']);
Route::get('/cancelassorder{canceldelorder}',[Shopcontroller::class,'deliver_cancel_submit']);
Route::get('/updatedeliverypartner',[Shopcontroller::class,'updatedelivery_view']);
Route::post('/delichangepassaction',[Shopcontroller::class,'delichangepass_submit']);
Route::get('/delilogout',[Shopcontroller::class,'deliverylog_out']);