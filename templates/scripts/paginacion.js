const btnList = document.getElementById("NewLista");
const fromList = document.getElementById("list-form");
const overlay = document.getElementById('overlay');
let listNameInput = document.getElementById('list-name')
const listContent = document.getElementById('list-content')
const btnCancelar = document.getElementById('cancelar')

btnList.addEventListener('click', () => {
    overlay.style.display = 'flex'; 
});

btnCancelar.addEventListener('click', ()=>{
    overlay.style.display = 'none'; 
})

fromList.addEventListener('submit', (e) => {
    e.preventDefault();
    
    const listName = listNameInput.value;

    const newListButton = document.createElement('button');
    newListButton.classList.add('listas');
    newListButton.innerHTML = `<span class="material-symbols-outlined">music_note</span><p>${listName}</p>`;

    listContent.appendChild(newListButton);

    listNameInput.value = '';

    overlay.style.display = 'none';
});