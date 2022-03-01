<?php if ( $bgImgUrl == '' && !empty($this->options->menu) && in_array('transparent', $this->options->menu) ): ?>
<style>
  .site-main {
    padding: 160px 0 0;
  }
  @media (max-width: 860px){
    .site-main {
    padding: 80px 0 0;
  }
  }
</style>
<?php endif ?>