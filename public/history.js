async function loadHistory() {
  const sort = document.getElementById('sort').value;
  const from = document.getElementById('from').value;
  const to = document.getElementById('to').value;

  const params = new URLSearchParams();

  if (sort) params.append('sort', sort);
  if (from) params.append('from', from);
  if (to) params.append('to', to);

  const response = await fetch(`list.php?${params.toString()}`);
  const data = await response.json();

  const list = document.getElementById('history-list');
  list.innerHTML = '';

  if (data.length === 0) {
    list.innerHTML = '<li>Nenhum registro encontrado.</li>';
    return;
  }

  data.forEach(item => {
    const li = document.createElement('li');
    const date = new Date(item.timestamp);
    li.textContent = `${date.toLocaleString()} (ID: ${item.id})`;
    list.appendChild(li);
  });
}

// Carrega histórico ao abrir a página
window.onload = loadHistory;
