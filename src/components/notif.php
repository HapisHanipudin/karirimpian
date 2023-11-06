

<?php if(!empty($_SESSION['notif'])) { ?>
    <div class="bg-slate-50 flex fixed right-3 top-3 p-7 rounded-md -translate-y-[125%] animate-notif">
      <h3 class="text-xl"><?php echo $_SESSION['notif']; ?></h3>
    </div>
<?php $_SESSION['notif'] = ''; } ?>