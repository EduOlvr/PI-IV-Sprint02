````markdown
# Documentação da API - Gestão de Pacientes

**URL Base da API:** `http://localhost:3000`

---

## Recurso: Pacientes (/pacientes)

### 1. Listar todos os Pacientes

```http
GET /pacientes
````

```json
[
  {
    "id": 1,
    "nome": "Carlos Silva",
    "cpf": "111.222.333-44",
    "dataNascimento": "1990-05-15"
  },
  {
    "id": 2,
    "nome": "Maria Oliveira",
    "cpf": "555.666.777-88",
    "dataNascimento": "1985-10-20"
  }
]
```

### 2. Buscar Paciente por ID

```http
GET /pacientes/:id
```

```json
{
  "id": "Obrigatório | Integer"
}
```

```http
Exemplo de Requisição:
GET http://localhost:3000/pacientes/1
```

```json
Resposta 200 OK:
{
  "id": 1,
  "nome": "Carlos Silva",
  "cpf": "111.222.333-44",
  "dataNascimento": "1990-05-15"
}
```

```json
Resposta 404 Not Found:
{
  "message": "Paciente não encontrado."
}
```

### 3. Cadastrar Novo Paciente

```http
POST /pacientes
```

```json
Corpo da Requisição:
{
  "nome": "Joana Mendes da Silva",
  "cpf": "123.456.789-00",
  "dataNascimento": "1995-11-22"
}
```

```json
Resposta 201 Created:
{
  "message": "Paciente cadastrado com sucesso!",
  "paciente": {
    "id": 3,
    "nome": "Joana Mendes da Silva",
    "cpf": "123.456.789-00",
    "dataNascimento": "1995-11-22"
  }
}
```

```json
Resposta 400 Bad Request:
{
  "message": "Dados incompletos. Nome, CPF e data de nascimento são obrigatórios."
}


