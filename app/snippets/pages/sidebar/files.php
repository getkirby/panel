<h2 class="hgroup hgroup-single-line hgroup-compressed cf">
  <span class="hgroup-title">
    <?php if($page->isSite()): ?>
    <a href="<?php _u('files/index') ?>"><?php _l('metatags.files') ?></a>
    <?php else: ?>
    <a href="<?php _u('files/index/' . $page->id()) ?>"><?php _l('pages.show.files.title') ?></a>
    <?php endif ?>
  </span>
  <span class="hgroup-options shiv shiv-dark shiv-left">
    <span class="hgroup-option-right">
      <?php if($editbutton) :?>
        <a title="<?php _l('pages.show.files.edit') ?>" href="<?php _u('files/index/' . $page->id()) ?>">
          <?php i('pencil', 'left') ?><span><?php _l('pages.show.files.edit') ?></span>
        </a>
      <?php endif ?>
      <?php if($addbutton): ?>
        <a title="f" data-shortcut="f" href="<?php $page->isSite() ? _u('metatags/upload') : _u($page, 'upload') ?>">
          <?php i('plus-circle', 'left') ?><span><?php _l('pages.show.files.add') ?></span>
        </a>
      <?php endif ?>
    </span>
  </span>
</h2>

<?php if($files->count()): ?>
<ul class="nav nav-list sidebar-list">
  <?php foreach($files as $file): ?>
  <li>
    <a class="draggable" data-helper="<?php __($file->filename()) ?>" data-text="<?php echo dragText($file) ?>" href="<?php _u($file, 'show') ?>">
      <?php i($file) . __($file->filename()) ?>
    </a>
  </li>
  <?php endforeach ?>
</ul>
<?php else: ?>
<p class="marginalia">
  <?php if($addbutton): ?>
    <a href="<?php _u($page, 'upload') ?>" class="marginalia">
  <?php endif ?>
  <?php _l('pages.show.files.empty') ?>
  <?php if($addbutton): ?>
    </a>
  <?php endif ?>
</p>
<?php endif ?>
