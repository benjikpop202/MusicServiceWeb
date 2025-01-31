document.addEventListener('DOMContentLoaded', () => {
    obtenerListas();
});
function obtenerListas() {
    fetch('http://localhost:8000/index.php?action=obtenerListasUser')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error("Error:", data.error);
                return;
            }

            const listContainer = document.getElementById('list-content');
            listContainer.innerHTML = ''; // Limpiar antes de cargar

            data.forEach(lista => {
                const newListButton = document.createElement('button');
                newListButton.classList.add('listas');
                newListButton.innerHTML = `<span class="material-symbols-outlined">music_note</span><p>${lista.nombre}</p>`;
                listContainer.appendChild(newListButton);
            });
        })
        .catch(error => console.error('Error al obtener listas:', error));
}