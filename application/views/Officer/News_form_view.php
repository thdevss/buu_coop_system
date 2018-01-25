<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">แบบฟอร์มประกาศข่าวสารหน้าเว็บ</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row" >
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> แบบฟอร์มประกาศข่าวสารหน้าเว็บ</div>
                    <div class="card-body">          
                        <?php 
                        if(@$status){
                            echo '<div class="alert alert-'.$status['color'].'">'.$status['text'].'</div>';
                        }
                        ?>      
                        <form action="<?php echo $post_url;?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id" value="<?php echo @$row->id;?>">
                            <div class="row">
                                <div class="form-group col-md-6 offset-md-3">
                                    <label for="title">หัวข้อ</label>          
                                    <input class="form-control" type="text" name="title" id="title" required value="<?php echo @$row->title;?>">
                                </div>

                                <div class="form-group col-md-6 offset-md-3">
                                    <label for="detail">รายละเอียด</label>          
                                    <textarea id="summernote" name="detail" required><?php echo @$row->detail;?></textarea>
                                </div>

                                <div class="form-group col-md-6 offset-md-3">
                                    <label for="news_file">ไฟล์แนบ</label>          
                                    <input type="file" id="news_file" class="form-control" name="news_file[]" multiple>
                                </div>

                                <?php if(@$files) { ?>
                                <div class="form-group col-md-6 offset-md-3">                                
                                    <ul class="list-group">
                                        <?php foreach($files as $file) { ?>
                                        <li class="list-group-item fileList" data-fileid="<?php echo $file->id;?>">
                                            <?php echo $file->filename;?>
                                            <span class="float-right">
                                                <a class="btn btn-xs btn-danger" onclick="deleteNewsFile('<?php echo $file->id;?>')">x</a>
                                            </span>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <?php } ?>

                                <div class="col-sm-12 text-center">
                                    <button type="reset" class="btn btn-warning" name="" value="1"><i class="fa fa-dot-circle-o"></i> ยกเลิก</button>                                
                                    <button type="submit" class="btn btn-success" name="save" value="1"><i class="fa fa-dot-circle-o"></i> บันทึกข้อมูล</button>                
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</main>

<!-- include summernote css/js -->
<link href="<?php echo base_url('assets/plugins/summernote/summernote-lite.css');?>" rel="stylesheet">
<script src="<?php echo base_url('assets/plugins/summernote/summernote-lite.js');?>"></script>
<script>
window.onload = function() {
    $('#summernote').summernote({
        height:300,
        callbacks: {
            onImageUpload: function(files, editor, welEditable) {
                sendFile(files[0],editor,welEditable);
            }
        }
    });
}
function sendFile(file,editor,welEditable) {
    data = new FormData();
    data.append("userfile", file);
    $.ajax({
        data: data,
        type: "POST",
        url: SITE_URL+"/Officer/News/upload_image",
        cache: false,
        contentType: false,
        processData: false,
        success: function(url) {
            $('#summernote').summernote('insertImage', url);
        }
    });
}

function deleteNewsFile(file_id)
{

    swal({
        title: "คุณแน่ใจใช่ไหม",
        text: "ที่จะลบข้อมูลที่เลือก",
        icon: "warning",
        buttons: true,
        dabgerMode: true
    })
    .then((isConfirm) => {
        if (isConfirm) {
            //delete in ajax
            var datastring = "news_file_id="+file_id;

            jQuery.post(SITE_URL+"/officer/news/ajax_delete_file", datastring, function(response) {
                //delete element
                if(response.status) {
                    $("ul.list-group").find("[data-fileid='" + file_id + "']").remove();
                }
            }, 'json');
        }
    })

    


}



</script>