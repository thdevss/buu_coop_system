
<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
    <li class="breadcrumb-item active">ข้อมูลบริษัท</li>
  </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row" >
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>ข้อมูลบริษัท</div>
        
                        <div class="card-body">




                            <div id="xxx">
                                <h3>Keyboard</h3>
                                <section>
                                    <p>Try the keyboard navigation by clicking arrow left or right!</p>
                                </section>
                                <h3>Effects</h3>
                                <section>
                                    <p>Wonderful transition effects.</p>
                                </section>
                                <h3>Pager</h3>
                                <section>
                                    <p>The next and previous buttons help you to navigate through your content.</p>
                                </section>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/jquery-steps@1.1.0/build/jquery.steps.min.js"></script>
<link ref="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-steps@1.1.0/demo/css/jquery.steps.css">
<script>
jQuery(document).ready(function(){

    jQuery("#xxx").steps();
});


</script>