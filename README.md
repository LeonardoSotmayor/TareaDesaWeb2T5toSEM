# Actividad: Portafolio Personal y Formulario de Contacto Dinámico

**Estudiante:** Leonardo Javier Sotomayor Ojeda  
**Carrera:** Ingeniería en Tecnologías de la Información (UTPL)  

---

## 📌 Descripción del Proyecto
Este proyecto consiste en el desarrollo de un sitio web personal responsivo y dinámico, construido bajo los estándares de la web moderna. Incluye una sección biográfica, intereses personales y un sistema de contacto funcional que procesa datos mediante PHP y los almacena de forma segura en una base de datos MySQL.

## 🛠️ Tecnologías y Arquitectura Utilizadas
* **Frontend:** HTML5 Semántico y CSS3.
* **Framework UI:** Bootstrap 5 (implementado vía CDN para optimización de carga y diseño *Responsive*).
* **Backend:** PHP 8.x.
* **Base de Datos:** MySQL (Gestión de conexión segura orientada a objetos mediante PDO).

## ✨ Características y Validaciones Implementadas
Para garantizar la integridad y seguridad de la información, el proyecto cuenta con:
1. **Validación Frontend (Cliente):** Uso de atributos HTML5 (`required`, `type="email"`) y Expresiones Regulares (`pattern="[a-zA-Z\s]+"`) para evitar el ingreso de números en el nombre.
2. **Validación Backend (Servidor):** Saneamiento de datos mediante `htmlspecialchars` y `filter_var` en PHP para prevenir inyecciones de código (XSS).
3. **Seguridad SQL:** Uso de sentencias preparadas (`prepare` y `bindParam`) con PDO para evitar ataques de inyección SQL.
4. **Notificaciones Automáticas:** Implementación de la función `mail()` de PHP para simular el envío de correos de confirmación al usuario (sujeto a las políticas SMTP del hosting).
5. **Interfaz de Respuesta:** Uso de componentes visuales (Alertas y Cards de Bootstrap) para confirmar al usuario el estado de su envío sin dejar la pantalla en blanco.

---

## 🔍 Guía de Validación para el Docente (Panel de Registros)
Debido a que las políticas de seguridad del hosting gratuito (InfinityFree) **bloquean las conexiones remotas a la base de datos** desde clientes externos (como MySQL Workbench o XAMPP local), se ha desarrollado un panel de administración web seguro para facilitar la calificación.

**Pasos para validar la persistencia de datos:**
1. Ingrese a la página web en vivo (enlace abajo) y diríjase a la sección "Contacto".
2. Llene el formulario con datos de prueba y envíe el mensaje.
3. Para comprobar que el dato ingresó a la base de datos `mensajes_contacto`, haga clic en el siguiente enlace protegido con credenciales de acceso:
   👉 **[Ingresar al Panel de Registros de la Base de Datos](https://leonardosotomayor.infinityfreeapp.com/ver_registros.php?clave=ProfeUTPL)**
   *(Nota: Se requiere la variable `?clave=ProfeUTPL` en la URL para autorizar el acceso por seguridad).*

---

## 🚀 Enlaces de Despliegue

* **🌐 Proyecto en Vivo (Hosting Gratuito):** https://leonardosotomayor.infinityfreeapp.com/
* **💻 Repositorio del Código Fuente:** https://github.com/LeonardoSotmayor/TareaDesaWeb2T5toSEM

---

## ⚙️ Instrucciones para Uso en Entorno Local (XAMPP)
Si se desea auditar el código de forma local, siga estos pasos:
1. Clonar o descomprimir el proyecto dentro de la carpeta `htdocs` de XAMPP.
2. Iniciar los servicios de Apache y MySQL.
3. Acceder a `http://localhost/phpmyadmin` e importar el script `database.txt` incluido en la raíz del proyecto para generar la base de datos `portafolio_db`.
4. Abrir en el navegador: `http://localhost/NOMBRE-DE-LA-CARPETA/`