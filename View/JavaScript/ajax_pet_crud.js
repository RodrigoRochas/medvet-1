let rota = "../router.php"

let modo = ""

function obterAutenticacao(){

    $.post(rota, {

        classe:"pet",
        acao:"obterAutenticacao"

    }).done(function(dados){

        if(dados == ""){

            document.location.href = "http://localhost/medvet/";

        }

    });

}

function inserir(){
    
    const image = $("#fileToUpload").val();
    const words = image.split("\\");
    
    $.post(rota, {

        classe:"pet",
        acao:"inserir",
        nome:$("#txt_nome").val(),
        idPorte:$("#slt_porte").val(),
        dtNascimento:$("#txt_dt_nasc").val(),
        // sexo:$("#rdo_sexo").val(),
        idCliente:$("#slt_cliente").val(),
        caminho_imagem:words[2],
        

    }).done(function(dados){

//        alert(dados);
        alert("CADASTRADO COM SUCESSO");

//        obterTodos();

    });

}

function obterTodos(){

    $.post(rota, {

        classe:"pet",
        acao:"obterTodos"

    }).done(function(dados){

        $("#table_content").html(dados);

    });

}


function obterPorte(){

    $.post(rota, {

        classe:"porte",
        acao:"obterTodos"

    }).done(function(dados){

        // alert(dados);

        $("#slt_porte").html(dados);

    });

}


function obterClientes(){

    $.post(rota, {

        classe:"cliente",
        acao:"listaClientes"

    }).done(function(dados){

        let clientes = JSON.parse(dados);
        
        let option = "<option value='0'>Selecione o cliente responsável</option>";

        for(let i = 0; i < clientes.length; i++){

            option += "<option value='"+clientes[i].id+"'>"+clientes[i].nome+"</option>";

        }

        $("#slt_cliente").html(option);

    });

}

function obterUm(){
    
    $.post(rota, {

        classe:"pet",
        acao:"obterUm",
        id:$("#id_pet").val(),
        
    }).done(function(dados){

        let pet = JSON.parse(dados);
        alert(dados)
        
//        var elt = document.getElementById("slt_cliente");
//        var opt = elt.getElementsByTagName("option");
//        for(var i = 0; i < opt.length; i++) {
//          if(opt[i].value == cod) {
//            alert(opt[i].text);
//            elt.value = cod;
//          }
//        }
        
        $("#txt_nome").val(pet["nome"]),
        $("#slt_porte").val(pet["idPorte"]),
        $("#txt_dt_nasc").val(pet["data_nascimento"]),
        $("#slt_cliente").val(pet["idCliente"]),
        $("#txt_imagem").val(pet["caminho_imagem"]),
            $("#my_image").attr("src","second.jpg")
        document.getElementById("pet").src="uploads/"+pet["caminho_imagem"];
        $("#pet").val(pet["caminho_imagem"]),
        
        
        modo = "atualizar";

    });

}

function atualizar(){
    
    $.post(rota, {

        classe:"pet",
        acao:"atualizar",
        idCliente: $("#id_cliente").val(),
        nome:$("#txt_nome").val(),
        cpf:$("#txt_cpf").val(),
        dtNascimento:$("#txt_dt_nasc").val(),
        email:$("#txt_email").val(),
        celular:$("#txt_celular").val(),
        logradouro:$("#txt_logradouro").val(),
        numero:$("#txt_numero").val(),
        bairro:$("#txt_bairro").val(),
        cep:$("#txt_cep").val(),
        cidade:$("#txt_municipio").val(),
        estado:$("#txt_uf").val(),
        senha:$("#txt_senha").val(),
        confirmar:$("#txt_confirmar").val()

    }).done(function(dados){
        
        modo = "inserir";
        alert('ALTERADO COM SUCESSO!!');
//        window.location.href = 'cadastro_medico.php';


    });

}

function remover(idPet){
    
    $.post(rota, {

        classe:"pet",
        acao:"remover",
        idPet: idPet
        
    }).done(function(dados){
        alert('REMOVIDO COM SUCESSO!!')
        obterTodos();

    });

}


function logout(){
    
     $.post(rota, {

        acao:"matarSessao"
        
    }).done(function(dados){
        document.location.href = "http://localhost/medvet";

    });

}

$(document).ready(function(){

    // obterAutenticacao();

    obterTodos();
    obterPorte();
    obterClientes();

    $("#btn_salvar").click(function(){

        if(modo == "atualizar"){

            atualizar();

        } else {

            inserir();

        }

    });

});