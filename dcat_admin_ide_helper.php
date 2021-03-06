<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection site
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection detail
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection is_enabled
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection extension
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection value
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection depth
     * @property Grid\Column|Collection category_id
     * @property Grid\Column|Collection content
     * @property Grid\Column|Collection banner
     * @property Grid\Column|Collection site_id
     * @property Grid\Column|Collection country_id
     * @property Grid\Column|Collection landing_link
     * @property Grid\Column|Collection top
     * @property Grid\Column|Collection flag
     * @property Grid\Column|Collection country_name
     * @property Grid\Column|Collection country_code
     * @property Grid\Column|Collection connection
     * @property Grid\Column|Collection queue
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection exception
     * @property Grid\Column|Collection failed_at
     * @property Grid\Column|Collection price
     * @property Grid\Column|Collection thumbnail
     * @property Grid\Column|Collection url
     * @property Grid\Column|Collection address
     * @property Grid\Column|Collection about
     * @property Grid\Column|Collection count
     * @property Grid\Column|Collection photo
     * @property Grid\Column|Collection logo
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection token
     * @property Grid\Column|Collection ip
     * @property Grid\Column|Collection ip_country
     * @property Grid\Column|Collection device
     * @property Grid\Column|Collection language
     * @property Grid\Column|Collection source
     * @property Grid\Column|Collection domain
     * @property Grid\Column|Collection license_id
     * @property Grid\Column|Collection goods_id
     * @property Grid\Column|Collection article_id
     * @property Grid\Column|Collection template_id
     * @property Grid\Column|Collection email_id
     * @property Grid\Column|Collection banner_id
     * @property Grid\Column|Collection color
     * @property Grid\Column|Collection note
     * @property Grid\Column|Collection state
     * @property Grid\Column|Collection template
     * @property Grid\Column|Collection email_verified_at
     *
     * @method Grid\Column|Collection site(string $label = null)
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection detail(string $label = null)
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection is_enabled(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection extension(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection value(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection depth(string $label = null)
     * @method Grid\Column|Collection category_id(string $label = null)
     * @method Grid\Column|Collection content(string $label = null)
     * @method Grid\Column|Collection banner(string $label = null)
     * @method Grid\Column|Collection site_id(string $label = null)
     * @method Grid\Column|Collection country_id(string $label = null)
     * @method Grid\Column|Collection landing_link(string $label = null)
     * @method Grid\Column|Collection top(string $label = null)
     * @method Grid\Column|Collection flag(string $label = null)
     * @method Grid\Column|Collection country_name(string $label = null)
     * @method Grid\Column|Collection country_code(string $label = null)
     * @method Grid\Column|Collection connection(string $label = null)
     * @method Grid\Column|Collection queue(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection exception(string $label = null)
     * @method Grid\Column|Collection failed_at(string $label = null)
     * @method Grid\Column|Collection price(string $label = null)
     * @method Grid\Column|Collection thumbnail(string $label = null)
     * @method Grid\Column|Collection url(string $label = null)
     * @method Grid\Column|Collection address(string $label = null)
     * @method Grid\Column|Collection about(string $label = null)
     * @method Grid\Column|Collection count(string $label = null)
     * @method Grid\Column|Collection photo(string $label = null)
     * @method Grid\Column|Collection logo(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection token(string $label = null)
     * @method Grid\Column|Collection ip(string $label = null)
     * @method Grid\Column|Collection ip_country(string $label = null)
     * @method Grid\Column|Collection device(string $label = null)
     * @method Grid\Column|Collection language(string $label = null)
     * @method Grid\Column|Collection source(string $label = null)
     * @method Grid\Column|Collection domain(string $label = null)
     * @method Grid\Column|Collection license_id(string $label = null)
     * @method Grid\Column|Collection goods_id(string $label = null)
     * @method Grid\Column|Collection article_id(string $label = null)
     * @method Grid\Column|Collection template_id(string $label = null)
     * @method Grid\Column|Collection email_id(string $label = null)
     * @method Grid\Column|Collection banner_id(string $label = null)
     * @method Grid\Column|Collection color(string $label = null)
     * @method Grid\Column|Collection note(string $label = null)
     * @method Grid\Column|Collection state(string $label = null)
     * @method Grid\Column|Collection template(string $label = null)
     * @method Grid\Column|Collection email_verified_at(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection site
     * @property Show\Field|Collection id
     * @property Show\Field|Collection name
     * @property Show\Field|Collection type
     * @property Show\Field|Collection version
     * @property Show\Field|Collection detail
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection is_enabled
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection order
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection extension
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection value
     * @property Show\Field|Collection username
     * @property Show\Field|Collection password
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection depth
     * @property Show\Field|Collection category_id
     * @property Show\Field|Collection content
     * @property Show\Field|Collection banner
     * @property Show\Field|Collection site_id
     * @property Show\Field|Collection country_id
     * @property Show\Field|Collection landing_link
     * @property Show\Field|Collection top
     * @property Show\Field|Collection flag
     * @property Show\Field|Collection country_name
     * @property Show\Field|Collection country_code
     * @property Show\Field|Collection connection
     * @property Show\Field|Collection queue
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection exception
     * @property Show\Field|Collection failed_at
     * @property Show\Field|Collection price
     * @property Show\Field|Collection thumbnail
     * @property Show\Field|Collection url
     * @property Show\Field|Collection address
     * @property Show\Field|Collection about
     * @property Show\Field|Collection count
     * @property Show\Field|Collection photo
     * @property Show\Field|Collection logo
     * @property Show\Field|Collection email
     * @property Show\Field|Collection token
     * @property Show\Field|Collection ip
     * @property Show\Field|Collection ip_country
     * @property Show\Field|Collection device
     * @property Show\Field|Collection language
     * @property Show\Field|Collection source
     * @property Show\Field|Collection domain
     * @property Show\Field|Collection license_id
     * @property Show\Field|Collection goods_id
     * @property Show\Field|Collection article_id
     * @property Show\Field|Collection template_id
     * @property Show\Field|Collection email_id
     * @property Show\Field|Collection banner_id
     * @property Show\Field|Collection color
     * @property Show\Field|Collection note
     * @property Show\Field|Collection state
     * @property Show\Field|Collection template
     * @property Show\Field|Collection email_verified_at
     *
     * @method Show\Field|Collection site(string $label = null)
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection detail(string $label = null)
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection is_enabled(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection extension(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection value(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection depth(string $label = null)
     * @method Show\Field|Collection category_id(string $label = null)
     * @method Show\Field|Collection content(string $label = null)
     * @method Show\Field|Collection banner(string $label = null)
     * @method Show\Field|Collection site_id(string $label = null)
     * @method Show\Field|Collection country_id(string $label = null)
     * @method Show\Field|Collection landing_link(string $label = null)
     * @method Show\Field|Collection top(string $label = null)
     * @method Show\Field|Collection flag(string $label = null)
     * @method Show\Field|Collection country_name(string $label = null)
     * @method Show\Field|Collection country_code(string $label = null)
     * @method Show\Field|Collection connection(string $label = null)
     * @method Show\Field|Collection queue(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection exception(string $label = null)
     * @method Show\Field|Collection failed_at(string $label = null)
     * @method Show\Field|Collection price(string $label = null)
     * @method Show\Field|Collection thumbnail(string $label = null)
     * @method Show\Field|Collection url(string $label = null)
     * @method Show\Field|Collection address(string $label = null)
     * @method Show\Field|Collection about(string $label = null)
     * @method Show\Field|Collection count(string $label = null)
     * @method Show\Field|Collection photo(string $label = null)
     * @method Show\Field|Collection logo(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection token(string $label = null)
     * @method Show\Field|Collection ip(string $label = null)
     * @method Show\Field|Collection ip_country(string $label = null)
     * @method Show\Field|Collection device(string $label = null)
     * @method Show\Field|Collection language(string $label = null)
     * @method Show\Field|Collection source(string $label = null)
     * @method Show\Field|Collection domain(string $label = null)
     * @method Show\Field|Collection license_id(string $label = null)
     * @method Show\Field|Collection goods_id(string $label = null)
     * @method Show\Field|Collection article_id(string $label = null)
     * @method Show\Field|Collection template_id(string $label = null)
     * @method Show\Field|Collection email_id(string $label = null)
     * @method Show\Field|Collection banner_id(string $label = null)
     * @method Show\Field|Collection color(string $label = null)
     * @method Show\Field|Collection note(string $label = null)
     * @method Show\Field|Collection state(string $label = null)
     * @method Show\Field|Collection template(string $label = null)
     * @method Show\Field|Collection email_verified_at(string $label = null)
     */
    class Show {}

    /**
     
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
