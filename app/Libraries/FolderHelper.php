<?php
    namespace App\Libraries;
    class FolderHelper {

        // $product_folder untuk sementara menggunakan product_id
        static function create_folder_product($product_folder)
        {
            if(!is_dir("public/products"))
            {
                mkdir("public/products",0777);
            }

            if(!is_dir("public/products/$product_folder"))
            {
                mkdir("public/products/$product_folder",0777);
            }
        }

        static function create_folder_admin()
        {
            if(!is_dir("public/admin"))
            {
                mkdir("public/admin",0777);
            }
        }

        static function change_folder_product()
        {

        }

    }