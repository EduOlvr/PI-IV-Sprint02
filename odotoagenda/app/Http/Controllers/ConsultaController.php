<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\Paciente;

class ConsultaController extends Controller
{
    public function create()
    {
        // Buscar todos os pacientes cadastrados
        $pacientes = Paciente::all();
        return view('agendar', compact('pacientes'));
    }

    public function store(Request $request)
    {
        
    
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'data_consulta' => 'required|date',
            'hora_consulta' => 'required|date_format:H:i',
        ]);
    
        Consulta::create([
            'paciente_id' => $request->paciente_id,
            'data' => $request->data_consulta,
            'hora' => $request->hora_consulta,
        ]);
    
        return redirect('/')->with('success', 'Consulta agendada com sucesso!');
    }
    


    // Rota para retornar os dados do paciente via AJAX
    public function getPaciente($id)
    {
        $paciente = Paciente::findOrFail($id);
        return response()->json($paciente);
    }
    public function index()
{
    $consultas = Consulta::with('paciente')->get(); // Carrega as consultas com os pacientes
    $totalConsultas = Consulta::count();
    $pacientes = Paciente::all();

    return view('dashboard', compact('consultas', 'totalConsultas', 'pacientes'));
}
public function buscarPaciente($cpf) // buscar o paciente pelo CPF
{
    $paciente = Paciente::where('cpf', $cpf)->first();

    if ($paciente) {
        return response()->json($paciente);
    } else {
        return response()->json(null, 404);
    }
}


}
