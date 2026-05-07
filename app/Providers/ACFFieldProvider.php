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

            if (function_exists('acf_add_options_page')) {
                acf_add_options_page([
                    'page_title' => 'Menu/Footer Settings',
                    'menu_title' => 'Menu/Footer Settings',
                    'menu_slug' => 'theme-settings',
                    'capability' => 'edit_posts',
                    'redirect' => false,
                ]);
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

            acf_add_local_field_group([
                'key' => 'group_front_page',
                'title' => 'Front Page',
                'fields' => [
                    [
                        'key' => 'field_front_page_tab_hero',
                        'label' => 'Hero',
                        'type' => 'tab',
                    ],
                    [
                        'key' => 'field_hero_image',
                        'label' => 'Hero Image',
                        'name' => 'hero_image',
                        'type' => 'image',
                        'return_format' => 'id',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ],
                    [
                        'key' => 'field_hero_title',
                        'label' => 'Hero Title',
                        'name' => 'hero_title',
                        'type' => 'textarea',
                    ],
                    [
                        'key' => 'field_hero_text',
                        'label' => 'Hero Text',
                        'name' => 'hero_text',
                        'type' => 'textarea',
                    ],
                    [
                        'key' => 'field_front_page_tab_services',
                        'label' => 'Services',
                        'type' => 'tab',
                    ],
                    [
                        'key' => 'field_front_services',
                        'label' => 'Front Services',
                        'name' => 'front_services',
                        'type' => 'repeater',
                        'instructions' => 'Add, remove, and reorder the homepage service cards.',
                        'required' => 0,
                        'collapsed' => '',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'row',
                        'button_label' => 'Add Service',
                        'sub_fields' => [
                            [
                                'key' => 'field_service_image',
                                'label' => 'Service Image',
                                'name' => 'service_image',
                                'type' => 'image',
                                'return_format' => 'id',
                                'preview_size' => 'medium',
                                'library' => 'all',
                            ],
                            [
                                'key' => 'field_service_title',
                                'label' => 'Service Title',
                                'name' => 'service_title',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_service_features',
                                'label' => 'Service Features',
                                'name' => 'service_features',
                                'type' => 'repeater',
                                'instructions' => '',
                                'required' => 0,
                                'collapsed' => '',
                                'min' => 0,
                                'max' => 0,
                                'layout' => 'table',
                                'button_label' => 'Add Feature',
                                'sub_fields' => [
                                    [
                                        'key' => 'field_feature_text',
                                        'label' => 'Feature Text',
                                        'name' => 'feature_text',
                                        'type' => 'text',
                                    ],
                                ],
                            ],
                            [
                                'key' => 'field_service_read_more_link',
                                'label' => 'Service Read More Link',
                                'name' => 'service_read_more_link',
                                'type' => 'page_link',
                            ],
                            [
                                'key' => 'field_services_button_label',
                                'label' => 'Services Read More Label',
                                'name' => 'services_button_label',
                                'type' => 'text',
                                'default_value' => 'Read more',
                            ],
                            [
                                'key' => 'field_service_gallery_link',
                                'label' => 'Service Gallery Link',
                                'name' => 'service_gallery_link',
                                'type' => 'page_link',
                            ],
                            [
                                'key' => 'field_services_left_button_label',
                                'label' => 'Services Gallery Label',
                                'name' => 'services_left_button_label',
                                'type' => 'text',
                                'default_value' => 'View Gallery',
                            ],
                        ],
                    ],
                    [
                        'key' => 'field_front_page_tab_about',
                        'label' => 'About',
                        'type' => 'tab',
                    ],
                    [
                        'key' => 'field_about_image',
                        'label' => 'About Image',
                        'name' => 'about_image',
                        'type' => 'image',
                        'return_format' => 'id',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ],
                    [
                        'key' => 'field_about_title',
                        'label' => 'About Title',
                        'name' => 'about_title',
                        'type' => 'text',
                        'default_value' => 'About Us',
                    ],
                    [
                        'key' => 'field_about_text',
                        'label' => 'About Text',
                        'name' => 'about_text',
                        'type' => 'textarea',
                    ],
                    [
                        'key' => 'field_about_link',
                        'label' => 'About Link',
                        'name' => 'about_link',
                        'type' => 'page_link',
                    ],
                    [
                        'key' => 'field_about_button_label',
                        'label' => 'About Button Label',
                        'name' => 'about_button_label',
                        'type' => 'text',
                        'default_value' => 'Read more',
                    ],
                    [
                        'key' => 'field_front_page_tab_reviews',
                        'label' => 'Reviews',
                        'type' => 'tab',
                    ],
                    [
                        'key' => 'field_reviews_title',
                        'label' => 'Reviews Title',
                        'name' => 'reviews_title',
                        'type' => 'text',
                        'default_value' => 'Reviews',
                    ],
                    [
                        'key' => 'field_front_reviews',
                        'label' => 'Front Reviews',
                        'name' => 'front_reviews',
                        'type' => 'repeater',
                        'instructions' => '',
                        'required' => 0,
                        'collapsed' => '',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'row',
                        'button_label' => 'Add Review',
                        'sub_fields' => [
                            [
                                'key' => 'field_review_text',
                                'label' => 'Review Text',
                                'name' => 'review_text',
                                'type' => 'textarea',
                            ],
                            [
                                'key' => 'field_review_name',
                                'label' => 'Review Name',
                                'name' => 'review_name',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_review_location',
                                'label' => 'Review Location',
                                'name' => 'review_location',
                                'type' => 'text',
                            ],
                        ],
                    ],
                    [
                        'key' => 'field_front_page_tab_durability',
                        'label' => 'Durability',
                        'type' => 'tab',
                    ],
                    [
                        'key' => 'field_durability_image',
                        'label' => 'Durability Image',
                        'name' => 'durability_image',
                        'type' => 'image',
                        'return_format' => 'id',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ],
                    [
                        'key' => 'field_durability_title',
                        'label' => 'Durability Title',
                        'name' => 'durability_title',
                        'type' => 'textarea',
                    ],
                    [
                        'key' => 'field_durability_text',
                        'label' => 'Durability Text',
                        'name' => 'durability_text',
                        'type' => 'textarea',
                    ],
                    [
                        'key' => 'field_front_page_tab_faq',
                        'label' => 'FAQ',
                        'type' => 'tab',
                    ],
                    [
                        'key' => 'field_faq_title',
                        'label' => 'FAQ Title',
                        'name' => 'faq_title',
                        'type' => 'text',
                        'default_value' => 'FAQ',
                    ],
                    [
                        'key' => 'field_front_faqs',
                        'label' => 'Front FAQs',
                        'name' => 'front_faqs',
                        'type' => 'repeater',
                        'instructions' => '',
                        'required' => 0,
                        'collapsed' => '',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'row',
                        'button_label' => 'Add FAQ',
                        'sub_fields' => [
                            [
                                'key' => 'field_question',
                                'label' => 'Question',
                                'name' => 'question',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_answer',
                                'label' => 'Answer',
                                'name' => 'answer',
                                'type' => 'textarea',
                            ],
                        ],
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'front-page.blade.php',
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
                'key' => 'group_what_we_do',
                'title' => 'What We Do',
                'fields' => [
                    [
                        'key' => 'field_what_we_do_tab_hero',
                        'label' => 'Hero',
                        'type' => 'tab',
                    ],
                    [
                        'key' => 'field_service_hero_image',
                        'label' => 'Service Hero Image',
                        'name' => 'service_hero_image',
                        'type' => 'image',
                        'return_format' => 'id',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ],
                    [
                        'key' => 'field_service_eyebrow',
                        'label' => 'Service Eyebrow',
                        'name' => 'service_eyebrow',
                        'type' => 'text',
                        'default_value' => 'What we do',
                    ],
                    [
                        'key' => 'field_service_title',
                        'label' => 'Service Title',
                        'name' => 'service_title',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_what_we_do_tab_intro',
                        'label' => 'Intro',
                        'type' => 'tab',
                    ],
                    [
                        'key' => 'field_service_text_left',
                        'label' => 'Service Text Left',
                        'name' => 'service_text_left',
                        'type' => 'textarea',
                    ],
                    [
                        'key' => 'field_service_text_right',
                        'label' => 'Service Text Right',
                        'name' => 'service_text_right',
                        'type' => 'textarea',
                    ],
                    [
                        'key' => 'field_what_we_do_tab_gallery',
                        'label' => 'Gallery',
                        'type' => 'tab',
                    ],
                    [
                        'key' => 'field_service_gallery_images',
                        'label' => 'Service Gallery Images',
                        'name' => 'service_gallery_images',
                        'type' => 'repeater',
                        'instructions' => 'Add as many images as needed. The design works with fewer or more than three.',
                        'required' => 0,
                        'collapsed' => '',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'row',
                        'button_label' => 'Add Image',
                        'sub_fields' => [
                            [
                                'key' => 'field_service_gallery_image',
                                'label' => 'Image',
                                'name' => 'image',
                                'type' => 'image',
                                'return_format' => 'id',
                                'preview_size' => 'medium',
                                'library' => 'all',
                            ],
                        ],
                    ],
                    [
                        'key' => 'field_what_we_do_tab_button',
                        'label' => 'Button',
                        'type' => 'tab',
                    ],
                    [
                        'key' => 'field_service_gallery_link',
                        'label' => 'Service Gallery Link',
                        'name' => 'service_gallery_link',
                        'type' => 'page_link',
                    ],
                    [
                        'key' => 'field_service_gallery_button_label',
                        'label' => 'Service Gallery Button Label',
                        'name' => 'service_gallery_button_label',
                        'type' => 'text',
                        'default_value' => 'View Gallery',
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'template-what-we-do.blade.php',
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
                'key' => 'group_about_page',
                'title' => 'About Page',
                'fields' => [
                    [
                        'key' => 'field_about_page_tab_intro',
                        'label' => 'Intro',
                        'type' => 'tab',
                    ],
                    [
                        'key' => 'field_about_eyebrow',
                        'label' => 'About Eyebrow',
                        'name' => 'about_eyebrow',
                        'type' => 'text',
                        'default_value' => 'Learn More',
                    ],
                    [
                        'key' => 'field_about_title',
                        'label' => 'About Title',
                        'name' => 'about_title',
                        'type' => 'text',
                        'default_value' => 'About Us',
                    ],
                    [
                        'key' => 'field_about_content',
                        'label' => 'About Content',
                        'name' => 'about_content',
                        'type' => 'wysiwyg',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 0,
                    ],
                    [
                        'key' => 'field_about_image',
                        'label' => 'About Image',
                        'name' => 'about_image',
                        'type' => 'image',
                        'return_format' => 'id',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ],
                    [
                        'key' => 'field_about_page_tab_reviews',
                        'label' => 'Reviews',
                        'type' => 'tab',
                    ],
                    [
                        'key' => 'field_reviews_title',
                        'label' => 'Reviews Title',
                        'name' => 'reviews_title',
                        'type' => 'text',
                        'default_value' => 'Reviews',
                    ],
                    [
                        'key' => 'field_about_reviews',
                        'label' => 'About Reviews',
                        'name' => 'about_reviews',
                        'type' => 'repeater',
                        'instructions' => '',
                        'required' => 0,
                        'collapsed' => '',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'row',
                        'button_label' => 'Add Review',
                        'sub_fields' => [
                            [
                                'key' => 'field_about_review_text',
                                'label' => 'Review Text',
                                'name' => 'review_text',
                                'type' => 'textarea',
                            ],
                            [
                                'key' => 'field_about_review_name',
                                'label' => 'Review Name',
                                'name' => 'review_name',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_about_review_location',
                                'label' => 'Review Location',
                                'name' => 'review_location',
                                'type' => 'text',
                            ],
                        ],
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'template-about.blade.php',
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
                'key' => 'group_faq_page',
                'title' => 'FAQ Page',
                'fields' => [
                    [
                        'key' => 'field_faq_page_tab_content',
                        'label' => 'FAQ Content',
                        'type' => 'tab',
                    ],
                    [
                        'key' => 'field_faq_title',
                        'label' => 'FAQ Title',
                        'name' => 'faq_title',
                        'type' => 'text',
                        'default_value' => 'FAQ',
                    ],
                    [
                        'key' => 'field_faqs',
                        'label' => 'FAQs',
                        'name' => 'faqs',
                        'type' => 'repeater',
                        'instructions' => '',
                        'required' => 0,
                        'collapsed' => '',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'row',
                        'button_label' => 'Add FAQ',
                        'sub_fields' => [
                            [
                                'key' => 'field_faq_question',
                                'label' => 'Question',
                                'name' => 'question',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_faq_answer',
                                'label' => 'Answer',
                                'name' => 'answer',
                                'type' => 'textarea',
                            ],
                        ],
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'template-faq.blade.php',
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
                'key' => 'group_contact_page',
                'title' => 'Contact Page',
                'fields' => [
                    [
                        'key' => 'field_contact_page_tab_details',
                        'label' => 'Contact Details',
                        'type' => 'tab',
                    ],
                    [
                        'key' => 'field_contact_title',
                        'label' => 'Contact Title',
                        'name' => 'contact_title',
                        'type' => 'text',
                        'default_value' => 'Contact',
                    ],
                    [
                        'key' => 'field_contact_phone',
                        'label' => 'Contact Phone',
                        'name' => 'contact_phone',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_contact_email',
                        'label' => 'Contact Email',
                        'name' => 'contact_email',
                        'type' => 'email',
                    ],
                    [
                        'key' => 'field_contact_address',
                        'label' => 'Contact Address',
                        'name' => 'contact_address',
                        'type' => 'textarea',
                    ],
                    [
                        'key' => 'field_contact_social_label',
                        'label' => 'Contact Social Label',
                        'name' => 'contact_social_label',
                        'type' => 'text',
                        'default_value' => 'Find us on',
                    ],
                    [
                        'key' => 'field_contact_page_tab_form',
                        'label' => 'Form',
                        'type' => 'tab',
                    ],
                    [
                        'key' => 'field_contact_form_shortcode',
                        'label' => 'Contact Form Shortcode',
                        'name' => 'contact_form_shortcode',
                        'type' => 'text',
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'template-contact.blade.php',
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
                'key' => 'group_header_settings',
                'title' => 'Header Settings',
                'fields' => [
                    [
                        'key' => 'field_header_tab_top_bar',
                        'label' => 'Top Bar',
                        'type' => 'tab',
                    ],
                    [
                        'key' => 'field_header_logo',
                        'label' => 'Header Logo',
                        'name' => 'header_logo',
                        'type' => 'image',
                        'return_format' => 'id',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ],
                    [
                        'key' => 'field_header_phone_label',
                        'label' => 'Header Phone Label',
                        'name' => 'header_phone_label',
                        'type' => 'text',
                        'default_value' => 'Get in touch',
                    ],
                    [
                        'key' => 'field_header_phone_number',
                        'label' => 'Header Phone Number',
                        'name' => 'header_phone_number',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_header_phone_link',
                        'label' => 'Header Phone Link',
                        'name' => 'header_phone_link',
                        'type' => 'text',
                        'instructions' => 'Example: tel:07123456789',
                    ],
                    [
                        'key' => 'field_header_social_label',
                        'label' => 'Header Social Label',
                        'name' => 'header_social_label',
                        'type' => 'text',
                        'default_value' => 'Find us on',
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'theme-settings',
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
                'key' => 'group_social_media',
                'title' => 'Social Media',
                'fields' => [
                    [
                        'key' => 'field_header_social_media',
                        'label' => 'Social Media Links',
                        'name' => 'header_social_media',
                        'type' => 'repeater',
                        'instructions' => 'Add social media links with Font Awesome icons. These are used across header, footer, and contact pages.',
                        'required' => 0,
                        'collapsed' => '',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'row',
                        'button_label' => 'Add Social Link',
                        'sub_fields' => [
                            [
                                'key' => 'field_header_social_icon',
                                'label' => 'Social Icon',
                                'name' => 'social_icon',
                                'type' => 'font-awesome',
                            ],
                            [
                                'key' => 'field_header_social_link',
                                'label' => 'Social Link',
                                'name' => 'social_link',
                                'type' => 'url',
                            ],
                        ],
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'theme-settings',
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
                'key' => 'group_footer_settings',
                'title' => 'Footer Settings',
                'fields' => [
                    [
                        'key' => 'field_footer_tab_callback',
                        'label' => 'Callback Bar',
                        'type' => 'tab',
                    ],
                    [
                        'key' => 'field_footer_callback_title',
                        'label' => 'Footer Callback Title',
                        'name' => 'footer_callback_title',
                        'type' => 'text',
                        'default_value' => 'Leave Your Number',
                    ],
                    [
                        'key' => 'field_footer_callback_description',
                        'label' => 'Footer Callback Description',
                        'name' => 'footer_callback_description',
                        'type' => 'text',
                        'default_value' => 'We’ll get in touch with you!',
                    ],
                    [
                        'key' => 'field_footer_callback_placeholder',
                        'label' => 'Footer Callback Placeholder',
                        'name' => 'footer_callback_placeholder',
                        'type' => 'text',
                        'default_value' => '07000 000 000',
                    ],
                    [
                        'key' => 'field_footer_callback_button_label',
                        'label' => 'Footer Callback Button Label',
                        'name' => 'footer_callback_button_label',
                        'type' => 'text',
                        'default_value' => 'Request a call back',
                    ],
                    [
                        'key' => 'field_footer_callback_form_shortcode',
                        'label' => 'Footer Callback Form Shortcode',
                        'name' => 'footer_callback_form_shortcode',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_footer_tab_main',
                        'label' => 'Main Footer',
                        'type' => 'tab',
                    ],
                    [
                        'key' => 'field_footer_logo',
                        'label' => 'Footer Logo',
                        'name' => 'footer_logo',
                        'type' => 'image',
                        'return_format' => 'id',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ],
                    [
                        'key' => 'field_footer_privacy_link',
                        'label' => 'Footer Privacy Link',
                        'name' => 'footer_privacy_link',
                        'type' => 'page_link',
                    ],
                    [
                        'key' => 'field_footer_privacy_label',
                        'label' => 'Footer Privacy Label',
                        'name' => 'footer_privacy_label',
                        'type' => 'text',
                        'default_value' => 'Privacy Policy',
                    ],
                    [
                        'key' => 'field_footer_copyright_text',
                        'label' => 'Footer Copyright Text',
                        'name' => 'footer_copyright_text',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_footer_links',
                        'label' => 'Footer Links',
                        'name' => 'footer_links',
                        'type' => 'repeater',
                        'instructions' => '',
                        'required' => 0,
                        'collapsed' => '',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'row',
                        'button_label' => 'Add Link',
                        'sub_fields' => [
                            [
                                'key' => 'field_footer_link_item_label',
                                'label' => 'Item Label',
                                'name' => 'item_label',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_footer_link_item_link',
                                'label' => 'Item Link',
                                'name' => 'item_link',
                                'type' => 'page_link',
                            ],
                        ],
                    ],
                    [
                        'key' => 'field_footer_phone',
                        'label' => 'Footer Phone',
                        'name' => 'footer_phone',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_footer_phone_link',
                        'label' => 'Footer Phone Link',
                        'name' => 'footer_phone_link',
                        'type' => 'text',
                        'instructions' => 'Example: tel:07000000000',
                    ],
                    [
                        'key' => 'field_footer_email',
                        'label' => 'Footer Email',
                        'name' => 'footer_email',
                        'type' => 'email',
                    ],
                    [
                        'key' => 'field_footer_address',
                        'label' => 'Footer Address',
                        'name' => 'footer_address',
                        'type' => 'textarea',
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'theme-settings',
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
