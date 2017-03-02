<?php
/**
 * Class Wconfig
 *  Конфигурационный  класс приложения
 * Designed by Vitaut Hryharovich
 */
class Wconfig
{
    private static $instance = null;
    private   $dbhost='localhost';
    private  $dbname= 'admin_oncore';
    private   $dbuser = 'admin_vitaut';
    private  $dbpassword = 'FONVORK';

    private  $charset = 'utf8'; // Кодировка файла
private  $quality = 3; // Количество сообщений на странице
private  $uploaddir = "/home/admin/web/iostream.tk/public_html/upload/";
private $template = "Template"; // текущий шаблон. Сделать возможность динамического изменения
    /**
     * @return Singleton
     */
    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }
    /**
     * Запрещаем  создания экземпляра класса и клонирование класса
     *
     * @return void
     */
    final private function __construct()
    {

    }
    final private function __clone()
    {

    }

    /**
     * Заприщаем дессерализацию класса
     *
     * @return void
     */
    final private function __wakeup()
    {

    }
    public function __isset($name) {
        return isset($this->$name);
    }
    public function __get($name) {
        return $this->$name;
    }
    public function __set($name, $value) {
        throw new Exception('Доступ запрещён!');
    }

}


