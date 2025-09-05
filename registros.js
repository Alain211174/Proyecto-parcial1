        const registroForm = document.getElementById('registroForm');
        const filtroFecha = document.getElementById('filtroFecha');
        const btnFiltrar = document.getElementById('btnFiltrar');
        const btnHoy = document.getElementById('btnHoy');
        const cuerpoTabla = document.getElementById('cuerpoTabla');
        const notification = document.getElementById('notification');

        const today = new Date();
        const todayString = today.toISOString().split('T')[0];
        filtroFecha.value = todayString;
        document.getElementById('fecha').value = todayString;

        cargarRegistros();

        registroForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const nombre = document.getElementById('nombre').value;
            const rol = document.getElementById('rol').value;
            const piso = document.getElementById('piso').value;
            const fecha = document.getElementById('fecha').value;
            
            if (!nombre || !rol || !piso || !fecha) {
                mostrarNotificacion('Complete todos los campos', 'error');
                return;
            }
            
            try {
                const formData = new FormData();
                formData.append('nombre', nombre);
                formData.append('rol', rol);
                formData.append('piso', piso);
                formData.append('fecha', fecha);
                
                const response = await fetch('procesar.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    mostrarNotificacion('Registro guardado correctamente', 'success');
                    cargarRegistros();
                    registroForm.reset();
                    document.getElementById('fecha').value = todayString;
                } else {
                    mostrarNotificacion('Error al guardar: ' + result.message, 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                mostrarNotificacion('Error de conexión', 'error');
            }
        });

        btnFiltrar.addEventListener('click', cargarRegistros);
        btnHoy.addEventListener('click', function() {
            filtroFecha.value = todayString;
            cargarRegistros();
        });

window.cambiarEstado = async function(id, estadoActual, boton) {
    try {
        const formData = new FormData();
        formData.append('id', id);
        formData.append('activo', estadoActual ? 0 : 1);
        
        const response = await fetch('estado.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            mostrarNotificacion('Estado actualizado correctamente', 'success');
            cargarRegistros();
        } else {
            mostrarNotificacion('Error al cambiar estado: ' + result.message, 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        mostrarNotificacion('Error de conexión', 'error');
    }
}

async function cargarRegistros() {
    try {
        const fechaSeleccionada = filtroFecha.value;
        console.log("Cargando registros para fecha:", fechaSeleccionada);
        
        const response = await fetch(`obtener_registros.php?fecha=${fechaSeleccionada}`);
        const registros = await response.json();
        console.log("Registros recibidos:", registros);
        
        cuerpoTabla.innerHTML = '';
        
        if (registros.length === 0) {
            cuerpoTabla.innerHTML = '<tr><td colspan="6">No hay registros para esta fecha</td></tr>';
        } else {
            registros.forEach(registro => {
                console.log("Procesando registro:", registro.id, "Estado:", registro.activo);
                
                const tr = document.createElement('tr');
                tr.className = 'entrada-editorial';
                
                const estaActivo = Boolean(registro.activo);
                
                tr.innerHTML = `
                    <td>${registro.nombre}</td>
                    <td>${registro.rol}</td>
                    <td>${registro.piso_destino}</td>
                    <td>${registro.fecha}</td>
                    <td>
                        <span class="${estaActivo ? 'estado-activo' : 'estado-inactivo'}">
                            ${estaActivo ? 'Activo' : 'Inactivo'}
                        </span>
                    </td>
                    <td>
                        <button class="btn-cambiar-estado" onclick="cambiarEstado(${registro.id}, ${estaActivo}, this)">
                            ${estaActivo ? 'Desactivar' : 'Activar'}
                        </button>
                    </td>
                `;
                
                cuerpoTabla.appendChild(tr);
            });
        }
    } catch (error) {
        console.error('Error al cargar registros:', error);
        cuerpoTabla.innerHTML = '<tr><td colspan="6">Error al cargar los registros</td></tr>';
    }
}
        function mostrarNotificacion(mensaje, tipo) {
            notification.textContent = mensaje;
            notification.style.display = 'block';
            notification.style.padding = '10px';
            notification.style.margin = '10px 0';
            notification.style.borderRadius = '4px';
            
            if (tipo === 'success') {
                notification.style.backgroundColor = '#d4edda';
                notification.style.color = '#155724';
                notification.style.border = '1px solid #c3e6cb';
            } else {
                notification.style.backgroundColor = '#f8d7da';
                notification.style.color = '#721c24';
                notification.style.border = '1px solid #f5c6cb';
            }
            
            setTimeout(() => {
                notification.style.display = 'none';
            }, 3000);
        }