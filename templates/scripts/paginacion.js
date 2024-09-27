const btnList = document.getElementById("NewLista");
const fromList = document.getElementById("list-form");
const overlay = document.getElementById('overlay');
let listNameInput = document.getElementById('list-name')
const listContent = document.getElementById('list-content')
const btnCancelar = document.getElementById('cancelar')

btnList.addEventListener('click', () => {
    overlay.style.display = 'flex'; 
    listNameInput.value = ""
});

btnCancelar.addEventListener('click', ()=>{
    overlay.style.display = 'none'; 
})

fromList.addEventListener('submit', (e) => {
    e.preventDefault()
    const listName = listNameInput.value;
    
    const newListButton = document.createElement('button');
     newListButton.classList.add('listas');
     newListButton.innerHTML = `<span class="material-symbols-outlined">music_note</span><p>${listName}</p>`;
    
    listContent.appendChild(newListButton);
    
    listNameInput.value = '';
    
    overlay.style.display = 'none';

    paginate()
    
});


let buttonSection = document.getElementById("btn-section")
let next = document.getElementById("siguiente")
let back = document.getElementById("anterior")
let inicio = 0
let fin = 4

function updateListas() {
    let ListasNodes = document.querySelectorAll('.listas')
    return Array.from(ListasNodes)
}
let Listas = updateListas()
let N = Listas.length


function ShowListas(nodos) {
    nodos.forEach(nodo =>{
        nodo.style.display = "flex"
    })
}

    function CleanContainer(){
         Listas.forEach(lista =>{
             lista.style.display = "none"
            })
     }
     function scrollToTop() {
        if (document.body.scrollTop != 0 || document.documentElement.scrollTop != 0) {
            document.body.scrollTop = 0; // Para navegadores que no son Firefox
            document.documentElement.scrollTop = 0; // Para Firefox
        }
    }

    function paginate() {
        Listas = updateListas()
        N = Listas.length
    
        if (N > 4) {
            let nodos = Listas.slice(inicio, fin)
            CleanContainer()
            ShowListas(nodos)
            next.style.display = "block"
            buttonSection.style.justifyContent = "center"
        } else {
            ShowListas(Listas)
            next.style.display = "none"
        }
    }
    
    paginate()
                  
    next.addEventListener("click", ()=>{
    back.style.display = "block"
    buttonSection.style.justifyContent = "space-between"
     if(inicio + 4 < N){
        inicio = inicio + 4
        if((N-inicio)>= inicio){
            fin = inicio + 4
            let nodos = Listas.slice(inicio, fin)
            CleanContainer()
            ShowListas(nodos)
            scrollToTop()
            }else{
            let nodos = Listas.slice(inicio, N)
            CleanContainer()
            ShowListas(nodos)
            scrollToTop()
             }
          }
    })
           
    back.addEventListener("click", ()=>{
        if(inicio > 0){
        inicio = inicio - 4
        fin = inicio + 4
        let nodos = Listas.slice(inicio, fin)
        CleanContainer()
        ShowListas(nodos)
        scrollToTop()
        if(inicio == 0){
         back.style.display = "none"
         buttonSection.style.justifyContent = "center"
        }
        }
                    
    })