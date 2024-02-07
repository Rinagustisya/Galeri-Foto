@props(['label','link'])
<?php
$active =$link == url()->current();
?>
<li class="nav-item {{ $active ? 'active font-weight-bold' : '' }}">
    <a class="nav-link nav-link-ltr" href="<?= $link ?>">{{ $label }}</a>
</li>