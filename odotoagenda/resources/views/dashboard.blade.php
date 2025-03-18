<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Clínica Médica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados */
        body {
            background-color: #f0f8ff; /* Azul muito claro */
        }
        .sidebar {
            background-color: #0d6efd; /* Azul profissional */
            min-height: 100vh;
            color: white;
        }
        .sidebar a {
            color: white;
        }
        .sidebar a:hover {
            background-color: #0b5ed7; /* Azul mais escuro */
            border-radius: 5px;
        }
        .top-bar {
            background-color: #0d6efd;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .card {
            border-left: 5px solid #0d6efd;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Menu lateral -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="position-sticky">
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
                </div>
            </nav>

            <!-- Conteúdo principal -->
            <main class="col-md-10 ms-sm-auto px-md-4">
                <div class="top-bar">
                    <h1>Dashboard da Clínica</h1>
                </div>

                <!-- Total de consultas -->
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Total de Consultas</h5>
                        <p class="card-text display-4">{{ $totalConsultas }}</p>
                    </div>
                </div>

                <!-- Tabela de Consultas -->
                <div class="mt-4">
                    <h2>Consultas Agendadas</h2>
                    <table class="table table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Nome do Paciente</th>
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
                                        <form action="{{ url('/consultas/' . $consulta->id) }}" method="POST">
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

                <!-- Lista de Pacientes -->
                <div class="mt-4">
                    <h2>Pacientes Cadastrados</h2>
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
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
