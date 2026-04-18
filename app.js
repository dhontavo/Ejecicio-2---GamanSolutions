async function procesarJuego() {
    const rawData = document.getElementById('dataInput').value;

    const response = await fetch('api.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ data: rawData })
    });

    const result = await response.text();
    const outputDiv = document.getElementById('output');
    document.getElementById('finalResult').innerText = result;
    outputDiv.style.display = 'block';
}