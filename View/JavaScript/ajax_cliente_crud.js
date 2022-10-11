let rota = "../router.php"

let modo = ""

function obterAutenticacao(){

    $.post(rota, {

        classe:"cliente",
        acao:"obterAutenticacao"

    }).done(function(dados){

        if(dados == ""){

            document.location.href = "http://localhost/medvet/";

        }

    });

}

function inserir(){

    $.post(rota, {

        classe:"cliente",
        acao:"inserir",
        nome:$("#txt_nome").val(),
        cpf:$("#txt_cpf").val(),
        dtNascimento:$("#txt_dt_nasc").val(),
        // sexo:$("#rdo_sexo").val(),
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

        alert("CADASTRADO COM SUCESSO");

        obterTodos();

    });

}

function obterTodos(){

    $.post(rota, {

        classe:"cliente",
        acao:"obterTodos"

    }).done(function(dados){

        $("#table_content").html(dados);

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

        classe:"cliente",
        acao:"obterUm",
        id:$("#id_cliente").val(),
        
    }).done(function(dados){

        let medico = JSON.parse(dados);

        $("#txt_nome").val(medico["nome"]);
        $("#txt_cpf").val(medico["cpf"]);
        $("#txt_dt_nasc").val(medico["data_nascimento"]);
        // $("#rdo_sexo").val(medico["sexo"]);
        $("#txt_email").val(medico["email"]);
        $("#txt_celular").val(medico["telefone"]);
        $("#txt_logradouro").val(medico["logradouro"]);
        $("#txt_numero").val(medico["numero"]);
        $("#txt_bairro").val(medico["bairro"]);
        $("#txt_cep").val(medico["cep"]);
        $("#txt_uf").val(medico["estado"]);
        $("#txt_municipio").val(medico["cidade"]);
        $("#txt_senha").val(medico["senha"]);
        $("#txt_confirmar").val(medico["senha"]);
        
        modo = "atualizar";

    });

}

function atualizar(){
    
    $.post(rota, {

        classe:"cliente",
        acao:"atualizar",
        idMedico: $("#id_cliente").val(),
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
        window.location.reload();


    });

}

function remover(idCliente){
    
    $.post(rota, {

        classe:"cliente",
        acao:"remover",
        idCliente: idCliente
        
    }).done(function(dados){
        alert('REMOVIDO COM SUCESSO!!')
        obterTodos();

    });

}

$(document).ready(function(){

    // obterAutenticacao();

    obterTodos();
        
    $("#btn_salvar").click(function(){

        if(modo == "atualizar"){

            atualizar();

        } else {

            inserir();

        }

    });

});