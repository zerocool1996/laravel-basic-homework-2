<?php $err = null ?>
@if( session('messager_login') )
    <?php $err = 'signin' ?>

@elseif( session('email') || $errors->has('email') || $errors->has('confirm') || $errors->has('firstname') || $errors->has('lastname') )
    <?php $err = 'register' ?>
@elseif($errors->has('post_err') || session('post_err') )
    <?php $err = 'signin' ?>
@elseif($errors->has('title') || $errors->has('content') )
    <?php $err = 'post' ?>
@elseif($errors->has('edittitle') || $errors->has('editcontent') )
    <?php $err = 'editpost' ?>
@endif

@if ( $err != null )
    <script>
        $(document).ready(function () {
            $('#' + '{{ $err }}').modal();
        });
    </script>
@endif

@if ( !Auth::check() )
    <script>
        $(document).ready(function () {
            $('.add-to-cart').on('click', function(){
                $('#signin').modal();
            });
            $('.buy-now').on('click', function(){
                $('#signin').modal();
            });
        });
    </script>
@endif
