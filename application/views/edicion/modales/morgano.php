<form id="confirmacion">
    <div class="modal fade" id="modalorgano" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header main-color-bg">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirmación</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3>¿Estás seguro de borrar este organo?</h3>
            <input type="hidden" id="idorgano" name="idorgano" value="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-peru" data-dismiss="modal">Cancelar</button>
            <button id="delete" type="submit" class="btn btn-peru">Borrar</button>
          </div>
        </div>
      </div>
    </div>
</form>
