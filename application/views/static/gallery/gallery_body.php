<?php include_once('static/gallery/gallery_header.php'); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="container-fluid container_center">
    <?php include_once('inc/strap_top.php'); ?>
    <?php include_once('inc/strap_logo.php'); ?>
    <?php include_once('inc/menu.php'); ?>
    <div class="row body_row row_subview">
        <div class="col-lg-9 left_body"> 
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="gallery_heading">Galeria</h2>
                    <form class="form-inline">
                        <!-- <div class="form-group">
                            <button id="video-gallery-button" type="button" class="btn btn-success btn-lg">
                                <i class="glyphicon glyphicon-film"></i>
                                Launch Video Gallery
                            </button>
                        </div> -->
                        <div class="form-group">
                            <button id="image-gallery-button" type="button" class="btn btn-primary btn-lg no_border_radius">
                                <i class="glyphicon glyphicon-picture"></i>
                                Uruchom galerię
                            </button>
                        </div>
                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-success btn-lg no_border_radius">
                            <i class="glyphicon glyphicon-leaf"></i>
                            <input id="borderless-checkbox" type="checkbox"> Bez krawędzi
                          </label>
                          <label class="btn btn-primary btn-lg no_border_radius">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                            <input id="fullscreen-checkbox" type="checkbox"> Pełny ekran
                          </label>
                        </div>
                    </form>
                </div>              
            </div>
            <div class="bottom_space"></div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="links">
                        <?php if(isset($data['images']) && count($data['images'])):  
                        foreach($data['images'] as $image): ?>
                                <a class="" href="<?php echo $image['img_url']; ?>" title="<?php echo $image['img_title']; ?>" data-gallery>
                                    <img class="no_border_radius galery_img img-responsive" src="<?php echo $image['img_url']; ?>" alt="<?php echo $image['img_title']; ?>">
                                </a> 
                        <?php endforeach; else: ?>
                            <div id="blank_gallery">Galeria tymczasowo jest pusta</div>
                        <?php endif; ?>
                    </div>
                </div>    
            </div>          
        </div>

        <div class="col-lg-3 right_body">
            <?php include_once('inc/right_body.php'); ?>   
        </div> <!-- right body -->
    </div>
</div>

<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //include_once('inc/modals.php'); ?>
<?php include_once('inc/footer_s.php'); ?>

<?php include_once('static/gallery/gallery_footer.php'); ?>