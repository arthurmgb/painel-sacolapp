<div class="modal fade" id="infos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="staticBackdropLabel">
                    Detalhes do Pedido
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body printable">
                <div class="card mb-0 border">
                    <div style="font-size: 16px;" class="card-body">
                        <div id="codigoPedido" class="mb-2">
                        </div>
                        <div id="clientePedido" class="mb-2">
                        </div>
                        <div id="situacaoPedido" class="mb-2">
                        </div>
                        <hr>
                        <div id="detalhesPedido">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button onclick="window.print();" type="button" class="btn btn-primary">Imprimir</button>
            </div>
        </div>
    </div>
</div>