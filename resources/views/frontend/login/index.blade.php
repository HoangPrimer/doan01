@extends('frontend/layout/layout')
@section('content')
    <section id="login">
        <div class="container  p-3">
            <div class="row">
                <div class="col-lg-10 col-md-12 mx-auto border-show p-3">
                    <form action="{{ route('log') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <h4>Đăng Nhập</h4>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-5">Email address</label>
                            <input class="form-control" type="email" name="email" placeholder="Nhập email ...">
                            @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label fs-5">Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu ...">
                            @error('password')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-lg btn-primary me-4">Đăng Nhập</button>
                        <a class="btn btn-lg btn-info dangky">Đăng Ký</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="login">
            <div class="container">
            <div class="col-lg-10 col-md-12 mx-auto border border-primary p-3 bg-light">
                <form id="form_register" data-url="{{ route('res') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <h4>Đăng Ký</h4>
                    </div>
                    <div class="mb-3">
                        <label class="form-label  fs-5">Họ Tên</label>
                        <input class="form-control" type="text" name="name" placeholder="Nhập tên ...">
                        <span class="text-danger fs-5 err__name"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-5">Email Address</label>
                        <input class="form-control" type="email" name="email" placeholder="Nhập email ...">
                        <span class="text-danger fs-5 err__email"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-5">Mật Khẩu</label>
                        <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu ...">
                        <span class="text-danger fs-5 err__password"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-5">Nhập Lại Mật Khẩu</label>
                        <input class="form-control" type="password" name="repassword" placeholder="Nhập lại mật khẩu ...">
                        <span class="text-danger fs-5 err__repassword"></span>
                    </div>
                   
                    <button class="btn btn-lg btn-primary me-5" type="submit">Đăng Ký</button>
                    <button class="btn btn-lg btn-danger huy" >Hủy</button>

                </form>
            </div>
        </div>
        </div>
    </section>
@endsection
