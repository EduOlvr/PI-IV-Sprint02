pm.test("Status code é 200", function () {
    pm.response.to.have.status(200);
});
pm.test("O ID do paciente retornado é 1", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData.id).to.eql(1);
});