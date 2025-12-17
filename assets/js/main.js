async function processarTexto() {
    const texto = document.getElementById('textoOriginal').value;

    if (!texto.trim()) {
        alert('Digite um texto.');
        return;
    }

    const resultado = document.getElementById('resultado');
    resultado.innerHTML = '<p>Processando...</p>';

    try {
        const response = await fetch('/processar_texto.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ texto })
        });


        const data = await response.json();

        resultado.innerHTML = '';

        if (!data.processado || data.processado.length === 0) {
            resultado.innerHTML = '<p>Não foi possível adaptar o texto.</p>';
            return;
        }

        data.processado.forEach(frase => {
            const p = document.createElement('p');
            p.textContent = frase;
            resultado.appendChild(p);
        });

    } catch (error) {
        resultado.innerHTML = '<p>Erro ao conectar com o servidor.</p>';
        console.error(error);
    }
}
