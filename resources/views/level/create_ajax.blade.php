<form action="{{ url('/level/ajax') }}" method="POST" id="form-add">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <!-- Level Code (Dropdown) -->
                <div class="form-group">
                    <label for="level_kode">Level Code</label>
                    <select class="form-control" id="level_kode" name="level_kode" required>
                        <option value="">- Pilih Level Code -</option>
                        <option value="L1">Level 1</option>
                        <option value="L2">Level 2</option>
                        <option value="L3">Level 3</option>
                        <option value="L4">Level 4</option>
                    </select>
                    <small id="error-level_kode" class="error-text form-text text-danger"></small>
                </div>

                <!-- Level Name -->
                <div class="form-group">
                    <label for="level_nama">Level Name</label>
                    <input type="text" name="level_nama" id="level_nama" class="form-control" required>
                    <small id="error-level_nama" class="error-text form-text text-danger"></small>
                </div>

                <!-- Level Description -->
                <div class="form-group">
                    <label for="level_description">Description</label>
                    <textarea name="level_description" id="level_description" class="form-control" required></textarea>
                    <small id="error-level_description" class="error-text form-text text-danger"></small>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    $("#form-add").validate({
        rules: {
            level_kode: { required: true },
            level_nama: { required: true, minlength: 3, maxlength: 50 },
            level_description: { required: true, minlength: 5, maxlength: 255 }
        },
        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(response) {
                    if (response.status) {
                        $('#modal-master').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message
                        });
                        dataLevel.ajax.reload();
                    } else {
                        $('.error-text').text('');
                        $.each(response.msgField, function(prefix, val) {
                            $('#error-' + prefix).text(val[0]);
                        });
                        Swal.fire({
                            icon: 'error',
                            title: 'Something Went Wrong',
                            text: response.message
                        });
                    }
                }
            });
            return false;
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid');
        }
    });
});
</script>
