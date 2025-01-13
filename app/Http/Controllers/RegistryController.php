<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registry; // Cambiado a Registry
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class RegistryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Listar registros
     */
    public function index()
    {
        $registries = Registry::orderBy('id', 'DESC')->get();
        return view('Registry.registry', compact('registries'));
    }

    /**
     * Crear un nuevo registro
     */
    public function create()
    {
        $registries = Registry::orderBy('id', 'DESC')->get();
        return view('Registry.registrytable', compact('registries'));
    }

    /**
     * Guardar un nuevo registro
     */
    public function store(Request $request)
    {
        try {
            $registry = new Registry();
            $registry->dni = $request->dni;
            $registry->firstname = $request->firstname;
            $registry->lastname = $request->lastname;
            $registry->names = $request->names;
            $registry->cellphone = $request->cellphone;
            $registry->ipress = $request->ipress;
            $registry->network = $request->network;
            $registry->district = $request->district;
            $registry->age = $request->age;
            $registry->provenance = $request->provenance;
            $registry->address = $request->address;
            $registry->fur = $request->fur;
            $registry->fpp = $request->fpp;
            $registry->gestation_weeks = $request->gestation_weeks;
            $registry->risk_factor =  $request->risk_factor;
            $registry->color = $request->color;
            $registry->parity = $request->parity; // Nuevo campo
            $registry->hemoglobine = $request->hemoglobine; // Nuevo campo
            $registry->anemia = $request->anemia; // Nuevo campo
            $registry->cpn = $request->cpn; // Nuevo campo
            $registry->date_part = $request->date_part; // Nuevo campo
            $registry->date_cite = $request->date_cite; // Nuevo campo
            $registry->observations = $request->observations;

        

            $registry->save();
        } catch (\Exception $e) {
            return "<div style='background-color:red'>ERROR</div>";
        }

        return $this->create();
    }

    /**
     * Mostrar un registro
     */
    public function show(Request $request)
    {
        $show = "%" . $request["show"] . "%";
        $registries = Registry::where('names', 'like', $show)->get();
        return view('Registry.registrytable', compact('registries'));
    }

    /**
     * Editar un registro
     */
    public function edit(Request $request)
    {
        $registry = Registry::find($request["id"]);
        return $registry;
    }

    /**
     * Actualizar un registro
     */
    public function update(Request $request)
    {
        try {
            $registry = Registry::find($request->id);

            $registry->dni = $request->dni;
            $registry->firstname = $request->firstname;
            $registry->lastname = $request->lastname;
            $registry->names = $request->names;
            $registry->cellphone = $request->cellphone;
            $registry->ipress = $request->ipress;
            $registry->network = $request->network;
            $registry->district = $request->district;
            $registry->age = $request->age;
            $registry->provenance = $request->provenance;
            $registry->address = $request->address;
            $registry->fur = $request->fur;
            $registry->fpp = $request->fpp;
            $registry->gestation_weeks = $request->gestation_weeks;
            $registry->risk_factor =  $request->risk_factor;
            $registry->color = $request->color;
            $registry->parity = $request->parity; // Nuevo campo
            $registry->hemoglobin = $request->hemoglobin; // Nuevo campo
            $registry->anemia = $request->anemia; // Nuevo campo
            $registry->cpn = $request->cpn; // Nuevo campo
            $registry->date_parto = $request->date_parto; // Nuevo campo
            $registry->date_cita = $request->date_cita; // Nuevo campo
            $registry->observations = $request->observations;
            $registry->save();
        } catch (\Exception $e) {
            return "<div style='background-color:red'>ERROR</div>";
        }

        return $this->create();
    }

    /**
     * Eliminar un registro
     */
    public function destroy(Request $request)
    {
        try {
            $registry = Registry::find($request["id"]);
          //  fileDestroy($registry->photo, "imageregistries");
            $registry->delete();
        } catch (\Exception $e) {
            return "<div style='background-color:red'>ERROR</div>";
        }

        return $this->create();
    }

    /**
     * Importar datos desde Excel
     */

}
