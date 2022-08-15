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
    <div class="preloader">
        <div class="loader loader-1">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
        </div>
    </div>

    <div class="box-banner">
        <div class="img-banner"></div>
    </div>
    <section class="container">
        <div class="box-introduce row">
            <div class="col-12 col-md-8 text-center text-md-start ps-0 ps-md-5">
                <h1 class="title-introduce">Lập trình viên</h1>
                <!-- Button trigger modal -->
                <a class="btn-sendMail btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Gửi mail</a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Gửi mail</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form action="{{route('api.sendEmail')}}"  method="POST" id="form-senMail">
                                @csrf
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
                                    <button type="button" class="btn-close-modal btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn-send btn btn-success">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
