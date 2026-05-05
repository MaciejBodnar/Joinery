<?php

namespace App\Providers;

use Roots\Acorn\Sage\SageServiceProvider;

class ACFFieldProvider extends SageServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        parent::register();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        parent::boot();

        add_action('acf/init', function () {
            if (! function_exists('acf_add_local_field_group')) {
                return;
            }

            acf_add_local_field_group([
                'key' => 'group_gallery_overview',
                'title' => 'Gallery Overview',
                'fields' => [
                    [
                        'key' => 'field_gallery_eyebrow',
                        'label' => 'Gallery Eyebrow',
                        'name' => 'gallery_eyebrow',
                        'type' => 'text',
                        'default_value' => 'Gallery',
                    ],
                    [
                        'key' => 'field_gallery_categories',
                        'label' => 'Gallery Categories',
                        'name' => 'gallery_categories',
                        'type' => 'repeater',
                        'instructions' => '',
                        'required' => 0,
                        'collapsed' => '',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'row',
                        'button_label' => 'Add Category',
                        'sub_fields' => [
                            [
                                'key' => 'field_category_image',
                                'label' => 'Category Image',
                                'name' => 'category_image',
                                'type' => 'image',
                                'return_format' => 'id',
                                'preview_size' => 'medium',
                                'library' => 'all',
                            ],
                            [
                                'key' => 'field_category_title',
                                'label' => 'Category Title',
                                'name' => 'category_title',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_category_subtitle',
                                'label' => 'Category Subtitle',
                                'name' => 'category_subtitle',
                                'type' => 'text',
                                'instructions' => 'Example: 3 albums',
                            ],
                            [
                                'key' => 'field_category_link',
                                'label' => 'Category Link',
                                'name' => 'category_link',
                                'type' => 'page_link',
                            ],
                        ],
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'template-gallery.php',
                        ],
                    ],
                    [
                        [
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'template-gallery.blade.php',
                        ],
                    ],
                ],
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
            ]);

            acf_add_local_field_group([
                'key' => 'group_gallery_category',
                'title' => 'Gallery Category',
                'fields' => [
                    [
                        'key' => 'field_gallery_category_eyebrow',
                        'label' => 'Gallery Category Eyebrow',
                        'name' => 'gallery_category_eyebrow',
                        'type' => 'text',
                        'default_value' => 'Gallery',
                    ],
                    [
                        'key' => 'field_gallery_category_title',
                        'label' => 'Gallery Category Title',
                        'name' => 'gallery_category_title',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_gallery_albums',
                        'label' => 'Gallery Albums',
                        'name' => 'gallery_albums',
                        'type' => 'repeater',
                        'instructions' => '',
                        'required' => 0,
                        'collapsed' => '',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'row',
                        'button_label' => 'Add Album',
                        'sub_fields' => [
                            [
                                'key' => 'field_album_image',
                                'label' => 'Album Image',
                                'name' => 'album_image',
                                'type' => 'image',
                                'return_format' => 'id',
                                'preview_size' => 'medium',
                                'library' => 'all',
                            ],
                            [
                                'key' => 'field_album_title',
                                'label' => 'Album Title',
                                'name' => 'album_title',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_album_subtitle',
                                'label' => 'Album Subtitle',
                                'name' => 'album_subtitle',
                                'type' => 'text',
                                'instructions' => 'Example: 7 images',
                            ],
                            [
                                'key' => 'field_album_link',
                                'label' => 'Album Link',
                                'name' => 'album_link',
                                'type' => 'page_link',
                            ],
                        ],
                    ],
                    [
                        'key' => 'field_gallery_back_link',
                        'label' => 'Gallery Back Link',
                        'name' => 'gallery_back_link',
                        'type' => 'page_link',
                    ],
                    [
                        'key' => 'field_gallery_back_label',
                        'label' => 'Gallery Back Label',
                        'name' => 'gallery_back_label',
                        'type' => 'text',
                        'instructions' => 'Example: Go back to Gallery',
                    ],
                    [
                        'key' => 'field_gallery_read_more_link',
                        'label' => 'Gallery Read More Link',
                        'name' => 'gallery_read_more_link',
                        'type' => 'page_link',
                    ],
                    [
                        'key' => 'field_gallery_read_more_label',
                        'label' => 'Gallery Read More Label',
                        'name' => 'gallery_read_more_label',
                        'type' => 'text',
                        'instructions' => 'Example: Read about Commercial Projects',
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'template-gallery-category.php',
                        ],
                    ],
                    [
                        [
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'template-gallery-category.blade.php',
                        ],
                    ],
                ],
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
            ]);

            acf_add_local_field_group([
                'key' => 'group_gallery_album',
                'title' => 'Gallery Album',
                'fields' => [
                    [
                        'key' => 'field_gallery_album_eyebrow',
                        'label' => 'Gallery Album Eyebrow',
                        'name' => 'gallery_album_eyebrow',
                        'type' => 'text',
                        'default_value' => 'Gallery',
                    ],
                    [
                        'key' => 'field_gallery_album_title',
                        'label' => 'Gallery Album Title',
                        'name' => 'gallery_album_title',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_gallery_album_images',
                        'label' => 'Gallery Album Images',
                        'name' => 'gallery_album_images',
                        'type' => 'repeater',
                        'instructions' => '',
                        'required' => 0,
                        'collapsed' => '',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'row',
                        'button_label' => 'Add Image',
                        'sub_fields' => [
                            [
                                'key' => 'field_image',
                                'label' => 'Image',
                                'name' => 'image',
                                'type' => 'image',
                                'return_format' => 'id',
                                'preview_size' => 'medium',
                                'library' => 'all',
                            ],
                            [
                                'key' => 'field_image_layout',
                                'label' => 'Image Layout',
                                'name' => 'image_layout',
                                'type' => 'select',
                                'choices' => [
                                    'normal' => 'Normal',
                                    'wide' => 'Wide',
                                ],
                                'default_value' => 'normal',
                            ],
                        ],
                    ],
                    [
                        'key' => 'field_gallery_back_category_link',
                        'label' => 'Gallery Back Category Link',
                        'name' => 'gallery_back_category_link',
                        'type' => 'page_link',
                    ],
                    [
                        'key' => 'field_gallery_back_category_label',
                        'label' => 'Gallery Back Category Label',
                        'name' => 'gallery_back_category_label',
                        'type' => 'text',
                        'instructions' => 'Example: Go back to Commercial Projects',
                    ],
                    [
                        'key' => 'field_gallery_back_gallery_link',
                        'label' => 'Gallery Back Gallery Link',
                        'name' => 'gallery_back_gallery_link',
                        'type' => 'page_link',
                    ],
                    [
                        'key' => 'field_gallery_back_gallery_label',
                        'label' => 'Gallery Back Gallery Label',
                        'name' => 'gallery_back_gallery_label',
                        'type' => 'text',
                        'instructions' => 'Example: Go back to Gallery',
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'template-gallery-album.php',
                        ],
                    ],
                    [
                        [
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'template-gallery-album.blade.php',
                        ],
                    ],
                ],
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
            ]);
        });
    }
}
