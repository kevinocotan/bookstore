//Variables globales y selectores
const btnNew=document.querySelector("#btnAgregar");
const panelDatos=document.querySelector("#contentList");
const panelForm=document.querySelector("#contentForm");
const btnCancelar=document.querySelector("#btnCancelar");
const formLibro=document.querySelector("#formLibro");
const divFotoP=document.querySelector("#divfotop");
const inputFotoP=document.querySelector("#fotop");
const divFotoM=document.querySelector("#divfotom");
const inputFotoM=document.querySelector("#fotom");
const divFotoG=document.querySelector("#divfotog");
const inputFotoG=document.querySelector("#fotog");
const tableContent=document.querySelector("#contentTable table tbody");
const searchText=document.querySelector("#txtSearch");
const pagination=document.querySelector(".pagination");
const API=new Api();
const objDatos={
    records:[],
    recordsFilter:[],
    currentPage:1,
    recordsShow:3,
    filter:""
}

//Configuracion de eventos
eventListiners();

function eventListiners() {
    btnNew.addEventListener("click",agregarLibro);
    btnCancelar.addEventListener("click",cancelarLibro);
    document.addEventListener("DOMContentLoaded",cargarDatos);
    searchText.addEventListener("input", aplicarFiltro);
    divFotoP.addEventListener("click",agregarFotoP);
    inputFotoP.addEventListener("change",actualizarFotoP);
    divFotoM.addEventListener("click",agregarFotoM);
    inputFotoM.addEventListener("change",actualizarFotoM);
    divFotoG.addEventListener("click",agregarFotoG);
    inputFotoG.addEventListener("change",actualizarFotoG);
    formLibro.addEventListener("submit",guardarLibro);
}

//Funciones

function guardarLibro(event) {
    event.preventDefault();
    const formData=new FormData(formLibro);
    //console.log(formData);
    API.post(formData,"libros/save").then(
        data=>{
            //console.log(data.msg);
            if (data.success) {
                cancelarLibro();
                Swal.fire({
                    icon:"info",
                    text:data.msg
                });
            } else {
                Swal.fire({
                    icon:"error",
                    title:"Error",
                    text:data.msg
                });
            }
        }
    ).catch(
        error=> {
            console.log("Error:",error);
        }
    );
}

function actualizarFotoP(el) {
    if (el.target.files && el.target.files[0]) {
        const reader=new FileReader();
        reader.onload=e=>{
            divFotoP.innerHTML=`<img src="${e.target.result}" class="h-100 w-100" style="object-fit:contain;">`;
        }
        reader.readAsDataURL(el.target.files[0]);
    }
}

function agregarFotoP() {
    inputFotoP.click();
}

function actualizarFotoM(el) {
    if (el.target.files && el.target.files[0]) {
        const reader=new FileReader();
        reader.onload=e=>{
            divFotoM.innerHTML=`<img src="${e.target.result}" class="h-100 w-100" style="object-fit:contain;">`;
        }
        reader.readAsDataURL(el.target.files[0]);
    }
}

function agregarFotoM() {
    inputFotoM.click();
}

function actualizarFotoG(el) {
    if (el.target.files && el.target.files[0]) {
        const reader=new FileReader();
        reader.onload=e=>{
            divFotoG.innerHTML=`<img src="${e.target.result}" class="h-100 w-100" style="object-fit:contain;">`;
        }
        reader.readAsDataURL(el.target.files[0]);
    }
}

function agregarFotoG() {
    inputFotoG.click();
}

function aplicarFiltro(element) {
    element.preventDefault();
    objDatos.filter=this.value;
    crearTabla();
}

function cargarDatos() {
    API.get("libros/getAll").then(
        data=>{
            //console.log(data.records);
            if (data.success) {
                objDatos.records=data.records;
                objDatos.currentPage=1;
                crearTabla();
                cargarAutores();
            } else {
                console.log("Error al recuperar los registros");
            }
        }
    ).catch(
        error=>{
            console.error("Error en la llamada:",error);
        }
    );
}

function cargarAutores() {
    API.get("autores/getAll").then(
        data=>{
            if (data.success) {
                const txtAutor=document.querySelector("#id_autor");
                txtAutor.innerHTML="";
                data.records.forEach(
                    (item,index)=>{
                        const {id_autor,autor}=item;
                        const optionAutor=document.createElement("option");
                        optionAutor.value=id_autor;
                        optionAutor.textContent=autor;
                        txtAutor.append(optionAutor);
                    }
                );
            }
            cargarCategorias();
        }
    ).catch(
        error=>{
            console.error("Error:", error);
        }
    );
}

function cargarCategorias() {
    API.get("categorias/getAll").then(
        data=>{
            if (data.success) {
                const txtCate=document.querySelector("#id_cate");
                txtCate.innerHTML="";
                data.records.forEach(
                    (item,index)=>{
                        const {id_cate,categoria}=item;
                        const optionCate=document.createElement("option");
                        optionCate.value=id_cate;
                        optionCate.textContent=categoria;
                        txtCate.append(optionCate);
                    }
                );
            }
        }
    ).catch(
        error=>{
            console.error("Error:", error);
        }
    );
}

function crearTabla() {
    if (objDatos.filter==""){
        objDatos.recordsFilter=objDatos.records.map(item=>item);
    } else {
        objDatos.recordsFilter=objDatos.records.filter(
            item=>{
                const {titulo, descripcion, categoria, autor}=item;
                if (titulo.toUpperCase().search(objDatos.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (descripcion.toUpperCase().search(objDatos.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (categoria.toUpperCase().search(objDatos.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (autor.toUpperCase().search(objDatos.filter.toUpperCase())!=-1) {
                    return item;
                }
            }
        );
    }
    const recordIni=(objDatos.currentPage*objDatos.recordsShow)-objDatos.recordsShow;
    const recordFin=(recordIni+objDatos.recordsShow)-1;
    let html="";
    console.log(recordIni,recordFin);
    objDatos.recordsFilter.forEach(
        (item,index)=>{
            if ((index>=recordIni) && (index<=recordFin)) {
                html+=`
                    <tr>
                    <td>${index+1}</td>
                    <td>${item.titulo}</td>
                    <td>${item.descripcion}</td>
                    <td>${item.categoria}</td>
                    <td>${item.autor}</td>
                    <td>${item.fecha_publicacion}</td>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="editarLibro(${item.id_libro})"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger" onclick="eliminarLibro(${item.id_libro})"><i class="bi bi-trash"></i></button>
                    </td>
                    </tr>
                `;
            }
        }
    );
    tableContent.innerHTML=html;
    crearPaginacion();
}

function crearPaginacion() {
    //Borrar elementos
    pagination.innerHTML="";
    //Boton Anterior
    const elAnterior=document.createElement("li");
    elAnterior.classList.add("page-item");
    elAnterior.innerHTML=`<a class="page-link" href="#">Previous</a>`;
    elAnterior.onclick=()=>{
        objDatos.currentPage=(objDatos.currentPage==1 ? 1 : --objDatos.currentPage);
        crearTabla();
    }
    pagination.append(elAnterior);
    //Agregando los numeros de pagina
    const totalPage=Math.ceil(objDatos.recordsFilter.length/objDatos.recordsShow);
    for (let i=1; i<=totalPage;i++) {
        const el=document.createElement("li");
        el.classList.add("page-item");
        el.innerHTML=`<a class="page-link" href="#">${i}</a>`;
        el.onclick=()=> {
            objDatos.currentPage=i;
            crearTabla();
        }
        pagination.append(el);
    }
    //Boton siguiente
    const elSiguiente=document.createElement("li");
    elSiguiente.classList.add("page-item");
    elSiguiente.innerHTML=`<a class="page-link" href="#">Next</a>`;
    elSiguiente.onclick=()=>{
        objDatos.currentPage=(objDatos.currentPage==totalPage ? totalPage : ++objDatos.currentPage);
        crearTabla();
    }
    pagination.append(elSiguiente);
}

function agregarLibro() {
    panelDatos.classList.add("d-none");
    panelForm.classList.remove("d-none");
    limpiarForm();
}

function limpiarForm(op) {
    formLibro.reset();
    document.querySelector("#id_libro").value="0";
    divFotoP.innerHTML="";
    divFotoM.innerHTML="";
    divFotoG.innerHTML="";
}

function cancelarLibro() {
    panelDatos.classList.remove("d-none");
    panelForm.classList.add("d-none");
    cargarDatos();
}

function editarLibro(id) {
    limpiarForm(1);
    panelDatos.classList.add("d-none");
    panelForm.classList.remove("d-none");
    API.get("libros/getOneBook?id="+id).then(
        data=>{
            if (data.success) {
                mostrarDatosForm(data.records[0]);
            } else {
                Swal.fire({
                    icon:"error",
                    title:"Error",
                    text:data.msg
                });
            }
        }
    ).catch(
        error=>{
            console.error("Error:",error);
        }
    );
}

function mostrarDatosForm(record) {
    const {id_libro, titulo, descripcion, id_cate, id_autor, fotop, fotom, fotog, fecha_publicacion}=record;
    document.querySelector("#id_libro").value=id_libro;
    document.querySelector("#titulo").value=titulo;
    document.querySelector("#descripcion").value=descripcion;
    document.querySelector("#id_cate").value=id_cate;
    document.querySelector("#id_autor").value=id_autor;
    document.querySelector("#fecha_publicacion").value=fecha_publicacion;
    divFotoP.innerHTML=`<img src="${fotop}" class="h-100 w-100" style="object-fit:contain;">`;
    divFotoM.innerHTML=`<img src="${fotom}" class="h-100 w-100" style="object-fit:contain;">`;
    divFotoG.innerHTML=`<img src="${fotog}" class="h-100 w-100" style="object-fit:contain;">`;
}

function eliminarLibro(id) {
    Swal.fire({
        title:"Esta seguro de eliminar el registro?",
        showDenyButton:true,
        confirmButtonText:"Si",
        denyButtonText:"No"
    }).then(
        resultado=>{
            console.log(resultado.isConfirmed);
            if (resultado.isConfirmed) {
                API.get("libros/deleteBook?id="+id).then(
                    data=>{
                        if (data.success) {
                            cancelarLibro();
                        } else {
                            Swal.fire({
                                icon:"error",
                                title:"Error",
                                text:data.msg
                            });
                        }
                    }
                ).catch(
                    error=>{
                        console.log("Error:",error);
                    }
                );
            }
        }       
    );
    console.log("Mensaje de texto");
}