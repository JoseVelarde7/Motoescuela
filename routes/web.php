<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('login', function () {
    return view('auth.login');
});
Route::post('login','Auth\LoginController@login')->name('login');
Route::get('salir','Auth\LoginController@salir')->name('salir');


//Pruebas
Route::get('/ingresar','TeoriaController@index')->name('teoria.index');
Route::post('/teoria/examen','TeoriaController@validar')->name('teoria.validar');
Route::get('/teoria/validacion','TeoriaController@validacion')->name('teoria.validacion');
Route::post('/teoria/insertar','TeoriaController@store')->name('teoria.store');
Route::get('/examenes/examen','ExamenController@examen')->name('examen.examen');


    Route::get('/inicio','Auth\LoginController@inicio')->name('inicio')->middleware('auth');
    Route::get('/inicio/generar','Auth\LoginController@generar')->name('inicio.generar')->middleware('auth');
    Route::get('/alumnos','AlumnoController@index')->name('alumnos.index')->middleware('auth');
    Route::get('/alumnos/{alumno}','AlumnoController@show')->where('alumno','[0-9]+')->name('alumnos.show')->middleware('auth');
    Route::get('/alumnos/crear','AlumnoController@create')->name('alumnos.create')->middleware('auth');
    Route::post('/alumnos/insertar','AlumnoController@store')->name('alumnos.store')->middleware('auth');
    Route::get('/alumnos/{alumno}/editar','AlumnoController@edit')->name('alumnos.edit')->middleware('auth');
    Route::put('/alumnos/{alumno}','AlumnoController@update')->middleware('auth');
    Route::get('/alumnos/{alumno}/borrar','AlumnoController@destroy')->middleware('auth');
    Route::get('/alumnos/generar','AlumnoController@generar')->name('alumnos.generar')->middleware('auth');
    Route::get('/alumnos/generardos','AlumnoController@generardos')->name('alumnos.generardos')->middleware('auth');

    Route::get('/instructores','InstructorController@index')->name('instructor.index')->middleware('auth');
    Route::get('/instructores/crear','InstructorController@create')->name('instructor.create')->middleware('auth');
    Route::post('/instructores/insertar','InstructorController@store')->name('instructor.store')->middleware('auth');
    Route::get('/instructores/{instructor}','InstructorController@show')->where('instructor','[0-9]+')->name('instructor.show')->middleware('auth');
    Route::get('/instructores/{instructor}/editar','InstructorController@edit')->name('instructores.edit')->middleware('auth');
    Route::put('/instructores/{instructor}','InstructorController@update')->middleware('auth');
    Route::get('/instructores/{instructor}/borrar','InstructorController@destroy')->middleware('auth');

    Route::get('/motos','MotoController@index')->name('moto.index')->middleware('auth');
    Route::get('/motos/crear','MotoController@create')->name('moto.create')->middleware('auth');
    Route::post('/motos/insertar','MotoController@store')->name('moto.store')->middleware('auth');
    Route::get('/motos/{moto}','MotoController@show')->where('moto','[0-9]+')->name('moto.show')->middleware('auth');
    Route::get('/motos/{moto}/editar','MotoController@edit')->name('moto.edit')->middleware('auth');
    Route::put('/motos/{moto}','MotoController@update')->middleware('auth');
    Route::get('/motos/{moto}/borrar','MotoController@destroy')->middleware('auth');

    Route::get('/cursos','CursoController@index')->name('curso.index')->middleware('auth');
    Route::get('/cursos/moto','CursoController@moto')->name('curso.moto')->middleware('auth');
    Route::get('/cursos/horario','CursoController@horario')->name('curso.horario')->middleware('auth');
    Route::post('/cursos/crear','CursoController@create')->name('curso.create')->middleware('auth');
    Route::get('/cursos/mostrar','CursoController@mostrar')->name('curso.mostrar')->middleware('auth');
    Route::get('/cursos/generar/{id}','CursoController@generar')->name('curso.generar')->middleware('auth');
    Route::get('/cursos/generar2','CursoController@generar2')->name('curso.generar2')->middleware('auth');
    Route::get('/cursos/{curso}','CursoController@show')->middleware('auth');
    Route::put('/cursos/{curso}','CursoController@update')->middleware('auth');
    Route::get('/cursos/buscar/{id}','CursoController@buscar')->name('curso.buscar')->middleware('auth');
    Route::get('/cursos/{curso}/borrar','CursoController@destroy')->middleware('auth');
    Route::get('/cursos/{curso}/estado','CursoController@estado')->middleware('auth');

    Route::get('/horarios','HorarioController@index')->name('horario.index')->middleware('auth');
    Route::get('/horarios/nuevo','HorarioController@nuevo')->name('horario.nuevo')->middleware('auth');
    Route::get('/horarios/crear','HorarioController@create')->name('horario.create')->middleware('auth');
    Route::get('/horarios/instructores','HorarioController@instructor')->name('horario.instructor')->middleware('auth');
    Route::get('/horarios/general','HorarioController@general')->name('horario.general')->middleware('auth');
    Route::get('/horarios/consulta/{instructores}','HorarioController@consulta1')->name('horario.consulta1')->middleware('auth');
    Route::post('/horarios/insertar','HorarioController@store')->name('horario.store')->middleware('auth');
    Route::get('/horarios/{horario}/editar','HorarioController@edit')->name('horario.edit')->middleware('auth');
    Route::put('/horarios/{horario}','HorarioController@update')->middleware('auth');
    Route::get('/horarios/{horario}/borrar','HorarioController@destroy')->middleware('auth');
    Route::get('/horarios/validar/{user}/{horario}','HorarioController@validar')->middleware('auth');


    Route::get('/pagos','PagoController@index')->name('pago.index')->middleware('auth');
    Route::get('/pagos/crear','PagoController@create')->name('pago.create')->middleware('auth');

    Route::get('/facturas/crear','FacturaController@create')->name('factura.create')->middleware('auth');
    Route::post('/facturas/registrar','FacturaController@registrar')->name('factura.registrar')->middleware('auth');
    Route::get('/facturas/mostrar/{factura}','FacturaController@mostrar')->name('factura.mostrar')->middleware('auth');
    Route::get('/facturas','FacturaController@index')->name('factura.index')->middleware('auth');
    Route::get('/facturas/{factura}/borrar','FacturaController@destroy')->middleware('auth');

    Route::get('/usuarios','UserController@index')->name('user.index')->middleware('auth');
    Route::get('/users/crear','UserController@create')->name('user.create')->middleware('auth');
    Route::post('/usuarios/insertar','UserController@store')->name('user.store')->middleware('auth');
    Route::get('/usuarios/{usuario}','UserController@show')->where('usuario','[0-9]+')->name('usuario.show')->middleware('auth');
    Route::get('/usuarios/{usuario}/editar','UserController@edit')->name('usuario.edit')->middleware('auth');
    Route::put('/usuarios/{usuario}','UserController@update')->middleware('auth');
    Route::get('/usuarios/{usuario}/borrar','UserController@destroy')->middleware('auth');
    Route::get('/usuarios/generar','UserController@generar')->name('usuarios.generar');
    Route::get('/usuarios/entrada/{usuario}/{pass}','UserController@entrada')->name('usuarios.entrada');
    Route::get('/usuarios/salida/{usuario}/{pass}','UserController@salida')->name('usuarios.salida');

    Route::get('/asistencias','AsistenciaController@index')->name('asistencia.index')->middleware('auth');
    Route::get('/asistencias/marcar','AsistenciaController@marcar')->name('asistencia.marcar');
    Route::post('/asistencias/crear','AsistenciaController@create')->name('asistencia.create');
    Route::post('/asistencias/modificar/{id}','AsistenciaController@modificar')->name('asistencia.modificar')->middleware('auth');

    Route::get('/inscripciones','InscripcionController@index')->name('inscripcion.index')->middleware('auth');
    Route::get('/inscripciones/crear','InscripcionController@create')->name('inscripcion.create')->middleware('auth');
    Route::post('/inscripciones/insertar','InscripcionController@store')->name('inscripcion.store')->middleware('auth');
    Route::get('/inscripciones/validar/{usuario}/{horario}/{moto}','InscripcionController@validar')->name('inscripcion.validar')->middleware('auth');
    Route::get('/inscripciones/buscar/{id}','InscripcionController@buscar')->name('inscripciones.buscar')->middleware('auth');
    Route::put('/inscripciones/{inscripcion}','InscripcionController@update')->middleware('auth');
    Route::get('/inscripciones/{inscripcion}/borrar','InscripcionController@destroy')->middleware('auth');
    Route::get('/inscripciones/generar/{id}','InscripcionController@generar')->name('inscripcion.generar')->middleware('auth');

    Route::get('/examenes','ExamenController@index')->name('examen.index')->middleware('auth');
    Route::get('/examenes/pregunta/{id}','ExamenController@pregunta')->name('examen.pregunta')->middleware('auth');
    Route::get('/examenes/crear','ExamenController@create')->name('examen.create')->middleware('auth');
    Route::get('/examenes/resultados','ExamenController@resultado')->name('examen.resultados')->middleware('auth');
    Route::get('/examenes/soluciones','ExamenController@soluciones')->name('examen.soluciones');
    Route::get('/examenes/calificacion/{id}','ExamenController@calificacion')->name('examen.calificacion')->middleware('auth');
    Route::post('/examenes/store','ExamenController@store')->name('examen.store')->middleware('auth');
    Route::post('/examenes/registrar','ExamenController@registrar')->name('examen.registrar')->middleware('auth');
    Route::get('/examenes/{examen}/editar','ExamenController@edit')->name('examen.edit')->middleware('auth');
    Route::put('/examenes/{examen}','ExamenController@update')->middleware('auth');
    Route::get('/examenes/{examen}/borrar','ExamenController@destroy')->middleware('auth');

    Route::get("download-pdf/{ide}","ReporteController@downloadPDF");
    Route::get("reportes/usuarios-pdf","ReporteController@usuarioPDF");
    Route::get("reportes/alumnos-pdf","ReporteController@alumnoPDF");
    Route::get("reportes/motos-pdf","ReporteController@motosPDF");
    Route::get("reportes/horarios-pdf","ReporteController@horariosPDF");
    Route::get("reportes/inscripciones-pdf","ReporteController@inscripcionesPDF");



