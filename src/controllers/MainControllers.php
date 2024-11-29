<?php
class MainController{
    public function home(){
        $this->render('home');
    }

    public function catalogue(){
        $this->render('catalogue');
    }

    public function login(){
        $this->render('login');
    }

    public function register(){
        $this->render('register');
    }

    public function panier(){
        $this->render('panier');
    }

    public function detail_catalogue(){
        $this->render('detail_catalogue');
    }


    private function render($view, $data = [])
{
    extract($data);

    $viewFile = __DIR__ . '/../views/' . $view . '.php';
    if (file_exists($viewFile)) {
        require_once __DIR__ . '/views/header.php';
        require_once $viewFile;
        require_once __DIR__ . '/views/footer.php';
    } else {
        echo "View not found: $view";
        exit;
    }
}

}

?>