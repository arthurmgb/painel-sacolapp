const obterContagem = () => {
  $.ajax({
    type: "GET",
    url: "controllers/index/get-counts",
    success: function (response) {
      const data = JSON.parse(response);
      if (data) {
        const contagemPedidos = data.total_pedidos;
        const contagemPedidosPendentes = data.total_pedidos_pendentes;
        const contagemPedidosConcluidos = data.total_pedidos_concluidos;
        const contagemPedidosCancelados = data.total_pedidos_cancelados;

        $("#contagemPedidos").text(contagemPedidos);
        $("#contagemPedidosPendentes").text(contagemPedidosPendentes);
        $("#contagemPedidosConcluidos").text(contagemPedidosConcluidos);
        $("#contagemPedidosCancelados").text(contagemPedidosCancelados);
      } else {
        console.error("Erro ao obter contagem:", data.error);
      }
    },
    error: function (error) {
      console.error("Erro na requisição:", error);
    },
  });
};

obterContagem();
