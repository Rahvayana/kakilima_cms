<?php

namespace App\Http\Controllers;

use App\Administrator;
use App\Post;
use App\Seller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['jumlah_seller']=Seller::all()->count();
        $data['jumlah_post']=Post::all()->count();
        $data['jumlah_user']=User::all()->count();
        $data['selelr_aktif']=Seller::where('status',1)->get()->count();
        // dd($data);
        return view('dashboard',$data);
    }

    public function user()
    {
        $data['users']=User::all();
        // dd($data);
        return view('user',$data);
    }

    public function userDetail($id)
    {
        $data['user']=User::find($id);
        // dd($data);
        return view('detail-user',$data);
    }
    
    public function seller()
    {
        $data['sellers']=Seller::all();
        // dd($data);
        return view('seller',$data);
    }

    public function sellerDetail($id)
    {
        $data['seller']=Seller::find($id);
        $data['user']=User::find($data['seller']->id_user);
        $data['posts']=Post::where('id_seller',$id)->get();
        // dd($data);
        return view('detail-seller',$data);
    }

    public function post()
    {
        $data['posts']=Post::all();
        // dd($data);
        return view('post',$data);
        
    }

    public function postDetail($id)
    {
        $data['post']=DB::table('posts')->select('sellers.nama_seller','posts.*')
        ->leftJoin('sellers','sellers.id','posts.id_seller')
        ->where('posts.id',$id)
        ->first();
        // dd($data);
        return view('detail-post',$data);
    }
    public function admin()
    {
        $data['admins']=Administrator::all();
        return view('admin',$data);
    }

    public function addAdmin()
    {
        return view('add-admin');
    }
    public function saveAdmin(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:administrators'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $admin=new Administrator();
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->password=Hash::make($request->password);
        $admin->save();
        return redirect()->route('admin');
    }

    public function editAdmin($id)
    {
        $data['admin']=Administrator::find($id);
        return view('edit-admin',$data);
    }

    public function storeAdmin($id,Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255']
        ]);
        $admin=new Administrator();
        $admin=Administrator::find($id);
        $admin->name=$request->name;
        $admin->save();
        return redirect()->route('admin');
    }

    public function deleteAdmin($id)
    {
        DB::table('administrators')->where('id', $id)->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Sukses',
        ]);
    }

    public function getPointMap()
    {
        $get_latlong = DB::table('sellers')
        ->select('latitude', 'longitude','nama_seller')
        ->get();
        // dd($get_latlong);
        $locations=array();
        foreach ($get_latlong as $key => $value) {
            $locations[] = [
                'name'      => $value->nama_seller,
                'latitude'  => $value->latitude,
                'longitude' => $value->longitude,
            ];
        }
        $data = array(
            "points_data" => $locations
        );

        return $data;
    }


}
