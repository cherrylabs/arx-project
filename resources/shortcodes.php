<?php
/**
 * Shortcodes register
 */

/**
 * @example
 * [alert]Some text[/alert]
 *
 * @example
 * [alert class="alert-info"]Some text[/alert]
 *
 * @example
 * [alert type="info"]Some text[/alert]
 */
Shortcode::register('alert', function ($attr, $content = null) {
    if (isset($attr['class'])) {
        $attr['class'] = 'alert ' . $attr['class'];
    } elseif (isset($attr['type'])) {
        $attr['class'] = 'alert alert-' . $attr['type'];
    } else {
        $attr['class'] = 'alert alert-info';
    }

    return '<div ' . HTML::attributes($attr) . '>' . Shortcode::compile($content) . '</div>';
});


/**
 * @example
 * [icon "fa-fw fa-home"]
 *
 * @example
 * [icon type="fw home"]
 *
 * @example
 * [icon "fa-fw fa-home"]Text displayed in a title attribute[/icon]
 */
Shortcode::register('icon', function ($attr, $content = null) {
    if (isset($attr['type'])) {
        $attr['type'] = explode(' ', $attr['type']);
        $attr['class'] = 'fa fa-' . implode(' fa-', $attr['type']);
    } elseif (isset($attr[0])) {
        $attr['class'] = 'fa ' . $attr[0];
        unset($attr[0]);
    }

    if ($content) {
        $attr['title'] = htmlentities(Shortcode::compile($content));
    } elseif (isset($attr['title'])) {
        $attr['title'] = htmlentities(Shortcode::compile($attr['title']));
    }

    $defAttr = ['class' => 'fa '];

    $attr = Arr::merge($defAttr, $attr);

    return '<i ' . HTML::attributes($attr) . '></i>';
});


/**
 * @example
 * [img src="/path/to/an/image.png"]
 *
 * @example
 * [img src="/path/to/an/image.png"]Content displayed in title attribute[/img]
 */
Shortcode::register('img', function ($attr, $content = null) {
    if ($content) {
        $attr['alt'] = htmlentities(Shortcode::compile($content));
        $attr['title'] = $attr['alt'];
    }

    if (isset($attr['url'])) {
        $attr['src'] = $attr['url'];
        unset($attr['url']);
    }

    return '<img ' . HTML::attributes($attr) . ' />';
});


/**
 * @example
 * [link href="http://cherrypulp.com"]Cherry Pulp[/link]
 */
Shortcode::register('link', function ($attr, $content = null) {
    if (isset($attr['url'])) {
        $attr['href'] = $attr['url'];
        unset($attr['url']);
    }

    return '<a ' . HTML::attributes($attr) . '>' . Shortcode::compile($content) . '</a>';
});

Shortcode::register('strong', function ($attr, $content = null) {
    return '<strong ' . HTML::attributes($attr) . '>' . Shortcode::compile($content) . '</strong>';
});

Shortcode::register('b', function ($attr, $content = null) {
    return '<strong ' . HTML::attributes($attr) . '>' . Shortcode::compile($content) . '</strong>';
});

Shortcode::register('i', function ($attr, $content = null) {
    return '<em ' . HTML::attributes($attr) . '>' . Shortcode::compile($content) . '</em>';
});

Shortcode::register('u', function ($attr, $content = null) {
    return '<u ' . HTML::attributes($attr) . '>' . Shortcode::compile($content) . '</u>';
});

Shortcode::register('span', function ($attr, $content = null) {
    return '<span ' . HTML::attributes($attr) . '>' . Shortcode::compile($content) . '</span>';
});


/**
 * @example
 * [tooltip icon="fa-info"]This is awesome![/tooltip]
 */
Shortcode::register('tooltip', function ($attr, $content = null) {
    $text = htmlentities(nl2br(Shortcode::compile($content)));

    $defAttr = [
        'class' => 'tooltip-info',
        'href' => 'javascript:void(0);',
        'tooltip-html-unsafe' => $text,
        'tooltip-placement' => 'right',
        'tooltip-append-to-body' => 'true',
    ];

    $icon = 'fa-info';

    if (isset($attr['icon'])) {
        $icon = $attr['icon'];
    }

    if (isset($attr['placement'])) {
        $attr['tooltip-placement'] = $attr['placement'];
        unset($attr['placement']);
    }

    unset($attr['icon']);
    unset($attr['0']);

    $attr = Arr::merge($defAttr, $attr);

    return '<a ' . HTML::attributes($attr) . '><span class="fa ' . $icon . '"></span></a>';
});


// Emails shortcodes

Shortcode::register('linkbutton', function ($attr, $content = null) {
    $text = strtoupper(htmlentities(nl2br(Shortcode::compile($content))));

    $defAttr = [
        'href' => '#',
    ];

    $attr = Arr::merge($defAttr, $attr);

    if (isset($attr['url'])) {
        $attr['href'] = $attr['url'];
        unset($attr['url']);
    }

    return '<div>
        <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="' . $attr['href'] . '" style="height:38px;v-text-anchor:middle;width:200px;" arcsize="8%" strokecolor="#63c844" fillcolor="#63c844">
            <w:anchorlock/>
            <center style="color:#ffffff;font-family:sans-serif;font-size:13px;">' . $text . '</center>
        </v:roundrect><![endif]-->
        <a href="' . $attr['href'] . '"
        style="background-color:#63c844;border:1px solid #63c844;border-radius:3px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:13px;line-height:38px;text-align:center;text-decoration:none;width:200px;-webkit-text-size-adjust:none;mso-hide:all;">' . $text . '</a>
    </div>';
});