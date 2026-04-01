@if(session('success'))
    <div id ="alert" class="alert alert-success alert-dismissible d-flex align-items-center fade show">
        <i class="fa-solid fa-check-circle"></i>
        <strong class="mx-2">exito</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<script>
    setTimeout(function() {
        var alert = document.getElementById('alert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(function() {
                alert.remove();
            }, 500);
        }
    }, 3000);  
</script>
@endif