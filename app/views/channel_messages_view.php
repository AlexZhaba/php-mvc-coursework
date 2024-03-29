<?php
  // var_dump($data["channel"]["name"]);
?>
<div class="container">
  <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h1 class="h6 mb-0 text-dark lh-1"><?= $data["channel"]["name"] ?></h1>
      <small class="text-muted"><?= $data["channel"]["description"] ?></small>
    </div>
  </div>
  <select class="form-select" aria-label="Default select example" style="max-width: 300px" id="select-category">
      <option value="">All</option>
      <?php
        foreach ($data["categories"] as $category) {
          echo '<option '. ($category["name"] === $data["activeCategory"] ? "selected" : "") .' value="'.$category["name"].'">'.$category["name"].'</option>';
        }
      ?>
    </select>
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Messages</h6>
    <?php
      foreach ($data["messages"] as $message) {
        echo '
        <div class="d-flex text-muted pt-3">
          <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
          <p class="pb-3 mb-0 small lh-sm border-bottom">
            <strong class="d-block text-dark">
            '.$message["user"]["name"].'
            '. (is_null($message["hashtag_id"]) ? "" : '<a href="">#'. $message["hashtag"]["name"].'</a>') .'</strong>
            '.$message["description"].'
          </p>
        </div>
        ';
      }
    ?>
  </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("select-category").addEventListener("change", function(event) {
      const newCategory = this.value;
      const url = new URL(window.location.href);
      url.searchParams.set("category", newCategory);
      window.location.href = url.toString();
    })
  })
</script>