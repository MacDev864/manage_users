$(document).ready(function() {
	$('.upload-profile-photo .file-input').change(function(){
		var curElement = $(this).parent().parent().find('.image');
		var reader = new FileReader();

		reader.onload = function (e) {
                  // get loaded data and render thumbnail.
            curElement.attr('src', e.target.result);
        };

         // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
    /*
    $('.custom-file .custom-file-input').change(function(){
        var input = document.getElementById( 'file-upload' );

        var fileName = input.files[0].name;
        $('.custom-file .custom-file-label').empty().text(fileName)
    });
    */
});