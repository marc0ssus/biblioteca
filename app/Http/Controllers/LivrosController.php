<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use Session;

class LivrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livro::all();
        return view('livro.index',array('livros' => $livros,'busca'=>null));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar(Request $request) {
        $livros = Livro::where('titulo','LIKE','%'.$request->input('busca').'%')->orwhere('email','LIKE','%'.$request->input('busca').'%')->get();
        return view('livro.index',array('livros' => $livros,'busca'=>$request->input('busca')));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'titulo' => 'required|min:3]',
            'descricao' => 'required',
            'autor' => 'required',
            'editora' => 'required',
            'ano' => 'required',
        ]);
        $livro = new livro();
        $livro->titulo = $request->input('titulo');
        $livro->email = $request->input('descricao');
        $livro->telefone = $request->input('autor');
        $livro->cidade = $request->input('editora');
        $livro->estado = $request->input('ano');
        if($livro->save()) {
            return redirect('livros');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livro = Livro::find($id);
        return view('livro.show',array('livro' => $livro));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livro = Livro::find($id);
        return view('livro.edit',array('livro' => $livro));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'titulo' => 'required|min:3]',
            'descricao' => 'required',
            'autor' => 'required',
            'editora' => 'required',
            'ano' => 'required',
        ]);

        $livro = Livro::find($id);
        $livro->titulo = $request->input('titulo');
        $livro->email = $request->input('descricao');
        $livro->telefone = $request->input('autor');
        $livro->cidade = $request->input('editora');
        $livro->estado = $request->input('ano');
        if($livro->save()) {
            Session::flash('mensagem','Livro alterado com sucesso');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livro = Livro::find($id);
        $livro->delete();
        Session::flash('mensagem','Livro excluído com Sucesso');
        return redirect(url('livros/'));
    }
}