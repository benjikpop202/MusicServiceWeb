let buttonSection = document.getElementById("btn-section")
let next = document.getElementById("siguiente")
let back = document.getElementById("anterior")
let inicio = 0
let fin = 4

function updateCanciones() {
    let CancionesNodes = document.querySelectorAll('.cancion')
    return Array.from(CancionesNodes)
}
let Canciones = updateCanciones()
let N = Canciones.length


function ShowCanciones(nodos) {
    nodos.forEach(nodo =>{
        nodo.style.display = "flex"
    })
}

    function CleanContainer(){
         Canciones.forEach(lista =>{
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
        Canciones = updateCanciones()
        N = Canciones.length
    
        if (N > 4) {
            let nodos = Canciones.slice(inicio, fin)
            CleanContainer()
            ShowCanciones(nodos)
            next.style.display = "block"
            buttonSection.style.justifyContent = "center"
        } else {
            ShowCanciones(Canciones)
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
            let nodos = Canciones.slice(inicio, fin)
            CleanContainer()
            ShowCanciones(nodos)
            scrollToTop()
            }else{
            let nodos = Canciones.slice(inicio, N)
            CleanContainer()
            ShowCanciones(nodos)
            scrollToTop()
             }
          }
    })
           
    back.addEventListener("click", ()=>{
        if(inicio > 0){
        inicio = inicio - 4
        fin = inicio + 4
        let nodos = Canciones.slice(inicio, fin)
        CleanContainer()
        ShowCanciones(nodos)
        scrollToTop()
        if(inicio == 0){
         back.style.display = "none"
         buttonSection.style.justifyContent = "center"
        }
        }
                    
    })