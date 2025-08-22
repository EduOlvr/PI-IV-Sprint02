# Documentação da API - Gestão de Pacientes

Esta documentação descreve as rotas disponíveis na API do projeto PI-IV-Sprint02, responsável por gerenciar os dados de pacientes de uma clínica.

**URL Base da API:** `http://localhost:3000`

---

## Recurso: Pacientes (`/pacientes`)

Este recurso representa os pacientes da clínica e permite a consulta e criação de novos registros.

### 1. Listar todos os Pacientes

- **Método:** `GET`
- **Endpoint:** `/pacientes`
- **Descrição:** Retorna uma lista em formato JSON com todos os pacientes cadastrados no sistema.
- **Resposta de Sucesso (Código 200 OK):**
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

2. Buscar Paciente por ID

    Método: GET

    Endpoint: /pacientes/:id

    Parâmetros de URL:

        id (Obrigatório | Integer): O ID único do paciente a ser buscado.

    Exemplo de Requisição: GET http://localhost:3000/pacientes/1

    Resposta de Sucesso (Código 200 OK):

{
  "id": 1,
  "nome": "Carlos Silva",
  "cpf": "111.222.333-44",
  "dataNascimento": "1990-05-15"
}
