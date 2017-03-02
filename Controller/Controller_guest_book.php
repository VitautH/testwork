<?
/**
 * Контроллер гостевой книги
 *
 * Designed by Vitaut Hryharovich
 */
class Controller_guest_book
{
    private $page; // Текущий номер страницы

    public function Controller_guest_book()
    {
// ЧПУ- узнаём текущий номер странцы
         $this->page = $this->Route();

    }

    private function Route()
    {
        $routes = (explode('/', $_SERVER['REQUEST_URI']));

if (isset($routes[1])) { // Если указан номер страницы- возвращаем номер страницы
    switch (intval($routes[1])) {  // Дополнительная проверка на число
        case 0:
            return 1;
            break;
        default:
            return intval($routes[1]);
    }
}
else { // Если номер страницы не указан,то по-умолчанию отображаем первую страницу
    return 1;
}
}
public  function action_View_message (){

    $model = Factory::load('Model/' , 'Model_guest_book');
return $data = $model->View_message($this->page);

}

public function action_Add_message(){



    Factory::load("Validation/", "Validation");
    }

    public function action_Pagination(){



       $model= Factory::load("Model/", "Model_guest_book");
        return $data = $model->Pagination($this->page);

    }
    /*
     * Разрешаем получать текущий номер страницы
     */
    function __get($name) {

            return $this->$name;

    }
}