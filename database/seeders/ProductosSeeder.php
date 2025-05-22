<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductosSeeder extends Seeder
{
    public function run()
    {

        // Datos de productos de ropa
        $productos = [
            [
                'nombre' => 'Camiseta básica blanca',
                'descripcion' => 'Camiseta de algodón 100% básica y cómoda.',
                'categoria_id' => 1, // ID de la categoría (ej: Ropa)
                'talla_id' => 2, // ID de la talla (ej: M)
                'tipo_id' => 1, // ID del tipo (ej: Camisetas)
                'marca_id' => 1, // ID de la marca (ej: Nike)
                'precio' => 19.99,
                'existencia' => 50,
                'descuento' => 0,
                'imagen1' => 'https://m.media-amazon.com/images/I/81QiN2LBSjL.jpg',
                'imagen2' => 'https://img01.ztat.net/article/spp-media-p1/784643bc57c239d591041fb03dea7ca5/32d0a59364014c588fc4f2717311ed4e.jpg?imwidth=1800',
                'imagen3' => 'https://shoppinginibiza.com/155783-large_default/nike-camiseta-blanca-ar5004-100-hombre.jpg',
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Jeans ajustados azul oscuro',
                'descripcion' => 'Jeans de mezclilla ajustados y modernos.',
                'categoria_id' => 1, // ID de la categoría (ej: Ropa)
                'talla_id' => 3, // ID de la talla (ej: L)
                'tipo_id' => 2, // ID del tipo (ej: Jeans)
                'marca_id' => 2, // ID de la marca (ej: Levi's)
                'precio' => 49.99,
                'existencia' => 30,
                'descuento' => 10.00,
                'imagen1' => 'https://levimx.vtexassets.com/arquivos/ids/872739/26986-0049_3.jpg?v=638393807670500000',
                'imagen2' => 'https://resources.claroshop.com/imgsplaza-sears/sears/?tp=p&id=1090461&t=original',
                'imagen3' => 'https://levimx.vtexassets.com/arquivos/ids/872739/26986-0049_3.jpg?v=638393807670500000',
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Chaqueta de cuero negra',
                'descripcion' => 'Chaqueta de cuero genuino, elegante y resistente.',
                'categoria_id' => 1, // ID de la categoría (ej: Ropa)
                'talla_id' => 4, // ID de la talla (ej: XL)
                'tipo_id' => 3, // ID del tipo (ej: Chaquetas)
                'marca_id' => 3, // ID de la marca (ej: Zara)
                'precio' => 129.99,
                'existencia' => 20,
                'descuento' => 0,
                'imagen1' => 'https://static.zara.net/assets/public/a38c/2301/e81c41e9850c/7b9c77fe65e5/03046060800-e1/03046060800-e1.jpg?ts=1734082990710',
                'imagen2' => 'https://static.zara.net/assets/public/7da0/ee46/74884dc7be60/60c8000d4a28/08281175500-000-e1/08281175500-000-e1.jpg?ts=1735893097669',
                'imagen3' => 'https://static.zara.net/assets/public/9edb/eb46/2e364fce9d29/7be0de77fb53/04391826800-e1/04391826800-e1.jpg?ts=1723803083453',
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Vestido floral veraniego',
                'descripcion' => 'Vestido ligero con estampado floral, ideal para el verano.',
                'categoria_id' => 1, // ID de la categoría (ej: Ropa)
                'talla_id' => 2, // ID de la talla (ej: M)
                'tipo_id' => 4, // ID del tipo (ej: Vestidos)
                'marca_id' => 4, // ID de la marca (ej: H&M)
                'precio' => 39.99,
                'existencia' => 40,
                'descuento' => 5.00,
                'imagen1' => 'https://image.hm.com/assets/hm/f8/50/f8502d7ca379e80fac5f93ea4e80286d348c0b01.jpg?imwidth=2160',
                'imagen2' => 'https://i.ebayimg.com/thumbs/images/g/OMoAAOSw64Jmw~Wb/s-l1200.jpg',
                'imagen3' => 'https://image.hm.com/assets/hm/54/95/5495215efb664ad984eaae8adbeae093cf795acc.jpg?imwidth=1260',
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Zapatillas deportivas negras',
                'descripcion' => 'Zapatillas deportivas cómodas y resistentes.',
                'categoria_id' => 2, // ID de la categoría (ej: Calzado)
                'talla_id' => 5, // ID de la talla (ej: 42)
                'tipo_id' => 5, // ID del tipo (ej: Zapatillas)
                'marca_id' => 1, // ID de la marca (ej: Nike)
                'precio' => 79.99,
                'existencia' => 25,
                'descuento' => 15.00,
                'imagen1' => 'https://m.media-amazon.com/images/I/51DBnztIXXL._AC_UF894,1000_QL80_.jpg',
                'imagen2' => 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/7d05075b-99bd-404c-a537-7f6e1b600674/W+FLEX+EXPERIENCE+RN+12.png',
                'imagen3' => 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/2fb74645-8a41-4316-a1fa-2f2433611880/W+AIR+MAX+270.png',
                'estado' => 'activo',
            ],
        ];

        // Insertar los productos en la base de datos
        foreach ($productos as $producto) {
            Producto::create($producto);
        }
        
    }
}