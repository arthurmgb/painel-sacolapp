let modalInfos = document.getElementById("infos");
let bootstrapModalInfos = new bootstrap.Modal(modalInfos);

let modalConcluir = document.getElementById("concluir");
let bootstrapModalConcluir = new bootstrap.Modal(modalConcluir);

let modalCancelar = document.getElementById("cancelar");
let bootstrapModalCancelar = new bootstrap.Modal(modalCancelar);

let modalRestaurar = document.getElementById("restaurar");
let bootstrapModalRestaurar = new bootstrap.Modal(modalRestaurar);

//TOAST

let liveToastEl = document.getElementById("liveToast");
let toastHeader = document.querySelector(".toast-header");
let toastTitle = document.querySelector(".toast-title");
let toastBody = document.querySelector(".toast-body");

let liveToast = new bootstrap.Toast(liveToastEl, {
  animation: true,
  autohide: true,
  delay: 2000,
});

//END TOAST

let readTable = $("#read-table").DataTable({
  autoWidth: false,
  language: {
    url: "https://cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json",
  },
  ajax: {
    url: "../controllers/pedidos/read",
    dataSrc: "",
  },
  columns: [
    {
      data: "id",
      createdCell: function (cell, cellData, rowData, rowIndex, colIndex) {
        $(cell).html(cellData);
      },
    },
    {
      data: "situacao",
      createdCell: function (cell, cellData, rowData, rowIndex, colIndex) {
        if (cellData == 0) {
          $(cell).html("<b>Pendente</b>");
        } else if (cellData == 1) {
          $(cell).html("<b>Concluído</b>");
        } else if (cellData == 2) {
          $(cell).html("<b>Cancelado</b>");
        }
      },
    },
    {
      data: "whatsapp",
      createdCell: function (cell, cellData, rowData, rowIndex, colIndex) {
        $(cell).css("white-space", "nowrap");
        let numeroFormatado = cellData.replace(/\D/g, "");
        let link = "https://api.whatsapp.com/send?phone=55" + numeroFormatado;
        $(cell).html(
          cellData +
            "<a href='" +
            link +
            "' target='_blank' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-title='Conversar no WhatsApp' class='btn btn-sm btn-success ms-3'><i class='fa-brands fa-whatsapp'></i></a>"
        );
      },
    },
    {
      data: "recebido_em",
      createdCell: function (cell, cellData, rowData, rowIndex, colIndex) {
        $(cell).css("white-space", "nowrap");
        if (
          typeof cellData === "string" &&
          /\d{4}-\d{2}-\d{2}/.test(cellData)
        ) {
          var parts = cellData.split("-");
          var formattedDate = parts[2] + "/" + parts[1] + "/" + parts[0];
          $(cell).html(formattedDate);
        }
      },
    },
    {
      data: "id",
      createdCell: function (cell, cellData, rowData, rowIndex, colIndex) {
        $(cell).css("white-space", "nowrap");
      },
      render: function (data, type, row, meta) {
        let situacao = row.situacao;
        if (situacao != 0) {
          return (
            '<button data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pedido" onclick="exibir(event)" id="' +
            data +
            '" class="btn btn-sm btn-primary m-1"><i class="fa-solid fa-receipt fa-lg"></i></button>' +
            '<button data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Restaurar" onclick="restaurar(event)" id="' +
            data +
            '" class="btn btn-sm btn-secondary m-1"><i class="fa-solid fa-arrow-rotate-left fa-lg"></i></button>'
          );
        } else {
          return (
            '<button data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pedido" onclick="exibir(event)" id="' +
            data +
            '" class="btn btn-sm btn-primary m-1"><i class="fa-solid fa-receipt fa-lg"></i></button>' +
            '<button data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Concluir" onclick="concluir(event)" id="' +
            data +
            '" class="btn btn-sm btn-success m-1"><i class="fa-solid fa-check fa-lg"></i></button>' +
            '<button data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Cancelar" onclick="cancelar(event)" id="' +
            data +
            '" class="btn btn-sm btn-danger m-1"><i class="fa-solid fa-ban fa-lg"></i></button>'
          );
        }
      },
      orderable: false,
    },
  ],
  order: [[0, "desc"]],
  createdRow: function (row, data, dataIndex) {
    if (data.situacao == 1) {
      $(row).css("background-color", "#dcfce7");
    } else if (data.situacao == 2) {
      $(row).css("background-color", "#fee2e2");
    }
  },
  drawCallback: function (settings) {
    $("#read-table").closest("div.col-sm-12").addClass("table-responsive");
    var tooltipTriggerList = [].slice.call(
      document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });
  },
  initComplete: function () {
    $("#filtro-situacao").on("change", function () {
      var filtro = $(this).val();
      readTable.column(1).search(filtro).draw();
    });
  },
});

setInterval(function () {
  let tooltips = $('[data-bs-toggle="tooltip"]').tooltip("dispose");
  readTable.ajax.reload(null, false);
}, 5000);
