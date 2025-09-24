pm.test("Status da resposta é 400 Bad Request", function () {
    pm.response.to.have.status(400);
});

pm.test("A resposta contém a mensagem de erro correta", function () {
    const responseData = pm.response.json();
    pm.expect(responseData.message).to.include("Dados incompletos");
});