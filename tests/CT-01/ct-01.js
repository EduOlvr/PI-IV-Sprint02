pm.test("Status code é 201", function () {
    pm.response.to.have.status(201);
});
pm.test("A resposta possui a propriedade 'paciente'", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData).to.have.property('paciente');
});
pm.test("O paciente criado tem o nome 'Ana Souza'", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData.paciente.nome).to.eql("Ana Souza");
});