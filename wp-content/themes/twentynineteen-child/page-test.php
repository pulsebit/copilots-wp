<?php 

$categories = get_categories();

echo json_encode($categories);