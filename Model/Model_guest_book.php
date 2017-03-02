<?php
/*
 * Класс Model_guest_book
 * Обработка данных, извлечение данных с базы данных
 *  Designed by Vitaut Hryharovich
 */
 class Model_guest_book {
     private $number_page; // Номер страницы, смещения
     private $quality_message_page; // Количество сообщений на странице
     private  $total_message; // Всего сообщений
     private $name;
     private $email;
     private $message;
     private $img_url;
private $db; // Ссылка на подключение к базе данных
    public  function  Model_guest_book(){

        $this->db = Factory::getDb(); // Получаем ссылку на подключение к базе данных
$this->quality_message_page = Factory::getConfig("quality");// Получаем количество сообщений на странице с файла настроек
    }
/*
 * Return array
 */
    public function View_message($page) {

        $this->number_page= $page; // Текущий номер страницы

       // Смещение при выборке записей из базы. Если текущая страница 1, то смещения нет
        switch ($this->number_page){
            case 1:
                $ofsset = 0;
                break;
            default:
                $ofsset = $this->number_page * $this->quality_message_page;
                break;
        }
        $stmt = $this->db->query('SELECT * FROM guest_book ORDER BY id DESC LIMIT :limit OFFSET :offset'); //Limit '.$this->quality_message_page.' OFSSET '
        $stmt->bindValue(':limit', (int)   $this->quality_message_page, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$ofsset, PDO::PARAM_INT);

        $stmt->execute();

      return  $result = $stmt->fetchAll(\PDO::FETCH_ASSOC); // Возвращаем массив данных в шаблон

    }
/*
 * Return bool
 */
    public function Add_message ($name, $email, $message, $img_url) {

       $this->name= $name;
       $this->email= $email;
       $this->message= $message;
       $this->img_url= $img_url;
        $sql = "INSERT INTO guest_book(name, email, message, img) VALUES (:name, :email, :message,  :img)";
try {
    $stmt = $this->db->prepare($sql);

    $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
    $stmt->bindParam(':message', $this->message, PDO::PARAM_STR);

    $stmt->bindParam(':img', $this->img_url, PDO::PARAM_STR);


    $stmt->execute();
    return true;
}
catch (Exception $e) {
    return false;
}
    }

    /*
     * Return int
     */
public  function Pagination() {

     $this->total_message =  $this->db->query('SELECT * FROM guest_book')->rowCount();

  return $quality_page = floor($this->total_message /  $this->quality_message_page);

}


}