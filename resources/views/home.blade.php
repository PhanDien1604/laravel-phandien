<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/scss/main.scss'
    ])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
</head>
<body>
    @include('blocks.header')
    <div class="box-banner">
        <div class="img-banner"></div>
    </div>
    <section class="container">
        <div class="box-introduce row">
            <div class="col-12 col-md-8 text-center text-md-start ps-0 ps-md-5">
                <h1 class="title-introduce">Lập trình viên</h1>
                <!-- Button trigger modal -->
                <a class="btn-sendMail btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">Gửi mail</a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Gửi mail</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mail-address mb-3">
                                    <label for="exampleInputEmail" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email_address" id="exampleInputEmail" aria-describedby="emailHelp">
                                </div>
                                <div class="title mb-3">
                                    <label for="exampleInputTitle" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="exampleInputTitle" aria-describedby="emailHelp">
                                </div>
                                <div class="content mb-3">
                                    <label for="exampleInputContent" class="form-label">Content</label>
                                    <textarea class="form-control" name="content" id="exampleInputContent" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button class="btn-send btn btn-success">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.btn-sendMail').click(function() {
            $("#exampleModalCenter").modal('show');
        })

        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.btn-send').click(function() {
            var email_address = $('.modal-body #exampleInputEmail').val();
            var title = $('.modal-body #exampleInputTitle').val();
            var content = $('.modal-body #exampleInputContent').val();

            $.ajax({
                type: "post",
                url: "api/sendMail",
                data: {
                    'email_address' : email_address,
                    'title': title,
                    'content': content
                },
                dataType: "json",
                success: function (response) {
                    $("#exampleModalCenter").modal('hide');
                    $('.modal-body #exampleInputEmail').val('');
                    $('.modal-body #exampleInputTitle').val('');
                    $('.modal-body #exampleInputContent').val('');

                    Toast.fire({
                        icon: 'success',
                        title: response.status
                    })
                }
            });
        })
    </script>
</body>
</html>
