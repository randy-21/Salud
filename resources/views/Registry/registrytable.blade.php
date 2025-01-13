<table id="file_export" class="text-center   table-responsive">
    <thead>
        <tr>
            <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""></th>
            <th>ID</th>
            <th>Estado</th>
            <th><i class="ti ti-brand-whatsapp fs-7" style="color:green;"></i></th>
            <th>DNI</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Nombres</th>
            <th>Celular</th>
            <th>IPRESS</th>
            <th>Eje de Red y Microred</th>
            <th>Edad</th>
            <th>Distrito</th>
            <th>Procedencia</th>
            <th>Dirección</th>
            <th>FUR</th>
            <th>FPP</th>
            <th>Edad Gestacional</th>
            <th>Factor de Riesgo</th>
            <th>Color</th>
            <th>Observaciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($registries as $registry)
            <tr>
                <td>
                    <div class="dropdown dropstart">
                        <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="ti ti-dots-vertical fs-6"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a onclick="registryEdit('{{ $registry->id }}'); return false"
                                     data-bs-toggle="modal" data-bs-target="#success-header-modal"
                                    class="dropdown-item d-flex align-items-center gap-3">
                                    <i class="fs-4 ti ti-edit"></i>Editar
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"
                                    onclick="registryDestroy('{{ $registry->id }}'); return false">
                                    <i class="fs-4 ti ti-trash"></i>Eliminar
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
                <td>{{ $registry->id }}</td>
                <td>
                    @if ($registry->active)
                        <span class="badge text-bg-success">Activo</span>
                    @else
                        <span class="badge text-bg-danger">Inactivo</span>
                    @endif
                </td>
                <td>
                    @php
                        $whatsapp = 'https://api.whatsapp.com/send?phone=' . $registry->cellphone;
                    @endphp
                    <a target="_blank" href="{{ $whatsapp }}">
                        <i class="ti ti-brand-whatsapp fs-7" style="color:green;"></i>
                    </a>
                </td>
                <td>{{ $registry->dni }}</td>
                <td>{{ $registry->firstname }}</td>
                <td>{{ $registry->lastname }}</td>
                <td>{{ $registry->names }}</td>
                <td>{{ $registry->cellphone }}</td>
                <td>{{ $registry->ipress }}</td>
                <td>{{ $registry->network }}</td>
                <td>{{ $registry->age }}</td>
                <td>{{ $registry->district }}</td>
                <td>{{ $registry->provenance }}</td>
                <td>{{ $registry->address }}</td>
                <td>{{ $registry->fur }}</td>
                <td>{{ $registry->fpp }}</td>
                <td>{{ $registry->gestation_weeks }}</td>
                <td>{{ $registry->risk_factor }}</td>
                <td>{{ $registry->color }}</td>
                <td>{{ $registry->observations }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
