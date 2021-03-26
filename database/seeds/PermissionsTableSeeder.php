<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //users
        Permission::create([
            'name'=>'Navegar usuarios',
            'slug'=>'users.index',
            'description'=>'Lista y navega por todos los usuarios del sistema'
        ]);

        Permission::create([
            'name'=>'Ver detalle de usuario',
            'slug'=>'users.show',
            'description'=>'Ver el detalle de cada usuario del sistema'
        ]);

        Permission::create([
            'name'=>'Edicion de usuarios',
            'slug'=>'users.edit',
            'description'=>'Editar cualquier dato de un usuario del sistema'
        ]);

        Permission::create([
            'name'=>'Creacion de usuarios',
            'slug'=>'users.create',
            'description'=>'Crear cualquier dato de un usuario del sistema'
        ]);

        Permission::create([
            'name'=>'Eliminar usuarios',
            'slug'=>'users.destroy',
            'description'=>'Eliminar cualquier dato de un usuario del sistema'
        ]);
        //roles
        Permission::create([
            'name'=>'Navegar roles',
            'slug'=>'roles.index',
            'description'=>'Lista y navega por todos los roles del sistema'
        ]);

        Permission::create([
            'name'=>'Ver detalle de rol',
            'slug'=>'roles.show',
            'description'=>'Ver el detalle de cada rol del sistema'
        ]);

        Permission::create([
            'name'=>'Edicion de roles',
            'slug'=>'roles.edit',
            'description'=>'Editar cualquier dato de un rol del sistema'
        ]);

        Permission::create([
            'name'=>'Creacion de roles',
            'slug'=>'roles.create',
            'description'=>'Crear cualquier dato de un rol del sistema'
        ]);

        Permission::create([
            'name'=>'Eliminar roles',
            'slug'=>'roles.destroy',
            'description'=>'Eliminar cualquier dato de un rol del sistema'
        ]);
        //categories
        Permission::create([
            'name'=>'Navegar categorias',
            'slug'=>'categories.index',
            'description'=>'Lista y navega por todas las categorias del sistema'
        ]);

        Permission::create([
            'name'=>'Ver detalle de categoria',
            'slug'=>'categories.show',
            'description'=>'Ver el detalle de cada categoria del sistema'
        ]);

        Permission::create([
            'name'=>'Edicion de categorias',
            'slug'=>'categories.edit',
            'description'=>'Editar cualquier dato de una categoria del sistema'
        ]);

        Permission::create([
            'name'=>'Creacion de categorias',
            'slug'=>'categories.create',
            'description'=>'Crear cualquier dato de una categoria del sistema'
        ]);

        Permission::create([
            'name'=>'Eliminar categorias',
            'slug'=>'categories.destroy',
            'description'=>'Eliminar cualquier dato de una categoria del sistema'
        ]);
        //clients
        Permission::create([
            'name'=>'Navegar clientes',
            'slug'=>'clients.index',
            'description'=>'Lista y navega por todas las clientes del sistema'
        ]);

        Permission::create([
            'name'=>'Ver detalle de cliente',
            'slug'=>'clients.show',
            'description'=>'Ver el detalle de cada cliente del sistema'
        ]);

        Permission::create([
            'name'=>'Edicion de  clientes',
            'slug'=>'clients.edit',
            'description'=>'Editar cualquier dato de un cliente del sistema'
        ]);

        Permission::create([
            'name'=>'Creacion de  clientes',
            'slug'=>'clients.create',
            'description'=>'Crear cualquier dato de un cliente del sistema'
        ]);

        Permission::create([
            'name'=>'Eliminar clientes',
            'slug'=>'clients.destroy',
            'description'=>'Eliminar cualquier dato de un cliente del sistema'
        ]);
        //products
        Permission::create([
            'name'=>'Navegar productos',
            'slug'=>'products.index',
            'description'=>'Lista y navega por todas las productos del sistema'
        ]);

        Permission::create([
            'name'=>'Ver detalle de producto',
            'slug'=>'products.show',
            'description'=>'Ver el detalle de cada producto del sistema'
        ]);

        Permission::create([
            'name'=>'Edicion de  productos',
            'slug'=>'products.edit',
            'description'=>'Editar cualquier dato de un producto del sistema'
        ]);

        Permission::create([
            'name'=>'Creacion de  productos',
            'slug'=>'products.create',
            'description'=>'Crear cualquier dato de un producto del sistema'
        ]);

        Permission::create([
            'name'=>'Eliminar productos',
            'slug'=>'products.destroy',
            'description'=>'Eliminar cualquier dato de un producto del sistema'
        ]);
        //providers
        Permission::create([
            'name'=>'Navegar proveedores',
            'slug'=>'providers.index',
            'description'=>'Lista y navega por todas las proveedores del sistema'
        ]);

        Permission::create([
            'name'=>'Ver detalle de proveedor',
            'slug'=>'providers.show',
            'description'=>'Ver el detalle de cada proveedor del sistema'
        ]);

        Permission::create([
            'name'=>'Edicion de  proveedores',
            'slug'=>'providers.edit',
            'description'=>'Editar cualquier dato de un proveedor del sistema'
        ]);

        Permission::create([
            'name'=>'Creacion de  proveedores',
            'slug'=>'providers.create',
            'description'=>'Crear cualquier dato de un proveedor del sistema'
        ]);

        Permission::create([
            'name'=>'Eliminar proveedores',
            'slug'=>'providers.destroy',
            'description'=>'Eliminar cualquier dato de un proveedor del sistema'
        ]);
        //purchases
        Permission::create([
            'name'=>'Navegar compras',
            'slug'=>'purchases.index',
            'description'=>'Lista y navega por todas las compras del sistema'
        ]);

        Permission::create([
            'name'=>'Ver detalle de compra',
            'slug'=>'purchases.show',
            'description'=>'Ver el detalle de cada compra del sistema'
        ]);

        Permission::create([
            'name'=>'Creacion de  compras',
            'slug'=>'purchases.create',
            'description'=>'Crear cualquier dato de una compra del sistema'
        ]);
        //sales
        Permission::create([
            'name'=>'Navegar ventas',
            'slug'=>'sales.index',
            'description'=>'Lista y navega por todas las ventas del sistema'
        ]);

        Permission::create([
            'name'=>'Ver detalle de venta',
            'slug'=>'sales.show',
            'description'=>'Ver el detalle de cada venta del sistema'
        ]);

        Permission::create([
            'name'=>'Creacion de  ventas',
            'slug'=>'sales.create',
            'description'=>'Crear cualquier dato de una venta del sistema'
        ]);


        Permission::create([
            'name'=>'Exportar compras',
            'slug'=>'purchases.pdf',
            'description'=>'Exporta las compras a pdf'
        ]);

        Permission::create([
            'name'=>'Exportar ventas',
            'slug'=>'sales.pdf',
            'description'=>'Exporta las ventas a pdf'
        ]);
        //empresas
        Permission::create([
            'name'=>'Navegar empresas',
            'slug'=>'business.index',
            'description'=>'Lista y navega por todas las empresas del sistema'
        ]);

        Permission::create([
            'name'=>'actualizar empresas',
            'slug'=>'business.edit',
            'description'=>'actualizar cualquier dato de una empresa del sistema'
        ]);
        //impresoras
        Permission::create([
            'name'=>'Navegar impresoras',
            'slug'=>'printers.index',
            'description'=>'Lista y navega por todas las impresoras del sistema'
        ]);

        Permission::create([
            'name'=>'actualizar impresoras',
            'slug'=>'printers.edit',
            'description'=>'actualizar cualquier dato de una impresora del sistema'
        ]);

        //reportes
        Permission::create([
            'name'=>'Reporte por dia',
            'slug'=>'reports.day',
            'description'=>'Lista y navega por todas los reportes por dia del sistema'
        ]);
        Permission::create([
            'name'=>'Reporte por fecha',
            'slug'=>'reports.date',
            'description'=>'Lista y navega por todas los reportes por fecha del sistema'
        ]);
        Permission::create([
            'name'=>'Consulta reportes',
            'slug'=>'report.results',
            'description'=>'Lista y navega por todas los reportes del sistema'
        ]);

        Permission::create([
            'name'=>'subir archivos',
            'slug'=>'purchases.upload',
            'description'=>'subir archivos de compras'
        ]);

        Permission::create([
            'name'=>'cambiar estado compras',
            'slug'=>'purchases.change.status',
            'description'=>'cambiar estado compras'
        ]);

        Permission::create([
            'name'=>'cambiar estado ventas',
            'slug'=>'sales.change.status',
            'description'=>'cambiar estado ventas'
        ]);

        Permission::create([
            'name'=>'cambiar estado productos',
            'slug'=>'products.change.status',
            'description'=>'cambiar estado productos'
        ]);

    }
}
