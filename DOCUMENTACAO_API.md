# Documentação da API - Gestão de Pacientes

**URL Base da API:** `http://localhost:3000`

---

## Recurso: Pacientes

O recurso `pacientes` permite gerenciar o cadastro de pacientes no sistema.

---

### 1. Listar todos os Pacientes

Retorna uma lista com todos os pacientes cadastrados no sistema.

```http
GET /pacientes
```

**Resposta `200 OK`:**
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

---

### 2. Buscar Paciente por ID

Retorna os dados de um paciente específico com base no seu `id`.

```http
GET /pacientes/:id
```

**Parâmetros da URL:**
- `:id` (Obrigatório | Integer): O ID único do paciente.

**Exemplo de Requisição:**
```http
GET http://localhost:3000/pacientes/1
```

**Respostas Possíveis:**

**`200 OK` (Sucesso):**
```json
{
  "id": 1,
  "nome": "Carlos Silva",
  "cpf": "111.222.333-44",
  "dataNascimento": "1990-05-15"
}
```

**`404 Not Found` (Erro - Paciente não encontrado):**
```json
{
  "message": "Paciente não encontrado."
}
```

---

### 3. Cadastrar Novo Paciente

Cria um novo paciente no sistema.

```http
POST /pacientes
```

**Corpo da Requisição (Body):**
```json
{
  "nome": "Joana Mendes da Silva",
  "cpf": "123.456.789-00",
  "dataNascimento": "1995-11-22"
}
```

**Respostas Possíveis:**

**`201 Created` (Sucesso):**
```json
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

**`400 Bad Request` (Erro - Dados incompletos):**
```json
{
  "message": "Dados incompletos. Nome, CPF e data de nascimento são obrigatórios."
}
```

---

### 4. Atualizar Paciente Existente

Modifica os dados de um paciente já cadastrado, identificado pelo seu `id`.

```http
PUT /pacientes/:id
```

**Parâmetros da URL:**
- `:id` (Obrigatório | Integer): O ID do paciente a ser atualizado.

**Corpo da Requisição (Body):**
```json
{
  "nome": "Carlos Silva Santos",
  "cpf": "111.222.333-44",
  "dataNascimento": "1990-05-15"
}
```

**Respostas Possíveis:**

**`200 OK` (Sucesso):**
```json
{
  "message": "Paciente atualizado com sucesso!",
  "paciente": {
    "id": 1,
    "nome": "Carlos Silva Santos",
    "cpf": "111.222.333-44",
    "dataNascimento": "1990-05-15"
  }
}
```

**`404 Not Found` (Erro - Paciente não encontrado):**
```json
{
  "message": "Paciente não encontrado."
}
```

**`400 Bad Request` (Erro - Dados incompletos):**
```json
{
  "message": "Dados incompletos para atualização."
}
```

---

### 5. Deletar Paciente

Remove um paciente do sistema com base no seu `id`.

```http
DELETE /pacientes/:id
```

**Parâmetros da URL:**
- `:id` (Obrigatório | Integer): O ID do paciente a ser deletado.

**Exemplo de Requisição:**
```http
DELETE http://localhost:3000/pacientes/2
```

**Respostas Possíveis:**

**`200 OK` (Sucesso):**
```json
{
  "message": "Paciente deletado com sucesso."
}
```

**`404 Not Found` (Erro - Paciente não encontrado):**
```json
{
  "message": "Paciente não encontrado."
}
```
---