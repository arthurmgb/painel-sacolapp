const concluir = (event) => {
  let id = event.currentTarget.id;

  bootstrapModalConcluir.show();

  let confirmConc = document.querySelector("#concBtn");
  let cancelConc = document.querySelector("#cancelConc");

  function onConfirmConcClick() {
    confirmConc.disabled = true;

    $.ajax({
      type: "POST",
      url: "../controllers/pedidos/concluir",
      data: { id: id },
      success: function (response) {
        if (response === "success") {
          bootstrapModalConcluir.hide();
          liveToast.show();
          toastHeader.classList.remove("bg-danger");
          toastHeader.classList.add("bg-success");
          toastTitle.textContent = "Tudo pronto!";
          toastBody.textContent = "Pedido concluído com sucesso!";
          readTable.ajax.reload();
        } else {
          liveToast.show();
          toastHeader.classList.remove("bg-success");
          toastHeader.classList.add("bg-danger");
          toastTitle.textContent = "Erro!";
          toastBody.textContent = response;
        }
        confirmConc.disabled = false;
      },
    });
    confirmConc.removeEventListener("click", onConfirmConcClick);
  }

  confirmConc.addEventListener("click", onConfirmConcClick);

  cancelConc.addEventListener("click", () => {
    confirmConc.removeEventListener("click", onConfirmConcClick);
    bootstrapModalConcluir.hide();
  });
};

const cancelar = (event) => {
  let id = event.currentTarget.id;

  bootstrapModalCancelar.show();

  let confirmCancel = document.querySelector("#cancelBtn");
  let cancelClose = document.querySelector("#cancelClose");

  function onConfirmCancClick() {
    confirmCancel.disabled = true;

    $.ajax({
      type: "POST",
      url: "../controllers/pedidos/cancelar",
      data: { id: id },
      success: function (response) {
        if (response === "success") {
          bootstrapModalCancelar.hide();
          liveToast.show();
          toastHeader.classList.remove("bg-danger");
          toastHeader.classList.add("bg-success");
          toastTitle.textContent = "Tudo pronto!";
          toastBody.textContent = "Pedido cancelado com sucesso!";
          readTable.ajax.reload();
        } else {
          liveToast.show();
          toastHeader.classList.remove("bg-success");
          toastHeader.classList.add("bg-danger");
          toastTitle.textContent = "Erro!";
          toastBody.textContent = response;
        }
        confirmCancel.disabled = false;
      },
    });
    confirmCancel.removeEventListener("click", onConfirmCancClick);
  }

  confirmCancel.addEventListener("click", onConfirmCancClick);

  cancelClose.addEventListener("click", () => {
    confirmCancel.removeEventListener("click", onConfirmCancClick);
    bootstrapModalCancelar.hide();
  });
};

const restaurar = (event) => {
  let id = event.currentTarget.id;

  bootstrapModalRestaurar.show();

  let confirmRestore = document.querySelector("#restoreBtn");
  let cancelRestore = document.querySelector("#cancelRestore");

  function onConfirmRestoreClick() {
    confirmRestore.disabled = true;

    $.ajax({
      type: "POST",
      url: "../controllers/pedidos/restaurar",
      data: { id: id },
      success: function (response) {
        if (response === "success") {
          bootstrapModalRestaurar.hide();
          liveToast.show();
          toastHeader.classList.remove("bg-danger");
          toastHeader.classList.add("bg-success");
          toastTitle.textContent = "Tudo pronto!";
          toastBody.textContent = "Pedido restaurado com sucesso!";
          readTable.ajax.reload();
        } else {
          liveToast.show();
          toastHeader.classList.remove("bg-success");
          toastHeader.classList.add("bg-danger");
          toastTitle.textContent = "Erro!";
          toastBody.textContent = response;
        }
        confirmRestore.disabled = false;
      },
    });
    confirmRestore.removeEventListener("click", onConfirmRestoreClick);
  }

  confirmRestore.addEventListener("click", onConfirmRestoreClick);

  cancelRestore.addEventListener("click", () => {
    confirmRestore.removeEventListener("click", onConfirmRestoreClick);
    bootstrapModalRestaurar.hide();
  });
};

const exibir = (event) => {
  let id = event.currentTarget.id;

  $.ajax({
    type: "GET",
    url: "../controllers/pedidos/view",
    data: { id: id },
    success: function (response) {
      const pedido = JSON.parse(response)[0];
      $("#codigoPedido").html("<b>Código do pedido:</b> " + "0" + pedido.id);
      $("#clientePedido").html("<b>Nº do cliente:</b> " + pedido.whatsapp);

      const situacoes = ["Pendente", "Concluído", "Cancelado"];
      const classeSituacao =
        pedido.situacao == 1
          ? "bg-success text-white fw-bold py-1 px-2 rounded"
          : pedido.situacao == 2
          ? "bg-danger text-white fw-bold py-1 px-2 rounded"
          : "bg-secondary text-white fw-bold py-1 px-2 rounded";
      const situacaoFormatada = `<b>Situação:</b> <span class="${classeSituacao}">${
        situacoes[pedido.situacao]
      }</span>`;
      $("#situacaoPedido").html(situacaoFormatada);

      const descricaoFormatada = pedido.descricao
        .replace(/\n/g, "<br>") // Substitui quebras de linha por <br>
        .replace(/\*(.*?)\*/g, "<b>$1</b>"); // Substitui *Texto* por <b>Texto</b>
      $("#detalhesPedido").html(descricaoFormatada);
    },
  });

  bootstrapModalInfos.show();
};
