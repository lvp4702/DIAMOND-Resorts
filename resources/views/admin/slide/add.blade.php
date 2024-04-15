<!-- Modal -->
<div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="modal-add-label" aria-hidden="true">
    <form action="{{ route('slide.store') }}" method="POST" id="form-add" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fst-italic fw-bolder" id="modal-add-label">Add a new slide</h1>
                    <button type="button" id="close" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-3">
                        <label class="fs-5">Image: </label>
                        <input type="file" class="form-control" name="image" id="image">
                        <img id="previewImage" src="#" alt="Preview"
                            style="max-width: 150px; display: none; margin-top:6px;">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeBtn"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    //render img
    document.getElementById('image').addEventListener('change', function() {
            var file = this.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var previewImage = document.getElementById('previewImage');
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            }

            reader.readAsDataURL(file);
        });
    // Thêm sự kiện cho nút "Close"
    document.getElementById('close').addEventListener('click', function () {
        resetForm();
    });
    document.getElementById('closeBtn').addEventListener('click', function () {
        resetForm();
    });

    // Hàm để reset form
    function resetForm() {
        var form = document.getElementById('form-add');
        form.reset();
        document.getElementById('previewImage').style.display = 'none';
    }
</script>
