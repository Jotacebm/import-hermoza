const cbxCategoria = document.getElementById('categoria');
cbxCategoria.addEventListener("change", getSubcategorias);

const cbxSubcategoria = document.getElementById('subcategoria');


function fetchAndSetData(url, formData, targetElement){
    return fetch(url,{
        method: "POST", 
        body: formData, 
        mode: 'cors'
    })
    .then(response => response.json())
    .then(data => {
        targetElement.innerHTML = data;
    })
    .catch(err => console.log(err))
}

function getSubcategorias(){
    
    let categoria = cbxCategoria.value    
    let url = '../conexion/get_subcategorias.php'
    let formData = new FormData()
    formData.append('id_categoria', categoria)

    fetchAndSetData(url, formData, cbxSubcategoria);
}








