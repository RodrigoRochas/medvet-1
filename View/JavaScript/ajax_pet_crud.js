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
    
    $.post(rota, {

        classe:"pet",
        acao:"inserir",
        nome:$("#txt_nome").val(),
        idPorte:$("#slt_porte").val(),
        dtNascimento:$("#txt_dt_nasc").val(),
        // sexo:$("#rdo_sexo").val(),
        idCliente:$("#slt_cliente").val(),
        caminho_imagem:$("#txt_imagem").val(),
        

    }).done(function(dados){

        alert(dados);
//        alert("CADASTRADO COM SUCESSO");

        obterTodos();

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
        
        let option = "<option value='0'>Selecione o Estado</option>";

        for(let i = 0; i < clientes.length; i++){

            option += "<option value='"+clientes[i].id+"'>"+clientes[i].nome+"</option>";

        }

        $("#slt_cliente").html(option);

    });

}

function consultaCep() {
                
    var cep = $("#txt_cep").val();

    if(cep.length > 7){

        var url = "https://viacep.com.br/ws/"+cep+"/json/";

        $.getJSON(url, function(dados){

            if (dados.erro != 'true') {
                $("#txt_logradouro").val(dados.logradouro);
                $("#txt_bairro").val(dados.bairro);
                $("#txt_municipio").val(dados.localidade);
                $("#txt_uf").val(dados.uf);
            }else{
                alert('CEP INVÁLIDO');
            }
        });
    }
}

function obterUm(){
    
    $.post(rota, {

        classe:"pet",
        acao:"obterUm",
        id:$("#id_pet").val(),
        
    }).done(function(dados){

        let pet = JSON.parse(dados);
        alert(dados)
        
        $("#txt_nome").val(pet["nome"]),
        $("#slt_porte").val(pet["idPorte"]),
        $("#txt_dt_nasc").val(pet["data_nascimento"]),
        $("#slt_cliente").val(pet["idCliente"]),
        $("#txt_imagem").val(pet["caminho_imagem"]),
        
        
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