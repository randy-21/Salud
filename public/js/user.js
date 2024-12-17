function userCreate() {

    axios({
            method: 'post',
            url: 'userCreate',
         //   data: formData,
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


        })
        .catch(function(response) {
            //handle error
            console.log(response);
        });

}
function userStore() {
    var formData = new FormData(document.getElementById("user"));
    axios({
            method: 'post',
            url: 'userStore',
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
            //     datatable_load();
                 alert('Registrado Correctamente');
        })
        .catch(function(response) {
            //handle error
            console.log(response);
        });

}

function userDestroy(id) {
    if (confirm("Esta seguro de Eliminar?")) {


        axios({
                method: 'get',
                url: "userDestroy/" + id,
                data: id,
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

function userEdit(id) {
    var formData = new FormData(document.getElementById("user"));
    formData.append("id", id);
    axios({
            method: 'post',
            url: 'userEdit',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function(response) {
        
          
        user.name.value = response.data["name"];
        user.email.value = response.data["email"];
        user.id.value = response.data["id"];
       
    
           
         


        })
        .catch(function(response) {
            //handle error
            console.log(response);
        });

}

function userUpdate() {
    var formData = new FormData(document.getElementById("user"));
    axios({
            method: 'post',
            url: 'userUpdate',
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

function userShow() {
    var formData = new FormData(document.getElementById("show"));
    axios({
            method: 'post',
            url: 'userShow',
            data: formData,
        })
        .then(function(response) {
            //handle success
            var contentdiv = document.getElementById("mycontent");
            contentdiv.innerHTML = response.data;
                 //carga pdf- csv - excel
                 datatable_load();
        })
        .catch(function(response) {
            //handle error
            console.log(response);
        });

}



function userUpdateProfile() {
    var formData = new FormData(document.getElementById("user"));
    axios({
            method: 'post',
            url: 'userUpdateProfile',
            data: formData,
        })
        .then(function(response) {
            //handle success
            var contentdiv = document.getElementById("mycontent");
            contentdiv.innerHTML = response.data;
         alert('Modificado correctamente');
         window.location.href='/sistema';
        })
        .catch(function(response) {
            //handle error
            console.log(response);
        });

}


function userRoleStore() {
    var formData = new FormData(document.getElementById("user_role"));
    axios({
            method: 'post',
            url: 'userRoleStore',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function(response) {
            //handle success
            var contentdiv = document.getElementById("mycontent_detail");
            contentdiv.innerHTML = response.data;
            userCreate();
        })
        .catch(function(response) {
            //handle error
            console.log(response);
        });

}
function userRoleEdit(id) {
    var formData = new FormData(document.getElementById("user_role"));
    formData.append("id",id);
    axios({
            method: 'post',
            url: 'userRoleEdit',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function(response) {
            //handle success
            var contentdiv = document.getElementById("mycontent_detail");
            contentdiv.innerHTML = response.data;
            user_role.id.value=id;
        })
        .catch(function(response) {
            //handle error
            console.log(response);
        });

}
function userRoleDestroy(role_name,id) {
    if(confirm("¿Quieres eliminar este registro?")){
        var formData = new FormData(document.getElementById("user_role"));
        formData.append("id",id);
        formData.append("role_name",role_name);
        axios({
                method: 'post',
                url: 'userRoleDestroy',
                data: formData,
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(function(response) {
                //handle success
                var contentdiv = document.getElementById("mycontent_detail");
                contentdiv.innerHTML = response.data;
                //actualizamos la tabla
                userCreate();
            })
            .catch(function(response) {
                //handle error
                console.log(response);
            });
    }


}

