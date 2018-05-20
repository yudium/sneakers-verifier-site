// Pure JS
// Thanks to: 0GiS0
// Source: (http://jsfiddle.net/0GiS0/Yvgc2/)
window.onload = function(){
    //check file API support
    if(window.File && window.FileList && window.FileReader)
    {
        let filesInput = document.getElementById("sneakers_images");

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
                    " title='" + picFile.name + "'/>";

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

