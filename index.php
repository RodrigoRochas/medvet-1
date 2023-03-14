<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Medvet | Autenticação</title>
        <link type="text/css" rel="stylesheet" href="View/CSS/style_login.css">
        <script src="View/JavaScript/jquery-3.3.1.js" charset="utf-8"></script>
    </head>
    <body>
        
        <div id="left" ></div>
        <div id="right">
            <div id="logo">

            </div>
                <div id="inputs">
                    <div id="floatContainer1" class="float-container">
                        <label for="floatField1">Usuário</label>
                        <input type="text" id="floatField1">
                    </div>
                    <div id="floatContainer2" class="float-container">
                        <label for="floatField2">Senha</label>
                        <input type="password" id="floatField2" >
                    </div>
                    <input type="submit" value="Login" onclick="autenticar()">

                </div>
            
            <div id="footer">
                MEDVET - Todos os Direitos reservados.<br>
                www.medvet.com.br | Ouvidoria 11 4858-0396
            </div>
        </div>
    </body>
    <script>
            
        const FloatLabel = (() => {
  
          // add active class and placeholder 
          const handleFocus = (e) => {
            const target = e.target;
            target.parentNode.classList.add('active');
            //target.setAttribute('placeholder', target.getAttribute('data-placeholder'));
          };

          // remove active class and placeholder
          const handleBlur = (e) => {
            const target = e.target;
            if(!target.value) {
              target.parentNode.classList.remove('active');
            }
            target.removeAttribute('placeholder');    
          };  

          // register events
          const bindEvents = (element) => {
            const floatField = element.querySelector('input');
            floatField.addEventListener('focus', handleFocus);
            floatField.addEventListener('blur', handleBlur);    
          };

          // get DOM elements
          const init = () => {
            const floatContainers = document.querySelectorAll('.float-container');

            floatContainers.forEach((element) => {
              if (element.querySelector('input').value) {
                  element.classList.add('active');
              }      

              bindEvents(element);
            });
          };

          return {
            init: init
          };
        })();

        FloatLabel.init();

        function autenticar(){
            $.post("router.php", {
                
                classe: "medico",
                acao: "autenticar",
                email: $("#floatField1").val(),
                senha: $("#floatField2").val()
            }).done(function(dados){
                console.log(dados);
                if(dados == " nenhum registro encontrado"){
                    alert("Erro na Autenticação. Nenhum registro encontrado");
                } else {
                    document.location.href="http://localhost/medvet/View/area_logada.php";
                }
            });
        }
        $(document).ready(function(){
            $.post("router.php", {
                classe: "medico",
                acao: "matarSessao"
            });
        });
        </script>   
</html>