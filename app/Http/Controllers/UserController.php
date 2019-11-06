<?php

namespace App\Http\Controllers;

use Response;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Branches;
use App\Customers;
use App\User;
use Auth;
class UserController extends Controller
{
   
       /**
     * Dashboard
     */
    public function dashboardView(){
        return view ('user/Dashboard');
    }
    
    public function getDashboardData(){
        $codebranch=Auth::user()->branch;
        $branch = Branches::count();
        $customer = Customers::where('BRANCH', 'like', '%'.$codebranch.'%')->count();
        $lockcustomer = Customers::where('LOCK_STATUS', 1)->where('BRANCH', 'like', '%'.$codebranch.'%')->count();
        $unlockcustomer = Customers::where('LOCK_STATUS', 0)->where('BRANCH', 'like', '%'.$codebranch.'%')->count();
        $datadashboard = array('branch'=>$branch, 'customer'=>$customer, 'lockcustomer'=>$lockcustomer, 'unlockcustomer'=>$unlockcustomer);
        return json_encode($datadashboard);
    }


    public function customerView(){
        return view ('user/DataCustomer');
    }

    public function getDataCustomer(){
        $codebranch=Auth::user()->branch;
        return DataTables()->of(Customers::where('BRANCH', 'like', '%'.$codebranch.'%')->get())
        ->editColumn('lock_status', function($data){
            if ($data->lock_status ==1){
                return '<span class="label label-danger">&nbsp;&nbsp;&nbsp;<b>'."LOCKED".'</b>&nbsp;&nbsp;&nbsp;</span>';
            } 
                return '<span class="label label-success"><b>'."UNLOCKED".'</b></span>';
        })
        ->addColumn('aksi', function($data){
            $link='';
            if($data->lock_status ==1){
                $link.='<a href="javascript:void(0);" class="btn-sm btn-success" 
                 data-toggle="tooltip" id="unlockbutton" idcus="'.$data->id.'"><i class="fa fa-check"></i> Unlock</a><br><br>';  
            } else {
                $link.=' <a href="" class="btn-sm btn-success"><i class="fa fa-check"></i> Unlock</a><br><br>';
            }

            if($data->lock_status ==1){
                $link.='<a href="" class="btn-sm btn-danger"><i class="mdi mdi-block-helper"></i> Lock&nbsp;&nbsp;&nbsp;&nbsp;</a>';
            }else{
                $link.='<a href="javascript:void(0);" class="btn-sm btn-danger"  
                data-toggle="tooltip" id="lockbutton" idcus="'.$data->id.'"><i class="mdi mdi-block-helper"></i> Lock&nbsp;&nbsp;&nbsp;&nbsp;</a>';
            }
            return $link;
        })
        ->addColumn('detail', function($data){
            $link = '<div class="btn-group"><a href="javascript:void(0);"
             id="detail-customer" data-id="'.$data->id.'" class="btn-sm btn-primary">
             <i class="fas fa-align-justify"></i>  Detail  </a>';
            $link .= '&nbsp</div>';
            return $link;
        })
        ->rawColumns(['aksi', 'lock_status', 'detail'])
        ->make(true);
    
    }

    public function getDataCustomerUpdate ($idcustomer){
        return Customers::where('ID', '=', $idcustomer)->first();
    }

   
    /**
     * Update Password 
     */

     /**
      * Update Password View
      */
      public function updatePassView(){
        return view ('user.UpdatePasswordForm');
    }

    /**
     * Update Password
     */
    public function updatePassword(Request $req){    
        if (!Hash::check($req->lastpass, Auth::user()->password)){
             return response()->json([
                    'error' => 'Password Salah !'
                ]);
        }
        if(strcmp($req->lastpass, $req->newpass)==0){
            return response()->json([
                'error' => 'Password Baru Tidak Boleh Sama Dengan Password Lama !'
            ]); 
        }
        $user = Auth::user();
        $user->password=Hash::make($req->newpass);
        $user->save();
        if (! $user)  {
            return response()->json([
                'error' => 'Update Password Gagal !'
            ]); 
          } else {
            return response()->json([
                'error' => 'Update Password Berhasil !'
            ]); 
          }
         
    }

        /**
     * Update Status Lock
     */
    public function updateLockStatus(Request $req){
        $validator = Validator::make($req->all(), [
            'file' =>'required|image|mimes:pdf|max:2048',
        ]);
        if ($validator->passes()){
            $input=$req->all();
            $input['file']=time().'.'.$req->fileupload->getClientOriginalExtension();
            $req->fileupload->move(public_path('file'), $input['file']);
            $user=Users::where('id', $req->idcus)->first();
            $user->lock_status = 1;
            if ($req && $user){
                return response()->json(['pesan'=>'Berhasil Mengubah Status Lock']);
            }
        }else {
            return response()->json(['pesan'=>$validator->errors()->all()]);
        }
    }

     /**
      * Update Status Unlock
      */
    public function updateUnlockStatus(){
        $validator = Validator::make($req->all(), [
            'file' =>'required|image|mimes:pdf|max:2048',
        ]);
        if ($validator->passes()){
            $input=$req->all();
            $input['file']=time().'.'.$req->fileupload->getClientOriginalExtension();
            $req->fileupload->move(public_path('file'), $input['file']);
            $user=Users::where('id', $req->idcus)->first();
            $user->lock_status = 0;
            if ($req && $user){
                return response()->json(['pesan'=>'Berhasil Mengubah Status Lock']);
            }
        }else {
            return response()->json(['pesan'=>$validator->errors()->all()]);
        }
    }


    

    
    public function updateStatusLock($codebranch){

        $data = Customers::where ('LOCAL_CODE', 'like', '%'.$codebranch.'%')->get();
        foreach ($data as $dt){
            $dt->LOCK_STATUS = 1;
            $dt->save();
            if (!$dt){
                $updt = false;
                break;

            } else{
                $updt = true;
            }
        }
        if (!$updt){
            return Response::json('UPDATING LOCK STATUS FAIL !');
        }
        return Response::json('UPDATING LOCK STATUS OK !');
    }


    public function updateStatusUnlock($codebranch){

        $data = Customers::where ('LOCAL_CODE', 'like', '%'.$codebranch.'%')->get();
        foreach ($data as $dt){
            $dt->LOCK_STATUS = 0;
            $dt->save();
            if (!$dt){
                $updt = false;
                break;

            } else{
                $updt = true;
            }
        }
        if (!$updt){
            return Response::json('UPDATING UNLOCK STATUS FAIL !');
        }
        return Response::json('UPDATING UNLOCK STATUS OK !');
    }
   
  
    


  
    }
