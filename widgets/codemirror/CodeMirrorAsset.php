<?php
namespace app\widgets\codemirror;

use yii\web\AssetBundle;

/**
 * @author Shiyang <dr@shiyang.me>
 */
class CodeMirrorAsset extends AssetBundle
{
    public $sourcePath = '@app/widgets/codemirror/assets';
    public $js = [
        'lib/codemirror.js',
        'addon/selection/active-line.js',
        'addon/edit/matchbrackets.js',
        'addon/display/autorefresh.js',
        'mode/javascript/javascript.js',
        'mode/clike/clike.js',
        'addon/fold/foldcode.js',
        'addon/fold/foldgutter.js',
        'addon/fold/brace-fold.js',
        'addon/fold/comment-fold.js',
        'addon/hint/show-hint.js',
        'addon/hint/anyword-hint.js',
        'mode/python/python.js',
        'keymap/vim.js',
        'addon/search/searchcursor.js',
        'addon/dialog/dialog.js'
    ];
    public $css = [
        'lib/codemirror.css',
        'addon/fold/foldgutter.css',
        'theme/darcula.css',
        'theme/darcula2.css',
        'addon/hint/show-hint.css',
        'addon/dialog/dialog.css'
    ];
    public $depends = [
    ];
}
