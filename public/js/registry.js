function registryStore() {
  var formData = new FormData(document.getElementById("registry"));
  axios({
    method: "post",
    url: "../registryStore",
    data: formData,
    headers: {
      "Content-Type": "multipart/form-data"
    }
  })
    .then(function(response) {
      //handle success
      var contentdiv = document.getElementById("mycontent");
      contentdiv.innerHTML = response.data;
      //carga pdf- csv - excel

      datatable_load();
      alert("Registrado Correctamente");
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
      method: "get",
      url: "../registryDestroy/" + id,
      data: formData,
      headers: {
        "Content-Type": "multipart/form-data"
      }
    })
      .then(function(response) {
        //handle success
        var contentdiv = document.getElementById("mycontent");
        contentdiv.innerHTML = response.data;
        //carga pdf- csv - excel
        datatable_load();
        alert("Eliminado Correctamente");
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
    method: "post",
    url: "../registryImportGoogle",
    data: formData,
    headers: {
      "Content-Type": "multipart/form-data"
    }
  })
    .then(function(response) {
      //handle success
      var contentdiv = document.getElementById("mycontent");
      contentdiv.innerHTML = response.data;
      //carga pdf- csv - excel
      datatable_load();
      alert("Importado Correctamente");
      window.location.reload();
    })
    .catch(function(response) {
      //handle error
      //  console.log(response);
      alert("Ocurrió un error al importar, verifíque los datos");
    });
}
function registryEdit(id) {
  var formData = new FormData(document.getElementById("registry"));
  formData.append("id", id);

  axios({
    method: "post",
    url: "../registryEdit",
    data: formData,
    headers: {
      "Content-Type": "multipart/form-data"
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
      registry.network.value = response.data["network"];

      registry.ipress.value = response.data["ipress"];
      registry.age.value = response.data["age"];
      registry.provenance.value = response.data["provenance"];
      registry.address.value = response.data["address"];
      registry.fur.value = response.data["fur"];
      registry.fpp.value = response.data["fpp"];
      registry.gestation_weeks.value = response.data["gestation_weeks"];

  
   
       let risk =response.data["risk_factors"];
  
     
       
        let risk__ =[];
      risk.forEach(function(factor) {
         risk__.push(factor.id+" - "+factor.description);
      
      });

      let riskFactorSelect = $("#risk_factor");

      // `risk__` ya contiene los IDs de las opciones que quieres seleccionar
      riskFactorSelect.val(risk__).trigger('change'); 


      registry.color.value = response.data["color"];
      registry.date_cite.value = response.data["date_cite"];
      registry.date_part.value = response.data["date_part"];
      registry.anemia.value = response.data["anemia"];
      registry.parity.value = response.data["parity"];
      registry.hemoglobine.value = response.data["hemoglobine"];
      registry.cpn.value = response.data["cpn"];
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
    method: "post",
    url: "../registryUpdate",
    data: formData,
    headers: {
      "Content-Type": "multipart/form-data"
    }
  })
    .then(function(response) {
      //handle success
      var contentdiv = document.getElementById("mycontent");
      contentdiv.innerHTML = response.data;
      //carga pdf- csv - excel
      datatable_load();
      alert("Modificado Correctamente");
    })
    .catch(function(response) {
      //handle error
      console.log(response);
    });
}

function evaluarAnemia(idElementoOrigen, idElementoDestino) {
  // Seleccionar los elementos
  const elementoOrigen = document.getElementById(idElementoOrigen);
  const elementoDestino = document.getElementById(idElementoDestino);

  // Validar la existencia de ambos elementos
  if (!elementoOrigen) {
    console.error(`No se encontró un elemento con el ID: ${idElementoOrigen}`);
    return;
  }
  if (!elementoDestino) {
    console.error(`No se encontró un elemento con el ID: ${idElementoDestino}`);
    return;
  }

  // Obtener el valor del elemento origen
  const valor = parseFloat(elementoOrigen.value);
  if (isNaN(valor)) {
    console.error(`El valor en el elemento ${idElementoOrigen} no es un número válido.`);
    elementoDestino.textContent = "Valor no válido";
    return;
  }

  // Evaluar los intervalos y asignar el resultado correspondiente
  let resultado = "";
  if (valor >= 10.5) {
    resultado = "SIN ANEMIA";
  } else if (valor >= 10 && valor <= 10.9) {
    resultado = "ANEMIA LEVE";
  } else if (valor >= 7 && valor <= 9.9) {
    resultado = "ANEMIA MODERADA";
  } else if (valor < 7) {
    resultado = "ANEMIA SEVERA";
  } else {
    resultado = "Valor no válido";
  }

  // Pintar el resultado en el elemento destino
  elementoDestino.value = resultado;
}

function getColor(selectId, inputId) {
  // Obtener el elemento <select> y el input
  const selectElement = document.getElementById(selectId);
  const inputElement = document.getElementById(inputId);

  // Validar la existencia de los elementos
  if (!selectElement) {
    console.error(`No se encontró un elemento <select> con el ID: ${selectId}`);
    return;
  }
  if (!inputElement) {
    console.error(`No se encontró un input con el ID: ${inputId}`);
    return;
  }

  // Obtener el valor de la opción seleccionada
  const selectedValue = selectElement.value;

  // Extraer el color del valor seleccionado (antes del guion)
  const color = selectedValue.split(" - ")[1];

  // Pintar el color en el input
  inputElement.value = color;
  if (inputElement.value === "ROJO") {
    inputElement.classList.add("bg-danger");
  } else if (inputElement.value === "VERDE") {
    inputElement.classList.add("bg-success");
  } else if (inputElement.value === "AMARILLO") {
    inputElement.classList.add("bg-warning");
  }
}

// Datos jerárquicos (JSON generado anteriormente)
const data = {
  BALSAPUERTO: {
    "EJE SAN GABRIEL DE VARADERO": [
      "C.S. I-3 SAN GABRIEL DE VARADERO",
      "VISTA ALEGRE DE BALSAPUERTO",
      "P.S. I-1 NUEVA VIDA",
      "P.S. I-1 PROGRESO DE BALSAPUERTO",
      "P.S. I-1 PANAM",
      "P.S. I-1 CENTRO AMERICA",
      "P.S. I-1 SOLEDAD DE BALSAPUERTO",
      "P.S. I-1 FRAY MARTIN",
      "P.S. I-1  PUCALPILLO",
      "P.S. I-1 SAN ANTONIO DE YANAYACU",
      "P.S. I-1 LIBERTAD DE BALSAPUERTO",
      "P.S. I-1 ANTIOQUIA DE BALSAPUERTO",
      "P.S. I-1 SAN MIGUEL DE YANAYACU",
      "P.S. I-1 TRES UNIDOS DE BALSAPUERO",
      "P.S I-1 SAN JUANN DE PALOMETAYACU"
    ],
    "EJE BALSAPUERTO": ["C.S. I-3 BALSAPUERTO", "P.S. I-1 NUEVA ESPERANZA DE BALSAPUERTO"]
  },
  JEBEROS: {
    "EJE JEBEROS": [
      "C.S. I-3 JEBEROS",
      "P.S. I-1 BELLAVISTA DE JEBEROS",
      "P.S. I-1 MONTE CRISTO",
      "P.S. BETHEL",
      "P.S. VISTA ALEGRE DE JEBEROS",
      "P.S. I-1 SAN FRANCISCO DE ALGODONAL DE JEBEROS"
    ]
  },
  LAGUNAS: {
    "EJE LAGUNAS": [
      "C.S. LAGUNAS",
      "P.S. I-1 PUCACURO DE LAGUNAS",
      "P.S. I-1 PUERTO VICTORIA",
      "P.S. I-1 ARAHUANTE",
      "P.S. I-1 BARRIO CENTRAL",
      "P.S. I-1 NUEVO MUNDO",
      "P.S. I-1 HUANCAYO",
      "P.S. I-1 TAMARATE",
      "P.S. I-1 NUEVO ARICA DE LAGUNAS",
      "P.S. I-1 SEIS DE JULIO",
      "P.S. NUEVA UNION DE LAGUNAS",
      "P.S. I-1 BARRIO VIRGEN DE GUADALUPE DE VILLA LAGUNAS",
      "P.S. I-1  PUERTO ALEGRE DE LAGUNAS",
      "P.S I-1 UNION ZANCUDO LAGUNAS"
    ]
  },
  "SANTA CRUZ": {
    "EJE SANTA CRUZ": [
      "C.S. I-3 SANTA CRUZ",
      "P.S. I-1 ACHUAL TIPISCHA",
      "P.S. I-1 LAGO NARANJAL",
      "P.S. I-1 UNION CAMPESINA",
      "P.S. I-1 PROGRESO DE SANTA CRUZ",
      "P.S. I-1 NUEVO TRIUNFO",
      "P.S. I-1 HUATAPI DEL RIO HUALLAGA",
      "P.S. I-1 SAN ANTONIO DEL SHISHINAHUA",
      "P.S. I-1 SELVA ALEGRE DE SANTA CRUZ",
      "P.S. I-1 SANTA GEMA DE SANTA CRUZ",
      "P.S. I-1 SAN JOSE DE SHISHINAHUA DE SANTA CRUZ"
    ]
  },
  "TENIENTE CESAR LOPEZ ROJAS": {
    "EJE  SHUCUSHYACU": [
      "P.S. I-1 JORGE CHAVEZ",
      "P.S. I-1 CUIPARI",
      "P.S. I-1 SONAPI",
      "C.S. I-3 SHUCUSHYACU",
      "P.S. I-1 PARINARI",
      "P.S. I-1 LIBERTAD DE CUIPARILLO",
      "P.S. I-1 GLORIA",
      "P.S. I-1 NUEVO PAPAPLAYA",
      "P.S. I-1 SAN MIGUEL DE TENIENTE CESAR LOPEZ ROJAS"
    ]
  },
  YURIMAGUAS: {
    "EJE AGUAMIRO": [
      "C.S. 1-3 CENTRO ESPEC.MATERNO INFAN.AGUAMIRO",
      "P.S. I-1 DOS DE MAYO DE YURIMAGUAS",
      "P.S. I-1 NUEVA ERA",
      "P.S. I-1 PUERTO ARTURO",
      "P.S. LUZ DEL ORIENTE"
    ],
    "EJE CARRETERA": ["C.S. I-3 CARRETERA KM 1.5", "P.S. I-1 INDEPENDENCIA DEL SHANUSI", "P.S. I-1 TUPAC AMARU DE YURIMAGUAS"],
    "EJE LOMA": [
      "C.S. I-3 LOMA",
      "P.S. I-1 ALTO MOHENA",
      "P.S. I-1 CHIRAPA",
      "P.S. I-1 LAGO SANANGO",
      "P.S. I-1 ZAPOTE",
      "P.S. NUEVO HORIZONTE DE YURIMAGUAS"
    ],
    "EJE MUNICHIS": [
      "C.S. I-3 MUNICHIS DE YURIMAGUAS",
      "P.S. 1-2 NUEVO ARICA DE BALSAPUERTO",
      "P.S. I-1 ACHUAL LIMON",
      "P.S. I-1 PUERTO PORVENIR",
      "P.S. I-1 SAN JUAN DE BALSAPUERTO",
      "P.S. I-1 SAN ROQUE DE YURIMAGUAS",
      "P.S. I-1 SANTA LUCIA",
      "P.S. I-1 VARADERILLO"
    ],
    "EJE SANTA MARIA": [
      "C.S. I-3 SANTA MAR?A",
      "P.S. I-1 PROVIDENCIA DE YURIMAGUAS",
      "P.S. I-1 SANTA ISABEL",
      "P.S. I-1 VISTA ALEGRE DE YURIMAGUAS"
    ],
    "EJE NATIVIDAD": [
      "C.S. NATIVIDAD",
      "P.S.  I- 2   VILLA DEL PARANAPURA DE YURIMAGUAS",
      "P.S. I-1 JEBERILLOS",
      "P.S. I-1 SAN JUAN DE ZAPOTE",
      "P.S. I-1 SAN PEDRO DE ZAPOTE",
      "P.S. LA UNION DE ZAPOTE DE YURIMAGUAS"
    ],
    "EJE PAMPAHERMOSA": [
      "C.S. PAMPA HERMOZA DE YURIMAGUAS",
      "P.S. I-1 LAS AMAZONAS",
      "P.S. I-1 SAN FRANCISCO PAMPAYACU",
      "P.S. I-1 SAN JUAN DE PAMPLONA",
      "P.S. I-1 SANTO TOMAS DE YURIMAGUAS",
      "P.S. NUEVO PIJUAYAL DE YURIMAGUAS"
    ],
    "SALUD MENTAL": ["CENTRO DE SALUD MENTAL COMUNITARIO - YURIMAGUAS"],
    "EJE GRAU": [
      "COTOYACU",
      "GRAU KM.40",
      "P.S. I-1 LAS PALMERAS DE YURIMAGUAS",
      "P.S. I-1 PUERTO PERU",
      "P.S. I-1 ROCA FUERTE",
      "P.S. I-1 VILLA HERMOSA DE YURIMAGUAS"
    ],
    "HOGAR PROTEGIDO": ["HOGAR PROTEGIDO YURIMAGUAS CORAZONES SOLIDARIOS"],
    "HOSPITAL SANTA GEMA": ["HOSPITAL SANTA GEMA DE  YURIMAGUAS"],
    "EJE INDEPENDENCIA": ["P.S. I-1 AA.HH. 30 DE AGOSTO KM. 17", "P.S. I-2 INDEPENDENCIA"]
  }
};

// Inicializa los districts al cargar la página
function cargardistricts() {
  const districtSelect = document.getElementById("district");
  Object.keys(data).forEach(district => {
    const option = document.createElement("option");
    option.value = district;
    option.textContent = district;
    districtSelect.appendChild(option);
  });
}

// Actualiza el select de network según el district seleccionado
function actualizarnetwork() {
  const districtSelect = document.getElementById("district");
  const networkSelect = document.getElementById("network");
  const nombreEstablecimientoSelect = document.getElementById("ipress");

  networkSelect.innerHTML = '<option value="">Seleccione un eje de Red</option>';
  nombreEstablecimientoSelect.innerHTML = '<option value="">Seleccione un IPRESS</option>';

  const districtSeleccionado = districtSelect.value;
  if (districtSeleccionado && data[districtSeleccionado]) {
    Object.keys(data[districtSeleccionado]).forEach(network => {
      const option = document.createElement("option");
      option.value = network;
      option.textContent = network;
      networkSelect.appendChild(option);
    });
  }
}

// Actualiza el select de NombreEstablecimiento según el network seleccionado
function actualizarNombreEstablecimiento() {
  const districtSelect = document.getElementById("district");
  const networkSelect = document.getElementById("network");
  const nombreEstablecimientoSelect = document.getElementById("ipress");

  nombreEstablecimientoSelect.innerHTML = '<option value="">Seleccione un IPRESS</option>';

  const districtSeleccionado = districtSelect.value;
  const networkSeleccionado = networkSelect.value;

  if (districtSeleccionado && networkSeleccionado && data[districtSeleccionado][networkSeleccionado]) {
    data[districtSeleccionado][networkSeleccionado].forEach(nombreEstablecimiento => {
      const option = document.createElement("option");
      option.value = nombreEstablecimiento;
      option.textContent = nombreEstablecimiento;
      nombreEstablecimientoSelect.appendChild(option);
    });
  }
}

function getWeekPregnat() {
  // Obtener la fecha desde el elemento con el ID proporcionado
  const dateElement = document.getElementById("fur");
  const destiny_ = document.getElementById("gestation_weeks");
  if (!dateElement) {
    console.error(`No se encontró ningún elemento con el ID "${"fur"}".`);
    return null;
  }

  // Parsear la fecha desde el contenido del elemento
  // const inputDate = new Date(dateElement.textContent.trim());
  const inputDate = new Date(dateElement.value);
  if (isNaN(inputDate)) {
    console.error(`La fecha en el elemento "${"fur"}" no es válida.`);
    return null;
  }

  // Obtener la fecha actual
  const currentDate = new Date();

  // Calcular la diferencia en milisegundos
  const differenceInMs = currentDate - inputDate;

  // Convertir la diferencia a días
  const differenceInDays = parseInt(Math.floor(differenceInMs / (1000 * 60 * 60 * 24)) / 7);

  return (destiny_.value = differenceInDays);
}

// Ejemplo de uso
