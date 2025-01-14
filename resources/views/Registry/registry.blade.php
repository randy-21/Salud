@extends('template')
@section('content')
    <div class="body-wrapper">
        <div class="">
            <div class="card card-body py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-sm-flex align-items-center justify-space-between">
                            <h1 class="text-primary">Registros</h1>
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item d-flex align-items-center">
                                        <a class="text-muted text-decoration-none d-flex" href="../main/index.html">
                                            <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                            Registros
                                        </span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="datatables">
                <div class="card">
                    <div class="card-body">
                        <p class="card-subtitle mb-3">
                            @canany(['administrar', 'agregar'])
                                {{-- <button type="button" class="btn mb-1 me-1 bg-success-subtle text-success"
                                    data-bs-toggle="modal" data-bs-target="#success-header-modal" fdprocessedid="cw61t3"
                                    onclick="New();$('#registry')[0].reset();">
                                    Agregar
                                </button> --}}
                            @endcanany
                        </p>
                        <div class="container">
                            <form action="" method="post" role="form" id="registry" name="registry" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Distrito</label>
                                        <select name="district"id="district" class="form-control"
                                        onchange="actualizarnetwork()"
                                        >
                                            <option value="" disabled selected>Seleccione un distrito</option>
                                      
                                            <!-- Opciones reducidas para ejemplo -->
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Eje de Red y Microred</label>
                                        <select name="network"id="network" class="form-control"onchange="actualizarNombreEstablecimiento();">
                                          
                                            <!-- Opciones reducidas para ejemplo -->
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>IPRESS</label>
                                        <select name="ipress"id="ipress" class="form-control">
                                           
                                            <!-- Opciones reducidas para ejemplo -->
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>DNI</label>
                                        <input name="dni" type="number" class="form-control" placeholder="DNI">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Apellido Paterno</label>
                                        <input name="firstname" type="text" class="form-control" placeholder="Apellido Paterno">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Apellido Materno</label>
                                        <input name="lastname" type="text" class="form-control" placeholder="Apellido Materno">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Nombres</label>
                                        <input name="names" type="text" class="form-control" placeholder="Nombres">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Celular</label>
                                        <input type="number" name="cellphone" class="form-control" placeholder="Celular">
                                    </div>
                                   
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Edad</label>
                                        <input type="number" name="age" class="form-control" placeholder="Edad">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Procedencia</label>
                                        <input type="text" name="provenance" class="form-control" placeholder="Procedencia">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Dirección</label>
                                        <input type="text" name="address" class="form-control" placeholder="Dirección">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>FUR (Fecha Última Regla)</label>
                                        <input type="date" name="fur"id="fur" class="form-control"onchange="getWeekPregnat()">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>FPP (Fecha Probable de Parto)</label>
                                        <input type="date" name="fpp" class="form-control">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Edad Gestacional</label>
                                        <input type="number" name="gestation_weeks"id="gestation_weeks" class="form-control" placeholder="Semanas">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Factor de Riesgo</label>
                                        <select name="risk_factor" id="risk_factor" class="form-control"onchange="getColor('risk_factor','color')" >
                                            <option value="" disabled selected>Seleccione un factor de riesgo</option>
                                            <option value="VERDE - GESTANTES A TÉRMINO SIN NINGÚN FACTOR DE RIESGO APARENTE">
                                                GESTANTES A TÉRMINO SIN NINGÚN FACTOR DE RIESGO APARENTE
                                            </option>
                                            <option value="VERDE - ANTECEDENTE DE ABORTO">
                                                ANTECEDENTE DE ABORTO
                                            </option>
                                            <option value="AMARILLO - ANTECEDENTE DE PARTO PREMATURO">
                                                ANTECEDENTE DE PARTO PREMATURO
                                            </option>
                                            <option value="AMARILLO - ANTECEDENTE DE PARTO DOMICILIARIO">
                                                ANTECEDENTE DE PARTO DOMICILIARIO
                                            </option>
                                            <option value="AMARILLO - ANTECEDENTE DE VIOLENCIA">
                                                ANTECEDENTE DE VIOLENCIA
                                            </option>
                                            <option value="AMARILLO - PERIODO INTERGENÉSICO CORTO O LARGO">
                                                PERIODO INTERGENÉSICO CORTO O LARGO
                                            </option>
                                            <option value="AMARILLO - GESTANTES CON MIGRACIÓN CONSTANTE">
                                                GESTANTES CON MIGRACIÓN CONSTANTE
                                            </option>
                                            <option value="AMARILLO - EDAD ENTRE LOS 15 A 19 AÑOS">
                                                EDAD ENTRE LOS 15 A 19 AÑOS
                                            </option>
                                            <option value="AMARILLO - PRE ECLAMPSIA LEVE O SEVERA Y ECLAMPSIA">
                                                PRE ECLAMPSIA LEVE O SEVERA Y ECLAMPSIA
                                            </option>
                                            <option value="ROJO - PLACENTA PREVIA (TOTAL, PARCIAL)">
                                                PLACENTA PREVIA (TOTAL, PARCIAL)
                                            </option>
                                            <option value="ROJO - SEPSIS">
                                                SEPSIS
                                            </option>
                                            <option value="ROJO - AMENAZA DE PARTO PREMATURO">
                                                AMENAZA DE PARTO PREMATURO
                                            </option>
                                            <option value="ROJO - DISTOCIA DE PRESENTACIÓN">
                                                DISTOCIA DE PRESENTACIÓN
                                            </option>
                                            <option value="ROJO - MULTIPARIDAD">
                                                MULTIPARIDAD
                                            </option>
                                            <option value="ROJO - GESTANTES A TÉRMINO CON PATOLOGÍA ENDOCRINA, INFECCIOSA, QUIRÚRGICA, ETC">
                                                GESTANTES A TÉRMINO CON PATOLOGÍA ENDOCRINA, INFECCIOSA, QUIRÚRGICA, ETC
                                            </option>
                                            <option value="ROJO - ANTECEDENTE DE RUPTURA UTERINA">
                                                ANTECEDENTE DE RUPTURA UTERINA
                                            </option>
                                            <option value="ROJO - ATONÍA UTERINA">
                                                ATONÍA UTERINA
                                            </option>
                                            <option value="ROJO - DESPRENDIMIENTO PREMATURO DE PLACENTA">
                                                DESPRENDIMIENTO PREMATURO DE PLACENTA
                                            </option>
                                            <option value="ROJO - CESAREADA ANTERIOR">
                                                CESAREADA ANTERIOR
                                            </option>
                                            <option value="ROJO - ITU ACTUAL O RECURRENTE">
                                                ITU ACTUAL O RECURRENTE
                                            </option>
                                            <option value="ROJO - FLUJO VAGINAL">
                                                FLUJO VAGINAL
                                            </option>
                                            <option value="ROJO - PARTO DOMICILIARIO">
                                                PARTO DOMICILIARIO
                                            </option>
                                            <option value="ROJO - INICIO TARDE DE APN">
                                                INICIO TARDE DE APN
                                            </option>
                                            <option value="ROJO - ANEMIA ACTUAL">
                                                ANEMIA ACTUAL
                                            </option>
                                            <option value="ROJO - FETO PODÁLICO CON EDAD GESTACIONAL MAYOR DE 34 SS">
                                                FETO PODÁLICO CON EDAD GESTACIONAL MAYOR DE 34 SS
                                            </option>
                                            <option value="ROJO - EDAD MENOR DE 15 AÑOS">
                                                EDAD MENOR DE 15 AÑOS
                                            </option>
                                            <option value="ROJO - GESTANTE REACIA A LA ATENCIÓN INSTITUCIONAL SEA DE LA ATENCIÓN PRE NATAL O/Y DEL PARTO Y PUERPERIO">
                                                GESTANTE REACIA A LA ATENCIÓN INSTITUCIONAL SEA DE LA ATENCIÓN PRE NATAL O/Y DEL PARTO Y PUERPERIO
                                            </option>
                                            <option value="ROJO - GESTANTE CON INACCESIBILIDAD GEOGRÁFICA">
                                                GESTANTE CON INACCESIBILIDAD GEOGRÁFICA
                                            </option>
                                            <option value="ROJO - GESTANTES CUYO PARADERO SE DESCONOCE">
                                                GESTANTES CUYO PARADERO SE DESCONOCE
                                            </option>
                                            <option value="ROJO - ANTECEDENTE DE CESÁREA U OTRA INTERVENCIÓN QUIRÚRGICA GINECOLÓGICA">
                                                ANTECEDENTE DE CESÁREA U OTRA INTERVENCIÓN QUIRÚRGICA GINECOLÓGICA
                                            </option>
                                            <option value="ROJO - PRIMIPARIDAD">
                                                PRIMIPARIDAD
                                            </option>
                                            <option value="ROJO - MAYOR DE 35 AÑOS">
                                                MAYOR DE 35 AÑOS
                                            </option>
                                            <!-- Opciones reducidas para ejemplo -->
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Color</label>
                                        <input type="text"id="color" name="color" class="form-control" placeholder="Color" >
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Paridad</label>
                                        <input type="text" name="parity" class="form-control" placeholder="Paridad">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Hemoglobina</label>
                                        <input type="number" name="hemoglobine"id="hemoglobine" class="form-control" placeholder="Hemoglobina"value="0" onchange="evaluarAnemia('hemoglobine', 'anemia')">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Anemia</label>
                                        <input type="text" name="anemia" class="form-control"id="anemia" placeholder="Anemia" readonly>
                                    </div>
                                  
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>CPN</label>
                                        <input type="text" name="cpn" class="form-control" placeholder="CPN">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Fecha de Parto</label>
                                        <input type="date" name="date_part" class="form-control">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Fecha de cita</label>
                                        <input type="date" name="date_cite" class="form-control" >
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Observaciones</label>
                                        <textarea name="observations" class="form-control" rows="3" placeholder="Observaciones"></textarea>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        @canany(['administrar', 'agregar'])
                            <button type="button" class="btn bg-success-subtle text-success" onclick="registryStore()">
                                Guardar
                            </button>
                        @endcanany
                        @canany(['administrar', 'actualizar'])
                            <button type="button" class="btn bg-danger-subtle text-danger" onclick="registryUpdate()">
                                Modificar
                            </button>
                        @endcanany
                                {{ csrf_field() }}
                            </form>
                        </div>
                        
                        <div class="mb-2">
                            <h4 class="card-title mb-0">Exportar</h4>
                        </div>
                        <div class="table-responsive" id="mycontent">
                            @include('Registry.registrytable') <!-- Actualiza con tu archivo de tabla -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="button-group">
        <div id="success-header-modal" class="modal fade" tabindex="-1" aria-labelledby="success-header-modalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-success text-white">
                        <h4 class="modal-title text-white" id="success-header-modalLabel">
                            Registro
                        </h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script defer>
        // Cargar distritos al iniciar la página
document.addEventListener("DOMContentLoaded", cargardistricts);
    </script>
@endsection
