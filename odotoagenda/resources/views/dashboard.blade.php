<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Clínica Médica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos gerais */
        body {
            background-color: #f0f8ff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Estilização do painel lateral */
        .sidebar {
            background-color: #0d6efd;
            color: white;
            min-height: 100vh;
            padding: 15px;
            position: fixed;
            width: 250px;
            top: 0;
            left: 0;
            overflow-y: auto;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
        }

        .sidebar a:hover {
            background-color: #0b5ed7;
            border-radius: 5px;
        }

        /* Ajuste do conteúdo principal */
        .content {
            margin-left: 250px;
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .card {
            border-left: 5px solid #0d6efd;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .sidebar {
                width: 100px;
                text-align: center;
                padding: 10px;
            }

            .sidebar h3 {
                font-size: 14px;
                display: none;
            }

            .sidebar a {
                font-size: 12px;
                padding: 8px;
            }

            .content {
                margin-left: 100px;
                padding: 10px;
            }

            .table {
                display: none;
            }

            .list-group {
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- Painel lateral -->
    <nav class="sidebar">
        <h3 class="text-center my-3">Painel Médico</h3>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">🏠 Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/consultas">📋 Consultas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/agendar">📅 Agendar Consulta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/cadastro-paciente">👨‍⚕️ Cadastrar Paciente</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pacientes">👥 Lista de Pacientes</a>
            </li>
        </ul>
    </nav>

    <!-- Conteúdo principal -->
    <main class="content">
        <!-- Total de consultas -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total de Consultas</h5>
                <p class="card-text display-4">{{ $totalConsultas }}</p>
            </div>
        </div>

        <!-- Consultas Agendadas -->
        <div>
            <h2>Consultas Agendadas</h2>

            <!-- Tabela para desktop -->
            <div class="table-responsive d-none d-md-block">
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Paciente</th>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultas as $consulta)
                            <tr>
                                <td>{{ $consulta->id }}</td>
                                <td>{{ optional($consulta->paciente)->nome ?? 'Paciente não encontrado' }}</td>
                                <td>{{ date('d/m/Y', strtotime($consulta->data)) }}</td>
                                <td>{{ $consulta->hora }}</td>
                                <td>
                                    <a href="{{ route('consultas.edit', $consulta->id) }}" class="btn btn-info btn-sm">👁 Visualizar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Lista para celular -->
            <ul class="list-group d-md-none">
                @foreach ($consultas as $consulta)
                    <li class="list-group-item">
                        <strong>Paciente:</strong> {{ optional($consulta->paciente)->nome ?? 'Paciente não encontrado' }}<br>
                        <strong>Data:</strong> {{ date('d/m/Y', strtotime($consulta->data)) }}<br>
                        <strong>Hora:</strong> {{ $consulta->hora }}<br>
                        <a href="{{ route('consultas.edit', $consulta->id) }}" class="btn btn-info btn-sm mt-2">👁 Visualizar</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Pacientes Cadastrados -->
        <div>
            <h2>Pacientes Cadastrados</h2>

            <!-- Tabela para desktop -->
            <div class="table-responsive d-none d-md-block">
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pacientes as $paciente)
                            <tr>
                                <td>{{ $paciente->nome }}</td>
                                <td>{{ $paciente->cpf }}</td>
                                <td>{{ $paciente->email }}</td>
                                <td>{{ $paciente->telefone }}</td>
                                <td>
                                    <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ url('/pacientes/'.$paciente->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Lista para celular -->
            <ul class="list-group d-md-none">
    @foreach ($pacientes as $paciente)
        <li class="list-group-item">
            <strong>Nome:</strong> {{ $paciente->nome }}<br>
            <strong>CPF:</strong> {{ $paciente->cpf }}<br>
            <strong>Email:</strong> {{ $paciente->email }}<br>
            <strong>Telefone:</strong> {{ $paciente->telefone }}<br>
            <!-- Botões agora aparecem no celular -->
            <div class="mt-2">
                <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ url('/pacientes/'.$paciente->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </div>
        </li>
    @endforeach
</ul>

        </div>
    </main>
</body>
</html>
