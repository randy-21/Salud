<div class="table-responsive-xl">
    <table id="file_export" class="table text-center table-striped">
        <thead>
            <tr>
                <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""></th>
                <th>ID</th>
                <th>Estado</th>
                <th>Distrito</th>
                <th>Eje de Red y Microred</th>
                <th>IPRESS</th>
                <th>DNI</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Nombres</th>
                <th>Celular</th>
                <th>Edad</th>
                <th>Procedencia</th>
                <th>Dirección</th>
                <th>FUR</th>
                <th>FPP</th>
                <th>Edad Gestacional</th>
                <th>Factor de Riesgo</th>
                <th>Color</th>
                <th>Paridad</th>
                <th>Hemoglogina</th>
                <th>Anemia</th>
                <th>Fecha 1 CPN</th>
                <th>F Parto</th>
                <th>F Cita</th>
                <th>Observaciones</th>
                <th><i class="ti ti-brand-whatsapp fs-7" style="color:green;"></i></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($registries as $registry)
                <tr>
                    <td>
                        <div class="dropdown dropstart">
                            <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical fs-6"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a onclick="registryEdit('{{ $registry->id }}'); return false"
                                         
                                        class="dropdown-item d-flex align-items-center gap-3">
                                        <i class="fs-4 ti ti-edit"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"
                                        onclick="registryDestroy('{{ $registry->id }}'); return false">
                                        <i class="fs-4 ti ti-trash"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td>{{ $registry->id }}</td>
                    <td>
                        @php
                          
                // Diferencia en días (valor absoluto)
            $diferenciaEnDias = $fechaActual->diffInDays($registry->date_part);
                           

                        @endphp
                        @if ( abs($diferenciaEnDias) > 42 )
                        <span class="badge text-bg-danger">Inactivo</span>
                        @else
                        <span class="badge text-bg-success">Activo </span>
                        @endif
                    </td>

                    <td>{{ $registry->district }}</td>
                    <td>{{ $registry->network }}</td>
                    <td>{{ $registry->ipress }}</td>
                    <td>{{ $registry->dni }}</td>
                    <td>{{ $registry->firstname }}</td>
                    <td>{{ $registry->lastname }}</td>
                    <td>{{ $registry->names }}</td>
                    <td>{{ $registry->cellphone }}</td>
                    <td>{{ $registry->age }}</td>
                    <td>{{ $registry->provenance }}</td>
                    <td>{{ $registry->address }}</td>
                    <td>{{ $registry->fur }}</td>
                    <td>{{ $registry->fpp }}</td>
                    <td>{{ $registry->gestation_weeks }}</td>
                    @php
                        $riks_factor = explode(' - ', $registry->risk_factor);
                    @endphp
                    <td>{{ $riks_factor[1] }}</td>
                    <td>{{ $registry->color }}</td>
                    <td>{{ $registry->parity }}</td>
                    <td>{{ $registry->hemoglobine }}</td>
                    <td>{{ $registry->anemia }}</td>
                    <td>{{ $registry->cpn }}</td>
                    <td>{{ $registry->date_part }}</td>
                    <td>{{ $registry->date_cite }}</td>
                    <td>{{ $registry->observations }}</td>
                    <td>
                        @php
                            $whatsapp = 'https://api.whatsapp.com/send?phone=' . $registry->cellphone;
                        @endphp
                        <a target="_blank" href="{{ $whatsapp }}">
                            <i class="ti ti-brand-whatsapp fs-7" style="color:green;"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p></p>
</div>
<style>
    .table-responsive-xl {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        /* Suaviza el scroll en dispositivos táctiles */
        display: block;
        /* Asegura que se comporta como un bloque */
    }
</style>

