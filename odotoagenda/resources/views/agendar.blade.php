<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Consulta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Voltar ao Painel</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Agendar Consulta</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('/agendar') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nome do Paciente:</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Data:</label>
                        <input type="date" name="data" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hora:</label>
                        <input type="time" name="hora" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Agendar</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
