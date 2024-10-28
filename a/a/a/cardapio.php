<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #000000; /* Azul */
        }

        .cardapio {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 1200px;
            margin: 20px auto;
            padding: 10px;
        }

        .produto {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .produto:hover {
            transform: translateY(-5px);
        }

        .produto img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .produto h2 {
            color: #000000; /* Azul */
        }

        #carrinho-icon {
            position: fixed;
            top: 20px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
            color: #007bff; /* Azul */
        }

        #container-carrinho {
            display: none;
            position: fixed;
            top: 0;
            right: 0;
            width: 300px;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            color: white;
            padding: 20px;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
            overflow-y: auto;
        }

        #container-carrinho h2 {
            color: #fff;
        }

        .produto-carrinho {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 10px 0;
            border-bottom: 1px solid #444;
            padding: 10px 0;
        }

        .btn-remover {
            background: transparent;
            border: none;
            color: #ff4d4d;
            cursor: pointer;
        }

        #finalizar-btn {
            margin-top: 20px;
            padding: 10px;
            background: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            width: 100%;
        }

        #total {
            font-size: 18px;
            margin: 20px 0;
            color: white;
        }

        .btn-fechar {
            background: transparent;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 20px;
            float: right;
        }
    </style>
</head>
<body>

<h1>Cardápio</h1>
<div class="cardapio" id="cardapio">
    <div class="produto" data-id="1" data-nome="Produto 1" data-preco="7.00">
        <img src="imagem1.jpg" alt="Produto 1">
        <h2>Miauwnies</h2>
        <p>R$ 7,00</p>
        <button onclick="adicionarAoCarrinho(1)">Adicionar ao Carrinho</button>
    </div>
    <div class="produto" data-id="2" data-nome="Produto 2" data-preco="31.00">
        <img src="imagem2.jpg" alt="Produto 2">
        <h2>PURRRGUERR</h2>
        <p>R$ 31,00</p>
        <button onclick="adicionarAoCarrinho(2)">Adicionar ao Carrinho</button>
    </div>
    <div class="produto" data-id="3" data-nome="Produto 3" data-preco="5.50">
        <img src="imagem3.jpg" alt="Produto 3">
        <h2>Sanduiche Felino</h2>
        <p>R$ 5,50</p>
        <button onclick="adicionarAoCarrinho(3)">Adicionar ao Carrinho</button>
    </div>
    <div class="produto" data-id="4" data-nome="Produto 4" data-preco="7.00">
        <img src="imagem4.jpg" alt="Produto 4">
        <h2>Macarrons da Marcia</h2>
        <p>R$ 7,00</p>
        <button onclick="adicionarAoCarrinho(4)">Adicionar ao Carrinho</button>
    </div>
    <div class="produto" data-id="5" data-nome="Produto 5" data-preco="15.00">
        <img src="imagem5.jpg" alt="Produto 5">
        <h2>Capurrrchino</h2>
        <p>R$ 15,00</p>
        <button onclick="adicionarAoCarrinho(5)">Adicionar ao Carrinho</button>
    </div>
    <div class="produto" data-id="6" data-nome="Produto 6" data-preco="7.00">
        <img src="imagem6.jpg" alt="Produto 6">
        <h2>Miauspresso</h2>
        <p>R$ 7,00</p>
        <button onclick="adicionarAoCarrinho(6)">Adicionar ao Carrinho</button>
    </div>
    <div class="produto" data-id="7" data-nome="Produto 7" data-preco="9.00">
        <img src="imagem7.jpg" alt="Produto 7">
        <h2>Chocopurrcino</h2>
        <p>R$ 9,00</p>
        <button onclick="adicionarAoCarrinho(7)">Adicionar ao Carrinho</button>
    </div>
    <div class="produto" data-id="8" data-nome="Produto 8" data-preco="9.00">
        <img src="imagem8.jpg" alt="Produto 8">
        <h2>Miaulatte</h2>
        <p>R$ 9,00</p>
        <button onclick="adicionarAoCarrinho(8)">Adicionar ao Carrinho</button>
    </div>
    <div class="produto" data-id="9" data-nome="Produto 9" data-preco="13.32">
        <img src="imagem9.jpg" alt="Produto 9">
        <h2>Sensação Gatuchina</h2>
        <p>R$ 13,32</p>
        <button onclick="adicionarAoCarrinho(9)">Adicionar ao Carrinho</button>
    </div>
</div>

<div id="carrinho-icon" onclick="toggleCarrinho()">🛒</div>

<div id="container-carrinho">
    <button class="btn-fechar" onclick="toggleCarrinho()">✖</button>
    <h2>Carrinho</h2>
    <ul id="carrinho">
        <li>Carrinho vazio.</li>
    </ul>
    <p id="total">Total: R$ 0,00</p>
    <button id="finalizar-btn" onclick="finalizarPedido()">Finalizar Pedido</button>
</div>

<script>
    let carrinho = [];

    function adicionarAoCarrinho(id) {
        const produto = document.querySelector(`.produto[data-id="${id}"]`);
        const nome = produto.getAttribute('data-nome');
        const preco = parseFloat(produto.getAttribute('data-preco'));

        carrinho.push({ nome, preco });
        atualizarCarrinho();
    }

    function removerDoCarrinho(index) {
        carrinho.splice(index, 1);
        atualizarCarrinho();
    }

    function atualizarCarrinho() {
        const carrinhoElement = document.getElementById('carrinho');
        carrinhoElement.innerHTML = '';

        if (carrinho.length === 0) {
            carrinhoElement.innerHTML = '<li>Carrinho vazio.</li>';
            document.getElementById('total').innerText = 'Total: R$ 0,00'; // Reseta o total para zero
        } else {
            let total = 0;
            carrinho.forEach((item, index) => {
                total += item.preco;
                carrinhoElement.innerHTML += `
                    <div class="produto-carrinho">
                        <span>${item.nome} - R$ ${item.preco.toFixed(2)}</span>
                        <button class="btn-remover" onclick="removerDoCarrinho(${index})">Remover</button>
                    </div>
                `;
            });
            document.getElementById('total').innerText = `Total: R$ ${total.toFixed(2)}`;
        }
    }

    function toggleCarrinho() {
        const containerCarrinho = document.getElementById('container-carrinho');
        containerCarrinho.style.display = containerCarrinho.style.display === 'none' || containerCarrinho.style.display === '' ? 'block' : 'none';
    }

    function finalizarPedido() {
        if (carrinho.length === 0) {
            alert("Seu carrinho está vazio!");
            return;
        }
        alert("Pedido finalizado com sucesso!");
        carrinho = [];
        atualizarCarrinho();
        toggleCarrinho();
    }
</script>
</body>
</html>
