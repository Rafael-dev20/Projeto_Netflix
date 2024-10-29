<form id="" method="POST" action="/apii">
    @csrf
    <input type="hidden" name="id" id="categoria_id">
    <div class="form-floating mb-3">
        <input type="text" class="form-control bg-dark text-white" id="nome_categoria" name="nome"
            placeholder="Digite o nome da categoria">
        <label for="floatingInput">Categoria</label>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary" id="modal-submit-button">Salvar</button>
    </div>
</form>