<?php
class BaseController {
    public function render($viewPath, $data = []) {
        extract($data);
        require_once '../views/' . $viewPath . '.php';
    }

    public function redirect($url) {
        header("Location: $url");
        exit;
    }

    public function loadModel($modelPath) {
        $path = '../models/' . $modelPath . '.php';
        if (file_exists($path)) {
            require_once $path;
            $className = basename($modelPath);
            return new $className;
        } else {
            die("❌ Không tìm thấy model: $modelPath");
        }
    }
}
