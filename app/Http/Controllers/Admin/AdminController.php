<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // $password=Crypt::encryptString($request->post('password'));
        // $data=array(
        //     'name'=>$request->post('username'),
        //     'password'=>$password
        // );
        // DB::table('admin_login')->insert($data);
        // return view('admin.admin_login');

        $username=$request->post('username');
        $password=$request->post('password');

        $result=DB::table('admin_login')->where(['name'=>$username])->get();
        if($result){
            $pass=Crypt::decryptString($result[0]->password);
            if($password==$pass){
                $request->session()->put('ADMIN_LOGIN','yes');
                return view('admin.admin_deshboard');
            }
            else{
                $request->session()->flash('error',"Place Enter Correct Details");
                return view('admin.login');
            }
        }else{
            $request->session()->flash('error',"Place Enter Correct Details");
            return view('admin.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_library(Request $request,$id="")
    {
        if($id>0){
            $model=Admin::find($request->post('id'));
            $mes="Updated Libaryan";
        }else{
            $model = new Admin();
            $mes="Add Libaryan";
        }
        $password=$encrptpass=Crypt::encryptString($request->post('password'));
        $model->name=$request->post('name');
        $model->password=$password;
        $model->city=$request->post('city');
        $model->addres=$request->post('address');
        $model->contact_us=$request->post('contact');
        $model->save();
        $request->session()->flash('message',$mes);
        return redirect('admin/admin_deshboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {
        $result['data']=Admin::all();
        return view('admin/show_library',$result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
        $model=Admin::find($id);
        $model->delete();
        $request->session()->flash('message','Account Delete');
        return redirect('admin/admin_deshboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
