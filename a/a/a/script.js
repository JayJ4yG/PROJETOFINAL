function adicionarAoCarrinho(id) {
    const produto = document.querySelector(`.produto[data-id="${id}"]`);
    const nome = produto.getAttribute("data-nome");
    const preco = parseFloat(produto.getAttribute("data-preco"));

    // Obter carrinho do local storage ou criar um novo
    let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
    
    // Adicionar produto ao carrinho
    const itemCarrinho = carrinho.find(item => item.id === id);
    if (itemCarrinho) {
        itemCarrinho.quantidade += 1; // Incrementar quantidade se já existir
    } else {
        carrinho.push({ id, nome, preco, quantidade: 1 }); // Adicionar novo item
    }

    // Salvar carrinho no local storage
    localStorage.setItem("carrinho", JSON.stringify(carrinho));
    atualizarCarrinho();
}

function atualizarCarrinho() {
    const carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
    const carrinhoLista = document.getElementById("carrinho");
    const totalElement = document.getElementById("total");

    carrinhoLista.innerHTML = ""; // Limpar carrinho atual
    let total = 0;

    if (carrinho.length > 0) {
        carrinho.forEach(item => {
            const li = document.createElement("li");
            li.textContent = `${item.nome} - R$ ${item.preco.toFixed(2)} (x${item.quantidade})`;
            carrinhoLista.appendChild(li);
            total += item.preco * item.quantidade;
        });
        totalElement.textContent = `Total: R$ ${total.toFixed(2)}`;
    } else {
        carrinhoLista.innerHTML = "<li>Carrinho vazio.</li>";
        totalElement.textContent = "Total: R$ 0,00";
    }
}

function finalizarPedido() {
    const carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
    if (carrinho.length === 0) {
        alert("O carrinho está vazio! Adicione produtos antes de finalizar.");
        return;
    }

    const pedido = {
        produtos: carrinho,
        total: carrinho.reduce((sum, item) => sum + item.preco * item.quantidade, 0)
    };

    // Simular o envio do pedido para o funcionário (apenas um alert aqui)
    alert("Pedido finalizado:\n" + JSON.stringify(pedido, null, 2));
    
    // Limpar carrinho
    localStorage.removeItem("carrinho");
    atualizarCarrinho();
}

// Atualiza o carrinho ao carregar a página
document.addEventListener("DOMContentLoaded", atualizarCarrinho);
