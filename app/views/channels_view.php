<!-- <?php
    print_r($data);
    echo '
    ';
?> -->
<div class="container">
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Channels</h6>
    <?php
        foreach ($data as $channel) {
            $vars = array(
                '$name' => $channel["name"],
                '$description' => $channel["description"],
                '$id' => $channel["id"],
            );
            $template = '
            <div class="d-flex text-muted pt-3">
                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <strong class="text-' . ($channel["isLike"] == 1 ? 'dark' : 'muted') . '">$name</strong>
                    ' . ($channel["isLike"] == 0 ? '<span class="text-muted">Untrusted channel</span>' 
                    : '<a href="/channel?id=$id">Open Messages</a>') . '
                </div>
                <span class="d-block">$description</span>
                </div>
            </div>
            ';
            echo strtr($template, $vars);
        }
    ?>
  </div>
</div>