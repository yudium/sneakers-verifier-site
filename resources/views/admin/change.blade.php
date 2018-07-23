@extends('layouts.admin')

@section('title', 'Change account')

@section('content')
<script type="text/javascript">
    $(function () {
        var imagesPreview = function (input, place, place2 = '') {
            if (input.files) {
                var reader = new FileReader();  
                reader.onload = function (event) {
                    $(place).css('background-image', 'url('+event.target.result+')');
                }
                $(place2).html('Photo changed (not saved)');
                reader.readAsDataURL(input.files[0]);
            } else {
                $(place2).html('Please select a file');
            }
        };
        $('#photo-profile-field').on('change', function () {
            imagesPreview(this, '#image-preview', '#image-message');
        });
    })
</script>

<div class="login-container lg-big-width">
    <div class="ctn-main-font ctn-min-color ctn-standar padding-20px">{{ __('Edit Account') }}</div>
    <div class="lc-place">
        <form
            action="{{ url()->full() }}"
            method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="lc-block">
                <div for="email" class="ctn-main-font ctn-min-color ctn-16px">
                    Public Informations
                </div>
            </div>
            <div class="lc-block">
                <div for="email" class="ctn-main-font ctn-min-color ctn-14px ctn-thin">{{ __('Profile Picture') }}</div>
                <div>
                    <div class="padding-bottom-5px">
                        <div id="image-preview" class="image image-200px image-radius" style="background-image: url({{ asset($admin->photo_path) }})"></div>
                        <div id="image-message" class="ctn-main-font ctn-err-color ctn-14px ctn-thin padding-top-10px"></div>
                    </div>
                    <input id="photo-profile-field" type="file" name="photo">
                </div>
            </div>
            <div class="lc-block">
                <div for="email" class="ctn-main-font ctn-min-color ctn-14px ctn-thin">{{ __('Name') }}</div>
                <div>
                    <input type="text" name="name" class="txt txt-primary-color" value="{{ $admin->name }}" required>
                </div>
            </div>
            <div class="lc-block">
                <div for="email" class="ctn-main-font ctn-min-color ctn-14px ctn-thin">{{ __('Email') }}</div>
                <div>
                    <input type="email" name="email" class="txt txt-primary-color" value="{{ $admin->email }}" required="true">
                </div>
            </div>
            <div class="padding-10px"></div>
            <div class="lc-block">
                <div for="email" class="ctn-main-font ctn-min-color ctn-16px">
                    Private Informations
                </div>
            </div>
            <div class="lc-block">
                <div for="email" class="ctn-main-font ctn-min-color ctn-14px ctn-thin">
                    Old Password
                </div>
                <div>
                    <input type="password" name="old_password" class="txt txt-primary-color">
                </div>
            </div>
            <div class="lc-block">
                <div for="email" class="ctn-main-font ctn-min-color ctn-14px ctn-thin">
                    New Password
                </div>
                <div>
                    <input type="password" name="new_password" class="txt txt-primary-color">
                </div>
            </div>
            <div class="lc-block">
                <div for="email" class="ctn-main-font ctn-min-color ctn-14px ctn-thin">
                    Confirm Password
                </div>
                <div>
                    <input type="password" name="confirm_password" class="txt txt-primary-color">
                </div>
            </div>
            <div class="lc-block">
                <div class="lc-right">
                    <input type="submit" name="submit" class="btn btn-main-color" value="Save Changed">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
