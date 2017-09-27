<style>
  .pagination li{
    float: left;
  }
</style>
<div class="col col-12">
  <nav aria-label="...">
    <ul class="pagination pagination-lg justify-content-center" >

      <?php foreach ($links as $link) {
      echo $link;
      } ?>

    </ul>
  </nav>
</div>
