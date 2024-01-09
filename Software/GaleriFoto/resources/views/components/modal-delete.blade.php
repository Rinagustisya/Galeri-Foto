<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form class="modal-content" method="post">
        @method('delete')
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">
            <i class="fas fa-trash"></i> Hapus
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin ingin dihapus?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
      </div>
    </form>
  </div>
</div>

@push('js')
    <script>
        $(function name(params) {
            $('#ModalDelete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var recipient = button.data('link')
            var modal = $(this)
            modal.find('.modal-content').attr('action', recipient)
            });
        });
    </script>
@endpush        