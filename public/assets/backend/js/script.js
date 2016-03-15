// ------------------------------ Custom JS ------------------------------ //
$(function() {

    // Upload image Page
    $('#textNewPage').summernote({
        onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable, "insertImage");
        }
    });

    // Upload image Article
    $('#textNewArticle').summernote({
        onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable, "insertImage");
        }
    });

    // Upload image Page
    $('#textPage').summernote({
        onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable, "insertImage");
        }
    });

    // Upload image Article
    $('#textArticle').summernote({
        onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable, "insertImage");
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Function save image if insert image in editor
    function sendFile(file, editor, welEditable, link) {
        data = new FormData();
        data.append("file", file); // You can append as many data as you want. Check mozilla docs for this
        $.ajax({
            data: data,
            type: "POST",
            url: link,
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                editor.insertImage(welEditable, url);
            }
        });
    }

    $("#kat_gallery").on('change', function() {
	    var id_kategori = $(this).val();
	    if (id_kategori != "") {
		    $.ajax({
	            data: { id_kategori: id_kategori},
	            type: "POST",
	            url: "gallery/getAlbum",
	            success: function(data) {
		    		$("#album_gallery").html('');
	            	if (!$.trim(data)){   
						$("#album_gallery").append('<option value="">Belum ada Album di Kategori ini</option>');
					}
					else{
						for (var i in data) {
						    $("#album_gallery").append('<option value=' + data[i].id + '>' + data[i].album + '</option>');
						}
					}
	            }
	        });
		}
	});

	$("#album_gallery").on('change', function() {
	    var id_album = $(this).val();
	    if (id_album != "") {
		    $.ajax({
	            data: { id_album: id_album},
	            type: "POST",
	            url: "gallery/getFoto",
	            success: function(data) {
		    		var oTable = $(".table-gallery").dataTable();
		    		oTable.fnClearTable();
		    		console.log(data);
	            	if ($.trim(data)){
						for (var i in data) {
				    		oTable.fnAddData(
				    			[
					    			'<td><a href="{{ asset(\'/assets/gallery/'+ data[i].album +'/'+ data[i].foto +') }}" data-popup="lightbox"><img src="{{ asset(\'/assets/gallery/'+ data[i].album +'/'+ data[i].foto +') }}" alt="" class="img-rounded img-preview"></a></td>',
									data[i].caption,
									data[i].name,
									data[i].updated_at,
									"Menu"
								]
							);
						}
					}
	            }
	        });
	    }
	});

	// Lightbox
    $('[data-popup="lightbox"]').fancybox({
        padding: 3
    });
});