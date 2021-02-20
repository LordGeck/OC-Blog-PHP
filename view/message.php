<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php
            if ($message && $type) {
                if ($type === 'danger') {
            ?>
                <div class="alert alert-danger" role="alert"><?= $message ?></div>
            <?php
                }
                elseif ($type === 'success') {
            ?>
                <div class="alert alert-success" role="alert"><?= $message ?></div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>