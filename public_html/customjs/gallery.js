//Variables y selectores

const contenedor=document.querySelector("#contenedor");

//Eventos

eventListenners();

function eventListenners(){
    document.addEventListener("DOMContentLoaded",cargarDatos);
}

function cargarDatos() {
    API.get(`gallery/getLibros?id=${ID}`).then(
        data=>{
            let html="<div class='row'>";
            data.records.forEach(
                (item,index)=>{
                    html+=`
                        <div class="col-md-4">
                            <img src="${item.fotop}" style="height:150px;"/> <br>
                            <h4 class="text-center">${item.titulo}</h4>
                            <p>${item.descripcion}</p>
                            <button class="btn btn-primary" onclick='window.location="${BASE_API}gallery/verlibro?id=${item.id_libro}"'>Ver</button>
                        </div>
                    `;
                }
            );
            html+="</div>";
            contenedor.innerHTML=html;
        }
    ).catch(
        error=>{
            console.error("Error:",error);
        }
    );
}