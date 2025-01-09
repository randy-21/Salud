
function registryStore() {
    var formData = new FormData(document.getElementById("registry"));
    axios({
            method: 'post',
            url: '../registryStore',
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

function registryDestroy(id) {
    if (confirm("Esta seguro de Eliminar?")) {
        var formData = new FormData();
        formData.append("id", id);
        axios({
                method: 'get',
                url: "../registryDestroy/"+ id,
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
function registryImportGoogle() {

    var formData = new FormData(document.getElementById("registry"));
        formData.append("id_sheet", document.getElementById("id_sheet").value);
        formData.append("range", document.getElementById("range").value);
        axios({
                method: 'post',
                url: "../registryImportGoogle",
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
              alert('Importado Correctamente');
              window.location.reload();
            })
            .catch(function(response) {
                //handle error
              //  console.log(response);
              alert('Ocurrió un error al importar, verifíque los datos');
            });

}
function registryEdit(id) {
    var formData = new FormData(document.getElementById("registry"));
    formData.append("id", id);

    axios({
            method: 'post',
            url: '../registryEdit',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function(response) {
            registry.id.value = response.data["id"];
            registry.dni.value = response.data["dni"];
            registry.firstname.value = response.data["firstname"];
            registry.lastname.value = response.data["lastname"];
            registry.names.value = response.data["names"];
            registry.cellphone.value = response.data["cellphone"];
            registry.district.value = response.data["district"];
          
            registry.ipress.value = response.data["ipress"];
            registry.network.value = response.data["network"];
            registry.age.value = response.data["age"];
            registry.provenance.value = response.data["provenance"];
            registry.address.value = response.data["address"];
            registry.fur.value = response.data["fur"];
            registry.fpp.value = response.data["fpp"];
            registry.gestation_weeks.value = response.data["gestation_weeks"];
            registry.risk_factor.value = response.data["risk_factor"];
            registry.color.value = response.data["color"];
            registry.observations.value = response.data["observations"];

          
        })
        .catch(function(response) {
            // Manejo de errores
            console.log(response);
        });
}


function registryUpdate() {
    var formData = new FormData(document.getElementById("registry"));
    axios({
            method: 'post',
            url: '../registryUpdate',
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
 
 