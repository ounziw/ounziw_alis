<?php
if (isset($user_id)) {
    echo '<div class="row">';
    if ($alisdata['Items']) {
        foreach($alisdata['Items'] as $item) {
            $link = 'https://alis.to/' . $item['user_id'] . '/articles/' . $item['article_id'];
            ?>
            <div class="col-xs-12 col-sm-12">
                <div class="col-xs-4 col-sm-3">
                    <a href="<?php echo h($link); ?>" target="_blank"><img
                                src="<?php echo h($item['eye_catch_url']); ?>"></a>
                </div>
                <div class="col-xs-8 col-sm-9">
                    <h3><a href="<?php echo h($link); ?>" target="_blank"><?php echo h($item['title']); ?></a></h3>
                    <p><?php echo h($item['overview']); ?></p>
                </div>
            </div>
            <?php
        }
    }
    echo '</div>';
} else {
    echo t('Please enter your user id.');
}
