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
// Em um projeto real, isso viria de um banco de dados como MySQL, PostgreSQL, etc.
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
    const novoPaciente = req.body; // Pega os dados do corpo da requisição

    // Validação simples
    if (!novoPaciente.nome || !novoPaciente.cpf || !novoPaciente.dataNascimento) {
        return res.status(400).json({ message: "Dados incompletos. Nome, CPF e data de nascimento são obrigatórios." });
    }

    novoPaciente.id = proximoId++; // Atribui um novo ID
    pacientes.push(novoPaciente); // Adiciona ao nosso "banco de dados"

    res.status(201).json({ message: "Paciente cadastrado com sucesso!", paciente: novoPaciente });
});

// --- Iniciando o servidor ---
app.listen(PORT, () => {
    console.log(`Servidor da API rodando em http://localhost:${PORT}`);
});
