<?php

namespace App\Http\Controllers;

use App\Models\Risk_factor_detail;
use Illuminate\Http\Request;
use App\Models\Registry; // Cambiado a Registry
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Models\Risk_factor;

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
    { // Fecha actual
        $fechaActual = Carbon::now();
        // Diferencia en días (valor absoluto)
        $registries = Registry::orderBy('id', 'DESC')->get();

        $risk_factor = Risk_factor::all();


        return view('Registry.registry', compact('registries', 'fechaActual', 'risk_factor'));
    }

    /**
     * Crear un nuevo registro
     */
    public function create()
    {
        $fechaActual = Carbon::now();

        $registries = Registry::orderBy('id', 'DESC')->get();
        return view('Registry.registrytable', compact('registries', 'fechaActual'));
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

            $registry->color = $request->color;
            $registry->parity = $request->parity; // Nuevo campo
            $registry->hemoglobine = $request->hemoglobine; // Nuevo campo
            $registry->anemia = $request->anemia; // Nuevo campo
            $registry->cpn = $request->cpn; // Nuevo campo
            $registry->date_part = $request->date_part; // Nuevo campo
            $registry->date_cite = $request->date_cite; // Nuevo campo
            $registry->observations = $request->observations;



            $registry->save();
            foreach ($request->risk_factor as $item) {

                $item_ = new Risk_factor_detail;
                $item_->registry_id = $registry->id;
                $risk = explode(" - ", $item);
                $item_->risk_factor_id = $risk[0];



                $item_->save();
            }
        } catch (\Exception $e) {
            return "Verifique los datos.";
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
        $registry->risk_factors_ = $registry->risk_factors;
        return $registry;
    }

    /**
     * Actualizar un registro
     */
    public function update(Request $request)
    {
        
     
            Risk_factor_detail::where('registry_id', "=",$request["id"])->delete();
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

            $registry->color = $request->color;
            $registry->parity = $request->parity; // Nuevo campo
            $registry->hemoglobine = $request->hemoglobine; // Nuevo campo
            $registry->anemia = $request->anemia; // Nuevo campo
            $registry->cpn = $request->cpn; // Nuevo campo
            $registry->date_part = $request->date_part; // Nuevo campo
            $registry->date_cite = $request->date_cite; // Nuevo campo
            $registry->observations = $request->observations;

            $registry->save();
          
            foreach ($request->risk_factor as $item) {

                $item_ = new Risk_factor_detail;
                $item_->registry_id = $request->id;
                $risk = explode(" - ", $item);
                $item_->risk_factor_id = $risk[0];



                $item_->save();
            }
      

        return $this->create();
    }

    /**
     * Eliminar un registro
     */
    public function destroy(Request $request)
    {

        Risk_factor_detail::where('registry_id', $request["id"])->delete();

        $registry = Registry::find($request["id"]);
      
        $registry->delete();


        return $this->create();
    }

    /**
     * Importar datos desde Excel
     */
}
