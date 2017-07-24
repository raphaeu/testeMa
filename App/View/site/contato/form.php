<div class="modal fade" id="modalContato" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <form method="POST" action="/contato" id="formContato">
        <input type="hidden" value="" name="id"  />
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="ModalLabel">Contato</h4>
                </div>
                <div class="modal-body">
                    <div class="alert" id="message" role="alert" style="display: none"></div>
                    <div class="form-group">
                        <label for="inputNome1">Nome</label>
                        <input type="text" name="nome" class="form-control" id="inputNome1" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail2">E-mail</label>
                        <input type="email" name="email" class="form-control" id="inputEmail2" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label for="inputTelefone1">Telefone</label>
                        <input type="text" name="telefone" class="form-control" id="inputTelefone1" placeholder="Telefone">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><span class=" glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar</button>
                </div>
            </div>
        </div>
    </form>
</div>