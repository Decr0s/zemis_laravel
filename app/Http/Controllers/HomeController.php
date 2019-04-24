<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Foto;
use App\User;

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
        return view('home');
    }

    public function itens(){

         $user = User::findOrFail(auth()->user()->id);

        $fotos = $user->fotos()->latest()->paginate(6);

        return view('itens', compact('fotos'))->with('i', (request()->input('page', 1) - 1) * 6);

    }

   public function create(){
    return view('add');
   } 


   public function edit($id){
        $foto = Foto::find($id);

        return view('edit', compact('foto', 'id'));
   }

   public function update(Request $request, $id){

    $this->validate($request,[
        'legend' => 'required'
    ]);

    $foto = Foto::find($id);
    $foto->legenda = $request->get('legend');
    $foto->save();
    return redirect('itens')->with('success', 'Legenda atualizada com sucesso!');

   }



   public function store(Request $request){

    $this->validate($request, [

        'legend' => 'required',
        'foto' => 'required|image|max:2048'
    ]);

    $foto = $request->file('foto');

    $novo_nome = rand() . '.' . $foto->getClientOriginalExtension();
    $foto->move(public_path('images'), $novo_nome);
    //$userId = Auth::id();

    $dados = array(
        'legenda' => $request->legend,
        'foto' => $novo_nome,
        'id_user' =>  auth()->user()->id

    );     
    Foto::create($dados);
    return redirect('add')->with('success', 'Sua foto enviada com sucesso!');

   }


    public function destroy($id){

          $foto = Foto::find($id);
          $foto->delete();
          
          return redirect('itens')->with('success', 'Foto deleta com sucesso!');
    }

}
