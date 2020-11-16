<?php
namespace app\widgets\codemirror;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\InputWidget;

/**
 * @author Shiyang <dr@shiyang.me>
 */
class CodeMirror extends InputWidget
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $options = ArrayHelper::merge($this->options, ['style' => 'display:none']);
        if ($this->hasModel()) {
            echo Html::activeTextArea($this->model, $this->attribute, $options);
        } else {
            echo Html::textArea($this->name, $this->value, $options);
        }
        $this->registerScripts();
    }

    /**
     * Registers assets
     */
    public function registerScripts()
    {
        CodeMirrorAsset::register($this->view);
        $id = $this->options['id'];
        $script = <<<EOF
        const editor=CodeMirror.fromTextArea(document.getElementById("{$id}"),{
            mode: "text/x-c++src",
            theme: "darcula",
            lineNumbers: true,
            styleActiveLine: true,
            tabSize: 4,
            indentUnit: 4,
            indentWithTabs: true,
            autofocus: true,
            matchBrackets: true,
            autoRefresh: true,
            lineWrapping: true, 
            foldGutter: true,//代码折叠
            autoCloseBrackets: false,
        });
        editor.addKeyMap({
            name: 'autoInsertParentheses',
            "'('": (cm) => {
                const cur = cm.getCursor()
        
                cm.replaceRange('()', cur, cur, '+insert')
                cm.doc.setCursor({ line: cur.line, ch: cur.ch + 1 })
            },
            "'['": (cm) => {
                const cur = cm.getCursor()
        
                cm.replaceRange('[]', cur, cur, '+insert')
                cm.doc.setCursor({ line: cur.line, ch: cur.ch + 1 })
            },
            "'{'": (cm) => {
                const cur = cm.getCursor()
        
                cm.replaceRange('{}', cur, cur, '+insert')
                cm.doc.setCursor({ line: cur.line, ch: cur.ch + 1 })
            }
        });
EOF;
        $this->view->registerCss("
        .CodeMirror {
            border: 1px solid black;
            font-size: 15px;
        }
        ");
        $this->view->registerJs($script);
    }
}
