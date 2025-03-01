<!DOCTYPE html>
<html>
<head>
    <title>Registro de Cita</title>
</head>
<body>

    <h1 style='background-color: #E0E0E0; color: #02424E; padding: 10px;'>SEGUIMIENTO DE GESTANTE - DÍA DE CITA - HOY</h1>

    <div style="font-size: 14px;">
        <div>
            <strong>Estimado Usuario:</strong>
            <br>Su cita es el día de hoy.
            <br><br>

            <table cellpadding="10">
                <tbody>
                    <tr>
                        <td>
                            <strong style="font-size:17px">Fecha de Cita:</strong>
                            <strong>{{ $registry->date_cite }}</strong>
                        </td>

                    </tr>
                </tbody>
            </table>

            <br>

            <table cellpadding="5">
                <tbody>
                    <tr>
                        <td colspan="4"><strong style="font-size:17px">1. Datos del Paciente</strong></td>
                    </tr>

                    <tr>
                        <td colspan="4"><hr></td>
                    </tr>
                    <tr>
                        <td><strong>Nombre:</strong> {{ $registry->firstname }} {{ $registry->lastname }}</td>
                        <td><strong>DNI:</strong> {{ $registry->dni }}</td>
                    </tr>
                    <tr>
                        <td><strong>Edad:</strong> {{ $registry->age }}</td>
                        <td><strong>Teléfono:</strong> {{ $registry->cellphone }}</td>
                    </tr>
                    <tr>
                        <td><strong>Dirección:</strong> {{ $registry->address }}</td>
                        <td><strong>Distrito:</strong> {{ $registry->district }}</td>
                    </tr>
                    <tr>
                        <td><strong>Correo electrónico:</strong> {{ $registry->user->email }}</td>
                    </tr>

                    <tr>
                        <td colspan="4"><br></td>
                    </tr>

                    <tr>
                        <td colspan="4"><strong style="font-size:17px">2. Datos Médicos</strong></td>
                    </tr>

                    <tr>
                        <td colspan="4"><hr></td>
                    </tr>

                    <tr>
                        <td><strong>Semanas de Gestación:</strong> {{ $registry->gestation_weeks }}</td>
                        <td><strong>FUR:</strong> {{ $registry->fur }}</td>
                    </tr>
                    <tr>
                        <td><strong>FPP:</strong> {{ $registry->fpp }}</td>
                        <td><strong>Color:</strong> {{ $registry->color }}</td>
                    </tr>
                    <tr>
                        <td><strong>Paridad:</strong> {{ $registry->parity }}</td>
                        <td><strong>Hemoglobina:</strong> {{ $registry->hemoglobine }}</td>
                    </tr>
                    <tr>
                        <td><strong>Anemia:</strong> {{ $registry->anemia }}</td>
                        <td><strong>CPN:</strong> {{ $registry->cpn }}</td>
                    </tr>
                    <tr>
                        <td><strong>Factor de Riesgo:</strong></td>
                        <td>
                            @foreach ($registry->risk_factors as $item)
                            @php
                           $separate= explode(" - ",$item->description);
                            @endphp
                            {{$separate[1]  }},
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4"><br></td>
                    </tr>

                    <tr>
                        <td colspan="4"><strong style="font-size:17px">3. Observaciones</strong></td>
                    </tr>

                    <tr>
                        <td colspan="4"><hr></td>
                    </tr>
                    <tr>
                        <td colspan="4">{{ $registry->observations }}</td>
                    </tr>

                    <tr>
                        <td colspan="4">
                            <hr>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <br><br><br>

    <table>
        <tbody>
            <tr>
                <td colspan="4">Indicadores de Salud</td>
            </tr>
        </tbody>
    </table>

    <br><br><br>

    <table>
        <tr>
            <td>
                <img src="https://indicadoresdesalud.online/img/cropped-redlogo.png" width="83px"><br>

                <strong>Indicadores de Salud</strong><br>
                Cel.: (51) 970 973 801<br>
                Email: randy21_10@hotmail.com
            </td>
        </tr>
    </table>

</body>
</html>
