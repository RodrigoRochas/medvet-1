<?php session_start()?>
<header>
    <div id="header_content">
        <div id="icon">
            <img src="Imagens/logo_medvet1.png" alt="Logo da MedVet">
        </div>
        <div id="title_cms">
            <span class="title_font">
                MedVet - Medicina Veterinaria
            </span>
        </div>
        <div id="login">
            <div id="login_text">
                <!-- Bem vindo <br> -->
                <?=@$_SESSION["nome"]?>
            </div>
            <a href="../index.php">
                <div id="logout_icon">
                    <img src="Imagens/icone_desconectar.png" alt="Desconectar">
                </div>
            </a>
        </div>
    </div>
</header>