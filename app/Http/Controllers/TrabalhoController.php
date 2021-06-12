<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\TrabalhoModel;
use App\EventoModel;
use App\User;
use App\Http\Requests\TrabalhoRequest;

class TrabalhoController extends Controller{

    public function createTrabalho(TrabalhoRequest $data){

        $Apelido = $data['Apelido'];
        $eventos = EventoModel::where('Apelido', '=', $Apelido)->get()->first();

        //auth()->user()->id 
        
        if ($data->hasFile('trabalhoPdf') && $data->file('trabalhoPdf')->isValid() 
            && $data->hasFile('diarioPdf') && $data->file('diarioPdf')->isValid()) {

            $nameTrab = uniqid(date('HisYmd'));
            $extensionTrab = request()->file('trabalhoPdf')->extension();
            $nameFileTrab = "{$nameTrab}.{$extensionTrab}";
            $uploadTrabalho = request()->file('trabalhoPdf')->storeAs('trabalhos', $nameFileTrab);

            $nameDia = uniqid(date('HisYmd'));
            $extensionDia = request()->file('diarioPdf')->extension();
            $nameFileDia = "{$nameDia}.{$extensionDia}";
            $uploadDiario = request()->file('diarioPdf')->storeAs('diarios', $nameFileDia);
            

            TrabalhoModel::create([
                'idEvento' => $eventos['idEvento'],
                'idUser' => auth()->user()->id,
                'autor' => $data['autor'],
                'coautores' => $data['coautores'],
                'nome' => $data['nome'],
                'linkVid' => $data['linkVid'],
                'trabalhoPdf' => $uploadTrabalho,
                'diarioPdf' => $uploadDiario,
            ]);

            return redirect()->route('showEvent', [$Apelido]);

        }else{
            return redirect()->route('showForm_create_trabalho')->withErrors();
        }

    }

    public function showFormTrabalho($Apelido) {
        
        return view('trabalho.TrabalhoForm', compact('Apelido'));

    }

}


