let rota = "../router.php"

let modo = ""

function obterAutenticacao(){

    $.post(rota, {

        classe:"medico",
        acao:"obterAutenticacao"

    }).done(function(dados){

        if(dados == ""){

            document.location.href = "http://localhost/medvet/";

        }

    });

}

function inserir(){

    $.post(rota, {

        classe:"medico",
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

        alert(dados);

        obterTodos();

    });

}

function obterTodos(){

    $.post(rota, {

        classe:"medico",
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

        classe:"medico",
        acao:"obterUm",
        id:$("#id_medico").val(),
        
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

        classe:"medico",
        acao:"atualizar",
        idMedico: $("#id_medico").val(),
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
        obterTodos();


    });

}

function remover(idMedico){
    
    $.post(rota, {

        classe:"medico",
        acao:"remover",
        idMedico: idMedico
        
    }).done(function(dados){

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