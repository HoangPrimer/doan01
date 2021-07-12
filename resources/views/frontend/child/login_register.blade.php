<div class="user signinBx">
                        <div class="imgBx">
                            <img src="./image/default/login.jpg" alt="">
                        </div>
                        <form  id="form_login" action="{{route('log')}}" method="post">
                        @csrf
                            <h2>Login</h2>
                            <input  type="email" name="email" placeholder="Nhập email ..." >
                            @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            <input  type="password" name="password" placeholder="Nhập mật khẩu ..." >
                            @error('password')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            <button type="submit">Đăng Nhập</button>
                            <p>Chưa có tài khoản ? <a href="#" class="change__register">Đăng Ký !</a></p>
                        </form>
                    </div>
                    <div class="user registerBx">
                        <form  id="form_register" data-url="{{route('res')}}" method="post">
                        @csrf
                            <h2>Register</h2>
                            <input  type="text" name="name" placeholder="Nhập tên ..."  >
                            <span class="text-danger err__name"></span>
                            <input  type="email" name="email" placeholder="Nhập email ..." >
                            <span class="text-danger err__email"></span>
                            <input  type="password" name="password" placeholder="Nhập mật khẩu ..."  >
                            <span class="text-danger err__password"></span>
                            <input  type="password" name="repassword" placeholder="Nhập lại mật khẩu ..." >
                            <span class="text-danger err__repassword"></span>
                            <button type="submit">Đăng Nhập</button>
                            <p>Đã có tài khoản ? <a href="#" class="change__login">Đăng Nhập !</a></p>
                            
                        </form>
                        <div class="imgBx">
                            <img src="./image/default/register.jpg" alt="">
                        </div>
                    </div>