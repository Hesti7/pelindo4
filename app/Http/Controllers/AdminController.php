<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branches;
use App\Customers;
use App\User;
use Hash;
use Alert;
use Auth;
use Response;
use DataTables;
use DB;
use App\Lock_logs;


class AdminController extends Controller
{
 
    /**
     * Dashboard
     */
    public function dashboardView(){
        return view ('admin/Dashboard');
    }
    
    public function getDashboardData(){
        $branch = Branches::count();
        $customer = Customers::count();
        $lockcustomer = Customers::where('LOCK_STATUS', 1)->count();
        $unlockcustomer = Customers::where('LOCK_STATUS', 0)->count();
        $datadashboard = array('branch'=>$branch, 'customer'=>$customer, 'lockcustomer'=>$lockcustomer, 'unlockcustomer'=>$unlockcustomer);
        return json_encode($datadashboard);
    }
    
   
    /**
     * Customer Data
     */
    public function customerView(){
        return view ('admin.DataCustomer');
    }
    public function getDataCustomers(){

        return DataTables()->of(Customers::all())
        ->editColumn('lock_status', function($data){
            if ($data->lock_status ==1){
                return '<span class="label label-danger">&nbsp;&nbsp;&nbsp;<b>'."LOCKED".'</b>&nbsp;&nbsp;&nbsp;</span>';
            } 
                return '<span class="label label-success"><b>'."UNLOCKED".'</b></span>';
        })
        ->addColumn('aksi', function($data){
            $link = '<div class="btn-group"><a href="javascript:void(0);"
             id="detail-customer" data-id="{{$data->local_code}}" class="btn-sm btn-primary">
             <i class="fas fa-align-justify"></i>  Detail  </a>';
            $link .= '&nbsp</div>';
            return $link;
        })
        ->rawColumns(['aksi', 'lock_status'])
        ->make(true);
    }


    /**
     * Detail Customer 
     */

    public function getDetailCustomer($localcode){
        return DataTables()->of( Lock_logs::where('REMARK', 'like', '%local%')->where('DATA', 'like', '%'.$localcode.'%')->get()->make(true));
    }

    
    /**
     * Data Branch
     */
    public function getDataBranch(){
        return Branches::all();
    }


    /**
     * Data User
     */

     /**
      * User View
      */
     public function userView(){
         return view ('admin/DataUser');
     }

     /**
      * Get Data User
      */
    public function getDataUser(){     
        return DataTables()->of($datauser= DB::table('users')->join('branches', 'users.branch', '=', 'branches.code')
        ->select('users.id as iduser', 'users.name', 'users.email', 'users.role', 'branches.name as branchname')
        ->get())
        ->addColumn('aksi', function($datauser){
            $link = '<div class="btn-group"><a href="javascript:void(0);"
             id="reset-user" data_id="'.$datauser->iduser.'"class="btn-sm btn-warning">
             <i class="fas fa-align-justify"></i>  Reset  </a>';
            $link .= '&nbsp&nbsp</div>';
            $link .=  '<div class="btn-group"><a href="javascript:void(0);"
            id="delete-user" data_id="'.$datauser->iduser.'"class="btn-sm btn-danger">
            <i class="fas fa-align-justify"></i>  Delete  </a>';
           $link .= '&nbsp</div>';
            return $link;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }


     /**
      *  Insert User
      */
    public function insertUser(Request $req){
        $user = new User;
        if (strcmp($req->pbaru, $req->repbaru)==0){
            $user->name = $req->nama;
            $user->password = Hash::make($req->pbaru);
            $user->email = $req->email;
            $user->branch = $req->cabang;
            $user->role = $req->hakakses;
            if ($user->save()){
                return response()->json([
                    'status'     => 'success',
                    'nama'     => $user->name
                ]);
            } else {
                return response()->json([
                    'status'     => 'gagal',
                    'nama'     => $user->name
                ]);
            } 
        } else {
            return response()->json([
                'status'     => 'pass'
            ]);
        } 
    }

    /**
     * Delete User
     */

    public function deleteUser($iduser){
        $us = User::find($iduser);
        if (is_null($us)){
            return response()->json([
                'pesan'     => 'DATA TIDAK DITEMUKAN'
            ]);
        }    
        $del = $us->delete();
        if (!$del){
            return response()->json([
                'pesan'     => 'HAPUS USER GAGAL'
            ]);
        }else{
            return response()->json([
                'pesan'     => 'HAPUS USER BERHASIL'
            ]);
        }
      }
    
      /**
       * Reset User
       */
      public function resetUser($iduser){
          $us = User::find($iduser);
          if(is_null($us)){
              return response()->json(['pesan'=>'DATA TIDAK DITEMUKAN']);
          }

          $usr = User::where('id', $iduser)->first();
          $usr->password =Hash::make($usr->email);
          $usr->save();
          if (! $usr)  {
            return response()->json([
                'pesan' => 'Reset Password Gagal !'
            ]); 
          } else {
            return response()->json([
                'pesan' => 'Reset Password Berhasil !'
            ]); 
          }

          
      }

    /**
     * Update Password 
     */

     /**
      * Update Password View
      */
    public function updatePassView(){
        return view ('admin.UpdatePasswordForm');
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


    

    




   


}
