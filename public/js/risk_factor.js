
function riskFactorStore() {
    var formData = new FormData(document.getElementById("risk_factor"));
    axios({
            method: 'post',
            url: '../riskFactorStore',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function(response) {
            //handle success
            var contentdiv = document.getElementById("mycontent");
            contentdiv.innerHTML = response.data;
  //carga pdf- csv - excel
  datatable_load();
  alert('Registrado Correctamente');
        })
        .catch(function(response) {
            //handle error
            console.log(response);
        });

}

function riskFactorEdit(id) {
    var formData = new FormData(document.getElementById("risk_factor"));
    formData.append("id",id);
    axios({
            method: 'post',
            url: '../riskFactorEdit',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function(response) {
            //handle success
            var contentdiv = document.getElementById("mycontent");
           // contentdiv.innerHTML = response.data["description"];
            risk_factor.id.value=response.data["id"];
            risk_factor.description.value=response.data["description"];
            risk_factor.detail.value=response.data["detail"];

        })
        .catch(function(response) {
            //handle error
            console.log(response);
        });

}

function riskFactorUpdate() {
    var formData = new FormData(document.getElementById("risk_factor"));
    axios({
            method: 'post',
            url: '../riskFactorUpdate',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function(response) {
            //handle success
            var contentdiv = document.getElementById("mycontent");
            contentdiv.innerHTML = response.data;
              //carga pdf- csv - excel
              datatable_load();
              alert('Modificado Correctamente');

        })
        .catch(function(response) {
            //handle error
            console.log(response);
        });

}

function riskFactorDestroy(id) {

if(confirm("¿Quieres eliminar este registro?")){
  var formData = new FormData(document.getElementById("risk_factor"));
    formData.append("id",id)
    axios({
            method: 'post',
            url: '../riskFactorDestroy',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function(response) {
            //handle success
            var contentdiv = document.getElementById("mycontent");
            contentdiv.innerHTML = response.data;
              //carga pdf- csv - excel
              datatable_load();
              alert('Eliminado Correctamente');

        })
        .catch(function(response) {
            //handle error
            console.log(response);
        });
}
}
 