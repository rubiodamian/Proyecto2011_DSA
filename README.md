Proyecto2011_DSA
================

Instalacion
------------
- Primero crear una carpeta donde clonar el proyecto, en este ejemplo se llamara PROYECTO/:
- Luego, far permisos a las carpetas cache/ y log/:
    chmod 777 cache/ log/
- Configurar el servidor virtual:
    
        # Be sure to only have this line once in your configuration
        NameVirtualHost 127.0.0.1:8080
        
        # This is the configuration for your project
        Listen 127.0.0.1:8080
        
        <VirtualHost 127.0.0.1:8080>
          DocumentRoot "/home/PROYECTO/web"
          DirectoryIndex index.php
          <Directory "/home/PROYECTO/web">
            AllowOverride All
            Allow from All
          </Directory>
        
          Alias /sf /home/PROYECTO/lib/vendor/symfony/data/web/sf
          <Directory "/home/PROYECTO/lib/vendor/symfony/data/web/sf">
            AllowOverride All
            Allow from All
          </Directory>
        </VirtualHost>