pm.test("Status da resposta é 200 OK", function () {
    pm.response.to.have.status(200);
});

pm.test("A resposta contém a mensagem de sucesso na exclusão", function () {
    const responseData = pm.response.json();
    pm.expect(responseData.message).to.eql("Paciente deletado com sucesso.");
});