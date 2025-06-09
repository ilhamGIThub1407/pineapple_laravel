$(document).ready(function(){
    const base_url = window.location.origin;
    
    $(document).on("click", ".submit-data", function(e){
        e.preventDefault();

        $(".alert").remove();
        $(".invalid-feedback").remove();
        $("#submitForm input").removeClass('is-invalid');

        $("#submitForm").submit();
    });

    $("#submitForm").on("submit", function(e){
        e.preventDefault();

        let data = new FormData(this);

        $.ajax({
            url:base_url+"/product-management/update",
            type:'POST',
            data:data,
            contentType:false,
            processData:false,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend:function(){
                $(".submit-data").html('Updating...').css('font-style', 'italic');
            },
            success:function(response){
                if(response.status === 201){
                    $('<div class="alert alert-info">'+response.message+'</div>').insertBefore('#submitForm');
                    setTimeout(function(){
                        window.location.href = base_url + '/product-management';
                    }, 2000);
                }else{
                    $('<div class="alert alert-danger">'+response.message+'</div>').insertBefore('#submitForm');
                }
            },
            error:function(response){
                if(response.status === 422){
                    let errors = response.responseJSON.errors;
                    $.each(errors, function(key, value){
                        $("#"+key).addClass('form-control is-invalid');
                        $('<div class="invalid-feedback">'+value+'</div>').insertAfter("#"+key);
                    });
                }
            },
            complete:function(){
                $("#submit-data").html('Submit').css('font-style', 'normal');
            }

        });
    });

    document.getElementById('product_video').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const videoPreview = document.getElementById('video_preview');

        if (file && file.type.startsWith('video/')) {
            const videoURL = URL.createObjectURL(file);
            videoPreview.src = videoURL;
            videoPreview.style.display = 'block';
        } else {
            videoPreview.src = '';
            videoPreview.style.display = 'none';
        }
    });


});