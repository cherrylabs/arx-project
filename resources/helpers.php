<?php
/**
 * Apply Shortcodes here
 */
require_once __DIR__ . '/shortcodes.php';

/**
 * Converting attribute name
 *
 * @param $key
 * @return mixed
 */

if (!function_exists('\__')) {
    function __($value, $context)
    {
        return Lang::get($context.$value);
    }
}

if (!function_exists('\shortcode')) {
    function shortcode($string, $data = [], $param = ['nl2br' => true, 'delimiters' => ['{', '}']])
    {

        if ($param['nl2br']) {
            $string = nl2br($string);
        }

        $data = array_dot($data);

        $string = \Utils::smrtr($string, $data, $param['delimiters']);

        $string = \Shortcode::compile($string);

        return $string;
    }
}

if (!function_exists('\s')) {
    function s($string, $data = [], $param = ['nl2br' => true, 'delimiters' => ['{', '}']])
    {
        return shortcode($string, $data, $param);
    }
}

/**
 * Form macro
 */

Form::macro('selectAngular', function ($name, $options, $default, $label, $params = [
    'scope' => 'item',
    'scopeForm' => 'itemForm',
    'required' => false,
    'id' => null
]) {

    $params = array_merge([
        'scope' => 'item',
        'scopeForm' => 'itemForm',
        'required' => false,
        'id' => null
    ], $params);

    $params['id'] = $params['id'] ?: $name;

    $form = Form::select('$name', $options, $default, [
        'class' => 'form-control',
        'id' => $params['id'],
        'ng-model' => $params["scope"] . $name,
        'ng-required' => $params["required"],
    ]);

    return <<<eot
    <div class="form-group" ng-class="{'has-error': {$params["scopeForm"]}.type.\$dirty && {$params["scopeForm"]}.type.\$invalid}">
        <label class="col-sm-3 control-label" for="{$params['id']}">$label</label>
        <div class="col-sm-9">
            $form
        </div>
    </div>
eot;
});

Form::macro('textAngular', function ($name, $default, $label, $params = [
    'scope' => 'item',
    'scopeForm' => 'itemForm',
    'required' => false,
    'id' => null
]) {

    $params = array_merge([
        'scope' => 'item',
        'scopeForm' => 'itemForm',
        'required' => false,
        'id' => null
    ], $params);

    $params['id'] = $params['id'] ?: $name;

    $form = Form::text($name, $default, [
        'class' => 'form-control',
        'id' => $params['id'],
        'ng-model' => "form.$name",
        'ng-required' => $params["required"],
        'select-on-click' => '',
    ]);

    return <<<eot
    <div class="form-group" ng-class="{'has-error': {$params["scopeForm"]}.$name.\$dirty && {$params["scopeForm"]}.$name.\$invalid}">
        <label class="col-sm-3 control-label" for="{$params['id']}">$label</label>
        <div class="col-sm-9">
            $form
        </div>
    </div>
eot;
});

Form::macro('formGroup', function ($label, $form, $params = [
    'parent' => ['attributes' => ['class' => 'form-group']],
    'label' => ['attributes' => ['class' => 'col-sm-3 control-label']],
    'form' => ['attributes' => ['class' => 'col-sm-9']],
]) {
    $params = array_merge([
        'parent' => ['attributes' => ['class' => 'form-group']],
        'label' => ['attributes' => ['class' => 'col-sm-3 control-label']],
        'form' => ['attributes' => ['class' => 'col-sm-9']],
    ], $params);

    $params['parent']['attributes'] = HTML::attributes($params['parent']['attributes']);
    $params['label']['attributes'] = HTML::attributes($params['label']['attributes']);
    $params['form']['attributes'] = HTML::attributes($params['form']['attributes']);

    return <<<eot
    <div {$params['parent']['attributes']}>
        <label {$params['label']['attributes']}>$label</label>
        <div {$params['form']['attributes']}>
            $form
        </div>
    </div>
eot;
});
