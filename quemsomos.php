<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quem Somos - SM Locações</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header-title {
            background-color: #e9ecef;
            color: white;
            padding: 20px 0;
            border-radius: 5px;
            margin-bottom: 40px;
            
        }
        .highlight {
            color: #007bff;
            font-weight: bold;
        }
        .image-gallery img {
            margin: 10px 0;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .image-gallery img:hover {
            transform: scale(1.05);
        }
        h1, h2, h3, h4, h5 {
            margin-bottom: 20px;
        }
        .contact-section {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 5px;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <!-- Inclusão do cabeçalho -->
    <?php include ("cabecalho.php"); ?>

    <br>

    <!-- Conteudo da página quem somos -->
    <div class="container text-center">
        <h1 class="header-title">Quem Somos</h1>
        <h2>A SM Locações é uma empresa especializada na locação de materiais para festas, incluindo:</h2>
        <ul class="list-unstyled">
            <li>✨ Pratos</li>
            <li>✨ Talheres</li>
            <li>✨ Copos</li>
            <li>✨ Taças</li>
            <li>✨ Baldes</li>
        </ul>
        <br>
        <h3>Com quatro anos de atuação no mercado, nossa empresa é gerida por um casal apaixonado por proporcionar momentos especiais.</h3>
        <h3>Trabalhamos com dedicação para melhorar continuamente nossos serviços e a qualidade do atendimento ao cliente.</h3>
        <br>
        <h4>Veja um pouco do nosso trabalho:</h4>
        <!-- Fotos de exemplo -->
        <div class="row image-gallery justify-content-center">
            <div class="col-md-4">
                <img src="img/fotos da page quem somos/mesa-decorada1.jpg" class="img-fluid" alt="Exemplo de locação 1">
            </div>
            <div class="col-md-4">
                <img src="img/fotos da page quem somos/mesa-decorada2.jpeg" class="img-fluid" alt="Exemplo de locação 2">
            </div>
            <div class="col-md-4">
                <img src="img/fotos da page quem somos/mesa decorada 3.jpg" class="img-fluid" alt="Exemplo de locação 3">
            </div>
        </div>
        <div class="contact-section">
            <h5>Entre em contato conosco e faça sua festa inesquecível!</h5>
        </div>
    </div>

    <!-- Inclusão do rodapé -->
    <?php include ("rodape.php"); ?>
</body>
</html>
