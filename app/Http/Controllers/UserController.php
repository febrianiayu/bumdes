<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Toko;
use App\TokoDetail;


class UserController extends Controller
{   
    //Fungsi memanggil form tambah petugas
    public function addPetugas()
    {
    	return view ('user.tambah');
    }
    //Fungsi menyimpan tambah petugas
    public function savePetugas(Request $request)
    {
       


        $user= new User;
        
        $user->name = $request->name;
        $user->role = "petugasbumdes";
        $user->email = $request->email;
        $user->password = bcrypt ($request->password);

        $user->save();

        return redirect('/tampil_petugas');

    }
    //Fungsi untuk menampilkan
    public function index()
    {
    	$data=User::where('role','=','petugasbumdes')->get();
    	return view ('user.tampil')->with('user',$data);
    }

    public function editPetugas($id)
    {
        $data= User::find($id);
        return view ('user.edit')->with('user',$data);
    }

    
    public function updatePetugas (Request $request,$id)
    {

        $user=User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        

        $user->save();

        return redirect('/tampil_petugas');

    }

    public function deletePetugas($id)
    {
        $user= User::findOrFail($id);
        $user -> delete();
        return redirect('/tampil_petugas');
    }
    public function addPetugasToko()
    {
        $data=Toko::all();
        return view ('petugasToko.tambah')->with('toko',$data);
    }
    //Fungsi menyimpan tambah petugas
    public function savePetugasToko(Request $request)
    {

        $user= new User;
        
        $user->name = $request->name;
        $user->role = "petugastoko";
        $user->email = $request->email;
        $user->password= bcrypt ($request->password);

        $user->save();
        return redirect('/tampil_petugasToko');

    }
    //Fungsi untuk menampilkan
    public function indexPetugasToko()
    {
        $data=User::where('role','=','petugastoko')->get();
        return view ('petugasToko.tampil')->with('user',$data);
    }

    public function editPetugasToko($id)
    {
        $data=User::find($id);
        return view ('petugasToko.edit')->with('user',$data);
    }

    
    public function updatePetugasToko (Request $request,$id)
    {
        
        $user=User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password= $request->password;
        

        $user->save();

        return redirect('/tampil_petugasToko');

    }

    public function deletePetugasToko($id)
    {
        $user= User::findOrFail($id);
        $user -> delete();
        return redirect('/tampil_petugasToko');
    }
   
    public function resetPassword($id)
    {
        $data =User::find($id);
        $data->password=bcrypt('passwordbaru');
        $data->save();
        if($data->role == 'petugasbumdes'){
             return redirect('/tampil_petugas');
         } else {
             return redirect('/tampil_petugasToko');
         }
    }
    public function editProfilBumdes($id)
    {
        $data= User::find($id);
        return view ('user.profilBumdes')->with('user',$data);
    }
    public function updateProfilBumdes(Request $request,$id)
    {
        $data= User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        if($request->password == ''){
        }
        else {
            $data->password =  bcrypt ($request->password);
        }
        $data->save();

        return redirect('profilBumdes/' .$id. '');
    }
     public function editProfilToko($id)
    {
        $data= User::find($id);
        return view ('user.profilToko')->with('user',$data);
    }
    public function updateProfilToko(Request $request,$id)
    {
        $data= User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        if($request->password == ''){
        }
        else{
            $data->password = bcrypt ($request->password);
        }
        $data->save();

        return redirect('profilToko/' .$id. '');
    }
    
   
   

}
