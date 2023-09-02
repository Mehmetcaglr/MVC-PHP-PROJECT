function previewUpload(id){
    document.querySelector("#"+id).addEventListener('change',function(e){
        var code = $('#'+id).data('code')
        var file = e.target.files[0];
        var url = URL.createObjectURL(file);
        var extension = document.querySelector("#" + id).value.match(/\.([^.]*?)(?=\?|#|$)/)[0];
        var parse = document.querySelector("#" + id).value.split(extension)
        var value = parse[0].split('\\')
        document.querySelector("#upload_img_" + code).src = url;
        document.querySelector("#avatar_delete_" + code).style.display ='block';
        // document.querySelector("#input-file_name").value = value[2];
    });
}
function fileDelet(id){
    var code = $('#'+id).data('code');
    var imgUrl = document.querySelector('#upload_img_' + code).getAttribute('alt');
    var defaultİmgurl = location.origin +'/uploads/upload.jpeg';
    var src;
    document.querySelector("#"+id ).value = '';
    imgUrl ? src = imgUrl : src = defaultİmgurl;
    document.querySelector('#upload_img_' + code).src = src;
    document.querySelector('#avatar_delete_' + code).style.display ='none';
}
