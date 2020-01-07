$(function(){
    function readURL(input) {
        console.log(input.files)
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".fileInput").change(function() {
        console.log("file input on change")
        readURL(this);
    });

    $("#preview").click(function(){
        console.log("image click")
        $(".fileInput").click();
    });
});