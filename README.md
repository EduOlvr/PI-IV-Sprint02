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

## Equipe

### Adão Eduardo Gomes de Oliveira

[EduOlvr](https://github.com/EduOlvr)

### Rafael Antonio Vieira Rodrigues

[raffaelvieir](https://github.com/raffaelvieir)

---
