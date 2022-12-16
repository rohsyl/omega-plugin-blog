<?php

namespace rohsyl\OmegaPlugin\Blog\Plugin\Type\DropDown\Models;

use rohsyl\OmegaCore\Utils\Common\Plugin\Type\DropDown\ADropDownModel;
use rohsyl\OmegaPlugin\Blog\Models\BlogCategory;

class BlogCategoryDropDownModel extends ADropDownModel
{
    public function getKeyValueArray() {
        return BlogCategory::query()
            ->select('id', 'title')
            ->get()
            ->pluck('title', 'id')
            ->toArray();
    }
}