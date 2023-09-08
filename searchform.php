<form action="/" method="GET" class="row">
  <!-- <label for="search">Search</label> -->
  <div class="col-lg-8">

    <input type="text" id="search" class="form-control mb-1 mb-lg-0" name="s" value="<?php the_search_query(); ?>" required />
  </div>
  <div class="col-lg-4">
    <button type="submit" class="btn btn-primary">Search</button>
  </div>
</form>