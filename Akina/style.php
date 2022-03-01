<style type="text/css">
	<?php 
    // 一直显示菜单
    if (!empty($this->options->menu) && in_array('show', $this->options->menu)) {
      echo '
      .site-top ul { opacity: 1 !important;}
      .site-top .show-nav { display:none !important; }
      ';
    }
    // 一直显示首页大图
    if (!empty($this->options->menu) && in_array('indexbg', $this->options->menu)) {
      echo '
      @media (max-width:1080px) {#centerbg {display:block;} }
      ';
    } else {
      echo '
      @media (max-width:1080px) {#centerbg {display:none} }
      @media (max-width: 860px){.notice {margin-top: 100px;} }
      ';
    }
    // 一直加载聚焦内容
    if (!empty($this->options->menu) && in_array('feature', $this->options->menu)) {
      echo '
      #content .top-feature { display:block; }
      .feature-content { display:flex; }
      ';
    }
    // 使用ajax加载文章
    if (!empty($this->options->menu) && in_array('page', $this->options->menu)) {

    } else {
      echo '
      .navigator { display:block !important }
      #pagination { display:none !important }
      ';
    }
    // 到顶部按钮 夜间模式
    if (!empty($this->options->menu) && in_array('dark', $this->options->menu)) {
      echo '
      @media ( prefers-color-scheme: dark ) {
        .cd-top { 
          background:url('.theurl.'images/gotop-dark.png) no-repeat center 50% !important;
        }
      }
      ';
    }
    // 导航栏透明
    if (!empty($this->options->menu) && in_array('transparent', $this->options->menu)) {
      echo '
      .site-header {
        background: #fff0;
      }
      .headertop {
        margin-top: 0px;
      }
      .focusinfo {
        top: 47%;
      }
      @media (min-width: 860px) and (max-width: 1080px){
        .notice {
          margin-top: 150px;
        }
      }
      #centerbg {
        height: 630px;
      }
      #archives-temp {
        margin-top: 130px;
      }
      ';
    }
  ?>
  /* 到顶部按钮 */
  .wedonate img { 
    margin-right: 10px;
  }
  .cd-top { 
    background:url(<?php echo theurl; ?>images/gotop.png) no-repeat center 50%;
  }
</style>