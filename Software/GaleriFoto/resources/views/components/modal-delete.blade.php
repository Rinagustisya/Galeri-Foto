<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form class="modal-content" method="POST" id="deleteForm">
      @method('delete')
      @csrf <!-- Include the CSRF token here -->
      
      <!-- input hidden -->
      <input type="hidden" name="foto_id" id="foto_id">

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
        <button type="button" class="btn btn-danger" onclick="deleteForm()">Ya, Hapus</button>
      </div>
    </form>
  </div>
</div>

@push('js')
    <script>
        function deleteForm() {
            var form = document.getElementById('deleteForm');
            form.submit();
        }

        $(function() {
            $('#ModalDelete').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var recipient = button.data('link');
                var extra = button.data('extra');
                var modal = $(this);

                modal.find('.modal-content').attr('action', recipient);
                document.getElementById('foto_id').value = extra;
            });
        });
    </script>
@endpush
