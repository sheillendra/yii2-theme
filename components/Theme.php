<?php

namespace sheillendra\theme\components;

use Yii;
use yii\helpers\FileHelper;

class Theme extends \yii\base\Theme {

    public $active;

    /**
     * @inheritdoc
     */
    public function applyTo($path) {
        $pathMap = $this->pathMap;
        if (empty($pathMap)) {
            if (($basePath = $this->getBasePath()) === null) {
                throw new InvalidConfigException('The "basePath" property must be set.');
            }
            $pathMap = [Yii::$app->getBasePath() => [$basePath]];
        }

        $module = Yii::$app->controller->module;
        if(!$module instanceof \yii\web\Application){
            $pathMap['@app/modules/'.$module->id.'/views'] = [
                $pathMap['@app/views'][0].'/'.$module->id
            ];
        }
        #debug
//        echo '<pre>';
//        print_r(Yii::$app->controller->module);
//        echo '</pre>';
        #end debug
        
        #debug
        echo '<pre>';
        print_r($pathMap);
        echo '</pre>';
        #end debug

        $path = FileHelper::normalizePath($path);

        #debug
        echo 'path: ', $path, '<br/>';
        #end debug

        foreach ($pathMap as $from => $tos) {
            $from = FileHelper::normalizePath(Yii::getAlias($from)) . DIRECTORY_SEPARATOR;

            #debug
            echo 'from: ', $from, '<br/>';
            #end debug

            if (strpos($path, $from) === 0) {
                $n = strlen($from);
                foreach ((array) $tos as $to) {
                    $to = FileHelper::normalizePath(Yii::getAlias($to)) . DIRECTORY_SEPARATOR;

                    #debug
                    echo 'to: ', $to, '<br/>';
                    #end debug

                    $file = $to . substr($path, $n);
                    if (is_file($file)) {

                        #debug
                        echo 'return file: ', $file, '<br/>';
                        if (strpos($path, 'layouts')) {
                            exit;
                        }
                        #end debug

                        return $file;
                    }
                }
            }
        }

        #debug
        echo 'return path: ', $path, '<br/>';
        if (strpos($path, 'layouts')) {
            exit;
        }
        #end debug

        return $path;
    }

}
