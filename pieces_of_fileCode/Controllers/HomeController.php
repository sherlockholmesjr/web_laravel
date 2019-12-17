<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Hash;
use Session;
use Validator;
use Auth;

class HomeController extends Controller
{

    public function index()
    {
        if(!Session::get('user')){
            return redirect('/');
        }
        else {
            return view('/index', ['name'=>Session::get('user')]);
        }
    }
    
    function make(){
        if(!Session::get('user')){
            return redirect('/');
        }
        else{
            return view('/store');
        }
    }

    function store(Request $request){
    	$request->validate(
    		[
    			"kode"=>'required',
    			"nama"=>'required',
                "jenis"=>'required',
    			"harga"=>'required',
    		]
    	);
    	DB::insert('INSERT INTO barang(kode, nama, jenis, harga) VALUES (?, ?, ?, ?)',
			[$request->kode, $request->nama, $request->jenis, $request->harga]);
		return redirect('/live_search');
    }

    function edit($id){
        if(!Session::get('user')){
            return redirect('/');
        }
        else{
            $data = DB::table('barang')
                    ->where('id', $id)
                    ->first();
            return view('edit', ['data'=>$data]);
        }
    }

    function update(Request $request, $id){
        $request->validate(
            [
                "kode"=>'required',
                "nama"=>'required',
                "jenis"=>'required',
                "harga"=>'required',
            ]
        );
        DB::table('barang')
        ->where('id', $id)
        ->update(['kode'=>$request->kode, 'nama'=>$request->nama, 'jenis'=>$request->jenis, 'harga'=>$request->harga]);
        return redirect('/live_search');
    }

    function delete($id){
        DB::table('barang')->where('id', $id)->delete();
        return redirect('/live_search');
    }

    function liveSearch(){
        if(!Session::get('user')){
            return redirect('/');
        }
        else{
            return view('/live_search');
        }
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('barang')
                ->where('kode', 'like', '%'.$query.'%')
                ->orWhere('nama', 'like', '%'.$query.'%')
                ->orWhere('jenis', 'like', '%'.$query.'%')
                ->orWhere('harga', 'like', '%'.$query.'%')
                ->get();
            }
            else
            {
                $data = DB::table('barang')
                ->orderBy('id', 'asc')
                ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr>
                    <td>'.$row->id.'</td>
                    <td>'.$row->kode.'</td>
                    <td>'.$row->nama.'</td>
                    <td>'.$row->jenis.'</td>
                    <td>'.$row->harga.'</td>
                    <td><a href="edit/'.$row->id.'">EDIT</a></td>
                    <td><a href="delete/'.$row->id.'">DELETE</a></td>
                    </tr>
                    ';
                }
            }
            else
            {
                $output = '
                <tr>
                <td align="center" colspan="5">No Data Found</td>
                </tr>
                ';
            }
            $data = array(
            'table_data'  => $output,
            'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }

    function createUserForm(){
        return view('/createUser');
    }

    function registration(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required',
                'password'=>'required',
                'updated_at'=>'required',
                'created_at'=>'required',
            ]
        );
        DB::insert('INSERT INTO users(name, email, password, updated_at, created_at) 
            VALUES (?, ?, ?, ?, ?)',
        [$request->name, $request->email, Hash::make($request->password), $request->updated_at, 
         $request->created_at]);
        return redirect('/');
    }

    function login(){
        return view('/login');
    }

    function checklogin(Request $request)
    {
        $this->validate($request, [
        'email'   => 'required|email',
        'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
        'email'  => $request->get('email'),
        'password' => $request->get('password')
        );

        if(Auth::attempt($user_data))
        {
            $data = DB::table('users')->where('email', $request->email)->first();
            Session::put('user', $data->name);
            return redirect('/index');
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    function successlogin()
    {
        return view('/index');
    }
    
    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

}
