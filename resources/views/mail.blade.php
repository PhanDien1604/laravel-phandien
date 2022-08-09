<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/scss/main.scss'
    ])
</head>
<body>
    <div class="container">
        <div class="box-email m-auto w-50 p-5 mt-5 rounded shadow">
            <h5 class="mb-3 text-center text-uppercase">Send Gmail</h5>
            <form action="{{route('sendEmail')}}" method="POST">
                @csrf
                @if (session()->has('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif
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
                    <textarea class="form-control" name="content" id="exampleInputContent" rows="10"></textarea>
                </div>
                <div class="btn-box w-100 d-flex justify-content-between">
                    <a href="{{route('mail')}}" class="btn btn-secondary">Back</a>
                    <button class="btn btn-success float-right">Send</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
