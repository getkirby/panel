<?php

class FilesCollection extends Files {

  public function __construct($page) {

    $this->kirby = $page->kirby;
    $this->site  = $page->site;
    $this->page  = $page;

    // make sure the inventory is always fresh
    $this->page->reset();

    $inventory = $page->inventory();

    foreach($inventory['files'] as $filename) {
      $file = new FileModel($this, $filename);
      $this->data[strtolower($file->filename())] = $file;
    }

    if($this->page->canSortFiles()) {
      $this->sortBy('sort', 'asc');
    } 

    if($this->page->blueprint->files()->sort() == 'flip') {
      $this->flip();
    }

  }

  public function topbar($topbar) {

    $page = $this->page();

    if($page->isSite()) {
      $topbar->append(purl('options'), l('metatags'));
    }

    $page->topbar($topbar);

    $topbar->append($page->url('files'), l('files'));
 
  }

}