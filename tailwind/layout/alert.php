<div class="bg-slate-100">
    <?php if(isset($_COOKIE['message'])) : ?>
        <div class="p-5 bg-orange-300 m-2 rounded-xl text-white">
            <?= $_COOKIE['message']?>
        </div>
        <?php endif ?>
</div>