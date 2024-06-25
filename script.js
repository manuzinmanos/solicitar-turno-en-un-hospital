document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('turnoForm');
    const tableBody = document.querySelector('#turnosTable tbody');

    function clearTable() {
        tableBody.innerHTML = '';
    }

    function populateTable(turnos) {
        clearTable();
        turnos.forEach(turno => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${turno.nombre}</td>
                <td>${turno.motivo}</td>
                <td>${turno.fecha}</td>
            `;
            tableBody.appendChild(row);
        });
    }

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                populateTable(data.turnos);
                alert('Solicitud enviada correctamente');
                form.reset();
            } else {
                alert('Error al enviar la solicitud');
                console.error('Error:', data.error);
            }
        })
        .catch(error => {
            alert('Error al enviar la solicitud');
            console.error('Error:', error);
        });
    });

    // Cargar los turnos al cargar la página por primera vez
    fetch('submit.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                populateTable(data.turnos);
            } else {
                console.error('Error al obtener los turnos:', data.error);
            }
        })
        .catch(error => {
            console.error('Error al obtener los turnos:', error);
        });
});