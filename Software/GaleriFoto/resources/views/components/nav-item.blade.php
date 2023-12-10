@props(['label','link'])
<?php
$active =$link == url()->current();
?>
<li class="nav-item {{ $active ? 'active':'' }}">
    <a class="nav-link" href="<?= $link ?>">{{ $label }}</a>
</li>