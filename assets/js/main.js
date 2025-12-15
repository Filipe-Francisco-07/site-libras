async function processarTexto() {
    const texto = document.getElementById('textoOriginal').value;

    if (!texto.trim()) {
        alert('Digite um texto.');
        return;
    }

    const resposta = await fetch('processar_texto.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ texto })
    });

    const dados = await resposta.json();

    const resultado = document.getElementById('resultado');
    resultado.innerHTML = '';

    dados.processado.forEach(frase => {
        const p = document.createElement('p');
        p.textContent = frase;
        resultado.appendChild(p);
    });
}
