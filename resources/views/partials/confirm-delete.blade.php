<div class="modal fade" id="modal-confirm-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">System Message</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="hidden-field">
        <p>Are you sure you want to delete this <strong>permanently</strong>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close
          <i class="fa fa-remove"></i>
        </button>
        <button id="btn-confirm-delete" type="button" class="btn btn-danger">Confirm
          <i class="fa fa-check" aria-hidden="true"></i>
        </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->