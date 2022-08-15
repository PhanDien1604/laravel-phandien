var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
var validateForm =  $('#form-senMail').validate({
    rules : {
        email_address: {
            required: true,
            email: true
        },
        title: {
            required: true
        },
        content: {
            required: true
        }
    },
    messages: {
        email_address: {
            required: 'Email bắt buộc nhập',
            email: 'Phải là email'
        },
        title: {
            required: 'Title bắt buộc nhập'
        },
        content: {
            required: 'Content bắt buộc nhập'
        }
    },
    submitHandler: function(form) {
        $('.preloader').css('display', 'block')
        var email_address = $('.modal-body #exampleInputEmail').val();
        var title = $('.modal-body #exampleInputTitle').val();
        var content = $('.modal-body #exampleInputContent').val();

        $.ajax({
            type: form.method,
            url: form.action,
            data: {
                'email_address' : email_address,
                'title': title,
                'content': content
            },
            dataType: "json",
            success: function (response) {
                $('.preloader').css('display', 'none')
                $("#exampleModalCenter .btn-close-modal").click();
                $("#form-senMail").trigger('reset');

                Toast.fire({
                    icon: 'success',
                    title: response.status
                })
            }
        });
    }
})

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.btn-sendMail').click(function() {
    $("#exampleModalCenter").modal('show');
})
