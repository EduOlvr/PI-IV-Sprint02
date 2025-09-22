# Projeto Integrado IV - Sprint 02 (API RESTful ) - Sprint 03 (Relatório de testes de software)

Este projeto consiste na criação de uma API RESTful para um sistema de gestão de pacientes. A API é a fundação do sistema, responsável por manipular e servir os dados dos pacientes.

Este entregável (EP2) foca na criação e documentação da API funcional, que servirá de base para futuras integrações com a interface do usuário (front-end).

## Como Executar a API Localmente

Para testar a API, siga os passos abaixo.

### 🔧 Pré-requisitos

- <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/nodejs/nodejs-original.svg" alt="Node.js" width="20"/> [Node.js](https://nodejs.org/) (versão 18 ou superior)  
- <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/npm/npm-original-wordmark.svg" alt="npm" width="20"/> [npm](https://www.npmjs.com/) (instalado junto com o Node.js)  
- <img src="https://raw.githubusercontent.com/get-icon/geticon/master/icons/postman.svg" alt="Postman" width="20"/> [Postman](https://www.postman.com/) ou <img src="https://raw.githubusercontent.com/get-icon/geticon/master/icons/insomnia.svg" alt="Insomnia" width="20"/> [Insomnia](https://insomnia.rest/)  


### Instruções de Execução

1.  Clone o repositório para a sua máquina.

2.  Navegue até a pasta da API através do terminal:
    ```bash
    cd api
    ```

3.  Instale as dependências necessárias:
    ```bash
    npm install
    ```

4.  Inicie o servidor da API:
    ```bash
    node index.js
    ```

5.  O servidor estará rodando e pronto para receber requisições em `http://localhost:3000`.

## Documentação e Exemplos de Teste

A documentação completa das rotas, com detalhes sobre os endpoints, métodos, parâmetros e exemplos de resposta, pode ser encontrada no arquivo: **[DOCUMENTACAO_API.md](DOCUMENTACAO_API.md)**.

### Exemplo Rápido: Cadastrar um novo paciente via Postman

1.  **Método:** `POST`
2.  **URL:** `http://localhost:3000/pacientes`
3.  **Body:** Vá para a aba `Body`, selecione `raw` e `JSON`. Cole o seguinte:
    ```json
    {
      "nome": "José Alves",
      "cpf": "321.654.987-00",
      "dataNascimento": "1988-07-10"
    }
    ```
4.  Clique em **Send**. A resposta deverá ser um status `201 Created` com os dados do paciente criado.

---

## [Componente Extensionista] Possíveis usos da nossa API

Uma API como esta, que centraliza e expõe dados de pacientes de forma estruturada, é a espinha dorsal de qualquer sistema de saúde moderno. Ela resolve problemas reais e abre portas para diversas inovações:

1.  **Sistema de Gestão para Clínicas de Pequeno Porte:** Uma clínica ou consultório particular poderia usar esta API para alimentar seu próprio sistema de agendamento e prontuário eletrônico. A interface web (as telas HTML/CSS já existentes) seria conectada a esta API para registrar pacientes, marcar consultas e visualizar históricos, substituindo processos manuais e planilhas, reduzindo erros e otimizando o tempo da equipe.

2.  **Portal do Paciente:** A API poderia ser consumida por um aplicativo de celular ou um portal web onde os próprios pacientes poderiam acessar seus dados, ver seu histórico de consultas, agendar novos horários e receber lembretes. Isso empodera o paciente, melhora a comunicação e reduz a carga de trabalho da recepção da clínica.

3.  **Integração com Outros Serviços de Saúde:** Um negócio que queira se expandir poderia usar a API para se conectar a laboratórios (para receber resultados de exames diretamente no prontuário do paciente), farmácias (para enviar receitas digitais) ou até mesmo plataformas de telemedicina, criando um ecossistema de saúde conectado e eficiente.


# Relatório de Testes de Software (EP3)
1. Introdução
Este relatório detalha os testes manuais e automatizados realizados na API de Gestão de Pacientes. O objetivo é verificar a funcionalidade das rotas de CRUD (Create, Read, Update, Delete), garantir a integridade das respostas e identificar possíveis falhas. A metodologia de testes visa validar tanto os cenários de sucesso quanto os de erro, assegurando a robustez e a confiabilidade do sistema.

2. Casos de Teste Manuais
Foram definidos 7 casos de teste para cobrir as principais funcionalidades da API.

| ID    | Cenário                                      | Entrada (Corpo da Requisição)                              | Passos                                               | Resultado Esperado                                                                 |
|-------|----------------------------------------------|------------------------------------------------------------|------------------------------------------------------|-----------------------------------------------------------------------------------|
| CT-01 | Cadastrar um novo paciente com dados válidos | `{ "nome": "Ana Souza", "cpf": "123.456.789-00", "dataNascimento": "2000-01-30" }` | 1. Enviar requisição POST para /pacientes com os dados de entrada. | Retornar status 201 Created e um JSON contendo a mensagem de sucesso e os dados do paciente criado com um novo ID. |
| CT-02 | Tentar cadastrar paciente com dados faltando | `{ "nome": "Pedro" }`                                      | 1. Enviar requisição POST para /pacientes com dados incompletos. | Retornar status 400 Bad Request e uma mensagem de erro indicando que os dados são obrigatórios. |
| CT-03 | Listar todos os pacientes cadastrados        | (Nenhuma)                                                  | 1. Enviar requisição GET para /pacientes.            | Retornar status 200 OK e um JSON contendo um array com todos os pacientes.         |
| CT-04 | Buscar um paciente por um ID existente       | (Nenhuma)                                                  | 1. Enviar requisição GET para /pacientes/1.          | Retornar status 200 OK e um JSON com os dados completos do paciente de ID 1.       |
| CT-05 | Tentar buscar um paciente com ID inexistente | (Nenhuma)                                                  | 1. Enviar requisição GET para /pacientes/99.         | Retornar status 404 Not Found e uma mensagem de erro informando que o paciente não foi encontrado. |
| CT-06 | Atualizar os dados de um paciente existente  | `{ "nome": "Carlos Silva Santos", "cpf": "111.222.333-44", "dataNascimento": "1990-05-15" }` | 1. Enviar requisição PUT para /pacientes/1 com os novos dados. | Retornar status 200 OK, uma mensagem de sucesso e os dados atualizados do paciente. |
| CT-07 | Deletar um paciente existente                | (Nenhuma)                                                  | 1. Enviar requisição DELETE para /pacientes/2.       | Retornar status 200 OK e uma mensagem de sucesso confirmando a exclusão.           |

Claro! Com base nos arquivos do seu EP2, preparei a solução completa para o EP3.

Primeiro, para tornar a API mais completa e permitir testes mais robustos, adicionei as rotas de atualização (PUT) e exclusão (DELETE) que estavam faltando.

Aqui está o arquivo index.js atualizado:

JavaScript

// index.js (Atualizado com rotas PUT e DELETE)

// Importa os pacotes
const express = require('express');
const cors = require('cors');

// Inicia o Express
const app = express();

// Define a porta em que o servidor vai rodar
const PORT = 3000;

// Middlewares para fazer o parse do JSON no corpo das requisições e habilitar o CORS
app.use(express.json());
app.use(cors());

// --- Nosso "Banco de Dados" em memória ---
let pacientes = [
    { id: 1, nome: "Carlos Silva", cpf: "111.222.333-44", dataNascimento: "1990-05-15" },
    { id: 2, nome: "Maria Oliveira", cpf: "555.666.777-88", dataNascimento: "1985-10-20" }
];
let proximoId = 3; // Variável para gerar o próximo ID

// --- Definindo as Rotas da API ---

// ROTA 1: Listar todos os pacientes (GET /pacientes)
app.get('/pacientes', (req, res) => {
    res.status(200).json(pacientes);
});

// ROTA 2: Buscar um paciente pelo ID (GET /pacientes/:id)
app.get('/pacientes/:id', (req, res) => {
    const id = parseInt(req.params.id);
    const paciente = pacientes.find(p => p.id === id);

    if (paciente) {
        res.status(200).json(paciente);
    } else {
        res.status(404).json({ message: "Paciente não encontrado." });
    }
});

// ROTA 3: Cadastrar um novo paciente (POST /pacientes)
app.post('/pacientes', (req, res) => {
    const novoPaciente = req.body;

    if (!novoPaciente.nome || !novoPaciente.cpf || !novoPaciente.dataNascimento) {
        return res.status(400).json({ message: "Dados incompletos. Nome, CPF e data de nascimento são obrigatórios." });
    }

    novoPaciente.id = proximoId++;
    pacientes.push(novoPaciente);

    res.status(201).json({ message: "Paciente cadastrado com sucesso!", paciente: novoPaciente });
});

// ROTA 4: Atualizar um paciente existente (PUT /pacientes/:id)
app.put('/pacientes/:id', (req, res) => {
    const id = parseInt(req.params.id);
    const dadosAtualizados = req.body;
    const index = pacientes.findIndex(p => p.id === id);

    if (index === -1) {
        return res.status(404).json({ message: "Paciente não encontrado." });
    }
    
    if (!dadosAtualizados.nome || !dadosAtualizados.cpf || !dadosAtualizados.dataNascimento) {
        return res.status(400).json({ message: "Dados incompletos para atualização." });
    }

    pacientes[index] = { ...pacientes[index], ...dadosAtualizados };
    res.status(200).json({ message: "Paciente atualizado com sucesso!", paciente: pacientes[index] });
});

// ROTA 5: Deletar um paciente (DELETE /pacientes/:id)
app.delete('/pacientes/:id', (req, res) => {
    const id = parseInt(req.params.id);
    const index = pacientes.findIndex(p => p.id === id);

    if (index === -1) {
        return res.status(404).json({ message: "Paciente não encontrado." });
    }

    pacientes.splice(index, 1);
    res.status(200).json({ message: "Paciente deletado com sucesso." });
});


// --- Iniciando o servidor ---
app.listen(PORT, () => {
    console.log(`Servidor da API rodando em http://localhost:${PORT}`);
});
A seguir, apresento o Relatório de Testes (EP3) e, ao final, o arquivo README.md atualizado.

Relatório de Testes de Software (EP3)
1. Introdução
Este relatório detalha os testes manuais e automatizados realizados na API de Gestão de Pacientes. O objetivo é verificar a funcionalidade das rotas de CRUD (Create, Read, Update, Delete), garantir a integridade das respostas e identificar possíveis falhas. A metodologia de testes visa validar tanto os cenários de sucesso quanto os de erro, assegurando a robustez e a confiabilidade do sistema.

2. Casos de Teste Manuais
Foram definidos 7 casos de teste para cobrir as principais funcionalidades da API.

ID	Cenário	Entrada (Corpo da Requisição)	Passos	Resultado Esperado
CT-01	Cadastrar um novo paciente com dados válidos.	{ "nome": "Ana Souza", "cpf": "123.456.789-00", "dataNascimento": "2000-01-30" }	1. Enviar requisição POST para /pacientes com os dados de entrada.	Retornar status 201 Created e um JSON contendo a mensagem de sucesso e os dados do paciente criado com um novo ID.
CT-02	Tentar cadastrar paciente com dados faltando.	{ "nome": "Pedro" }	1. Enviar requisição POST para /pacientes com dados incompletos.	Retornar status 400 Bad Request e uma mensagem de erro indicando que os dados são obrigatórios.
CT-03	Listar todos os pacientes cadastrados.	(Nenhuma)	1. Enviar requisição GET para /pacientes.	Retornar status 200 OK e um JSON contendo um array com todos os pacientes.
CT-04	Buscar um paciente por um ID existente.	(Nenhuma)	1. Enviar requisição GET para /pacientes/1.	Retornar status 200 OK e um JSON com os dados completos do paciente de ID 1.
CT-05	Tentar buscar um paciente com ID inexistente.	(Nenhuma)	1. Enviar requisição GET para /pacientes/99.	Retornar status 404 Not Found e uma mensagem de erro informando que o paciente não foi encontrado.
CT-06	Atualizar os dados de um paciente existente.	{ "nome": "Carlos Silva Santos", "cpf": "111.222.333-44", "dataNascimento": "1990-05-15" }	1. Enviar requisição PUT para /pacientes/1 com os novos dados.	Retornar status 200 OK, uma mensagem de sucesso e os dados atualizados do paciente.
CT-07	Deletar um paciente existente.	(Nenhuma)	1. Enviar requisição DELETE para /pacientes/2.	Retornar status 200 OK e uma mensagem de sucesso confirmando a exclusão.


3. Testes Automatizados (Postman)
Os casos de teste foram automatizados utilizando a ferramenta Postman. Para cada requisição, foram adicionados scripts na aba "Tests" para validar o status da resposta, a estrutura do JSON e a consistência dos dados.

## Equipe

### Adão Eduardo Gomes de Oliveira

[EduOlvr](https://github.com/EduOlvr)

### Rafael Antonio Vieira Rodrigues

[raffaelvieir](https://github.com/raffaelvieir)

---
