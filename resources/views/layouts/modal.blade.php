<!-- modal dang nhap -->
<div class="modal fade" id="signin">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Sign In</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('signin') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label >Password<span> *</span></label>
                        <div class="box-pass">
                            <input type="password" name="password"  class="form-control" autocomplete="off">
                            <span class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                    </div>
                    @if(session('messager_login'))
                        <div class="alert alert-danger">{{ session('messager_login') }}</div>
                    @endif
                    <div class="box-btn">
                        <button type="submit">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- modal đăng ký  -->
<div class="modal fade" id="register">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Create Account</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('signup') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="firstname">First name <span>*</span></label>
                        <input name="firstname" type="text" class="form-control" id="first_name"
                        value="{{ old('firstname') }}" required>
                        @if( $errors->has('firstname') )
                        <div class="alert alert-primary">{{ $errors->first('firstname') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="lastname">last name <span>*</span></label>
                        <input name="lastname" type="text" class="form-control" id="last_name" value="{{ old('lastname') }}" required>
                        @if( $errors->has('lastname') )
                        <div class="alert alert-primary">{{ $errors->first('lastname') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email <span>*</span></label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        @if( $errors->has('email') )
                            <div class="alert alert-primary">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password <span>*</span></label>
                        <div class="box-pass">
                            <input name="password" type="password"  class="form-control">
                            <span class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @if( $errors->has('password') )
                                <div class="alert alert-primary">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password <span>*</span></label>
                        <div class="box-pass">
                            <input type="password" name="confirm"  class="form-control">
                            <span class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @if( $errors->has('confirm') )
                                <div class="alert alert-primary">{{ $errors->first('confirm') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="box-btn">
                        <button type="submit">Sign up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal dang bai viet -->
<div class="modal fade" id="post">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tạo bài viết</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('post.create') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Title<span> *</span></label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                        @if( $errors->has('title') )
                            <div class="alert alert-primary">{{ $errors->first('title') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label >Content<span> *</span></label>
                        <div class="box-pass">
                            <textarea name="content" class="form-control" value="{{ old('content') }}" rows="7" required></textarea>
                        </div>
                    </div>
                    <div class="box-btn">
                        <button type="submit">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





