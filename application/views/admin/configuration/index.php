<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="row edit_data no_space">
	<div class="col-lg-10 col-lg-offset-1">
		<h3>Konfiguracja CMS</h3>
    <div class="row edit_cms_row">
      <h4 class="cms_cmf_header">Informacje</h4>
      <p class="cmf_pr" id="cmscfg_sh_10">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd_10">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form_10">
        <p>Aby strona była lepiej pozycjonowana:</p>
        <div class="clearfix"></div>
        -zgodnie z prawdą uzupełniaj "description" oraz "keywords" <br>
        -w miarę możliwości udostępniaj treść na Google+ <br>
        -połącz ze sobą jak najwięcej serwisów społecznościowych <br>
      </div>
    </div>
    <hr>
		<div class="row edit_cms_row">
      <h4 class="cms_cmf_header">Nazwa CMS</h4>
      <p class="cmf_pr" id="cmscfg_sh">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form">
        <form action="<?php echo base_url() . 'admin_configuration/cmsname'; ?>" method="post">
        <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : $data['cmscfg']['name']; ?>" class="input_wp" required>
        <div class="clearfix"></div>
        <input type="submit" name="submit" class="btn btn-primary no_border_radius btn_save_data btn_cmsconfig" value="Zapisz">
        </form>
      </div>
    </div>
    <hr>
    <div class="row edit_cms_row">
      <h4 class="cms_cmf_header">Ikona</h4>
      <p class="cmf_pr" id="cmscfg_sh_3">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd_3">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form_3">
        <p>Plik musi mieć rozmiary 16x16 i rozszerzenie .ico</p>
        <div class="clearfix"></div>
        <form action="<?php echo base_url() . 'admin_configuration/upload_icon'; ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="userfile" class="input_file">
        <div class="clearfix"></div>
        <input type="submit" name="upload" class="btn btn-primary no_border_radius btn_save_data btn_cmsconfig" value="Zapisz">
        </form>
       </div> 
    </div>
    <hr>
    <div class="row edit_cms_row">
      <h4 class="cms_cmf_header">Logo</h4>
      <p class="cmf_pr" id="cmscfg_sh_4">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd_4">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form_4">
        <div class="old_logo">
          <img src="<?php echo base_url() . $data['cmscfg']['logo_url']; ?>" alt="">
        </div>
        <form action="<?php echo base_url() . 'admin_configuration/upload_logo'; ?>" method="post" enctype="multipart/form-data">
          <input type="file" name="userfile" class="input_file">
          <div class="clearfix"></div>
          <input type="submit" name="upload" class="btn btn-primary no_border_radius btn_save_data btn_cmsconfig" value="Zapisz">
        </form>
      </div>
    </div>
    <hr>
    <div class="row edit_cms_row">
      <h4 class="cms_cmf_header">Facebook</h4>
      <p class="cmf_pr" id="cmscfg_sh_5">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd_5">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form_5">
        <div class="col-lg-6">
          <p>Podaj link do fanpage</p>
          <div class="clearfix"></div>
          <form method="post" action="<?php echo base_url() . 'admin_configuration/facebook_link'; ?>">
          <input type="text" name="fb_link" value="<?php echo isset($_POST['fb_link']) ? $_POST['fb_link'] : $data['cmscfg']['fb_link']; ?>" class="input_wp" required>
        <div class="clearfix"></div>
          <div class="clearfix"></div>
          <input type="submit" name="submit" class="btn btn-primary no_border_radius btn_save_data btn_cmsconfig" value="Zapisz">
          </form>
        </div>
        <div class="col-lg-6">
          <div class="fb-like-box" data-href="<?php echo $data['cmscfg']['fb_link']; ?>" data-colorscheme="dark" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true" data-width="270"></div>
        </div>
       </div> 
    </div>
    <hr>
    <div class="row edit_cms_row">
      <h4 class="cms_cmf_header">Post dnia</h4>
      <p class="cmf_pr" id="cmscfg_sh_6">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd_6">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form_6">
        <p>Aktualny post dnia:</p>
        <div class="clearfix"></div>
        <p><?php echo $data['tod_post'][$data['cmscfg']['today_post']]; ?></p>   
        <div class="clearfix"></div>
        <form method="post" action="<?php echo base_url() . 'admin_configuration/today_post'; ?>">
        <div class="clearfix"></div>
        <select name="todaypost" class="input_wp">
          <?php $i = 0; foreach ($data['tod_post'] as $arpr): ?>
            <?php if ((isset($_POST['todaypost']) && $_POST['todaypost'] == $arpr) || ($i == $data['cmscfg']['today_post'])): ?>
              <option value="<?php echo $i; ?>" selected="selected"><?php echo $arpr; ?></option>
            <?php else: ?>
              <option value="<?php echo $i; ?>"><?php echo $arpr; ?></option>
            <?php endif; ?> 
          <?php $i++; endforeach ?>
        </select>
          <input type="submit" name="submit" class="btn btn-primary no_border_radius btn_save_data btn_cmsconfig" value="Zapisz">
        </form>
      </div>
    </div>
    <hr>
    <div class="row edit_cms_row">
      <h4 class="cms_cmf_header">O serwisie</h4>
      <p class="cmf_pr" id="cmscfg_sh_7">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd_7">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form_7">
        <form method="post" action="<?php echo base_url() . 'admin_configuration/about_service'; ?>">
         <textarea class="input_about" name="about_service" cols="113" rows="10">
           <?php echo isset($_POST['about_service']) ? $_POST['about_service'] : $data['cmscfg']['about']; ?>
         </textarea>
        <div class="clearfix"></div>
        <input type="submit" name="submit" class="btn btn-primary no_border_radius btn_save_data btn_cmsconfig" value="Zapisz">
        </form>
      </div>
    </div>
    <hr>
    <div class="row edit_cms_row">
      <h4 class="cms_cmf_header">Description</h4>
      <p class="cmf_pr" id="cmscfg_sh_8">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd_8">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form_8">
        <p>Opisz w maksymalnie 10 słowach zawartość strony. *Ważne przy pozycjonowaniu strony.</p>
        <div class="clearfix"></div>
          <form method="post" action="<?php echo base_url() . 'admin_configuration/description'; ?>">
            <textarea class="input_about" name="description" cols="113" rows="10">
           <?php echo isset($_POST['description']) ? $_POST['description'] : $data['cmscfg']['description']; ?>
            </textarea>
          <div class="clearfix"></div>
          <input type="submit" name="submit" class="btn btn-primary no_border_radius btn_save_data btn_cmsconfig" value="Zapisz">
         
          </form>
      </div>
    </div>
    <hr>
    <div class="row edit_cms_row">
      <h4 class="cms_cmf_header">Keywords</h4>
      <p class="cmf_pr" id="cmscfg_sh_9">Pokaż</p>
      <p class="cmf_hd" id="cmscfg_hd_9">Ukryj</p>
      <div class="clearfix"></div>
      <div class="form_edit_cms" id="cmsfg_form_9">
        <p>Podaj słowa kluczowe oddzielone przecinkami. *Pamiętaj, aby podawać tylko słowa związane z treścią strony. Słowa niezgodne z treścią działają negatywnie na pozycjonowanie strony.</p>
        <div class="clearfix"></div>
          <form method="post" action="<?php echo base_url() . 'admin_configuration/keywords'; ?>">
           <textarea class="input_about" name="keywords" cols="113" rows="10">
           <?php echo isset($_POST['keywords']) ? $_POST['keywords'] : $data['cmscfg']['keywords']; ?>
            </textarea>
          <div class="clearfix"></div>
          <input type="submit" name="submit" class="btn btn-primary no_border_radius btn_save_data btn_cmsconfig" value="Zapisz">
          </form>
      </div>
    </div>
    <hr>
	</div>
</div>
<div class="bottom_space"></div>