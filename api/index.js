// index.js (Versão Final e Corrigida)

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

    pacientes[index] = { id: id, ...dadosAtualizados }; // Correção para manter o ID
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