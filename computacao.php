<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Computação em LIBRAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
    <h1>Tradução Contextualizada para LIBRAS</h1>
    <p>Reescrita semântica com IA + VLibras</p>
</header>

<main>
    <section>
        <h2>Digite um conceito ou frase</h2>

        <textarea id="textoOriginal" rows="5" placeholder="Ex: Um algoritmo é uma sequência finita de passos bem definidos que resolvem um problema."></textarea>

        <button onclick="processarTexto()">Adaptar para LIBRAS</button>
    </section>

    <section>
        <h2>Texto adaptado para LIBRAS</h2>
        <div id="resultado" class="resultado">
            <p>O texto adaptado aparecerá aqui.</p>
        </div>
    </section>
</main>

<!-- VLibras -->
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
    </div>
</div>

<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
</script>

<script src="assets/js/main.js"></script>
</body>
</html>
