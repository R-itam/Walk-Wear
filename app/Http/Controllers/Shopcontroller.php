<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonTimeZone;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;


header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
class Shopcontroller extends Controller
{
    public function home_view():View{
        return view('home');
    }
    public function contact_view(){
        $id=session()->get('session_id');
        $uinfo=DB::table('user_info')->where('User_id','=',$id)->get();
        if($uinfo->isEmpty()){
          return redirect('/home');
        }
        return view('/contact')->with(['Info'=>$uinfo]);
    }
    public function admincontact_view(){
        $id=session()->get('session_id');
        $uinfo=DB::table('user_info')->where('User_id','=',$id)->get();
        if($uinfo->isEmpty()){
          return redirect('/home');
        }
        return view('/admincontact')->with(['Info'=>$uinfo]);
    }
    public function login_view():View{
        return view('login');
    }
    public function registerform_view():View{
        return view('registerform');
    }
    public function registration_submit(Request $req){
        $req->validate([
            'name'=>"required|regex:/^[a-zA-Z ]{3,30}$/",
                              'email'=>"required|regex:/^[a-z0-9. ]+@[a-z0-9._]+\.[a-z]{2,3}$/",
                               'phone'=>"required|regex:/^[6789][0-9]{9}$/",
                               'gender'=>"required",
                               'avatar'=>"required|mimes:png,jpg,jpeg,jfif",
                               'address'=>"required|between:10,200",
                               'password'=>"required|between:4,16"
        ]);
        
              $name=$req->input('name');
              $email=$req->input('email');
              $phone=$req->input('phone');
              $gender=$req->input('gender');
              $address=$req->input('address');
              $password=$req->input('password');
              $usertype='Client';
              $auth=0;
              if($req->file('avatar'))
              $file=$req->file('avatar');
            $filename=time().$file->getClientOriginalName();
            $filelocation='./upload';
            $file->move($filelocation,$filename);
            $submit=[
                'Name'=>$name,
                'Email'=>$email,
                'Phone'=>$phone,
                'Gender'=>$gender,
                'Address'=>$address,
                'Image'=>$filelocation.'/'.$filename,
                'Password'=>$password,
                'User_type'=>$usertype,
                'Auth'=>$auth
            ];
            $check=DB::table('user_info')->where('Email','=',$email)->first();
            if($check){
              return redirect('/registerform')->with('message','Email Alredy Exists');
            }else{
              DB::table('user_info')->insert($submit);
            return redirect('/login');
            }
           
   
   
    }
    public function login_submit(Request $obj){
        $user=$obj->input('username');
      $pass=$obj->input('password');
      $logdata=DB::table('user_info')->where('Email','=',$user)->orWhere('Phone','=',$user)->get();
    
      if(empty($logdata[0])){
          return redirect('/login')->with('message','User Not Found');
      }else{
          $dbpass=$logdata[0]->Password;
          $role=$logdata[0]->User_type;
          $auth=$logdata[0]->Auth;
          $obj->session()->put('session_role',$role);
          if($pass==$dbpass){
              $uid=$logdata[0]->User_id;
              $uname=$logdata[0]->Name;
              $uemail=$logdata[0]->Email;
              $uphone=$logdata[0]->Phone;
              $obj->session()->put('session_id',$uid);
              
              if ($auth==0) {
                  if ($role=='Admin') {
                    $obj->session()->put('session_name',$uname);
                    $obj->session()->put('session_email',$uemail);
                    $obj->session()->put('session_phone',$uphone);
                      return redirect('/adminhome');
                  }else{
                    $obj->session()->put('session_name',$uname);
              $obj->session()->put('session_email',$uemail);
              $obj->session()->put('session_phone',$uphone);
                      return redirect('/userhome');
                  }
              }else{
                  return redirect('/login')->with('message','User Block Contact Admin');
              }
              
          }else{
              return redirect('/login')->with('message','Password Not matched');
          }
      }
    }
    public function logout_submit(Request $req){
        $req->session()->invalidate();
         $req->session()->flush();
         $req->session()->regenerateToken();
         $cookie = \Cookie::forget($req->session()->getName());
         return redirect('/home')->withCookie($cookie);
    }
    public function userhome_view(){
        $id=session()->get('session_id');
        $udata=DB::table('user_info')->where('User_id','=',$id)->get();
        if($udata->isEmpty()){
          return redirect('/home');
        }
        $newarr=DB::table('new_arrival')->get();    
        return view('userhome')->with(['Info'=>$udata,'NewArr'=>$newarr]);
    }
    public function adminhome_view(){
        $id=session()->get('session_id');
        $adinfo=DB::table('user_info')->where('User_id','=',$id)->get();
        if($adinfo->isEmpty()){
          return redirect('/home');
        }
        $newarr=DB::table('new_arrival')->get();       
         return view('adminhome')->with(['Info'=>$adinfo,'NewArr'=>$newarr]);
    }
    public function adminpanel_view(){
        $id=session()->get('session_id');
        $adinfo=DB::table('user_info')->where('User_id','=',$id)->get();
        if ($adinfo->isEmpty()) {
          // If no user is logged in, redirect to 'home' with an error message
          return redirect('/home');
      } 
        $role=$adinfo[0]->User_type;
        $uinfo=DB::table('user_info')->where('User_type','=','Client')->get();
       
        if($role=='Admin'){
        return view('adminpanel')->with(['Info'=>$adinfo,'Uinfo'=>$uinfo]);
        }
    }
  
    public function limitedsec_view(){
        $id=session()->get('session_id');
        $adinfo=DB::table('user_info')->where('User_id','=',$id)->get();
        if($adinfo->isEmpty()){
          return redirect('/home');
        }
        return view('limitedsection')->with(['Info'=>$adinfo]);
    }
    public function senkaesection_view(){
        $id=session()->get('session_id');
        $adinfo=DB::table('user_info')->where('User_id','=',$id)->get();
        if($adinfo->isEmpty()){
          return redirect('/home');
        }
        return view('snekarsection')->with(['Info'=>$adinfo]);
    }
    public function sportsection_view(){
        $id=session()->get('session_id');
        $adinfo=DB::table('user_info')->where('User_id','=',$id)->get();
        if($adinfo->isEmpty()){
           return redirect('/home');        }        
        return view('sportsection')->with(['Info'=>$adinfo]);
    }
    public function slippersection_view(){
        $id=session()->get('session_id');
        $adinfo=DB::table('user_info')->where('User_id','=',$id)->get();
        if($adinfo->isEmpty()){
          return redirect('/home');
        }
        return view('slippersection')->with(['Info'=>$adinfo]);
    }
    public function womensection_view(){
        $id=session()->get('session_id');
        $adinfo=DB::table('user_info')->where('User_id','=',$id)->get();
        if($adinfo->isEmpty()){
          return redirect('/home');
        }
        return view('womensection')->with(['Info'=>$adinfo]);
    }
    public function tshirtsection_view(){
      $id=session()->get('session_id');
      $adinfo=DB::table('user_info')->where('User_id','=',$id)->get();
      if($adinfo->isEmpty()){
        return redirect('/home');
      }
      return view('tshirtsection')->with(['Info'=>$adinfo]);
    }
    public function userinfo_view():View{
        $id=session()->get('session_id');
        $adinfo=DB::table('user_info')->where('User_id','=',$id)->get();
        $uinfo=DB::table('user_info')->where('User_type','=','Client')->get();
        return view('userinfo')->with(['Uinfo'=>$uinfo,'Info'=>$adinfo]);
    }
    public function block_sub($bl){
        $b_id=$bl;
        DB::table('user_info')->where('User_id','=',$b_id)->update(['Auth'=>1]);
        return redirect('/adminpanel');
    }
    public function unblock_submit($unbl){
        $unb_id=$unbl;
        DB::table('user_info')->where('User_id','=',$unb_id)->update(['Auth'=>0]);
        return redirect('/adminpanel');
    }
    public function myinfo_view():View{
        $m_id=session()->get('session_id');
        $mdata=DB::table('user_info')->where('User_id','=',$m_id)->get();
        return view('myinfo')->with(['Minfo'=>$mdata]);
    }
    public function changepass_view():View{
        return view('changepassword');
    }
    public function changepass_submit(Request $req){
        $req->validate([
            'oldpass'=>"required|between:4,16",
            'newpass'=>"required|between:4,16",
            'confpass'=>"required|between:4,16|same:newpass"
        ]);
        $oldpass=$req->input('oldpass');
        $newpass=$req->input('newpass');
        $confpass=$req->input('confpass');
        $passid=session()->get('session_id');
        $datapass=DB::table('user_info')->where('User_id','=',$passid)->get();
        $dbpass=$datapass[0]->Password;
        if ($dbpass==$oldpass) {
            if($oldpass!=$newpass){
                if($newpass==$confpass){
                    DB::table('user_info')->where('User_id','=',$passid)->update(['Password'=>$confpass]);
                    return redirect('/myinfo');
                }
    
            }else{
                return redirect('/changepassword')->with('message','Old Password and New Password same');
            }
            
        }else{
            return redirect('/changepassword')->with('message','Password Not Match');
        }
       }
    public function useredit_view():View{
        $ed_id=session()->get('session_id');
        $ed_data=DB::table('user_info')->where('User_id','=',$ed_id)->get();
        $old_img=$ed_data[0]->Image;
        session()->put('session_ig',$old_img);
        return view('userinfoedit')->with(['Edinfo'=>$ed_data]);
    }
    public function useredit_submit(Request $req){
        $req->validate([
            'name'=>"required|regex:/^[a-zA-Z ]{3,30}$/",
                              'email'=>"required|regex:/^[a-z0-9. ]+@[a-z0-9._]+\.[a-z]{2,3}$/",
                               'phone'=>"required|regex:/^[6789][0-9]{9}$/",
                               'gender'=>"required",
                               'avatar'=>"nullable|mimes:png,jpg,jpeg,jfif",
                               'address'=>"required|between:10,200"
                               
        ]);   $uid=$req->input('userinfo_ed');
              $name=$req->input('name');
              $email=$req->input('email');
              $phone=$req->input('phone');
              $gender=$req->input('gender');
              $address=$req->input('address');
              $oldimg=session()->get('session_ig');
              $imagePath = $oldimg;
            if ($req->hasFile('avatar')) {
                $file = $req->file('avatar');
                $filename = time().$file->getClientOriginalName();
                $filelocation = './upload';
                $file->move($filelocation, $filename);
                $imagePath = $filelocation . '/' . $filename;            // Update image path if new image is uploaded
            }
            $ued_submit=[
                'Name'=>$name,
                'Email'=>$email,
                'Phone'=>$phone,
                'Gender'=>$gender,
                'Address'=>$address,
                'Image'=>$imagePath
            ];
            DB::table('user_info')->where('User_id','=',$uid)->update($ued_submit);
            return redirect('/myinfo');
    }
    public function limitedadd_view():View{
        return view('limitedadd');
    }
    public function limitedadd_submit(Request $req){
        $name=$req->input('model_nm');
        $price=$req->input('m_price');
        $color=$req->input('m_color');
        if($req->file('m_avatar'))
        $file=$req->file('m_avatar');
      $filename=time().$file->getClientOriginalName();
      $filelocation='./upload';
      $file->move($filelocation,$filename);
      $limited_sub=[
        'Name'=>$name,
        'Price'=>$price,
        'Color'=>$color,
        'Image'=>$filelocation .'/'. $filename
      ];
      DB::table('limited_ed')->insert($limited_sub);
      return redirect('/limitedadd');
    }

    public function sneakeradd_view():View{
        return view('sneakeradd');
    }
    public function sneakeradd_submit(Request $req){
        $name=$req->input('model_nm');
        $price=$req->input('m_price');
        $color=$req->input('m_color');
        if($req->file('m_avatar'))
        $file=$req->file('m_avatar');
      $filename=time().$file->getClientOriginalName();
      $filelocation='./upload';
      $file->move($filelocation,$filename);
      $sneaker_sub=[
        'Name'=>$name,
        'Price'=>$price,
        'Color'=>$color,
        'Image'=>$filelocation .'/'. $filename
      ];
      DB::table('sneaker')->insert($sneaker_sub);
      return redirect('/sneakeradd');
    }
    public function slipperadd_view():View{
        return view('slipperadd');
    }
    public function slipperadd_submit(Request $req){
        $name=$req->input('model_nm');
        $price=$req->input('m_price');
        $color=$req->input('m_color');
        if($req->file('m_avatar'))
        $file=$req->file('m_avatar');
      $filename=time().$file->getClientOriginalName();
      $filelocation='./upload';
      $file->move($filelocation,$filename);
      $slipper_sub=[
        'Name'=>$name,
        'Price'=>$price,
        'Color'=>$color,
        'Image'=>$filelocation .'/'. $filename
      ];
      DB::table('slipper')->insert($slipper_sub);
      return redirect('/slipperadd');
    }
    public function sportadd_view():View{
        return view('sportadd');
    }
    public function sportadd_submit(Request $req){
        $name=$req->input('model_nm');
        $price=$req->input('m_price');
        $color=$req->input('m_color');
        if($req->file('m_avatar'))
        $file=$req->file('m_avatar');
      $filename=time().$file->getClientOriginalName();
      $filelocation='./upload';
      $file->move($filelocation,$filename);
      $sport_sub=[
        'Name'=>$name,
        'Price'=>$price,
        'Color'=>$color,
        'Image'=>$filelocation .'/'. $filename
      ];
      DB::table('sport_shoe')->insert($sport_sub);
      return redirect('/sportadd');
    }
    public function womenshoeadd_view():View{
        return view('womenshoeadd');
    }
    public function womenshoeadd_submit(Request $req){
        $name=$req->input('model_nm');
        $price=$req->input('m_price');
        $color=$req->input('m_color');
        if($req->file('m_avatar'))
        $file=$req->file('m_avatar');
      $filename=time().$file->getClientOriginalName();
      $filelocation='./upload';
      $file->move($filelocation,$filename);
      $wshoe_sub=[
        'Name'=>$name,
        'Price'=>$price,
        'Color'=>$color,
        'Image'=>$filelocation .'/'. $filename
      ];
      DB::table('women_shoe')->insert($wshoe_sub);
      return redirect('/womenshoeadd');
    }
    public function tshirtadd_view(){
      return view('tshirtadd');
    }
    public function tshirtadd_submit(Request $req){
      $name=$req->input('model_nm');
      $price=$req->input('m_price');
      $color=$req->input('m_color');
      if($req->file('m_avatar'))
      $file=$req->file('m_avatar');
    $filename=time().$file->getClientOriginalName();
    $filelocation='./upload';
    $file->move($filelocation,$filename);
    $tshirt_sub=[
      'Name'=>$name,
      'Price'=>$price,
      'Color'=>$color,
      'Image'=>$filelocation .'/'. $filename
    ];
    DB::table('t_shirt')->insert($tshirt_sub);
    return redirect('/tshirtadd');
    }
    public function limitedpage_view(Request $request){
    
        $id=session()->get('session_id');
        $check=DB::table('user_info')->where('User_id','=',$id)->get();
        if($check->isEmpty()){
          return redirect('/home');
        }
        $data=DB::table('user_info')->where('User_id','=',$id)->where('User_type','=','Admin')->exists();
        $sort = $request->get('sort');
        $search = $request->get('search');
        $limi_data=DB::table('limited_ed');
        if ($search) {
          $limi_data->where('Name', 'LIKE', '%' . $search . '%') ; // Search by name
                    // ->orWhere('Description', 'LIKE', '%' . $search . '%');  // Optionally search by description or other fields
      }
        if ($sort) {
          switch ($sort) {
              case 'price_low_high':
                  $limi_data->orderBy('Price', 'asc');  // Sort by price low to high
                  break;
              case 'price_high_low':
                  $limi_data->orderBy('Price', 'desc');  // Sort by price high to low
                  break;
             
              case 'latest':
                $limi_data->orderBy('User_id','asc');
                break;
              default:
                  // Default sorting logic (if any)
                  break;
          }
      }
      $limi_data=$limi_data->get();
        return view('limitedviewpage')->with(['LimiInfo'=>$limi_data,'DATA'=>$data]);
     
    }
    public function sneakerpage_view(Request $request){
        $id=session()->get('session_id');
        $check=DB::table('user_info')->where('User_id','=',$id)->get();
        if($check->isEmpty()){
          return redirect('/home');
        }
        $data=DB::table('user_info')->where('User_id','=',$id)->where('User_type','=','Admin')->exists(); 
        $sort=$request->get('sort');
        $search = $request->get('search');
        $snk_data=DB::table('sneaker');
        if ($search) {
          $snk_data->where('Name', 'LIKE', '%' . $search . '%') ; // Search by name
        }
                   
        if ($sort) {
          switch ($sort) {
              case 'price_low_high':
                  $snk_data->orderBy('Price', 'asc');  // Sort by price low to high
                  break;
              case 'price_high_low':
                  $snk_data->orderBy('Price', 'desc');  // Sort by price high to low
                  break;
             
              case 'latest':
                $snk_data->orderBy('User_id','asc');
                break;
              default:
                  // Default sorting logic (if any)
                  break;
          }
      }
      $snk_data=$snk_data->get();
        return view('sneakerviewpage')->with(['SnkInfo'=>$snk_data,'DATA'=>$data]);
    }
    public function slipperview_page(Request $request){
        $id=session()->get('session_id');
        $check=DB::table('user_info')->where('User_id','=',$id)->get();
        if($check->isEmpty()){
          return redirect('/home');
        }
        $data=DB::table('user_info')->where('User_id','=',$id)->where('User_type','=','Admin')->exists(); 
        $sort=$request->get('sort');
        $search = $request->get('search');
        $sli_data=DB::table('slipper');
        if ($search) {
          $sli_data->where('Name', 'LIKE', '%' . $search . '%') ; // Search by name
        }
        if($sort){
          switch ($sort) {
            case 'price_low_high':
                $sli_data->orderBy('Price', 'asc');  // Sort by price low to high
                break;
            case 'price_high_low':
                $sli_data->orderBy('Price', 'desc');  // Sort by price high to low
                break;
           
            case 'latest':
              $sli_data->orderBy('User_id','asc');
              break;
            default:
                // Default sorting logic (if any)
                break;
        }

        }
        $sli_data=$sli_data->get();
        return view('slipperviewpage')->with(['Slipinfo'=>$sli_data,'DATA'=>$data]);
    }
    public function sportsview_page(Request $request){
        $id=session()->get('session_id');
        $check=DB::table('user_info')->where('User_id','=',$id)->get();
        if($check->isEmpty()){
          return redirect('/home');
        }
        $data=DB::table('user_info')->where('User_id','=',$id)->where('User_type','=','Admin')->exists(); 
        $sort=$request->get('sort');
        $search = $request->get('search');
        $sport_data=DB::table('sport_shoe');
        if ($search) {
          $sport_data->where('Name', 'LIKE', '%' . $search . '%') ; // Search by name
        }
        if($sort){
          switch ($sort) {
            case 'price_low_high':
                $sport_data->orderBy('Price', 'asc');  // Sort by price low to high
                break;
            case 'price_high_low':
                $sport_data->orderBy('Price', 'desc');  // Sort by price high to low
                break;
           
            case 'latest':
              $sport_data->orderBy('User_id','asc');
              break;
            default:
                // Default sorting logic (if any)
                break;
        }
       
    }
    $sport_data=$sport_data->get();
    return view('sportshoeviewpage')->with(['Sportinfo'=>$sport_data,'DATA'=>$data]);
  }
    public function womenshoeview_page(Request $request){
        $id=session()->get('session_id');
        $check=DB::table('user_info')->where('User_id','=',$id)->get();
        if($check->isEmpty()){
          return redirect('/home');
        }
        $data=DB::table('user_info')->where('User_id','=',$id)->where('User_type','=','Admin')->exists();
        $sort=$request->get('sort'); 
        $search=$request->get('search');
        $wos_data=DB::table('women_shoe');
        if ($search) {
          $wos_data->where('Name', 'LIKE', '%' . $search . '%') ; // Search by name
        }
        if($sort){
          switch ($sort) {
            case 'price_low_high':
                $wos_data->orderBy('Price', 'asc');  // Sort by price low to high
                break;
            case 'price_high_low':
                $wos_data->orderBy('Price', 'desc');  // Sort by price high to low
                break;
           
            case 'latest':
              $wos_data->orderBy('User_id','asc');
              break;
            default:
                // Default sorting logic (if any)
                break;
        }
        }
        $wos_data=$wos_data->get();
        return view('womenshoeviewpage')->with(['WosInfo'=>$wos_data,'DATA'=>$data]);
    }
    public function tshirtview_page(Request $request ){
      $id=session()->get('session_id');
      $check=DB::table('user_info')->where('User_id','=',$id)->get();
      if($check->isEmpty()){
        return redirect('/home');
      }
      $data=DB::table('user_info')->where('User_id','=',$id)->where('User_type','=','Admin')->exists(); 
      $sort = $request->get('sort');
      $search=$request->get('search');
      $ts_data = DB::table('t_shirt');
      if ($search) {
        $ts_data->where('Name', 'LIKE', '%' . $search . '%') ; // Search by name
      }
      if ($sort) {
        switch ($sort) {
            case 'price_low_high':
                $ts_data->orderBy('Price', 'asc');  // Sort by price low to high
                break;
            case 'price_high_low':
                $ts_data->orderBy('Price', 'desc');  // Sort by price high to low
                break;
                case 'latest':
                  $ts_data->orderBy('User_id', 'asc');  
                  break;
            default:
                // Default sorting logic (if any)
                break;
        }
    }
    $ts_data = $ts_data->get(); 
    return view('tshirtviewpage')->with(['TshirtInfo' => $ts_data, 'DATA' => $data]);
    }
    public function jacketview_page(Request $request){
      $id=session()->get('session_id');
      $check=DB::table('user_info')->where('User_id','=',$id)->get();
      if($check->isEmpty()){
        return redirect('/home');
      }
      $data=DB::table('user_info')->where('User_id','=',$id)->where('User_type','=','Admin')->exists(); 
      $sort = $request->get('sort');
      $search=$request->get('search');
      $jk_data = DB::table('jacket');
      if ($search) {
        $jk_data->where('Name', 'LIKE', '%' . $search . '%') ; // Search by name
      }
      if ($sort) {
        switch ($sort) {
            case 'men':
                $jk_data->where('Catagory','=','Men Jacket');  // Sort by price low to high
                break;
            case 'women':
                $jk_data->where('Catagory', '=','Women Jacket');  // Sort by price high to low
                break;
                case 'latest':
                  $jk_data->orderBy('User_id', 'asc');   
                  break;
            default:
                // Default sorting logic (if any)
                break;
        }
    }
    $jk_data = $jk_data->get(); 
    return view('jacketviewpage')->with(['jacketInfo' => $jk_data, 'DATA' => $data]);
    }
    public function mensection_view(Request $request){
        $id=session()->get('session_id');
        $check=DB::table('user_info')->where('User_id','=',$id)->get();
        if($check->isEmpty()){
          return redirect('/home');
        }
        $data=DB::table('user_info')->where('User_id','=',$id)->where('User_type','=','Admin')->exists(); 
        $sort=$request->get('sort');
        $snData=collect();
        $spData=collect();
        $limData=collect();
        $sliData=collect();
        if($sort){
          switch ($sort){
            case  'sneaker':
              $snData=DB::table('sneaker')->get();
              break;
            case 'sport':
              $spData=DB::table('sport_shoe')->get();
              break;
            case 'limited':
              $limData=DB::table('limited_ed')->get();
              break;
            case 'slipper':
              $sliData=DB::table('slipper')->get();
              break;
            case 'latest':
              $snData=DB::table('sneaker')->get();
          $spData=DB::table('sport_shoe')->get();
          $limData=DB::table('limited_ed')->get();
          $sliData=DB::table('slipper')->get();
          break;
          default:
          break;
          }

        }else{
          $snData=DB::table('sneaker')->get();
          $spData=DB::table('sport_shoe')->get();
          $limData=DB::table('limited_ed')->get();
          $sliData=DB::table('slipper')->get();
        }
     
        return view('mensection')->with(['SnData'=>$snData,'SpData'=>$spData,'LiData'=>$limData,'SlData'=>$sliData,'DATA'=>$data]);
    }
    public function women_section_view(Request $request){
        $id=session()->get('session_id');
        $check=DB::table('user_info')->where('User_id','=',$id)->get();
        if($check->isEmpty()){
          return redirect('/home');
        }
        $data=DB::table('user_info')->where('User_id','=',$id)->where('User_type','=','Admin')->exists(); 
        $sort=$request->get('sort');
        $woData1=collect();
        $SLdata=collect();
        if($sort){
          switch($sort){
            case 'women':
              $woData1=DB::table('women_shoe')->get();
              break;
            case 'slipper':
              $SLdata=DB::table('slipper')->get();
              break;
            case 'latest':
              $woData1=DB::table('women_shoe')->get();
          $SLdata=DB::table('slipper')->get();
          break;
          default:
          break;
          }

        }else{
          $woData1=DB::table('women_shoe')->get();
          $SLdata=DB::table('slipper')->get();
        }
       
        return view('womensectionview')->with(['WoData'=>$woData1,'SLdata'=>$SLdata,'DATA'=>$data]);
    }
    public function basketballview_page(Request $request){
      $id=session()->get('session_id');
        $check=DB::table('user_info')->where('User_id','=',$id)->get();
        if($check->isEmpty()){
          return redirect('/home');
        }
        $data=DB::table('user_info')->where('User_id','=',$id)->where('User_type','=','Admin')->exists(); 
        $sort=$request->get('sort');
        $search = $request->get('search');
        $bskt_data=DB::table('basketball');
        if ($search) {
          $bskt_data->where('Name', 'LIKE', '%' . $search . '%') ; // Search by name
        }
                   
        if ($sort) {
          switch ($sort) {
              case 'price_low_high':
                  $bskt_data->orderBy('Price', 'asc');  // Sort by price low to high
                  break;
              case 'price_high_low':
                  $bskt_data->orderBy('Price', 'desc');  // Sort by price high to low
                  break;
             
              case 'latest':
                $bskt_data->orderBy('User_id','asc');
                break;
              default:
                  // Default sorting logic (if any)
                  break;
          }
      }
      $bskt_data=$bskt_data->get();
      return view('basketballviewpage')->with(['BSKTinfo'=>$bskt_data,'DATA'=>$data]);

    }
    public function shop_view(Request $request)
{
    $id = session()->get('session_id');
    $check = DB::table('user_info')->where('User_id', '=', $id)->get();
    if ($check->isEmpty()) {
        return redirect('/home');
    }

    $data = DB::table('user_info')->where('User_id', '=', $id)->where('User_type', '=', 'Admin')->exists();
    $sort = $request->get('sort');

    // Initialize variables with empty collections to avoid null errors
    $snData = collect();
    $spData = collect();
    $limData = collect();
    $sliData = collect();
    $woData1 = collect();

    if ($sort) {
        switch ($sort) {
            case 'sneaker':
                $snData = DB::table('sneaker')->get();
                break;
            case 'sport':
                $spData = DB::table('sport_shoe')->get();
                break;
            case 'women':
                $woData1 = DB::table('women_shoe')->get();
                break;
            case 'slipper':
                $sliData = DB::table('slipper')->get();
                break;
            case 'limited':
                $limData = DB::table('limited_ed')->get();
                break;
            case 'latest':
              $snData = DB::table('sneaker')->get();
        $spData = DB::table('sport_shoe')->get();
        $limData = DB::table('limited_ed')->get();
        $sliData = DB::table('slipper')->get();
        $woData1 = DB::table('women_shoe')->get();
        break;
            default:
                break; 
        }
    } else {
        // Retrieve all categories if no specific sort is selected
        $snData = DB::table('sneaker')->get();
        $spData = DB::table('sport_shoe')->get();
        $limData = DB::table('limited_ed')->get();
        $sliData = DB::table('slipper')->get();
        $woData1 = DB::table('women_shoe')->get();
    }

    return view('shopview')->with([
        'SNINFO' => $snData,
        'SPINFO' => $spData,
        'LIMINFO' => $limData,
        'SLINFO' => $sliData,
        'WOINFO' => $woData1,
        'DATA' => $data
    ]);
}

    public function feedback_submit(Request $req){
        $name=$req->input('name');
        $email=$req->input('email');
        $subject=$req->input('subject');
        $message=$req->input('message');
        $id=session()->get('session_id');
        $feed_sub=[
            'Name'=>$name,
            'Email'=>$email,
            'Subject'=>$subject,
            'Message'=>$message
        ];
        $ch=DB::table('user_info')->where('User_id','=',$id)->get();
        $chem=$ch[0]->Email;
        $role=$ch[0]->User_type;
         if ($email==$chem) {
               DB::table('feedback')->insert($feed_sub);
               if($role=='Admin'){
                return redirect('/admincontact');
               }else{
                return redirect('/contact');
               }
         }else{
            return redirect('/contact')->with('text','user not register');
         }
    }
    public function feedbackpage_view(){
        $allf=DB::table('feedback')->get();
        return view('/feedbackpage')->with(['Finfo'=>$allf]);
    }
    public function feedback_delete($fdel){
        $fdel_id=$fdel;
        DB::table('feedback')->where('User_id','=',$fdel)->delete();
        return redirect('/feedbackpage');
    }
    public function addto_cart(Request $req){
        $name=session()->get('session_name');
        $email=session()->get('session_email');
        $s_name=$req->input('s_name');
        //$s_color=$req->input('s_color');
        $s_price=$req->input('s_price');
        $s_size=$req->input('s_size');
        $s_qty=$req->input('s_qty');
        $file=$req->input('s_avatar');
       
    //     if($req->file('s_avatar'))
    //     $file=$req->file('s_avatar');
    // $filename=time().$file->getClientOriginalName();
    // $filelocation='./cart';
    // $file->move($filelocation,$filename);
    $cart_sub=[
        'Name'=>$name,
        'Email'=>$email,
        'Product_name'=>$s_name,
        'Price'=>$s_price,
        'Size'=>$s_size,
        'Quantity'=>$s_qty,
        'Image'=>$file
    ];
   DB::table('shop_cart')->insert($cart_sub);
   return redirect('/cartview');
  }
  public function cart_view(){
    $id=session()->get('session_id');
    $email=session()->get('session_email');
    $data=DB::table('user_info')->where('User_id','=',$id)->where('User_type','=','Admin')->exists(); 
   $ch=DB::table('user_info')->where('User_id','=',$id)->get();
   if($ch->isEmpty()){
    return redirect('/home');
   }
    $cart_v=DB::table('shop_cart')->where('Email','=',$email)->get();
    return view('cartview')->with(['DATA'=>$data,'cartData'=>$cart_v]);
  }
  public function cart_remove($cartrem){
    $crem=$cartrem;
    DB::table('shop_cart')->where('User_id','=',$crem)->delete();
    return redirect('/cartview');
  }
  public function lmitedsecedit_view():View{
    $limdet=DB::table('limited_ed')->get();
    return view('limitedsectioneditview')->with(['LimitedEdit'=>$limdet]);
  }
  public function limiteditem_delete($lmdel){
        $l_id=$lmdel;
        DB::table('limited_ed')->where('User_id','=',$l_id)->delete();
        return redirect('limitedsectioneditview');
  }
  public function limited_ed_view($lmed){
    $l_e_id=$lmed;
    $l_dTail=DB::table('limited_ed')->where('User_id','=',$l_e_id)->get();
    $l_img=$l_dTail[0]->Image;
    session()->put('session_l_ig',$l_img);
    return view('limited_edit')->with(['L_dEtail'=>$l_dTail]);
  }
  public function limitededitaction_sub(Request $req){
    $id=$req->input('uid');
    $name=$req->input('model_nm');
    $price=$req->input('m_price');
    $color=$req->input('m_color');
    $old_l_ig=session()->get('session_l_ig');
    $imgpath=$old_l_ig;
    if($req->hasFile('m_avatar')){
    $file=$req->file('m_avatar');
  $filename=time().$file->getClientOriginalName();
  $filelocation='./upload';
  $file->move($filelocation,$filename);
  $imgpath=$filelocation .'/'. $filename;}
  $limited_sub=[
    'Name'=>$name,
    'Price'=>$price,
    'Color'=>$color,
    'Image'=>$imgpath
  ];
  //dd($limited_sub);
  DB::table('limited_ed')->where('User_id','=',$id)->update($limited_sub);
  return redirect('/limitedsectioneditview');
  }
  public function sneaksecedit_view():View{
    $sneak_d=DB::table('sneaker')->get();
    return view('sneakersectioneditview')->with(['SnKD'=>$sneak_d]);
  }
  public function sneaker_delete($snk_del){
    $snk_id=$snk_del;
    DB::table('sneaker')->where('User_id','=',$snk_id)->delete();
    return redirect('/sneakersectioneditview');

  }
  public function sneak_ed_view($sned){
      $sn_ed=$sned;
      $sn_dTail=DB::table('sneaker')->where('User_id','=',$sn_ed)->get();
      $sne_ig=$sn_dTail[0]->Image;
      session()->put('session_sn_ig',$sne_ig);
      return view('sneaker_edit')->with(['SndTail'=>$sn_dTail]);
  }
  public function sneakeditaction_sub(Request $req){
    $id=$req->input('uid');
    $name=$req->input('model_nm');
    $price=$req->input('m_price');
    $color=$req->input('m_color');
    $old_sn_ig=session()->get('session_sn_ig');
    $imgpath=$old_sn_ig;
    if($req->hasFile('m_avatar')){
    $file=$req->file('m_avatar');
  $filename=time().$file->getClientOriginalName();
  $filelocation='./upload';
  $file->move($filelocation,$filename);
  $imgpath=$filelocation .'/'. $filename;}
  $sneak_sub=[
    'Name'=>$name,
    'Price'=>$price,
    'Color'=>$color,
    'Image'=>$imgpath
  ];
  DB::table('sneaker')->where('User_id','=',$id)->update($sneak_sub);
   return redirect('/sneakersectioneditview');
  }
  public function sportsecedit_view(){
    $spData=DB::table('sport_shoe')->get();
    return view('sportsectioneditview')->with(['SpDaTa'=>$spData]);
  }
  public function sport_delete($spdel){
    $id=$spdel;
    DB::table('sport_shoe')->where('User_id','=',$id)->delete();
    return redirect('/sportsectioneditview');
  }
  public function sport_ed_view($sped){
    $id=$sped;
    $spDaTa=DB::table('sport_shoe')->where('User_id','=',$id)->get();
    $sp_ig=$spDaTa[0]->Image;
    session()->put('session_sp_ig',$sp_ig);
    return view('sport_edit')->with(['SPdAta'=>$spDaTa]);

  }
  public function sporteditaction_sub(Request $req){
    $id=$req->input('uid');
    $name=$req->input('model_nm');
    $price=$req->input('m_price');
    $color=$req->input('m_color');
    $old_sp_ig=session()->get('session_sp_ig');
    $imgpath=$old_sp_ig;
    if($req->hasFile('m_avatar')){
    $file=$req->file('m_avatar');
  $filename=time().$file->getClientOriginalName();
  $filelocation='./upload';
  $file->move($filelocation,$filename);
  $imgpath=$filelocation .'/'. $filename;}
  $sport_sub=[
    'Name'=>$name,
    'Price'=>$price,
    'Color'=>$color,
    'Image'=>$imgpath
  ];
  DB::table('sport_shoe')->where('User_id','=',$id)->update($sport_sub);
  return redirect('/sportsectioneditview');
  }
  public function womensecedit_view(){
    $woData=DB::table('women_shoe')->get();
    return view('womensectioneditview')->with(['WodAta'=>$woData]);
  }
  public function womenshoe_delete($wodel){
    $id=$wodel;
    DB::table('women_shoe')->where('User_id','=',$id)->delete();
    return redirect('/womensectioneditview');
  }
  public function womenseedit_view($woed){
        $woEd=$woed;
        $WoData=DB::table('women_shoe')->where('User_id','=',$woEd)->get();
        $wo_ig=$WoData[0]->Image;
        session()->put('session_wo_ig',$wo_ig);
        return view('women_edit')->with(['WOdATA'=>$WoData]);
  }
  public function womenedit_submit(Request $req){
    $id=$req->input('uid');
    $name=$req->input('model_nm');
    $price=$req->input('m_price');
    $color=$req->input('m_color');
    $old_wo_ig=session()->get('session_wo_ig');
    $imgpath=$old_wo_ig;
    if($req->hasFile('m_avatar')){
    $file=$req->file('m_avatar');
  $filename=time().$file->getClientOriginalName();
  $filelocation='./upload';
  $file->move($filelocation,$filename);
  $imgpath=$filelocation .'/'. $filename;}
  $womens_sub=[
    'Name'=>$name,
    'Price'=>$price,
    'Color'=>$color,
    'Image'=>$imgpath
  ];
  DB::table('women_shoe')->where('User_id','=',$id)->update($womens_sub);
  return redirect('/womensectioneditview');
  }
  public function slippersecedit_view(){
    $sldTA=DB::table('slipper')->get();
    return view('slippersectioneditview')->with(['SLdAtA'=>$sldTA]);
  }
  public function slipper_delete($sldel){
    $slid=$sldel;
    DB::table('slipper')->where('User_id','=',$slid)->delete();
    return redirect('/slippersectioneditview');
  }
  public function slipper_edit_view($sliped){
    $slipid=$sliped;
    $sliDATA=DB::table('slipper')->where('User_id','=',$slipid)->get();
    $sl_ig=$sliDATA[0]->Image;
    session()->put('session_sl_ig',$sl_ig);
    return view('slipper_edit')->with(['SLIPdata'=>$sliDATA]);
  }
  public function slippereditaction_sub(Request $req){
    $id=$req->input('uid');
    $name=$req->input('model_nm');
    $price=$req->input('m_price');
    $color=$req->input('m_color');
    $old_sl_ig=session()->get('session_sl_ig');
    $imgpath=$old_sl_ig;
    if($req->hasFile('m_avatar')){
    $file=$req->file('m_avatar');
  $filename=time().$file->getClientOriginalName();
  $filelocation='./upload';
  $file->move($filelocation,$filename);
  $imgpath=$filelocation .'/'. $filename;}
  $slipper_sub=[
    'Name'=>$name,
    'Price'=>$price,
    'Color'=>$color,
    'Image'=>$imgpath
  ];
  DB::table('slipper')->where('User_id','=',$id)->update($slipper_sub);
  return redirect('/slippersectioneditview');
  }
  public function tshirtsecedit_view(){
  $tshirt=DB::table('t_shirt')->get();
  return view('tshirtsectioneditview')->with(['TshirtData'=>$tshirt]);
  }
  public function tshirt_delete($tsdel){
      $tid=$tsdel;
      DB::table('t_shirt')->where('User_id','=',$tid)->delete();
      return redirect('/tshirtsectioneditview');
  }
  public function tshirt_ed_view($tsed){
    $tied=$tsed;
    $tIdata=DB::table('t_shirt')->where('User_id','=',$tied)->get();
    $t_ig=$tIdata[0]->Image;
    session()->put('session_t_ig',$t_ig);
    return view('tshirt_edit')->with(['TedData'=>$tIdata]);
  }
  public function tshirtedit_submit(Request $req){
    $id=$req->input('uid');
    $name=$req->input('model_nm');
    $price=$req->input('m_price');
    $color=$req->input('m_color');
    $old_ti_ig=session()->get('session_t_ig');
    $imgpath=$old_ti_ig;
    if($req->hasFile('m_avatar')){
    $file=$req->file('m_avatar');
  $filename=time().$file->getClientOriginalName();
  $filelocation='./upload';
  $file->move($filelocation,$filename);
  $imgpath=$filelocation .'/'. $filename;}
  $tishits_sub=[
    'Name'=>$name,
    'Price'=>$price,
    'Color'=>$color,
    'Image'=>$imgpath
  ];
  DB::table('t_shirt')->where('User_id','=',$id)->update($tishits_sub);
  return redirect('/tshirtsectioneditview');

  }
  public function orderpage_view():View{
    $id=session()->get('session_id');
    $email=session()->get('session_email');
    $data=DB::table('user_info')->where('User_id','=',$id)->where('User_type','=','Admin')->exists(); 
    $orderitem=DB::table('shop_cart')->where('Email','=',$email)->get();
    return view('orderpage')->with(['DATA'=>$data,'Orditem'=>$orderitem]);
  }
  public function order_submit(Request $req){
    $chemail=session()->get('session_email');
    $name = $req->input('name');
    $email = $req->input('email');
    $phone = $req->input('phone');
    $address = $req->input('address');
    $city = $req->input('city');
    $state = $req->input('state');
    $pin = $req->input('pin');
    $proname = $req->input('p_name');
    $proqty = $req->input('p_qty');
    $prosize = $req->input('p_size');
    $proprice = $req->input('p_price');
    $ship_ch=$req->input('ship_c');
    // $total = $req->input('total');
    $payment = $req->input('payment');
    $auth = 0;
    $status = 'Order';
    $orderID = uniqid('ORD_');
    $orderdate=today();
    $orderDetails = [];
    $totalProducts = count($proname); 
    $delivery=round($ship_ch/$totalProducts);
    for ($i = 0; $i < count($proname); $i++) {
      $totalForProduct = $proprice[$i] * $proqty[$i];
      $grandtotal=$totalForProduct+$delivery;
        $orderDetails[] = [
            'Order_id'=>$orderID,
            'Name' => $name,
            'Email' => $email,
            'Phone' => $phone,
            'Address' => $address,
            'City' => $city,
            'State' => $state,
            'Pin' => $pin,
            'P_name' => $proname[$i],
            'P_qty' => $proqty[$i],
            'P_size' => $prosize[$i],
            'P_price' => $grandtotal,
            // 'Total' => $total,
            'Payment' => $payment,
            'Order_date'=>$orderdate,
            'Auth' => $auth,
            'Status' => $status,
        ];
    }
   // dd($orderDetails);
   DB::transaction(function() use ($orderDetails, $chemail) {
    
    DB::table('order_details')->insert($orderDetails);


    DB::table('shop_cart')->where('Email', '=', $chemail)->delete();
    
});
return redirect('/ordersummery');
}
public function ordersummery_view(){
  $id=session()->get('session_id');
  $email=session()->get('session_email');
  $ch=DB::table('user_info')->where('user_id','=',$id)->get();
  if($ch->isEmpty()){
    return redirect('/home');
  }
  $data=DB::table('user_info')->where('User_id','=',$id)->where('User_type','=','Admin')->exists();
  $ordersum=DB::table('order_details')->where('Email','=',$email)->get(); 
  $partdel=DB::table('assign_order_detail')->where('Email','=',$email)->where('Auth','=',0)->get();
  // dd($partdel);
   return view('ordersummery')->with(['DATA'=>$data,'ORDERSUM'=>$ordersum,'PartDet'=>$partdel]);
 
  
}
public function bill_view($bilid):View{
  $b_id=$bilid;
  $billdata=DB::table('order_details')->where('User_id','=',$b_id)->get();
  return view('billdownload')->with(['BillData'=>$billdata]);
}
public function allorder_view():View{
  $id=session()->get('session_id');
  $adinfo=DB::table('user_info')->where('User_id','=',$id)->get();
  $OrD=DB::table('order_details')->paginate(10);
  $orderdet=DB::table('order_details')->where('Auth','=',0)->paginate(6);
  $deliverdor=DB::table('order_details')->where('Auth','=',2)->paginate(6);
  $cancelord=DB::table('order_details')->where('Auth','=',1)->paginate(6);
  $notdeliverd=DB::table('order_details')->where('Auth','=',4)->paginate(6);
  return view('allorderview')->with(['Info'=>$adinfo,'Finfo'=>$OrD,'OrdDel'=>$orderdet,'DElinFo'=>$deliverdor,'CAnoRd'=>$cancelord,'NotDeli'=>$notdeliverd]);
}
public function Cancelorder_action($cancelord){
  $cancelid=$cancelord;
  DB::table('order_details')->where('User_id','=',$cancelid)->update(['Auth'=>1,'Status'=>'Cancel']);
  return redirect('/ordersummery');
}
public function buynow_view(){
  $id=session()->get('session_id');
  $ch=DB::table('user_info')->where('User_id','=',$id)->get();
  if($ch->isEmpty()){
    return redirect('/home'); 
  }
  $data=DB::table('user_info')->where('User_id','=',$id)->where('User_type','=','Admin')->exists();
  $xx=session()->get('det');
  $details = session()->get('det');

  // Check if session data exists
  if ($details) {
      // Pass the session data to the view
      return view('buynow')->with(['details'=> $details,'DATA'=>$data]);
  } else {
      // Handle case where no data is in the session
      return view('buynow')->with('details', null);
  }
 
  
}
public function buynow_sub(Request $req){
  $c_name=session()->get('session_name');
  $c_email=session()->get('session_email');
  $p_name=$req->input('s_name');
  $p_col=$req->input('s_color');
  $p_price=$req->input('s_price');
  $p_size=$req->input('s_size');
  $p_qty=$req->input('s_qty');
  $det=[
    'C_name'=>$c_name,
    'C_email'=>$c_email,
    'name'=>$p_name,
    'color'=>$p_col,
    'price'=>$p_price,
    'size'=>$p_size,
    'qty'=>$p_qty
  ];
  // dd($det);
  session()->put('det',$det);
  return redirect('buynow');
}

public function buynoworder_submit(Request $req){
  $chemail=session()->get('session_email');
  $name = $req->input('name');
  $email = $req->input('email');
  $phone = $req->input('phone');
  $address = $req->input('address');
  $city = $req->input('city');
  $state = $req->input('state');
  $pin = $req->input('pin');
  $proname = $req->input('p_name');
  $proqty = $req->input('p_qty');
  $prosize = $req->input('p_size');
  $proprice = $req->input('p_price');
  $ship_ch=$req->input('ship_c');
  // $total = $req->input('total');
  $payment = $req->input('payment');
  $auth = 0;
  $status = 'Order';
  $orderID = uniqid('ORD_');
  $orderdate=today();
  $orderDetails1 = [];

  // for ($i = 0; $i < count($proname); $i++) {
    $totalForProduct = $proprice * $proqty;
    $grandtotal=$totalForProduct+$ship_ch;
      $orderDetails1[] = [
          'Order_id'=>$orderID,
          'Name' => $name,
          'Email' => $email,
          'Phone' => $phone,
          'Address' => $address,
          'City' => $city,
          'State' => $state,
          'Pin' => $pin,
          'P_name' => $proname,
          'P_qty' => $proqty,
          'P_size' => $prosize,
          'P_price' => $grandtotal,
          'Payment' => $payment,
          'Order_date'=>$orderdate,
          'Auth' => $auth,
          'Status' => $status,
      ];
  // }
  DB::table('order_details')->insert($orderDetails1);
  return redirect('/ordersummery');
}
public function newarrivalsction_view(){
  return view('newarrivalsection');
}
public function newarrivaladd_view(){
  return view('newarrivaladd');
}
public function newarrivaladd_submit(Request $req){
  $name=$req->input('model_nm');
  $price=$req->input('m_price');
  $color=$req->input('m_color');
  $catagory=$req->input('m_cat');
  if($req->file('m_avatar'))
  $file=$req->file('m_avatar');
$filename=time().$file->getClientOriginalName();
$filelocation='./upload';
$file->move($filelocation,$filename);
$newarr_sub=[
  'Name'=>$name,
  'Price'=>$price,
  'Color'=>$color,
  'Image'=>$filelocation .'/'. $filename,
  'Catagory'=>$catagory
];
DB::table('new_arrival')->insert($newarr_sub);
return redirect('/newarrivaladd');

}
public function newarrivaledit_view(){
  $newarrive=DB::table('new_arrival')->get();
  return view('newarrivaleditview')->with(['NewArrive'=>$newarrive]);
}
public function newarrival_delete($newarrdel){
     $newardel=$newarrdel;
     DB::table('new_arrival')->where('User_id','=',$newardel)->delete();
     return redirect('/newarrivaleditview');
}

public function jacketsection_view(){
  return view('jacketsection');
}
public function jacketadd_view(){
  return view('jacketadd');
}
public function jacketadd_submit(Request $req){
  $name=$req->input('model_nm');
  $price=$req->input('m_price');
  $color=$req->input('m_color');
  $catagory=$req->input('m_cat');
  if($req->file('m_avatar'))
  $file=$req->file('m_avatar');
$filename=time().$file->getClientOriginalName();
$filelocation='./upload';
$file->move($filelocation,$filename);
$newarr_sub=[
  'Name'=>$name,
  'Price'=>$price,
  'Color'=>$color,
  'Image'=>$filelocation .'/'. $filename,
  'Catagory'=>$catagory
];
DB::table('jacket')->insert($newarr_sub);
return redirect('/jacketadd');
}
public function jacketedit_view(){
  $jack=DB::table('jacket')->get();
  return view('jacketeditview')->with(['Jacket'=>$jack]);
}
public function jacketdelete_submit($jadl){
  $jid=$jadl;
  DB::table('jacket')->where('User_id','=',$jid)->delete();
  return redirect('/jacketeditview');
}
public function basketballsec_view(){
  return view('basketballsection');
}
public function basketballadd_view(){
  return view('basketballadd');
}
public function basketballadd_submit(Request $req){
  $name=$req->input('model_nm');
  $price=$req->input('m_price');
  $color=$req->input('m_color');
  if($req->file('m_avatar'))
  $file=$req->file('m_avatar');
$filename=time().$file->getClientOriginalName();
$filelocation='./upload';
$file->move($filelocation,$filename);
$busketball_sub=[
  'Name'=>$name,
  'Price'=>$price,
  'Color'=>$color,
  'Image'=>$filelocation .'/'. $filename,

];
DB::table('basketball')->insert($busketball_sub);
return redirect('/basketballadd');
}
public function basketballedit_view(){
  $bskt=DB::table('basketball')->get();
  return view('basketballeditview')->with(['BSKT'=>$bskt]);
}
public function basketball_delete($bsktdel){
  $bskt_id=$bsktdel;
  DB::table('basketball')->where('User_id','=',$bskt_id)->delete();
  return redirect('/basketballeditview');
}
//---------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------FOR DELIVERY PARTNER-------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------
 
public function deliverylogin_view():View{
  return view('deliverylogin');
}
public function deliverysection_view():View{
  $id=session()->get('session_id');
  $adinfo=DB::table('user_info')->where('User_id','=',$id)->get();
  return view('deliverysection')->with(['Info'=>$adinfo]);
}
public function deliverypartregister_view(){
  return view('deliveryparttadd');
}
public function deliverypartregister_submit(Request $req){
  $req->validate([
    'phone'=>"required|regex:/^[6789][0-9]{9}$/",
    'ad_no'=>"required|regex:/^[1-9][0-9]{11}$/"
  ]);
  $name=$req->input('name');
  $email=$req->input('email');
  $phone=$req->input('phone');
  $ad_no=$req->input('ad_no');
  $pass='nike@1234';
  $auth=0;
  $Status='Unblock';
  if($req->file('doc'))
  $file=$req->file('doc');
$filename=time().$file->getClientOriginalName();
$fileloc='./upload';
$file->move($fileloc,$filename);
$del_sub=[
  'Name'=>$name,
  'Email'=>$email,
  'Phone'=>$phone,
  'Aadhaar_no'=>$ad_no,
  'Document'=>$fileloc.'/'.$filename,
  'Password'=>$pass,
  'Auth'=>$auth,
  'Status'=>$Status
];
$check=DB::table('del_part_info')->where('Email','=',$email)->orWhere('Aadhaar_no','=',$ad_no)->first();
// dd($check);
if($check){
  if ($check->Email == $email) {
    return redirect('/deliveryparttadd')->with('message', 'Email already exists');
}
if ($check->Aadhaar_no == $ad_no) {
    return redirect('/deliveryparttadd')->with('message', 'Aadhaar No already exists');
}
}else{
  DB::table('del_part_info')->insert($del_sub);
  return redirect('deliveryparttadd');
}

 }
 public function deliverypartner_view(){
  $id=session()->get('session_id');
  $adinfo=DB::table('user_info')->where('User_id','=',$id)->get();
  $del_info=DB::table('del_part_info')->get();
  return view('deliverypartview')->with(['Info'=>$adinfo,'DelInfo'=>$del_info]);
 }
 public function deliverylogin_submit(Request $req){
  $email=$req->input('email');
  $password=$req->input('pass');
  $logdata=DB::table('del_part_info')->where('Email','=',$email)->get();
  if(empty($logdata[0])){
    return redirect('deliverylogin')->with('message','User Not Find');
  }else{
    $dbpass=$logdata[0]->Password;
    if ($dbpass==$password) {
      $uid=$logdata[0]->User_id;
      $driname=$logdata[0]->Name;
      $driemail=$logdata[0]->Email;
      $auth=$logdata[0]->Auth;
      session()->put('session_driid',$uid);
      if($auth==0){
        return redirect('deliverypartnerhome');
      }else{
        return redirect('deliverylogin')->with('message','Block! contact Admin');
      }
    }else{
      return redirect('/deliverylogin')->with('message','Password not matched');
    }
  }
 }
 public function deliverypartnerhome_view(){
  $de_id=session()->get('session_driid');
  $d_data=DB::table('del_part_info')->where('User_id','=',$de_id)->get();
  if($d_data->isEmpty()){
    return redirect('/deliverylogin');
  }
  return view('deliverypartnerhome')->with(['DELdata'=>$d_data]);
 }
 public function deliveryassign_viewpage(){
  $all_od=DB::table('order_details')->where('Auth','=',0)->get();
  return view('deliveryassignview')->with(['ALLODER'=>$all_od]);
 }
 public function assignorder_submit(Request $req){
  $id=$req->input('doid');
  $or_id=$req->input('oid');
  $name=$req->input('name');
  $email=$req->input('email');
  $phone=$req->input('phone');
  $add=$req->input('address');
  $p_name=$req->input('p_name');
  $p_qty=$req->input('p_qty');
  $p_price=$req->input('p_price');
  $pmode=$req->input('payment');
  $partner=$req->input('partner');
  $auth=0;
  $status='Assign';
  $Assign_sub=[
    'Order_id'=>$or_id,
    'Name'=>$name,
    'Email'=>$email,
    'Phone'=>$phone,
    'Address'=>$add,
    'P_name'=>$p_name,
    'P_qty'=>$p_qty,
    'P_price'=>$p_price,
    'Payment'=>$pmode,
    'Partner_name'=>$partner,
    'Auth'=>$auth,
    'Status'=>$status
  ];
  DB::transaction(function () use ($Assign_sub,$id) {
    // Insert into assign_order_detail
    DB::table('assign_order_detail')->insert($Assign_sub);
    
    // Update order_details
    DB::table('order_details')->where('User_id','=',$id)->update(['Auth' => 3, 'Status' => 'Assign']);
});
return redirect('/deliveryassignview');
 }
 public function delivery_partner_order_view(){
  $de_id=session()->get('session_driid');
  $d_data=DB::table('del_part_info')->where('User_id','=',$de_id)->get();
  $see_order=DB::table('assign_order_detail')->paginate(5);
  $asignord=DB::table('assign_order_detail')->where('Auth','=',0)->paginate(5);
  return view('deliverypartnerorderview')->with(['SEEORDER'=>$see_order,'DELata'=>$d_data,'AssignDel'=>$asignord]);
 }
 public function delivered_submit($deliord){
  $DeliOrd=$deliord;
  DB::transaction(function () use ($DeliOrd) {
   
    DB::table('assign_order_detail')->where('Order_id','=',$DeliOrd)->update(['Auth'=>2,'Status'=>'Delivered']);
    
  
    DB::table('order_details')->where('Order_id','=',$DeliOrd)->update(['Auth' => 2, 'Status' => 'Delivered']);
});
return redirect('/deliverypartnerorderview');
 }
 public function deliver_cancel_submit($canceldelorder){
    $del_can_od=$canceldelorder;
    DB::transaction(function () use ($del_can_od) {
   
      DB::table('assign_order_detail')->where('Order_id','=',$del_can_od)->update(['Auth'=>1,'Status'=>'Not Delivered']);
      
    
      DB::table('order_details')->where('Order_id','=',$del_can_od)->update(['Auth' => 4, 'Status' => 'Not Delivered']);
      return redirect('/deliverypartnerorderview');
  });
 }
 public function updatedelivery_view(){
  $de_id=session()->get('session_driid');
  $d_data=DB::table('del_part_info')->where('User_id','=',$de_id)->get();
  return view('updatedeliverypartner')->with(['DELata'=>$d_data]);
 }
 public function delichangepass_submit(Request $req){
  $req->validate([
    'oldpass'=>"required|between:4,16",
    'newpass'=>"required|between:4,16",
    'confpass'=>"required|between:4,16|same:newpass"
]);
  $deli_id=session()->get('session_driid');
  $doldpass=$req->input('oldpass');
  $dnewpass=$req->input('newpass');
  $confpass=$req->input('confpass');
  $DelData=DB::table('del_part_info')->where('User_id','=',$deli_id)->get();
  $dbpass=$DelData[0]->Password;
  if($dbpass==$doldpass){
          if($doldpass!=$dnewpass){
                  if($dnewpass==$confpass){
                         DB::table('del_part_info')->where('User_id','=',$deli_id)->update(['Password'=>$confpass]);
                         return redirect('/deliverypartnerhome');
                  }else{
                    return redirect('/updatedeliverypartner')->with('message','New Password and Confirm Password not same');
                  }
          }else{
            return redirect('/updatedeliverypartner')->with('message','Old Password and New Password Same');
          }
  }else{
    return redirect('/updatedeliverypartner')->with('message','Password not matched');
  }
 }
 public function deliverylog_out(Request $req){
  $req->session()->invalidate();
  $req->session()->flush();
  $req->session()->regenerateToken();
  $cookie = \Cookie::forget($req->session()->getName());
  return redirect('/deliverylogin')->withCookie($cookie);
 }

  
}