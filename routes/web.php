<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/categorias', 'Admin\CategoriasController@index')->name('admin.categorias');
Route::post('/admin/categorias/store', 'Admin\CategoriasController@store')->name('admin.categorias.store');
Route::post('/admin/categorias/{categoriaId}/show', 'Admin\CategoriasController@show')->name('admin.categorias.show');
Route::post('/admin/categorias/{categoriaId}/update', 'Admin\CategoriasController@update')->name('admin.categorias.update');
Route::delete('/admin/categorias/{categoriaId}/delete', 'Admin\CategoriasController@delete')->name('admin.categorias.delete');

Route::get('/admin/unidades', 'Admin\UnidadesController@index')->name('admin.unidades');
Route::post('/admin/unidades/store', 'Admin\UnidadesController@store')->name('admin.unidades.store');
Route::post('/admin/unidades/{unidadId}/update', 'Admin\UnidadesController@update')->name('admin.unidades.update');
Route::delete('/admin/unidades/{unidadId}/delete', 'Admin\UnidadesController@delete')->name('admin.unidades.delete');

Route::get('/admin/productos', 'Admin\ProductosController@index')->name('admin.productos');
Route::post('/admin/productos/create', 'Admin\ProductosController@create')->name('admin.productos.create');
Route::get('/admin/productos/listar', 'Admin\ProductosController@listar')->name('admin.productos.listar');
Route::post('/admin/productos/{productoId}/update', 'Admin\ProductosController@update')->name('admin.productos.update');
Route::delete('/admin/productos/{productoId}/delete', 'Admin\ProductosController@delete')->name('admin.productos.delete');

Route::post('/admin/colaboradores/create', 'Admin\ColaboradoresController@create')->name('admin.colaboradores.create');
Route::get('/admin/colaboradores/listar', 'Admin\ColaboradoresController@listar')->name('admin.colaboradores.listar');
Route::delete('/admin/colaboradores/{colaboradorId}/delete', 'Admin\ColaboradoresController@delete')->name('admin.colaboradores.delete');
Route::post('/admin/colaboradores/{colaboradorId}/update', 'Admin\ColaboradoresController@update')->name('admin.colaboradores.update');
Route::get('/admin/colaboradores', 'Admin\ColaboradoresController@index')->name('admin.colaboradores');
Route::delete('/admin/colaboradores/{colaboradorId}/destroy', 'Admin\ColaboradoresController@destroy')->name('admin.colaboradores.destroy');

//--Inicio Reportes--//

//Route::post('admin/colaboradores/pdf', [App\Http\Controllers\Admin\PDFController::class,'createPDF'])->name('admin.colaboradores.pdf');

Route::get('admin/colaboradores/reportes/pdf', [App\Http\Controllers\Admin\ColaboradoresController::class,'relaPDF'])->name('admin.colaboradores.reportes.pdf');

Route::get('admin/colaboradores/{colaboradorId}/fichapersonal', [App\Http\Controllers\Admin\ColaboradoresController::class,'fichaPDF'])->name('admin.colaboradores.reportes.fichapersonal');

Route::get('admin/productos/{categoriaId}/productoxcategoria', [App\Http\Controllers\Admin\ProductosController::class,'productoxcategoria'])->name('admin.productos.reportes.productoxcategoria');

//--Fin Reportes--//

Route::get('/direccion',          [App\Http\Controllers\Admin\ColaboradoresController::class, 'index']);
Route::post('/admin/provincias',          [App\Http\Controllers\Admin\ColaboradoresController::class, 'provincias']);
Route::post('/admin/distritos',          [App\Http\Controllers\Admin\ColaboradoresController::class, 'distritos']);

Route::get('/admin/proveedores', 'Admin\ProveedoresController@index')->name('admin.proveedores');
Route::post('/admin/proveedores/store', 'Admin\ProveedoresController@store')->name('admin.proveedores.store');
Route::get('/admin/proveedores/listar', 'Admin\ProveedoresController@listar')->name('admin.proveedores.listar');
Route::delete('/admin/proveedores/{proveedorId}/destroy', 'Admin\ProveedoresController@destroy')->name('admin.proveedores.destroy');
Route::post('/admin/proveedores/{proveedorId}/update', 'Admin\ProveedoresController@update')->name('admin.proveedores.update');

Route::get('/admin/facturas', 'Admin\FacturasController@index')->name('admin.facturas');
Route::post('/admin/facturas/store', 'Admin\FacturasController@store')->name('admin.facturas.store');
Route::get('/admin/facturas/listar', 'Admin\FacturasController@listar')->name('admin.facturas.listar');
Route::delete('/admin/facturas{facturaId}/destroy', 'Admin\FacturasController@destroy')->name('admin.facturas.destroy');
Route::post('/admin/facturas/{facturaId}/update', 'Admin\FacturasController@update')->name('admin.facturas.update');

Route::get('/infobasic', 'Admin\EmpresaController@index')->name('infobasic');
Route::get('/infobra', 'Admin\FacturasController@mostrarInfo')->name('infobra');
Route::get('/admin/user/perfil', 'Admin\UserController@index')->name('perfil');