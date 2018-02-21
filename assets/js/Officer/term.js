function changeTermAjax()
{
    var student_id = jQuery(this).data('studentid')
    var term_id = jQuery('#term_option').find(":selected").val()

    var data = { term_id: term_id }
    jQuery.post(SITE_URL+"/officer/change_term/ajax_change/", data, function(response) {
        // Do something with the request
        $("#selectTermBox").modal('hide')
        //alert
        swal({
            title: "เปลี่ยนปีการศึกษาเรียบร้อย!",
            text: "ทำ",
            icon: "success",
          })
          .then((xxx) => {
            window.location.reload();
          });

    }, 'json');

    


}