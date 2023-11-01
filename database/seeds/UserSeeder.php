<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = Role::create(['name' => 'Admin']);
        $user_role = Role::create(['name' => 'User']);

        Permission::create(['name' => 'admin.areas.index']);
        Permission::create(['name' => 'admin.areas.store']);
        Permission::create(['name' => 'admin.areas.create']);
        Permission::create(['name' => 'admin.areas.update']);
        Permission::create(['name' => 'admin.areas.destroy']);
        Permission::create(['name' => 'admin.areas.edit']);

        Permission::create(['name' => 'admin.tipoproductos.index']);
        Permission::create(['name' => 'admin.tipoproductos.store']);
        Permission::create(['name' => 'admin.tipoproductos.create']);
        Permission::create(['name' => 'admin.tipoproductos.update']);
        Permission::create(['name' => 'admin.tipoproductos.destroy']);
        Permission::create(['name' => 'admin.tipoproductos.edit']);

        Permission::create(['name' => 'admin.unidadmedidas.index']);
        Permission::create(['name' => 'admin.unidadmedidas.store']);
        Permission::create(['name' => 'admin.unidadmedidas.create']);
        Permission::create(['name' => 'admin.unidadmedidas.update']);
        Permission::create(['name' => 'admin.unidadmedidas.destroy']);
        Permission::create(['name' => 'admin.unidadmedidas.edit']);

        Permission::create(['name' => 'admin.programas.store']);
        Permission::create(['name' => 'admin.programas.index']);
        Permission::create(['name' => 'admin.programas.create']);
        Permission::create(['name' => 'admin.programas.update']);
        Permission::create(['name' => 'admin.programas.destroy']);
        Permission::create(['name' => 'admin.programas.edit']);

        Permission::create(['name' => 'admin.carteras.index']);
        Permission::create(['name' => 'admin.carteras.store']);
        Permission::create(['name' => 'admin.carteras.create']);
        Permission::create(['name' => 'admin.carteras.destroy']);
        Permission::create(['name' => 'admin.carteras.update']);
        Permission::create(['name' => 'admin.carteras.edit']);

        Permission::create(['name' => 'admin.sectores.index']);
        Permission::create(['name' => 'admin.sectores.store']);
        Permission::create(['name' => 'admin.sectores.create']);
        Permission::create(['name' => 'admin.sectores.update']);
        Permission::create(['name' => 'admin.sectores.destroy']);
        Permission::create(['name' => 'admin.sectores.edit']);

        Permission::create(['name' => 'admin.subprogramas.store']);
        Permission::create(['name' => 'admin.subprogramas.index']);
        Permission::create(['name' => 'admin.subprogramas.create']);
        Permission::create(['name' => 'admin.subprogramas.update']);
        Permission::create(['name' => 'admin.subprogramas.destroy']);
        Permission::create(['name' => 'admin.subprogramas.edit']);

        Permission::create(['name' => 'admin.planesdesarrollo.store']);
        Permission::create(['name' => 'admin.planesdesarrollo.index']);
        Permission::create(['name' => 'admin.planesdesarrollo.create']);
        Permission::create(['name' => 'admin.planesdesarrollo.update']);
        Permission::create(['name' => 'admin.planesdesarrollo.destroy']);
        Permission::create(['name' => 'admin.planesdesarrollo.edit']);

        Permission::create(['name' => 'productos.index']);
        Permission::create(['name' => 'productos.store']);
        Permission::create(['name' => 'productos.create']);
        Permission::create(['name' => 'productos.show']);
        Permission::create(['name' => 'productos.destroy']);
        Permission::create(['name' => 'productos.update']);
        Permission::create(['name' => 'productos.edit']);
        // new
        Permission::create(['name' => 'productos.export']);


        Permission::create(['name' => 'exportar_productos_excel']);

        $admin->syncPermissions([
            'admin.areas.index',
            'admin.areas.store',
            'admin.areas.create',
            'admin.areas.update',
            'admin.areas.destroy',
            'admin.areas.edit',

            'admin.tipoproductos.index',
            'admin.tipoproductos.store',
            'admin.tipoproductos.create',
            'admin.tipoproductos.update',
            'admin.tipoproductos.destroy',
            'admin.tipoproductos.edit',

            'admin.unidadmedidas.index',
            'admin.unidadmedidas.store',
            'admin.unidadmedidas.create',
            'admin.unidadmedidas.update',
            'admin.unidadmedidas.destroy',
            'admin.unidadmedidas.edit',

            'admin.programas.store',
            'admin.programas.index',
            'admin.programas.create',
            'admin.programas.update',
            'admin.programas.destroy',
            'admin.programas.edit',

            'admin.carteras.index',
            'admin.carteras.store',
            'admin.carteras.create',
            'admin.carteras.destroy',
            'admin.carteras.update',
            'admin.carteras.edit',

            'admin.sectores.index',
            'admin.sectores.store',
            'admin.sectores.create',
            'admin.sectores.update',
            'admin.sectores.destroy',
            'admin.sectores.edit',

            'admin.subprogramas.store',
            'admin.subprogramas.index',
            'admin.subprogramas.create',
            'admin.subprogramas.update',
            'admin.subprogramas.destroy',
            'admin.subprogramas.edit',

            'admin.planesdesarrollo.store',
            'admin.planesdesarrollo.index',
            'admin.planesdesarrollo.create',
            'admin.planesdesarrollo.update',
            'admin.planesdesarrollo.destroy',
            'admin.planesdesarrollo.edit',

            'productos.export',
            'productos.index',
            'productos.show',
            'exportar_productos_excel'
        ]);
        $user_role->syncPermissions([
            'productos.index',
            'productos.store',
            'productos.create',
            'productos.show',
            'productos.destroy',
            'productos.update',
            'productos.edit',
            'productos.export',
            'exportar_productos_excel',
        ]);

        $user_admin = User::create([
            'name' => 'Oficina de Sistemas',
            'email' => 'sistemas@puertoboyaca-boyaca.gov.co',
            'password' => bcrypt('Sistemas2024*a')
        ])->assignRole('Admin');

        $user_user = User::create([
            'name' => 'Oficina de Control Interno',
            'email' => 'controlinterno@puertoboyaca-boyaca.gov.co',
            'password' => bcrypt('controlinterno')
        ])->assignRole('User');
        $user_user = User::create([
            'name' => 'Área de Almacén',
            'email' => 'almacenmunicipal@puertoboyaca-boyaca.gov.co',
            'password' => bcrypt('almacenmunicipal')
        ])->assignRole('User');

        $user_user = User::create([
            'name' => 'Área De Personal',
            'email' => 'personal@puertoboyaca-boyaca.gov.co',
            'password' => bcrypt('personal')
        ])->assignRole('User');

        $user_user = User::create([
            'name' => 'Área De Archivo',
            'email' => 'archivomunicipal@puertoboyaca-boyaca.gov.co',
            'password' => bcrypt('archivomunicipal')
        ])->assignRole('User');

        $user_user = User::create([
            'name' => 'Área De Vivienda',
            'email' => 'vivienda@puertoboyaca-boyaca.gov.co',
            'password' => bcrypt('vivienda')
        ])->assignRole('User');

        $user_user = User::create([
            'name' => 'Área De Salud',
            'email' => 'salud@puertoboyaca-boyaca.gov.co',
            'password' => bcrypt('salud')
        ])->assignRole('User');

        $user_user = User::create([
            'name' => 'Comisaria De Familia',
            'email' => 'comisariadefamilia@puertoboyaca-boyaca.gov.co',
            'password' => bcrypt('comisariadefamilia')
        ])->assignRole('User');

        $user_user = User::create([
            'name' => 'Área De Cultura',
            'email' => 'cultura@puertoboyaca-boyaca.gov.co',
            'password' => bcrypt('cultura')
        ])->assignRole('User');

        $user_user = User::create([
            'name' => 'Cuerpo De Bomberos',
            'email' => 'bomberos@puertoboyaca-boyaca.gov.co',
            'password' => bcrypt('bomberos')
        ])->assignRole('User');

        $user_user = User::create([
            'name' => 'Biblioteca Pública Municipal',
            'email' => 'biblioteca@puertoboyaca-boyaca.gov.co',
            'password' => bcrypt('biblioteca')
        ])->assignRole('User');

        //factory(User::class)->times(10)->create();
    }
}
