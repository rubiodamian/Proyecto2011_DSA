Proyecto2011_DSA
================

Instalacion
------------
- Primero crear una carpeta donde clonar el proyecto, en este ejemplo se llamara PROYECTO/.
- Luego, far permisos a las carpetas cache/ y log/:
                
        chmod 777 cache/ log/

- Configurar el servidor virtual en el archivo /httpd.conf:
        
        
        # Be sure to only have this line once in your configuration
        NameVirtualHost 127.0.0.1:8080
        
        # This is the configuration for your project
        Listen 127.0.0.1:8080
        
        <VirtualHost 127.0.0.1:8080>
          DocumentRoot "/home/mugen/git/Proyecto2011_DSA/web"
          DirectoryIndex index.php
          <Directory "/home/mugen/git/Proyecto2011_DSA/web">
            AllowOverride All
            Allow from All
            Require all granted
          </Directory>
        
          Alias /sf /home/mugen/git/Proyecto2011_DSA/lib/vendor/symfony/data/web/sf
          <Directory "/home/mugen/git/Proyecto2011_DSA/lib/vendor/symfony/data/web/sf">
            AllowOverride All
            Allow from All
            Require all granted
          </Directory>
          
 - Checkear la conf de symfony:
                
                php lib/vendor/symfony/data/bin/check_configuration.php
     nota: en caso de encontrar errores -> http://igushiken.wordpress.com/2011/02/16/how-to-install-apache-php5-and-symfony-on-ubuntu/
     
- Crear una base de datos llamada 'grupo104' y asignar un usuario con el mismo nombre y contraseña 'Z_p_h75p' 
- Ejecutar:

        ./symfony doctrine:build --all --and-load
