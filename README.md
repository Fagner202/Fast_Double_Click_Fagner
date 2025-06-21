
# ⏱️ Time Logger

**Time Logger** é um registrador de tempos com front-end e back-end integrados. O usuário pode registrar a hora atual com um clique e consultar o histórico desses registros em uma segunda página. Os dados são armazenados em um arquivo JSON por meio da API em PHP.

Este projeto demonstra habilidades de manipulação de tempo, armazenamento local, consumo de API, estruturação e lógica com PHP, JavaScript e Docker.

---

## 🚀 Tecnologias Utilizadas

- **PHP** (back-end, gravação, e leitura de JSON)
- **HTML, CSS e JavaScript** (front-end)
- **Docker & Docker Compose** (ambiente de desenvolvimento)
- **Apache** (servidor web)
- **JSON** (formato de armazenamento dos dados)

---

## 📁 Estrutura de Pastas

```
time-logger/
│
├── docker/ # Configurações do container
│ └── Dockerfile
│
├── docker-compose.yml # Orquestração dos containers
│
├── public/ # Front-end
│ ├── index.html # Página para registrar tempo
│ ├── history.html # Página para visualizar histórico
│ ├── style.css
│ ├── script.js
│ └── history.js
│
├── src/ # Back-end PHP
│ ├── register.php # Salva o tempo no JSON
│ └── list.php # Lista e filtra os registros
│
├── data/ # Armazenamento local
│ └── times.json # Arquivo com os registros
│
└── README.md # Documentação do projeto
```

---

## ⚙️ Como iniciar o projeto

> Pré-requisitos: [Docker](https://www.docker.com/) e [Docker Compose](https://docs.docker.com/compose/) instalados

1. Clone o repositório:

```bash
git clone https://github.com/seu-usuario/time-logger.git
cd time-logger
```

2. Suba os containers com Docker Compose:

```bash
docker-compose up --build
```

3. Acesse o projeto no navegador:

```
http://localhost:8080
```

4. Agora é so Clicar em Registrar Agora.

---

## 🔮 Funcionalidades

- Registrar o horário atual com um clique
- Visualizar lista de registros salvos
- Filtrar por data/hora e ordenar os resultados
- Dados armazenados localmente em arquivos .json

---

## 📌 Licença

Este projeto está sob a licença MIT.
