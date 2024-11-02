<!DOCTYPE html>
<html lang="en">

@include('includes.admin.head')

<body>

    <div class="dashboard-main-wrapper">
        <div class="wrapper">
            <!-- Left Sidebar Menu Start  -->
            @include('includes.admin.sidebar')
            <!-- Left Sidebar Menu End  -->
            @include('includes.admin.header')
            <!-- Page Content  -->
            <div class="dashboard-wrapper">
                @yield('content')

            </div>
        </div>
    </div>
    @include('includes.admin.footer')

    @include('includes.admin.scripts')
</body>
<script>
    function previewImage(event) {
        var previewContainer = document.getElementById('imagePreviewContainer');
        previewContainer.innerHTML = ''; // Clear previous preview

        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var imgElement = document.createElement('img');
                imgElement.src = e.target.result;
                imgElement.style.maxWidth = '100px';
                imgElement.style.maxHeight = '100px';

                previewContainer.appendChild(imgElement);
            };
            reader.readAsDataURL(file);
        }
    }

    function previewCompanyImage(event) {
        var previewContainer = document.getElementById('companyImagePreviewContainer');
        previewContainer.innerHTML = ''; // Clear previous preview

        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var imgElement = document.createElement('img');
                imgElement.src = e.target.result;
                imgElement.style.maxWidth = '100px';
                imgElement.style.maxHeight = '100px';

                previewContainer.appendChild(imgElement);
            };
            reader.readAsDataURL(file);
        }
    }
</script>

<script>
    // Optional: Add JavaScript to handle removing images
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.remove-image').forEach(button => {
            button.addEventListener('click', function () {
                const image = this.dataset.image;
                const container = this.closest('div');

                fetch('/remove-image', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ image })
                }).then(response => response.json()).then(data => {
                    if (data.success) {
                        container.remove();
                    } else {
                        alert('Error removing image');
                    }
                }).catch(error => console.error('Error:', error));
            });
        });
    });
</script>


</script>

</html>