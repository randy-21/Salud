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
                                <button type="button" class="btn mb-1 me-1 bg-success-subtle text-success"
                                    data-bs-toggle="modal" data-bs-target="#success-header-modal" fdprocessedid="cw61t3"
                                    onclick="New();$('#registry')[0].reset();">
                                    Agregar
                                </button>
                            @endcanany
                        </p>
                        <div class="container">
                            <form action="" method="post" role="form" id="registry" name="registry" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Distrito</label>
                                        <select name="district" class="form-control">
                                            <option value="" disabled selected>Seleccione un distrito</option>
                                            <option value="YURIMAGUAS">YURIMAGUAS</option>
                                            <option value="BALSAPUERTO">BALSAPUERTO</option>
                                            <!-- Opciones reducidas para ejemplo -->
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Eje de Red y Microred</label>
                                        <select name="network" class="form-control">
                                            <option value="" disabled selected>Seleccione un eje micro red</option>
                                            <option value="EJE SAN GABRIEL DE VARADERO">EJE SAN GABRIEL DE VARADERO</option>
                                            <option value="EJE BALSAPUERTO">EJE BALSAPUERTO</option>
                                            <!-- Opciones reducidas para ejemplo -->
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>IPRESS</label>
                                        <select name="ipress" class="form-control">
                                            <option value="" disabled selected>Seleccione un IPRESS</option>
                                            <option value="C.S. I-3 SAN GABRIEL DE VARADERO">C.S. I-3 SAN GABRIEL DE VARADERO</option>
                                            <option value="C.S. I-3 BALSAPUERTO">C.S. I-3 BALSAPUERTO</option>
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
                                        <input type="date" name="fur" class="form-control">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>FPP (Fecha Probable de Parto)</label>
                                        <input type="date" name="fpp" class="form-control">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Edad Gestacional</label>
                                        <input type="number" name="gestation_weeks" class="form-control" placeholder="Semanas">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Factor de Riesgo</label>
                                        <select name="risk_factor" class="form-control">
                                            <option value="" disabled selected>Seleccione un factor de riesgo</option>
                                            <option value="gestantes_termino_sin_riesgo">GESTANTES A TÉRMINO SIN NINGÚN FACTOR DE RIESGO APARENTE</option>
                                            <!-- Opciones reducidas para ejemplo -->
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Color</label>
                                        <input type="text" name="color" class="form-control" placeholder="Color">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Paridad</label>
                                        <input type="text" name="parity" class="form-control" placeholder="Color">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Hemoglobina</label>
                                        <input type="text" name="hemoglobin" class="form-control" placeholder="Color">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Anemia</label>
                                        <input type="text" name="anemia" class="form-control" placeholder="Color">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Anemia</label>
                                        <input type="text" name="anemia" class="form-control" placeholder="Color">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>CPN</label>
                                        <input type="text" name="cpn" class="form-control" placeholder="Color">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Fecha de Parto</label>
                                        <input type="text" name="date_parto" class="form-control" placeholder="Color">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Fecha de cita</label>
                                        <input type="text" name="date_cita" class="form-control" placeholder="Color">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <label>Observaciones</label>
                                        <textarea name="observations" class="form-control" rows="3" placeholder="Observaciones"></textarea>
                                    </div>
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                        
                        <div class="mb-2">
                            <h4 class="card-title mb-0">Exportar</h4>
                        </div>
                        <div class="table-responsive" id="mycontent">
                            @include('registry.registrytable') <!-- Actualiza con tu archivo de tabla -->
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
