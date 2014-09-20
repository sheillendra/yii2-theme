<?php

namespace sheillendra\theme\components;

use Yii;
use yii\helpers\FileHelper;

class Theme extends yii\base\Component {

    public $active;

    /**
     * @var string the root path or path alias of this theme. All resources of this theme are located
     * under this directory. This property must be set if [[pathMap]] is not set.
     * @see pathMap
     */
    public $basePath;

    /**
     * @var string the base URL (or path alias) for this theme. All resources of this theme are considered
     * to be under this base URL. This property must be set. It is mainly used by [[getUrl()]].
     */
    public $baseUrl;

    /**
     * @var array the mapping between view directories and their corresponding themed versions.
     * If not set, it will be initialized as a mapping from [[Application::basePath]] to [[basePath]].
     * This property is used by [[applyTo()]] when a view is trying to apply the theme.
     * Path aliases can be used when specifying directories.
     */
    public $pathMap;

    /**
     * Initializes the theme.
     * @throws InvalidConfigException if [[basePath]] is not set.
     */
    public function init() {
        parent::init();

        if ($this->baseUrl === null) {
            $this->baseUrl = '@web/themes/' . $this->active;
        }
        $this->baseUrl = rtrim(Yii::getAlias($this->baseUrl), '/');

        if ($this->basePath === null) {
            $this->basePath = '@webroot/themes/' . $this->active;
        }
        $this->basePath = Yii::getAlias($this->basePath);

        if (empty($this->pathMap)) {
            $this->pathMap = [Yii::$app->getBasePath() => [$this->basePath]];
        }
    }

    /**
     * Converts a file to a themed file if possible.
     * If there is no corresponding themed file, the original file will be returned.
     * @param string $path the file to be themed
     * @return string the themed file, or the original file if the themed version is not available.
     */
    public function applyTo($path) {
        $path = FileHelper::normalizePath($path);
        foreach ($this->pathMap as $from => $tos) {
            $from = FileHelper::normalizePath(Yii::getAlias($from)) . DIRECTORY_SEPARATOR;
            if (strpos($path, $from) === 0) {
                $n = strlen($from);
                foreach ((array) $tos as $to) {
                    $to = FileHelper::normalizePath(Yii::getAlias($to)) . DIRECTORY_SEPARATOR;
                    $file = $to . substr($path, $n);
                    if (is_file($file)) {
                        return $file;
                    }
                }
            }
        }
        return $path;
    }

    /**
     * Converts a relative URL into an absolute URL using [[baseUrl]].
     * @param string $url the relative URL to be converted.
     * @return string the absolute URL
     */
    public function getUrl($url) {
        return $this->baseUrl . '/' . ltrim($url, '/');
    }

}
