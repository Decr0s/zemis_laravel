<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Foto;
use App\User;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $usuario = User::findOrFail(auth()->user()->id);
        $id = $usuario->id;

        return view('perfil',compact('usuario', 'id'));
    }

    public function update(Request $request, $id){
        
   
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'. auth()->user()->id,
            
            
        ]);

        $user = User::find($id);

      
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();

        return redirect('perfil')->with('success', 'Dados atualizados!');
    }


    public function Changepass(){
    
        return view('changepass');
    }    

    public function ChangePassword(Request $request){
        

        if (!(Hash::check($request->get('current-password'), auth()->user()->password))) {
           
            return redirect()->back()->with("error","Sua senha atual não corresponde à senha que você forneceu. Por favor, tente novamente.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        
            return redirect()->back()->with("error","Sua senha não pode ser a mesma da atual. Escolha outra senha.");
        }


        $this->validate($request, [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::find(auth()->user()->id);
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect('changepass')->with('success', 'Senha alterada com sucesso');
    }


}
