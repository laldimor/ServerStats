
# Magento 2 Server Stats Module

## Descripción
Este módulo de Magento 2 proporciona estadísticas del servidor, incluyendo el espacio en disco, uso de memoria y carga del CPU, directamente desde el panel de administración.

## Requisitos
- Magento 2.3.x o superior
- Acceso a la línea de comandos del servidor
- Composer instalado en el servidor

## Instalación

```bash
composer require aldimor/server-stats
```

## Habilitar el Módulo

Habilita el módulo ejecutando los siguientes comandos en la línea de comandos:

```bash
php bin/magento module:enable Aldimor_ServerStats
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f
php bin/magento cache:clean
php bin/magento cache:flush
```

## Uso

Después de la instalación y habilitación del módulo, puedes acceder a las estadísticas del servidor desde el menú de administración de Magento:

1. Inicia sesión en el panel de administración de Magento.
2. Navega a `Server Stats`.
3. Aquí podrás ver las estadísticas de espacio en disco, uso de memoria y carga del CPU.
    ```

## Contribuciones

Las contribuciones son bienvenidas. Por favor, abre un problema o envía un pull request para sugerencias o mejoras.

## Licencia

Este proyecto está licenciado bajo la Licencia MIT. Ver el archivo [LICENSE](LICENSE) para más detalles.

## Contacto

Para preguntas o soporte, por favor contacta a antonio.macias@aldimor.com o abre un problema en el repositorio.

---

