<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de acceso - Editorial</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    
    <div class="form-registro">
        <h2 class="form-titulo">Registro de acceso</h2>
        <form id="registroForm">
                <label>Nombre: <input type="text" id="nombre" required></label>

                <label>Rol: 
                    <select id="rol" required>
                        <option value="">Seleccione...</option>
                        <option value="Correctores de estilo">Correctores de estilo</option>
                        <option value="Ilustradores de libros">Ilustradores de libros</option>
                        <option value="Escritores">Escritores</option>
                        <option value="Reporteros">Reporteros</option>
                        <option value="Impresores">Impresores</option>
                        <option value="Editores">Editores</option>
                        <option value="Diseñadores gráficos">Diseñadores gráficos</option>
                        <option value="Traductores">Traductores</option>
                        <option value="Marketing editorial">Marketing editorial</option>
                    </select>
                </label>

                <label>Piso: 
                    <select id="piso" required>
                        <option value="">Seleccione...</option>
                        <option value="Piso 1 - Recepción">Piso 1 - Recepción</option>
                        <option value="Piso 2 - Edición">Piso 2 - Edición</option>
                        <option value="Piso 3 - Diseño">Piso 3 - Diseño</option>
                        <option value="Piso 4 - Imprenta">Piso 4 - Imprenta</option>
                        <option value="Piso 5 - Administración">Piso 5 - Administración</option>
                    </select>
                </label>
                <label>Fecha: <input type="date" id="fecha" required></label>
            <button type="submit">Registrar Entrada</button>
        </form>
    </div>
    
    <div class="filtros">
        <h2 class="form-titulo">Filtrar por Fecha</h2>
        <label>Seleccionar fecha: <input type="date" id="filtroFecha"></label>
        <button id="btnFiltrar">Filtrar</button>
        <button id="btnHoy">Hoy</button>
    </div>
    
    <div>
        <h2>Registros</h2>
        <table id="tablaRegistros">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Piso</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="cuerpoTabla">
            </tbody>
        </table>
    </div>
    
    <div id="notification" class="notification"></div>

    <script src="registros.js"></script>
</body>
</html>