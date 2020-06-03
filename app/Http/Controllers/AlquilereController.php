<?php

namespace App\Http\Controllers;

use Session;
use App\Alquilere;
use App\User;
use App\Maquina;
use App\Contrato;
use App\Cliente;
use App\Trabajadore;
use App\Complemento;
use App\Cuenta;
use App\Complemento_contrato;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use DB;
use PDF;
use App\Quotation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AlquilerRequest;

class AlquilereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Realiza una consulta a la base de datos, recuperando todos de la tabla alquiler 
     * y los datos de la tabla contratos. Luego retorna la vista listado_alquiler.blade.php  
     * mostrando todo el listado de los alquileres que haya almacenados en el sistema.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(){

        //optiene la fecha actual
        $fechaActual = new DateTime('now');
        $fechaActual =  $fechaActual->format('Y-m-d');

       
       //pasada la fecha actual cambia el estado de las máquinas por el de libres para alquiler 
       Contrato::join('maquinas', 'contratos.maquina_id', '=', 'maquinas.id')
        ->where('con_fecha_fin', '<', $fechaActual)->update(['maq_estado'=>'Libre']);


      



        $clientes = Cliente::all();
        $alquiler = Alquilere::select(
            'trabajadores.id AS id_trabajador',
            'clientes.id AS id_clientes',
            'alquileres.id AS id_alquiler',
            'clientes.cli_nombre_empresa AS empresa',
            'alquileres.alq_fecha_inicio AS inicio',
            'alquileres.alq_fecha_fin AS fin',
            'alquileres.alq_incidencia AS incidencia',
            'alquileres.alq_precio AS alq_precio',
            'trabajadores.tra_nombre_trabajador AS nombre_trabajador',
            'trabajadores.tra_apellido_1 AS apellido_trabajador_1',
            'trabajadores.tra_apellido_2 AS apellido_trabajador_2',
            DB::raw("DATEDIFF(alquileres.alq_fecha_fin,alquileres.alq_fecha_inicio) AS dias")
        )->join(
            'clientes', 'alquileres.cliente_id', '=', 'clientes.id'
        )->join(
            'trabajadores', 'alquileres.trabajador_id', '=', 'trabajadores.id'
        )->get();
           
        

        return view('alquiler.listado', compact('alquiler', 'fechaActual', 'clientes'));
    }//fin index


    public function listaMaquinas($id){
        $maquinas = Alquilere::find($id);

        $listaMaquinas = [];
        $i = 0;
        foreach($maquinas->maquinas as $maquina){

            $listaMaquinas[$i] = $maquina;
            $i++;

        }//fin for each

        return $listaMaquinas;
    }//fin lista máquinas

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $clientes = Cliente::all();
        //Solo carga en el objeto las máquinas que estén marcadas como libres
        $maquinas = Maquina::where('maq_estado','Libre')->get();
        $complementos = Complemento::where('com_estado', 'Libre')->get();

        //$idUsuario = Auth::id();//obtiene el id del usuario autenticado en el sistema
        $id = Auth::id();
        $empleado = User::find($id)->trabajador;//obtiene los datos del emprledo autenticado

        $nuevo = true;

        return view('alquiler.crear_alquiler', compact('nuevo', 'complementos','clientes', 'maquinas', 'empleado'));
    }//fin crear


    public function anyadirContrato($idAlquiler){

         //Solo carga en el objeto las máquinas que estén marcadas como libres
         $maquinas = Maquina::where('maq_estado','Libre')->get();
         $complementos = Complemento::where('com_estado', 'Libre')->get();
 
         //$idUsuario = Auth::id();//obtiene el id del usuario autenticado en el sistema
         $id = Auth::id();
         $empleado = User::find($id)->trabajador;//obtiene los datos del emprledo autenticado
 
         //optiene el id del último cliente para dejar solo el del actual cliente en el formulario
         $datosalquiler = Alquilere::find($idAlquiler);
         $clientes = Cliente::where('id', $datosalquiler->cliente_id)->get();
        
         $nuevo = false;


         return view('alquiler.crear_alquiler', compact('nuevo', 'complementos','clientes', 'maquinas', 'empleado'));

    }//

    /**
     * Recoge el id del usario autenticado en el sistema.
     * Crea un objeto de tipo alquiler y lo guarda en la base de datos.
     * Recoje el contador de máquinas introducidas
     * Crean tanto objetos de tipo contrato como máquinas halla
     * Modifica un los objetos de tipo máquina 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $valorFormulario = $request->input('nuevo');

        $precioTotalAlquiler = 0;
        $precioMaquina = 0;
        $diasAlquiler = 0;

        $id = Auth::id();//recoge del usuario actualmente logeado en el sistema
    
        $idEmpleado = User::select('trabajador_id')
        ->where('id',$id)
         ->get()[0]->trabajador_id;

        //Calcula la cantidad de días de cada contrato
        $fecha1 = new DateTime($request->input('from'));
        $fecha2 = new DateTime($request->input('to'));
            
            
        $dias = $fecha1->diff($fecha2);
        $precioMaquina = Maquina::select('maq_precio_dia')
                            ->where('id', $request->input('id_maquina'))
                          ->get()[0]->maq_precio_dia;


        

        //crea un nuevo alquiler solo una vez para el cliente actual
        if($valorFormulario == 'nuevo'){
            $alquiler = new Alquilere;
            $alquiler->cliente_id = $request->input('nombre_empresa');
            //crea el precio total la primera vez
            $precioTotalAlquiler  = $precioTotalAlquiler + ($precioMaquina * $dias->format('%a'));
            $alquiler->alq_fecha_inicio = $fecha1;
            $alquiler->alq_fecha_fin = $fecha2;
    
            $alquiler->alq_incidencia = 'Sin incidencias';
            $alquiler->alq_precio = $precioTotalAlquiler;
            $alquiler->trabajador_id = $idEmpleado;
            $alquiler->save();
            
            $fecha1 = 0;
            $fecha2 = 0;

        }//fin if

       

        
        //Crea un objeto de tipo alquiler y lo guarda en la base de datos
     
        
        
        //optiene el id del último cliente para dejar solo el del actual cliente en el formulario
        $datosalquiler = Alquilere::latest('id')->first();
        $clientes = Cliente::where('id', $datosalquiler->cliente_id)->get();
        $idalquiler = $datosalquiler->id;        

        //Crea y guarda un objeto de tipo Contrato y lo guarda en la base de datos
        $contrato = new Contrato;
        $contrato->con_fecha_inicio = $request->input('from');
        $contrato->con_fecha_fin = $request->input('to');
        $contrato->maquina_id = $request->input('id_maquina');
        $contrato->con_detalle_trabajo = $request->input('descripcion');
        $contrato->con_precio = $precioMaquina * $dias->format('%a');
        $contrato->alquiler_id = $datosalquiler->id;
        $contrato->save();


        //actualiza el precio solo si el alquiler no es nuevo
        if($valorFormulario == 'viejo'){
           //recupera el precio del alquiler acutual
            $precioAlquiler = Alquilere::select('alq_precio')
            ->where('id',$contrato->alquiler_id)
             ->get()[0]->alq_precio;

            //Actualiza el precio del alquiler
            Alquilere::where('id',$contrato->alquiler_id)
            ->update(['alq_precio'=> $precioAlquiler + $contrato->con_precio]);

        }//fin if





       
         
        
        //actualiza el estado de la maquina alquilada
        Maquina::where('id',$request->input('id_maquina'))
            ->update(['maq_estado'=>'Alquilada']);




        $alquilerFin = new DateTime($datosalquiler->alq_fecha_fin);
        $contratoFin = new DateTime($contrato->con_fecha_fin);
    
        $alquilerInicio = new DateTime($datosalquiler->alq_fecha_inicio);
        $contratoInicio = new DateTime($contrato->con_fecha_inicio);

        //determina la duración del alquiler, comporbando la fecha más tardía
        if($alquilerFin < $contratoFin ){
            Alquilere::where('id',$datosalquiler->id)
            ->update(['alq_fecha_fin'=>$contrato->con_fecha_fin]);
           
        }
        if( $alquilerInicio > $contratoInicio  ){
            Alquilere::where('id',$datosalquiler->id)
            ->update(['alq_fecha_inicio'=>$contrato->con_fecha_inicio]);
        }    
  
        //recoge el id del empledo actual en el sistema para uaserlo en el formulario
        $id = Auth::id();
        $empleado = User::find($id)->trabajador;//obtiene los datos del emprledo autenticado


        
        

     


        //guarda 
        $arrayComplementos = $request->input('complementos');

        //Sin no se ha seleccionado complementos se hará la consulta para guardarlos
        if(!empty($arrayComplementos)){
  
            foreach($arrayComplementos as $complemento){
                $complementosObjeto = new Complemento_contrato;
                $complementosObjeto->contrato_id = $contrato->id;
                $complementosObjeto->complemento_id = $complemento;
                $complementosObjeto->save();

                Complemento::where('id', $complemento)
                ->update(['com_estado'=>'Alquilado']);

            }//fin for each
        }//fin if
        

        //Marca una maquina como alquilada, por lo que no se cargará en el formulario
        $maquinas = Maquina::where('maq_estado','Libre')->get();

        $complementos = Complemento::where('com_estado', 'Libre')->get();

        //compruba si el alquiler es nuevo 
        $nuevo = false;

        Session::flash('finalizar_registro', 'El registro se ha creado correctamente.');
        Session::flash('continuar_alquiler', 'Máquina añadida a este alquiler.');	


        return view('alquiler.crear_alquiler', compact('nuevo','complementos','clientes', 'maquinas', 'empleado','datosalquiler','idalquiler'));
    }//fin store



    /**
     * Display the specified resource.
     *
     * @param  \App\Alquilere  $alquilere
     * @return \Illuminate\Http\Response
     */
    public function show($id){

       // $contratos = Contrato::where('alquiler_id','=', $id);

        //$contratos = Contrato::all();
        //dd($contratos);


        $contratos = Contrato::select(
            'contratos.id AS id',
            'maquinas.maq_imagen AS imagen', 
            'contratos.con_precio AS con_precio',
            'contratos.alquiler_id AS id_alquiler',
            'contratos.con_incidencia AS incidencia',
            'contratos.con_fecha_inicio AS fecha_inicio',
            'contratos.con_fecha_fin AS fecha_final',
            'maquinas.maq_marca AS maq_marca',
            'maquinas.maq_modelo AS maq_modelo',
            'maquinas.maq_traslacion AS maq_traslacion',
            'maquinas.maq_tipo AS maq_tipo',
            'maquinas.maq_peso AS maq_peso',
            'maquinas.maq_dimension_alto AS maq_alto',
            'maquinas.maq_dimension_largo AS maq_largo',
            'maquinas.maq_dimension_ancho AS maq_ancho',
            'maquinas.maq_categoria AS maq_categoria',
            'maquinas.maq_estado AS maq_estado',
            'maquinas.maq_precio_dia AS maq_precio',
            'maquinas.id AS maquina_id',
            DB::raw("DATEDIFF(contratos.con_fecha_fin,contratos.con_fecha_inicio) AS dias")
            
        )->join(
            'maquinas', 'contratos.maquina_id', '=', 'maquinas.id'
        //)->join(
          //  'trabajadores', 'alquileres.trabajador_id', '=', 'trabajadores.id'
        )->where('alquiler_id', $id)->get();


        $fechaActual = new DateTime('now');
        $fechaActual =  $fechaActual->format('Y-m-d');


        //$contratos = DB::table('contratos')->where('alquiler_id', $id)->get();
        
        
        return view('alquiler.contratos', compact('contratos','id','fechaActual'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alquilere  $alquilere
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //$alquiler =  Alquilere::find($id);


        $alquiler = Alquilere::select(
            'trabajadores.id AS id_trabajador',
            'clientes.id AS id_clientes',
            'clientes.cli_nombre_contacto AS cli_contacto',
            'alquileres.id AS id',
            'clientes.cli_nombre_empresa AS empresa',
            'clientes.cli_direccion AS direccion',
            'clientes.cli_email AS email',
            'alquileres.alq_fecha_inicio AS inicio',
            'alquileres.alq_fecha_fin AS fin',
            'alquileres.alq_incidencia AS incidencia',
            'alquileres.alq_precio AS alq_precio',
            'trabajadores.tra_nombre_trabajador AS nombre_trabajador',
            'trabajadores.tra_apellido_1 AS apellido_trabajador_1',
            'trabajadores.tra_apellido_2 AS apellido_trabajador_2',
            DB::raw("DATEDIFF(alquileres.alq_fecha_fin,alquileres.alq_fecha_inicio) AS dias")
        )->join(
            'clientes', 'alquileres.cliente_id', '=', 'clientes.id'
        )->join(
            'trabajadores', 'alquileres.trabajador_id', '=', 'trabajadores.id'
        )->find($id);

        //Fecha actual
        $fecha = new DateTime('now');
        $fecha =  $fecha->format('Y-m-d');

        //optiene una colección de contratos, con sus máquina y precios
        $contratos = Contrato::select(
            'contratos.alquiler_id AS alquiler_id',
            'contratos.id AS id_contrato',
            'alquileres.alq_precio AS alq_precio',
            'contratos.con_precio AS con_precio' ,
            'maquinas.maq_marca AS maq_marca',
            'maquinas.maq_modelo AS maq_modelo'
        )->join(
            'alquileres', 'contratos.alquiler_id', '=', 'alquileres.id'
        )->join(
            'maquinas', 'contratos.maquina_id', '=', 'maquinas.id'
        )->where('alquiler_id', $alquiler->id)->get();


        //Array de datos que serán pasados a la vista que genera la factura y que será mostrada en un PDF.
        $data = array (
            'numero' => $id,
            'fecha' => $fecha,
            'nombre_empresa' => $alquiler->empresa,
            'direccion' => $alquiler->direccion,
            'email' => $alquiler->email,
            'contacto' => $alquiler->cli_contacto,
            'maquinas' => $contratos, 
        );
     
        return PDF::loadView('alquiler.pdf', $data)
            ->stream('archivo.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alquilere  $alquilere
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){

        $request->input('empresa');
        Alquilere::where('id',$id)->update(['cliente_id'=>$request->input('empresa')]);

    }//fin update

    /**
     * Borra un registro que sea un alquiler.
     * Primero hace una consulta SQL para recuperar los id relacionados con un alquiler.
     * Luego cambia el estado de las máquinas de Alquiladas a Libres
     * Después, por medio de una consulta SQL cuenta el número de contratos asociados a un alquiler.
     * Por último borra los contratos y el alquiler.
     *
     * @param  \App\Alquilere  $alquiler
     * @return \Illuminate\Http\Response
     */
    public function destroy($alquiler){


        
        
        //obtiene los id de las contratos
         $contratoIds = DB::table('contratos')
         ->select(DB::raw("id AS id"))
         ->where('alquiler_id', $alquiler)->get();

         //cambia el estado de los complementos por el estado libre
        foreach($contratoIds as $id){
            //obtiene un objeto para sacar los id de los complementos
           $cc =  DB::table('complemento_contratos')
           ->select(DB::raw("complemento_id AS id_complemento"))
           ->where('contrato_id', $id->id)->get();
            //cambia el estado de los complementos que han sido borrados
           foreach($cc as $idC){
                Complemento::where('id', $idC->id_complemento)
                ->update(['com_estado'=>'Libre']);
           }//fin foreach
        }//fin foreach
        



        //obtiene el id de las máquinas
        $maquinaIds = DB::table('contratos')
        ->select(DB::raw("maquina_id AS id_maquina"))
        ->where('alquiler_id', $alquiler)->get();

        //Actualiza el estado de las máquinas
        foreach($maquinaIds as $id){
            Maquina::where('id', $id->id_maquina)
            ->update(['maq_estado'=>'Libre']);
        }//fin


        $nContratos = DB::table('contratos')
        ->select(DB::raw("count(*) AS numero"))
        ->where('alquiler_id', $alquiler)->get();

        //Conseguimos el objeto
        $contrato=Contrato::where('alquiler_id', '=', $alquiler);
        // Lo eliminamos de la base de datos
        $contrato->delete();




        $objAlquiler = Alquilere::where('id', '=', $alquiler);
        $objAlquiler->delete(); 

        
    }//fin destroy
}//fin clase
