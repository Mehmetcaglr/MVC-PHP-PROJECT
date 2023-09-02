function previewUpload(id){
    document.querySelector("#"+id).addEventListener('change',function(e){
        var file = e.target.files[0];
        var url = URL.createObjectURL(file);
        var extension = document.querySelector("#"+id).value.match(/\.([^.]*?)(?=\?|#|$)/)[0];
        var parse = document.querySelector("#"+id).value.split(extension)
        var value = parse[0].split('\\')
        document.querySelector("#upload-img").src = url;
        document.querySelector('.avatar-delet').style.display ='block';
        document.querySelector("#file_name").value = value[2];
    });
}
function fileDelet(id){
    var imgUrl = document.querySelector('#upload-img').getAttribute('alt');
    var imgName = document.querySelector('#file_name').getAttribute('data-name');
    var defaultİmgurl = location.origin +'/uploads/general/upload.png';
    var src;
    document.querySelector('#' + id).value = '';
    document.querySelector('#file_name').value = '';
    imgUrl ? src = imgUrl : src = defaultİmgurl;
    document.querySelector('#file_name').value= imgName;
    document.querySelector('#upload-img').src = src;
    document.querySelector('.avatar-delet').style.display ='none';
}
