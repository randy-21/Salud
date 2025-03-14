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
use App\Models\User;
use App\Mail\RegistryCreated;
use Illuminate\Support\Facades\Mail;
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
        $registries = Registry::orderBy('id', 'DESC')->paginate(10);

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
            $registry->created_by = Auth::user()->id;



            $registry->save();
            foreach ($request->risk_factor as $item) {

                $item_ = new Risk_factor_detail;
                $item_->registry_id = $registry->id;
                $risk = explode(" - ", $item);
                $item_->risk_factor_id = $risk[0];



                $item_->save();
            }

            $email = $registry->user->email ?: Auth::user()->email;
            // 📩 Enviar email con CC
            Mail::to($email)
                ->cc("randy21_10@hotmail.com")

                ->send(new RegistryCreated($registry));


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
        $registry = Registry::with('user')->find($request["id"]);
        $registry->risk_factors_ = $registry->risk_factors;
        return $registry;
    }

    /**
     * Actualizar un registro
     */
    public function update(Request $request)
    {


        try {
            $registry = Registry::findOrFail($request->id);

            // Actualizar los datos del registro
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
            $registry->parity = $request->parity;
            $registry->hemoglobine = $request->hemoglobine;
            $registry->anemia = $request->anemia;
            $registry->cpn = $request->cpn;
            $registry->date_part = $request->date_part;
            $registry->date_cite = $request->date_cite;
            $registry->observations = $request->observations;

            // Buscar usuario por DNI
            $user = User::where("dni", $request->user_dni)->first();
            $registry->created_by = $user ? $user->id : Auth::id();

            // Guardar cambios en Registry
            $registry->save();

            // Sincronizar factores de riesgo (eliminará los que no están en el request y agregará los nuevos)
            if ($request->has('risk_factor')) {
                // Convertir los valores si vienen en formato "id - nombre"
                $riskFactorIds = collect($request->risk_factor)->map(function ($item) {
                    return explode(" - ", $item)[0]; // Extraer solo el ID
                })->toArray();

                $registry->risk_factors()->sync($riskFactorIds);
            }



            $email = $registry->user->email ?: Auth::user()->email;
            // 📩 Enviar email con CC
            Mail::to($email)
                ->cc("randy21_10@hotmail.com")
                ->send(new RegistryCreated($registry));







            return $this->create();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el registro',
                'error' => $e->getMessage()
            ], 500);
        }


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
