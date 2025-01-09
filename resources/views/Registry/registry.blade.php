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
                        <form action="" method="post" role="form" id="registry" name="registry"
                            enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">
                            {{ csrf_field() }}

                            <label>DNI</label>
                            <input name="dni" type="number" class="form-control" placeholder="DNI">
                            <label>Apellido Paterno</label>
                            <input name="firstname" type="text" class="form-control" placeholder="Apellido Paterno">
                            <label>Apellido Materno</label>
                            <input name="lastname" type="text" class="form-control"
                                placeholder="Apellido Materno">
                            <label>Nombres</label>
                            <input name="names" type="text" class="form-control" placeholder="Nombres">
                            <label>Celular</label>
                            <input type="number" name="cellphone" class="form-control" placeholder="Celular">
                           
                            <label>IPRESS</label>
                            <select name="ipress" class="form-control">
                                <option value="" disabled selected>Seleccione un IPRESS</option>
                                <option value="C.S. I-3 SAN GABRIEL DE VARADERO">C.S. I-3 SAN GABRIEL DE VARADERO</option>
                                <option value="C.S. I-3 BALSAPUERTO">C.S. I-3 BALSAPUERTO</option>
                                <option value="VISTA ALEGRE DE BALSAPUERTO">VISTA ALEGRE DE BALSAPUERTO</option>
                                <option value="P.S. I-1 NUEVA VIDA">P.S. I-1 NUEVA VIDA</option>
                                <option value="P.S. I-1 PROGRESO DE BALSAPUERTO">P.S. I-1 PROGRESO DE BALSAPUERTO</option>
                                <option value="P.S. I-1 PANAM">P.S. I-1 PANAM</option>
                                <option value="P.S. I-1 CENTRO AMERICA">P.S. I-1 CENTRO AMERICA</option>
                                <option value="P.S. I-1 SOLEDAD DE BALSAPUERTO">P.S. I-1 SOLEDAD DE BALSAPUERTO</option>
                                <option value="P.S. I-1 FRAY MARTIN">P.S. I-1 FRAY MARTIN</option>
                                <option value="P.S. I-1 NUEVA ESPERANZA DE BALSAPUERTO">P.S. I-1 NUEVA ESPERANZA DE BALSAPUERTO</option>
                                <option value="P.S. I-1 PUCALPILLO">P.S. I-1 PUCALPILLO</option>
                                <option value="P.S. I-1 SAN ANTONIO DE YANAYACU">P.S. I-1 SAN ANTONIO DE YANAYACU</option>
                                <option value="P.S. I-1 LIBERTAD DE BALSAPUERTO">P.S. I-1 LIBERTAD DE BALSAPUERTO</option>
                                <option value="P.S. I-1 ANTIOQUIA DE BALSAPUERTO">P.S. I-1 ANTIOQUIA DE BALSAPUERTO</option>
                                <option value="P.S. I-1 SAN MIGUEL DE YANAYACU">P.S. I-1 SAN MIGUEL DE YANAYACU</option>
                                <option value="P.S. I-1 TRES UNIDOS DE BALSAPUERO">P.S. I-1 TRES UNIDOS DE BALSAPUERO</option>
                                <option value="P.S I-1 SAN JUANN DE PALOMETAYACU">P.S I-1 SAN JUANN DE PALOMETAYACU</option>
                                <option value="C.S. I-3 JEBEROS">C.S. I-3 JEBEROS</option>
                                <option value="P.S. I-1 BELLAVISTA DE JEBEROS">P.S. I-1 BELLAVISTA DE JEBEROS</option>
                                <option value="P.S. I-1 MONTE CRISTO">P.S. I-1 MONTE CRISTO</option>
                                <option value="P.S. BETHEL">P.S. BETHEL</option>
                                <option value="P.S. VISTA ALEGRE DE JEBEROS">P.S. VISTA ALEGRE DE JEBEROS</option>
                                <option value="P.S. I-1 SAN FRANCISCO DE ALGODONAL DE JEBEROS">P.S. I-1 SAN FRANCISCO DE ALGODONAL DE JEBEROS</option>
                                <option value="C.S. LAGUNAS">C.S. LAGUNAS</option>
                                <option value="P.S. I-1 PUCACURO DE LAGUNAS">P.S. I-1 PUCACURO DE LAGUNAS</option>
                                <option value="P.S. I-1 PUERTO VICTORIA">P.S. I-1 PUERTO VICTORIA</option>
                                <option value="P.S. I-1 ARAHUANTE">P.S. I-1 ARAHUANTE</option>
                                <option value="P.S. I-1 BARRIO CENTRAL">P.S. I-1 BARRIO CENTRAL</option>
                                <option value="P.S. I-1 NUEVO MUNDO">P.S. I-1 NUEVO MUNDO</option>
                                <option value="P.S. I-1 HUANCAYO">P.S. I-1 HUANCAYO</option>
                                <option value="P.S. I-1 TAMARATE">P.S. I-1 TAMARATE</option>
                                <option value="P.S. I-1 NUEVO ARICA DE LAGUNAS">P.S. I-1 NUEVO ARICA DE LAGUNAS</option>
                                <option value="P.S. I-1 SEIS DE JULIO">P.S. I-1 SEIS DE JULIO</option>
                                <option value="P.S. NUEVA UNION DE LAGUNAS">P.S. NUEVA UNION DE LAGUNAS</option>
                                <option value="P.S. I-1 BARRIO VIRGEN DE GUADALUPE DE VILLA LAGUNAS">P.S. I-1 BARRIO VIRGEN DE GUADALUPE DE VILLA LAGUNAS</option>
                                <option value="P.S. I-1 PUERTO ALEGRE DE LAGUNAS">P.S. I-1 PUERTO ALEGRE DE LAGUNAS</option>
                                <option value="P.S I-1 UNION ZANCUDO LAGUNAS">P.S I-1 UNION ZANCUDO LAGUNAS</option>
                                <option value="C.S. I-3 SANTA CRUZ">C.S. I-3 SANTA CRUZ</option>
                                <option value="P.S. I-1 ACHUAL TIPISCHA">P.S. I-1 ACHUAL TIPISCHA</option>
                                <option value="P.S. I-1 LAGO NARANJAL">P.S. I-1 LAGO NARANJAL</option>
                                <option value="P.S. I-1 UNION CAMPESINA">P.S. I-1 UNION CAMPESINA</option>
                                <option value="P.S. I-1 PROGRESO DE SANTA CRUZ">P.S. I-1 PROGRESO DE SANTA CRUZ</option>
                                <option value="P.S. I-1 NUEVO TRIUNFO">P.S. I-1 NUEVO TRIUNFO</option>
                                <option value="P.S. I-1 HUATAPI DEL RIO HUALLAGA">P.S. I-1 HUATAPI DEL RIO HUALLAGA</option>
                                <option value="P.S. I-1 SAN ANTONIO DEL SHISHINAHUA">P.S. I-1 SAN ANTONIO DEL SHISHINAHUA</option>
                                <option value="P.S. I-1 SELVA ALEGRE DE SANTA CRUZ">P.S. I-1 SELVA ALEGRE DE SANTA CRUZ</option>
                                <option value="P.S. I-1 SANTA GEMA DE SANTA CRUZ">P.S. I-1 SANTA GEMA DE SANTA CRUZ</option>
                                <option value="P.S. I-1 SAN JOSE DE SHISHINAHUA DE SANTA CRUZ">P.S. I-1 SAN JOSE DE SHISHINAHUA DE SANTA CRUZ</option>
                                <option value="P.S. I-1 JORGE CHAVEZ">P.S. I-1 JORGE CHAVEZ</option>
                                <option value="P.S. I-1 CUIPARI">P.S. I-1 CUIPARI</option>
                                <option value="P.S. I-1 SONAPI">P.S. I-1 SONAPI</option>
                                <option value="C.S. I-3 SHUCUSHYACU">C.S. I-3 SHUCUSHYACU</option>
                                <option value="P.S. I-1 PARINARI">P.S. I-1 PARINARI</option>
                                <option value="P.S. I-1 LIBERTAD DE CUIPARILLO">P.S. I-1 LIBERTAD DE CUIPARILLO</option>
                                <option value="P.S. I-1 GLORIA">P.S. I-1 GLORIA</option>
                                <option value="P.S. I-1 NUEVO PAPAPLAYA">P.S. I-1 NUEVO PAPAPLAYA</option>
                                <option value="P.S. I-1 SAN MIGUEL DE TENIENTE CESAR LOPEZ ROJAS">P.S. I-1 SAN MIGUEL DE TENIENTE CESAR LOPEZ ROJAS</option>
                                <option value="C.S. 1-3 CENTRO ESPEC.MATERNO INFAN.AGUAMIRO">C.S. 1-3 CENTRO ESPEC.MATERNO INFAN.AGUAMIRO</option>
                                <option value="C.S. I-3 CARRETERA KM 1.5">C.S. I-3 CARRETERA KM 1.5</option>
                                <option value="C.S. I-3 LOMA">C.S. I-3 LOMA</option>
                                <option value="C.S. I-3 MUNICHIS DE YURIMAGUAS">C.S. I-3 MUNICHIS DE YURIMAGUAS</option>
                                <option value="C.S. I-3 SANTA MARIA">C.S. I-3 SANTA MARIA</option>
                                <option value="C.S. NATIVIDAD">C.S. NATIVIDAD</option>
                                <option value="C.S. PAMPA HERMOZA DE YURIMAGUAS">C.S. PAMPA HERMOZA DE YURIMAGUAS</option>
                                <option value="CENTRO DE SALUD MENTAL COMUNITARIO - YURIMAGUAS">CENTRO DE SALUD MENTAL COMUNITARIO - YURIMAGUAS</option>
                                <option value="COTOYACU">COTOYACU</option>
                                <option value="GRAU KM.40">GRAU KM.40</option>
                                <option value="HOGAR PROTEGIDO YURIMAGUAS CORAZONES SOLIDARIOS">HOGAR PROTEGIDO YURIMAGUAS CORAZONES SOLIDARIOS</option>
                                <option value="HOSPITAL SANTA GEMA DE YURIMAGUAS">HOSPITAL SANTA GEMA DE YURIMAGUAS</option>
                                <option value="P.S. I-2 VILLA DEL PARANAPURA DE YURIMAGUAS">P.S. I-2 VILLA DEL PARANAPURA DE YURIMAGUAS</option>
                                <option value="P.S. 1-2 NUEVO ARICA DE BALSAPUERTO">P.S. 1-2 NUEVO ARICA DE BALSAPUERTO</option>
                                <option value="P.S. I-1 AA.HH. 30 DE AGOSTO KM. 17">P.S. I-1 AA.HH. 30 DE AGOSTO KM. 17</option>
                                <option value="P.S. I-1 ACHUAL LIMON">P.S. I-1 ACHUAL LIMON</option>
                                <option value="P.S. I-1 ALTO MOHENA">P.S. I-1 ALTO MOHENA</option>
                                <option value="P.S. I-1 CHIRAPA">P.S. I-1 CHIRAPA</option>
                                <option value="P.S. I-1 DOS DE MAYO DE YURIMAGUAS">P.S. I-1 DOS DE MAYO DE YURIMAGUAS</option>
                                <option value="P.S. I-1 INDEPENDENCIA DEL SHANUSI">P.S. I-1 INDEPENDENCIA DEL SHANUSI</option>
                                <option value="P.S. I-1 JEBERILLOS">P.S. I-1 JEBERILLOS</option>
                                <option value="P.S. I-1 LAGO SANANGO">P.S. I-1 LAGO SANANGO</option>
                                <option value="P.S. I-1 LAS AMAZONAS">P.S. I-1 LAS AMAZONAS</option>
                                <option value="P.S. I-1 LAS PALMERAS DE YURIMAGUAS">P.S. I-1 LAS PALMERAS DE YURIMAGUAS</option>
                                <option value="P.S. I-1 NUEVA ERA">P.S. I-1 NUEVA ERA</option>
                                <option value="P.S. I-1 PROVIDENCIA DE YURIMAGUAS">P.S. I-1 PROVIDENCIA DE YURIMAGUAS</option>
                                <option value="P.S. I-1 PUERTO ARTURO">P.S. I-1 PUERTO ARTURO</option>
                                <option value="P.S. I-1 PUERTO PERU">P.S. I-1 PUERTO PERU</option>
                                <option value="P.S. I-1 PUERTO PORVENIR">P.S. I-1 PUERTO PORVENIR</option>
                                <option value="P.S. I-1 ROCA FUERTE">P.S. I-1 ROCA FUERTE</option>
                                <option value="P.S. I-1 SAN FRANCISCO PAMPAYACU">P.S. I-1 SAN FRANCISCO PAMPAYACU</option>
                                <option value="P.S. I-1 SAN JUAN DE BALSAPUERTO">P.S. I-1 SAN JUAN DE BALSAPUERTO</option>
                                <option value="P.S. I-1 SAN JUAN DE PAMPLONA">P.S. I-1 SAN JUAN DE PAMPLONA</option>
                                <option value="P.S. I-1 SAN JUAN DE ZAPOTE">P.S. I-1 SAN JUAN DE ZAPOTE</option>
                                <option value="P.S. I-1 SAN PEDRO DE ZAPOTE">P.S. I-1 SAN PEDRO DE ZAPOTE</option>
                                <option value="P.S. I-1 SAN ROQUE DE YURIMAGUAS">P.S. I-1 SAN ROQUE DE YURIMAGUAS</option>
                                <option value="P.S. I-1 SANTA ISABEL">P.S. I-1 SANTA ISABEL</option>
                                <option value="P.S. I-1 SANTA LUCIA">P.S. I-1 SANTA LUCIA</option>
                                <option value="P.S. I-1 SANTO TOMAS DE YURIMAGUAS">P.S. I-1 SANTO TOMAS DE YURIMAGUAS</option>
                                <option value="P.S. I-1 TUPAC AMARU DE YURIMAGUAS">P.S. I-1 TUPAC AMARU DE YURIMAGUAS</option>
                                <option value="P.S. I-1 VARADERILLO">P.S. I-1 VARADERILLO</option>
                                <option value="P.S. I-1 VILLA HERMOSA DE YURIMAGUAS">P.S. I-1 VILLA HERMOSA DE YURIMAGUAS</option>
                                <option value="P.S. I-1 VISTA ALEGRE DE YURIMAGUAS">P.S. I-1 VISTA ALEGRE DE YURIMAGUAS</option>
                                <option value="P.S. I-1 ZAPOTE">P.S. I-1 ZAPOTE</option>
                                <option value="P.S. I-2 INDEPENDENCIA">P.S. I-2 INDEPENDENCIA</option>
                                <option value="P.S. LA UNION DE ZAPOTE DE YURIMAGUAS">P.S. LA UNION DE ZAPOTE DE YURIMAGUAS</option>
                                <option value="P.S. LUZ DEL ORIENTE">P.S. LUZ DEL ORIENTE</option>
                                <option value="P.S. NUEVO HORIZONTE DE YURIMAGUAS">P.S. NUEVO HORIZONTE DE YURIMAGUAS</option>
                                <option value="P.S. NUEVO PIJUAYAL DE YURIMAGUAS">P.S. NUEVO PIJUAYAL DE YURIMAGUAS</option>
                            </select>
                            
                            <label>Eje de Red y Microred</label>
                           
                            <select name="network" class="form-control">
                                <option value="" disabled selected>Seleccione un eje micro red</option>
                                <option value="EJE SAN GABRIEL DE VARADERO">EJE SAN GABRIEL DE VARADERO</option>
                                <option value="EJE BALSAPUERTO">EJE BALSAPUERTO</option>
                                <option value="EJE JEBEROS">EJE JEBEROS</option>
                                <option value="EJE LAGUNAS">EJE LAGUNAS</option>
                                <option value="EJE SANTA CRUZ">EJE SANTA CRUZ</option>
                                <option value="EJE SHUCUSHYACU">EJE SHUCUSHYACU</option>
                                <option value="EJE AGUAMIRO">EJE AGUAMIRO</option>
                                <option value="EJE CARRETERA">EJE CARRETERA</option>
                                <option value="EJE LOMA">EJE LOMA</option>
                                <option value="EJE MUNICHIS">EJE MUNICHIS</option>
                                <option value="EJE SANTA MARIA">EJE SANTA MARIA</option>
                                <option value="EJE NATIVIDAD">EJE NATIVIDAD</option>
                                <option value="EJE PAMPAHERMOSA">EJE PAMPAHERMOSA</option>
                                <option value="SALUD MENTAL">SALUD MENTAL</option>
                                <option value="EJE GRAU">EJE GRAU</option>
                                <option value="HOGAR PROTEGIDO">HOGAR PROTEGIDO</option>
                                <option value="HOSPITAL SANTA GEMA">HOSPITAL SANTA GEMA</option>
                                <option value="EJE INDEPENDENCIA">EJE INDEPENDENCIA</option>
                            </select>
                            
                            <label>Distrtito</label>
                            <select name="district" class="form-control">
                                <option value="" disabled selected>Seleccione un distrito</option>
                                <option value="YURIMAGUAS">YURIMAGUAS</option>
                                <option value="BALSAPUERTO">BALSAPUERTO</option>
                                <option value="SANTA CRUZ">SANTA CRUZ</option>
                                <option value="JEBEROS">JEBEROS</option>
                                <option value="LAGUNAS">LAGUNAS</option>
                                <option value="TENIENTE CESAR LOPEZ">TENIENTE CESAR LOPEZ</option>
                            </select>

                            <label>Edad</label>
                            <input type="number" name="age" class="form-control" placeholder="Edad">
                            <label>Procedencia</label>
                            <input type="text" name="provenance" class="form-control" placeholder="Procedencia">
                            <label>Dirección</label>
                            <input type="text" name="address" class="form-control" placeholder="Dirección">
                            <label>FUR (Fecha Última Regla)</label>
                            <input type="date" name="fur" class="form-control">
                            <label>FPP (Fecha Probable de Parto)</label>
                            <input type="date" name="fpp" class="form-control">
                            <label>Edad Gestacional</label>
                            <input type="number" name="gestation_weeks" class="form-control" placeholder="Semanas">
                            <label>Factor de Riesgo</label>

                            <select name="risk_factor" class="form-control">
                                <option value="" disabled selected>Seleccione un factor de riesgo</option>
                                <option value="gestantes_termino_sin_riesgo">GESTANTES A TÉRMINO SIN NINGÚN FACTOR DE
                                    RIESGO APARENTE</option>
                                <option value="antecedente_aborto">ANTECEDENTE DE ABORTO</option>
                                <option value="antecedente_parto_prematuro">ANTECEDENTE DE PARTO PREMATURO</option>
                                <option value="antecedente_parto_domiciliario">ANTECEDENTE DE PARTO DOMICILIARIO</option>
                                <option value="antecedente_violencia">ANTECEDENTE DE VIOLENCIA</option>
                                <option value="periodo_intergenesico">PERIODO INTERGENÉSICO CORTO O LARGO</option>
                                <option value="gestantes_migracion_constante">GESTANTES CON MIGRACIÓN CONSTANTE</option>
                                <option value="edad_15_19">EDAD ENTRE LOS 15 A 19 AÑOS</option>
                                <option value="pre_eclampsia">PRE ECLAMPSIA LEVE O SEVERA Y ECLAMPSIA</option>
                                <option value="placenta_previa">PLACENTA PREVIA (TOTAL, PARCIAL)</option>
                                <option value="sepsis">SEPSIS</option>
                                <option value="amenaza_parto_prematuro">AMENAZA DE PARTO PREMATURO</option>
                                <option value="distocia_presentacion">DISTOCIA DE PRESENTACIÓN</option>
                                <option value="multiparidad">MULTIPARIDAD</option>
                                <option value="patologia_endocrina">GESTANTES A TÉRMINO CON PATOLOGÍA ENDOCRINA,
                                    INFECCIOSA, QUIRÚRGICA, ETC.</option>
                                <option value="antecedente_ruptura_uterina">ANTECEDENTE DE RUPTURA UTERINA</option>
                                <option value="atonia_uterina">ATONÍA UTERINA</option>
                                <option value="desprendimiento_placenta">DESPRENDIMIENTO PREMATURO DE PLACENTA</option>
                                <option value="cesareada_anterior">CESAREADA ANTERIOR</option>
                                <option value="itu_actual_recurrente">ITU ACTUAL O RECURRENTE</option>
                                <option value="lujo_vaginal">LUJO VAGINAL</option>
                                <option value="parto_domiciliario">PARTO DOMICILIARIO</option>
                                <option value="inicio_tarde_apn">INICIO TARDE DE APN</option>
                                <option value="anemia_actual">ANEMIA ACTUAL</option>
                                <option value="feto_podalico">FETO PODÁLICO CON EDAD GESTACIONAL MAYOR DE 34 SS</option>
                                <option value="edad_menor_15">EDAD MENOR DE 15 AÑOS</option>
                                <option value="gestante_reacia_atencion">GESTANTE REACIA A LA ATENCIÓN INSTITUCIONAL SEA DE
                                    LA ATENCIÓN PRE NATAL O/Y DEL PARTO Y PUERPERIO</option>
                                <option value="inaccesibilidad_geografica">GESTANTE CON INACCESIBILIDAD GEOGRÁFICA</option>
                                <option value="paradero_desconocido">GESTANTES CUYO PARADERO SE DESCONOCE</option>
                                <option value="antecedente_cesarea">ANTECEDENTE DE CESÁREA U OTRA INTERVENCIÓN QUIRÚRGICA
                                    GINECOLÓGICA</option>
                                <option value="primiparidad">PRIMIPARIDAD</option>
                                <option value="edad_mayor_35">MAYOR DE 35 AÑOS</option>
                            </select>

                            <label>Color</label>
                            <input type="text" name="color" class="form-control" placeholder="Color">
                            <label>Observaciones</label>
                            <textarea name="observations" class="form-control" rows="3" placeholder="Observaciones"></textarea>
                        </form>
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
