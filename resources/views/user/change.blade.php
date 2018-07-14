@extends('layouts.app')

@section('title', 'Change account')

@section('content')
    <form
        action="{{ url()->full() }}"
        method="post"
        enctype="multipart/form-data">
        @csrf

        <div id="image-preview">
            <img src="{{ asset($user->photo_path) }}" alt="Photo Profile">
        </div>
        <input id="photo-profile-field" type="file" name="photo"> <br>

        Name:                <input type="text" name="name" placeholder="{{ $user->name }}"> <br>
        Email:               <input type="text" name="email" placeholder="{{ $user->email }}"> <br>
        Password lama:       <input type="text" name="old_password"> <br>
        Password baru:       <input type="text" name="new_password"> <br>
        Konfirmasi Password: <input type="text" name="confirm_password"> <br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    @script
    // Pure JS
    // Thanks to: 0GiS0
    // Source: (http://jsfiddle.net/0GiS0/Yvgc2/)
    window.onload = function(){
        //check file API support
        if(window.File && window.FileList && window.FileReader)
        {
            let filesInput = document.getElementById("photo-profile-field");

            filesInput.addEventListener("change", function(event){
                let files = event.target.files; // FileList object
                let output = document.getElementById("image-preview");

                for(let i = 0; i< files.length; i++)
                {
                    let file = files[i];

                    //only pics
                    if(!file.type.match('image'))
                        continue;

                    let picReader = new FileReader();

                    picReader.addEventListener("load",function(event){
                        let picFile = event.target;
                        let div = document.createElement("div");

                        div.innerHTML =
                        "<img class='preview' src='"+picFile.result+"'" +
                        " title='" + picFile.name + "'/>" +
                        "<p id='photo-message'>Photo changed (not saved)</p>";

                        output.innerHTML = ''; // clear previous image
                        output.insertBefore(div,null);
                    });

                    //read the image
                    picReader.readAsDataURL(file);
                }
            });
        }
        else
        {
            alert("Your browser does not support File API");
        }
    }
    @endscript
@endsection

