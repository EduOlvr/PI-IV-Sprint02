<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta; // Certifique-se de que essa linha existe!


class ConsultaController extends Controller
{
    public function create()
    {
        return view('agendar');
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'data' => 'required|date',
            'hora' => 'required'
        ]);

        // Criar nova consulta no banco de dados
        Consulta::create([
            'nome' => $request->nome,
            'data' => $request->data,
            'hora' => $request->hora
        ]);

        return redirect('/')->with('success', 'Consulta agendada com sucesso!');
    }

    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->delete();
        
        return redirect('/consultas')->with('success', 'Consulta excluída com sucesso!');

    }
    public function index()
    {
        // Busca todas as consultas ordenadas por data e hora
        $consultas = Consulta::orderBy('data', 'asc')->orderBy('hora', 'asc')->get();

        // Retorna a view 'consultas' e envia os dados
        return view('consultas', compact('consultas'));
    }
}
