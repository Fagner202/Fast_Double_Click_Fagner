<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registrar Tempo</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="container">
    <h1>⏱️ Registrar Tempo</h1>

    <button onclick="registerTime()">Registrar Agora</button>

    <div id="result"></div>

    <p style="margin-top: 2rem;">
      <a href="history.html">📜 Ver Histórico</a>
    </p>
  </div>

  <script>
    async function registerTime() {
      const resultDiv = document.getElementById('result');
      resultDiv.textContent = 'Registrando...';

      try {
        const response = await fetch('register.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' }
        });

        const data = await response.json();

        if (response.ok && data.success) {
          const date = new Date(data.record.timestamp);
          resultDiv.textContent = `Tempo registrado com sucesso: ${date.toLocaleString()}`;
        } else {
          resultDiv.textContent = data.error || 'Erro ao registrar tempo.';
        }
      } catch (err) {
        resultDiv.textContent = 'Erro de conexão com o servidor.';
      }
    }
  </script>
</body>
</html>
