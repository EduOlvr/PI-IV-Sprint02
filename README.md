# Projeto Integrado IV - Sprint 02 (API RESTful) e Sprint 03 (Relatório de Testes de Software)

Este projeto consiste na criação de uma API RESTful para um sistema de gestão de pacientes. A API é a fundação do sistema, responsável por manipular e servir os dados dos pacientes.

- **Sprint 02 (EP2):** Foco na criação e documentação da API funcional.
- **Sprint 03 (EP3):** Foco na verificação e validação da API com testes manuais e automatizados.

## Como Executar a API Localmente

Para testar a API, siga os passos abaixo.

### 🔧 Pré-requisitos

- <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/nodejs/nodejs-original.svg" alt="Node.js" width="20"/> [Node.js](https://nodejs.org/) (versão 18 ou superior)
- <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/npm/npm-original-wordmark.svg" alt="npm" width="20"/> [npm](https://www.npmjs.com/) (instalado junto com o Node.js)
- <img src="https://raw.githubusercontent.com/get-icon/geticon/master/icons/postman.svg" alt="Postman" width="20"/> [Postman](https://www.postman.com/)

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

---

# Relatório de Testes de Software (EP3)

### 1. Introdução

Este relatório detalha os testes manuais e automatizados realizados na API de Gestão de Pacientes. O objetivo é verificar a funcionalidade das rotas de CRUD (Create, Read, Update, Delete), garantir a integridade das respostas e identificar possíveis falhas. A metodologia de testes visa validar tanto os cenários de sucesso quanto os de erro, assegurando a robustez e a confiabilidade do sistema.

### 2. Casos de Teste Manuais

Foram definidos 7 casos de teste para cobrir as principais funcionalidades da API.

| ID    | Cenário                                      | Entrada (Corpo da Requisição)                              | Passos                                               | Resultado Esperado                                                                 |
|:------|:---------------------------------------------|:-----------------------------------------------------------|:-----------------------------------------------------|:----------------------------------------------------------------------------------|
| CT-01 | Cadastrar um novo paciente com dados válidos | `{ "nome": "Ana Souza", "cpf": "123.456.789-00", "dataNascimento": "2000-01-30" }` | 1. Enviar requisição POST para /pacientes. | Retornar status 201 Created e um JSON com a mensagem de sucesso e os dados do paciente criado. |
| CT-02 | Tentar cadastrar paciente com dados faltando | `{ "nome": "Pedro" }`                                      | 1. Enviar requisição POST para /pacientes. | Retornar status 400 Bad Request e uma mensagem de erro indicando dados obrigatórios. |
| CT-03 | Listar todos os pacientes cadastrados        | (Nenhuma)                                                  | 1. Enviar requisição GET para /pacientes.            | Retornar status 200 OK e um JSON contendo um array com todos os pacientes.         |
| CT-04 | Buscar um paciente por um ID existente       | (Nenhuma)                                                  | 1. Enviar requisição GET para /pacientes/1.          | Retornar status 200 OK e um JSON com os dados completos do paciente de ID 1.       |
| CT-05 | Tentar buscar um paciente com ID inexistente | (Nenhuma)                                                  | 1. Enviar requisição GET para /pacientes/99.         | Retornar status 404 Not Found e uma mensagem de erro de paciente não encontrado.    |
| CT-06 | Atualizar os dados de um paciente existente  | `{ "nome": "Carlos Silva Santos", "cpf": "111.222.333-44", "dataNascimento": "1990-05-15" }` | 1. Enviar requisição PUT para /pacientes/1. | Retornar status 200 OK, uma mensagem de sucesso e os dados atualizados do paciente. |
| CT-07 | Deletar um paciente existente                | (Nenhuma)                                                  | 1. Enviar requisição DELETE para /pacientes/2.       | Retornar status 200 OK e uma mensagem de sucesso confirmando a exclusão.           |

### 3. Testes Automatizados (Postman)

Os casos de teste manuais foram implementados como testes automatizados utilizando a ferramenta Postman. Para cada requisição, foram adicionados scripts na aba "Tests" para validar o status da resposta, a estrutura do JSON e a consistência dos dados.

#### Como Executar os Testes

1. **Inicie a API:** Siga as "Instruções de Execução" da seção anterior para deixar o servidor rodando.
2. **Importe a Coleção no Postman:** Baixe o arquivo `Testes da API da Clínica.postman_collection.json` deste repositório e importe-o no Postman (`File > Import...`).
3. **Abra o Collection Runner:** Na barra lateral, clique nos três pontinhos (`...`) ao lado da coleção importada e selecione **"Run collection"**.
4. **Execute os Testes:** Clique no botão azul **"Run API Pacientes"** para executar todos os testes automatizados de uma vez.

#### O Que os Testes Validam
* **Criação, Leitura, Atualização e Exclusão (CRUD):** Garante que todas as operações básicas da API funcionam como esperado.
* **Validação de Entrada:** Verifica se a API rejeita requisições com dados incompletos.
* **Tratamento de Erros:** Confirma que a API retorna os status de erro corretos (como 404 Not Found) em cenários apropriados.

---

### [Componente Extensionista] Qualidade de Software e o Impacto na Sociedade

Testes de software são muito mais do que uma etapa técnica do desenvolvimento; eles são um pilar de confiança entre a tecnologia e as pessoas. No dia a dia, interagimos com dezenas de sistemas, e a qualidade deles afeta diretamente nossa segurança, finanças e bem-estar.

Pense em um **aplicativo de banco**. Um teste bem-feito garante que sua transferência de dinheiro vá para a conta certa e que seu saldo seja atualizado corretamente. A ausência de testes poderia levar a perdas financeiras e um enorme transtorno. Em um **sistema de prontuários médicos**, como o que nossa API poderia servir, a qualidade é ainda mais crítica. Testes rigorosos asseguram que o médico veja o histórico correto de alergias de um paciente, evitando a administração de um medicamento perigoso. Nesse contexto, um software bem testado pode, literalmente, salvar vidas.

Portanto, ao escrever testes para nossa API, não estamos apenas verificando se o código funciona. Estamos construindo uma base confiável para um sistema que, no futuro, poderia gerenciar informações de saúde cruciais, impactando positivamente a vida de médicos e pacientes. Testar é um ato de responsabilidade e um compromisso com a criação de tecnologia que ajuda a sociedade de forma segura e eficaz.

---

### [Componente Extensionista] Possíveis usos da nossa API

Uma API como esta, que centraliza e expõe dados de pacientes de forma estruturada, é a espinha dorsal de qualquer sistema de saúde moderno. Ela resolve problemas reais e abre portas para diversas inovações:

1.  **Sistema de Gestão para Clínicas de Pequeno Porte:** Uma clínica ou consultório particular poderia usar esta API para alimentar seu próprio sistema de agendamento e prontuário eletrônico, substituindo processos manuais e planilhas, reduzindo erros e otimizando o tempo da equipe.

2.  **Portal do Paciente:** A API poderia ser consumida por um aplicativo de celular ou um portal web onde os próprios pacientes poderiam acessar seus dados, ver seu histórico de consultas e agendar novos horários, empoderando o paciente e melhorando a comunicação.

3.  **Integração com Outros Serviços de Saúde:** A API poderia se conectar a laboratórios (para receber resultados de exames), farmácias (para enviar receitas digitais) ou plataformas de telemedicina, criando um ecossistema de saúde conectado e eficiente.

---

## Equipe

#### Adão Eduardo Gomes de Oliveira

- [EduOlvr](https://github.com/EduOlvr)

#### Rafael Antonio Vieira Rodrigues

- [raffaelvieir](https://github.com/raffaelvieir)