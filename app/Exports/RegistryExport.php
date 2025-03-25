<?php
namespace App\Exports;

use App\Models\Registry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class RegistryExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    protected $rowColors = [];

    public function collection()
    {
        return Registry::with(['risk_factors', 'user'])->get();
    }

    public function map($registry): array
    {
        $factoresRiesgo = $registry->risk_factors
            ? $registry->risk_factors->pluck('description')->implode(', ')
            : '';

        // Extraer color del primer "palabra" antes del espacio
        $color = strtoupper(strtok($factoresRiesgo, ' ')); // ROJO, VERDE, AMARILLO
        $this->rowColors[] = $this->mapColor($color); // Guardar color Excel para usar luego

        return [
            $registry->dni,
            $registry->firstname,
            $registry->lastname,
            $registry->names,
            $registry->district,
            $registry->ipress,
            $registry->network,
            $registry->age,
            $registry->provenance,
            $registry->address,
            $registry->cellphone,
            $registry->fur,
            $registry->fpp,
            $registry->gestation_weeks,
            $factoresRiesgo,
            $registry->hemoglobine,
            $registry->color,
            $registry->cpn,
            $registry->anemia,
            $registry->parity,
            $registry->date_part,
            $registry->date_cite,
            $registry->observations,
            $registry->user->dni . " - " . $registry->user->firstname . " " . $registry->user->lastname . " " . $registry->user->names,
        ];
    }

    public function headings(): array
    {
        return [
            'DNI',
            'Apellido Paterno',
            'Apellido Materno',
            'Nombres',
            'Distrito',
            'IPRESS',
            'Red de Salud',
            'Edad',
            'Procedencia',
            'Dirección',
            'Celular',
            'FUR',
            'FPP',
            'Semanas de Gestación',
            'Factor de Riesgo',
            'Hemoglobina',
            'Color',
            'Fecha de CPN',
            'Anemia',
            'Paridad',
            'Fecha de Parto',
            'Fecha de Cita',
            'Observaciones',
            'Registrado por',
        ];
    }

    protected function mapColor($color)
    {
        return match ($color) {
            'ROJO' => 'FF9999',      // rojo claro
            'VERDE' => 'CCFFCC',     // verde claro
            'AMARILLO' => 'FFFFCC',  // amarillo claro
            default => null,
        };
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;

                foreach ($this->rowColors as $index => $hexColor) {
                    if ($hexColor) {
                        // +2 porque los encabezados están en la fila 1 y los datos empiezan en la 2
                        $rowIndex = $index + 2;
                        $range = 'A' . $rowIndex . ':X' . $rowIndex; // columnas de la A a la X
                        $sheet->getDelegate()->getStyle($range)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB($hexColor);
                    }
                }
            },
        ];
    }
}
