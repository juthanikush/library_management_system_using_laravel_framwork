<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class LibrayController extends Controller
{
    
    public function login(Request $request)
    {
        // $password=Crypt::encryptString($request->post('password'));
        // $data=array(
        //     'name'=>$request->post('username'),
        //     'password'=>$password
        // );

         //DB::table('admin_login')->insert($data);
         //return view('admin.admin_login');
         $username=$request->post('username');
         $password=$request->post('password');

         $result=DB::table('admins')->where(['name'=>$username])->get();

         if($result){
             $pass=Crypt::decryptString($result[0]->password);
             if($password==$pass){
                 $request->session()->put('LIBRARY_LOGIN','yes');
                 return redirect('libaryan_deshboard');
             }
             else{
                 $request->session()->flash('error',"Place Enter Correct Details");
                 return redirect('libaryan_login');
             }
         }else{
             $request->session()->flash('error',"Place Enter Correct Details");
             return redirect('libaryan_login');
         }
        
    }

   
    public function add_book(Request $request)
    {
        
        // if($id>0){
        //     $model=Admin::find($request->post('id'));
        //     $mes="Updated Libaryan";
        // }else{
        //     $model = new Admin();
        //     $mes="Add Libaryan";
        // }
        // $password=$encrptpass=Crypt::encryptString($request->post('password'));
        // $model->name=$request->post('name');
        // $model->password=$password;
        // $model->city=$request->post('city');
        // $model->addres=$request->post('address');
        // $model->contact_us=$request->post('contact');
        // $model->save();
        // $request->session()->flash('message',$mes);
        // return redirect('admin/admin_deshboard');

        
        $data=array(
            'call_no'=>$request->post('call_no'),
            'name'=>$request->post('name'),
            'Auth'=>$request->post('auth'),
            'publishar'=>$request->post('publi'),
            'qty'=>$request->post('qty')
        );
        DB::table('add_book')->insert($data);
        $request->session()->flash("message","Book add");
        return redirect('libaryan_deshboard');
    }

    
    public function view_books(Request $request)
    {
        $result['data']=DB::table('add_book')->get();
        return view('libaryan.view_books',$result);
    }

    
    public function delete(Request $request,$id)
    {
        DB::table('add_book')->where('id',$id)->delete();
        $request->session()->flash("message","Book Delete");
        return redirect('libaryan_deshboard');
    }

    
    public function edit(Request $request,$id)
    {
        $result['data']=DB::table('add_book')->where('id',$id)->get();
        return view('libaryan.edit',$result);
        
    }

    
    public function update(Request $request)
    {
        $id=$request->post('id');
        $data=array(
            'call_no'=>$request->post('call_no'),
            'name'=>$request->post('name'),
            'Auth'=>$request->post('auth'),
            'publishar'=>$request->post('publi'),
            'qty'=>$request->post('qty')
        );
        DB::table('add_book')->where('id',$id)->update($data);
        $request->session()->flash("message","Book Update");
        return redirect('libaryan_deshboard');
    }

    
    public function issue_book(Request $request)
    {
        $id=$request->post('book_no');
        $data=array(
            'book_call_no'=>$request->post('book_no'),
            'student_id'=>$request->post('stuid'),
            'student_name'=>$request->post('stuname'),
            'student_contact'=>$request->post('stucontact')
        );
        DB::table('issue_book')->insert($data);

        $data1=DB::table('add_book')->where('call_no',$id)->value('qty');
        $data2=array('qty'=>--$data1);
        DB::table('add_book')->where('call_no',$id)->update($data2);
        $request->session()->flash("message","Book Issue");
        return redirect('libaryan_deshboard');
    }
    public function view_issue_books(Request $request)
    {
        $result['data']=DB::table('issue_book')->get();
        return view('libaryan.view_issue_books',$result);
        
    }
    public function return_book(Request $request)
    {
        $callno=$request->post('call_no');
        $stuid=$request->post('stuid');
        $res=DB::table('issue_book')->where('book_call_no',$callno)->where('student_id',$stuid)->delete();
        if($res){
            $data1=DB::table('add_book')->where('call_no',$callno)->value('qty');
            $data2=array('qty'=>++$data1);
            DB::table('add_book')->where('call_no',$callno)->update($data2);
            
            $request->session()->flash("message","Book Return");
            return redirect('libaryan_deshboard');
        }
        $request->session()->flash("message","Place Enter correct details");
        return view('libaryan/return_books');
        
    }
    
    
}
