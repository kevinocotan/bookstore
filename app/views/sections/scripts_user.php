<script src="<?php echo URL;?>public_html/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo URL;?>public_html/customjs/api.js"></script>
<script type="text/javascript">
    const gallery=document.querySelector("#gallery");
    const API=new Api();

    //Eventos
    eventListenners();

    function eventListenners(){
        document.addEventListener("DOMContentLoaded",cargarGallery);
    }

    //Funciones

    function cargarGallery(){
        API.get("main/getAllCategorias").then(
            data=>{
                data.records.forEach(
                    (item,index)=>{
                        const el=document.createElement("li");
                        el.innerHTML=`<a class="dropdown-item" href="<?php echo URL?>gallery?id=${item.id_cate}">${item.categoria}</a>`;
                        gallery.append(el);
                    }
                );
            }
        ).catch(
            error=>{
                console.error("Error:",error);
            }
        );
    }
</script>