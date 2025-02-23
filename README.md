# 🩺 NurseCase - Simulador de Casos Clínicos para Enfermería  

**NurseCase** es una aplicación web diseñada para mejorar las habilidades clínicas de los estudiantes de enfermería mediante la simulación interactiva de casos clínicos. Los estudiantes pueden analizar síntomas, formular diagnósticos y seleccionar planes de cuidado en un entorno de aprendizaje seguro y guiado.  

## 🎯 **Objetivo del Proyecto**  
Crear una plataforma educativa accesible y efectiva que ayude a los estudiantes de enfermería a desarrollar su capacidad de análisis y toma de decisiones en el ámbito clínico.  

## 📌 **Características Principales**  

✔️ **Registro e inicio de sesión** para estudiantes y profesores.  
✔️ **Exploración de casos clínicos interactivos** con historias médicas, signos vitales y síntomas.  
✔️ **Evaluación y diagnóstico** con selección de planes de cuidado.  
✔️ **Retroalimentación detallada** para mejorar el aprendizaje.  
✔️ **Historial de progreso** para cada estudiante.  
✔️ **Panel de gestión para profesores**, permitiendo agregar nuevos casos clínicos.  

## 👥 **Usuarios Involucrados**  
- **Estudiantes de enfermería** 🏥 → Practican con casos clínicos, analizan síntomas y reciben retroalimentación.  
- **Profesores** 📚 → Supervisa el desempeño de los estudiantes y puede gestionar casos clínicos.  
- **Administrador del sistema** 🛠 (Opcional) → Mantiene la plataforma y gestiona usuarios.  

---

## 🛠 **Tecnologías Utilizadas**  
- **Backend:** PHP (Laravel / CodeIgniter / PHP Nativo)  
- **Base de Datos:** MySQL / MariaDB  
- **Frontend:** HTML + CSS + Bootstrap / TailwindCSS  
- **Autenticación:** PHP Sessions / JWT  
- **Servidor:** Apache / Nginx  

---

## 🚀 **Instalación y Configuración**  

1️⃣ **Clonar el repositorio:**  
```bash
git clone https://github.com/KerenBermeo/nurse_case.git
cd NurseCase
```  

2️⃣ **Instalar dependencias (si usas Laravel o CodeIgniter):**  
```bash
composer install  
```

3️⃣ **Configurar la base de datos en `.env`:**  
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nursecase
DB_USERNAME=root
DB_PASSWORD=
```

4️⃣ **Ejecutar migraciones (Laravel):**  
```bash
php artisan migrate
```

5️⃣ **Iniciar el servidor local:**  
```bash
php -S localhost:8000 -t public
```
o con Laravel:  
```bash
php artisan serve
```

6️⃣ **Abrir en el navegador:**  
```
http://localhost:8000
```

---

## 📂 **Estructura del Proyecto**  
```
/NurseCase
│── app/              # Lógica del backend
│── public/           # Archivos públicos (CSS, JS, imágenes)
│── database/         # Migraciones y seeds
│── resources/        # Vistas y plantillas
│── routes/           # Definición de rutas
│── .env              # Configuración del entorno
│── README.md         # Documentación del proyecto
```

---

## 🎯 **Módulos Principales**  

### 🔹 1. Módulo de Autenticación  
✅ Registro e inicio de sesión.  
✅ Recuperación de contraseña.  

### 🔹 2. Módulo de Casos Clínicos  
✅ Explorar y seleccionar casos clínicos.  
✅ Evaluación de signos y síntomas.  
✅ Diagnóstico y plan de cuidados.  
✅ Retroalimentación detallada.  

### 🔹 3. Módulo de Seguimiento  
✅ Historial de intentos y desempeño.  
✅ Ranking o logros (opcional).  

### 🔹 4. Módulo de Profesores  
✅ Supervisión del progreso de los estudiantes.  
✅ Creación y gestión de nuevos casos clínicos.  

### 🔹 5. Módulo de Administración (Opcional)  
✅ Gestión de usuarios y mantenimiento del sistema.  

---

## 🤝 **Contribuciones**  
¡Las contribuciones son bienvenidas! Si deseas mejorar **NurseCase**, sigue estos pasos:  

1️⃣ **Fork** el repositorio.  
2️⃣ Crea una nueva rama (`feature/nueva-funcionalidad`).  
3️⃣ Haz un **commit** con tus cambios.  
4️⃣ Envía un **pull request** para revisión.  

---

## 📜 **Licencia**  
Este proyecto está bajo la licencia **MIT**, lo que significa que puedes modificarlo y usarlo libremente con reconocimiento a los autores originales.  


 

