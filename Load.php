<?php
/**

 * Class Factory

 * Для загрузки, инициализации, настройке   и подключения  классов и модулей  приложения

 * Designed by Vitaut Hryharovich

 *

 * Factory::load_params('', $class ,$params);  - Инициализация класса с параметрами. Первый аргумент- путь к файлу

 * Factory::load('', $class); - Инициализация класса без параметров. Первый аргумент- путь к файлу

 * Метод import- если экземпляр класса создать нельзя (напр. это Статический класс) или данный файл не содержит Класс, или экземпляр класса будет создавать кто-то другой

 * Factory::import ($path, $class); - Подключение библиотек/ Path- путь от корневой папки данного файла. Если файл находится в той же папки, то Path = null

 * Название файлов библиотек и самих классов должны начинаться  с Прописной буквы

 * Пример:

 * Factory::import('Form/' ,'User');

 * Factory::import('','Io');

 **/


  class Factory

{
    public static $database = null;
    public static function load_params ($path,$class,$params)

    {

        if ($path==''){

            $class = ucfirst($class);

            if (!file_exists(dirname(__FILE__).'/'.$path.''.$class.'.php')){



                throw new \Exception("Ошибка! Файл ".$path."".$class.".php"." не существует в данном приложении!");

            }

            else {

                include_once(dirname(__FILE__).'/'.$path.''.$class.'.php'); // Подключаем файл/класс Приложения

            }



        }

        else {

            $class = ucfirst($class);

            if (!file_exists(dirname(__FILE__).'/'.$path.''.$class.'.php')){



                throw new \Exception("Ошибка! Файл ".$path."".$class.".php"." не существует в данном приложении!");

            } else

            {

                include_once(dirname(__FILE__).'/'.$path.''.$class.'.php');

                if (class_exists($class)) {





                    return new $class ($params); // Возвращаем объект подключенного класса и передаём параметры в конструктор класса







                }

                else

                {

                    throw new \Exception("Такой класс ".$class."  не существует");

                }

            }



        }











    }



    public static function load($path,$class) // Как жаль, что PHP не поддерживает перегрузку

    {

        if ($path==''){

            $class = ucfirst($class);

            if (!file_exists(dirname(__FILE__).'/'.$path.''.$class.'.php')){



                throw new \Exception("Error! File ".$path."".$class.".php"." not found in folder ClassWebPay!");

            }

            else {

                include_once(dirname(__FILE__).'/'.$path.''.$class.'.php');
                if (class_exists($class)) {





               return new $class (); // Возвращаем объект класса







                }

            }



        }

        else {

            $class = ucfirst($class);

            if (!file_exists(dirname(__FILE__).'/'.$path.''.$class.'.php')){



                throw new \Exception("Ошибка! Файл ".$path."".$class.".php"." не существует в приложении.");

            } else

            {

                include_once(dirname(__FILE__).'/'.$path.''.$class.'.php');

                if (class_exists($class)) {





                return new $class (); // Возвращаем экземпляр класса, не передаём параметры в конструктор







                }

                else

                {

                    throw new \Exception("Такой класс- ".$class." не существует");

                }

            }



        }

    }
     public  static  function import ($path, $class){

         if ($path==''){

             $class = ucfirst($class);

             if (!file_exists(dirname(__FILE__).'/'.$path.$class.'.php')){



                 throw new \Exception("Ошибка! Файл ".$path."".$class.".php"." не существует в данном приложении!");

             }

             else {

                 include_once(dirname(__FILE__).'/'.$path.$class.'.php');

             }



         }

         else {

             $class = ucfirst($class);

             if (!file_exists(dirname(__FILE__).'/'.$path.''.$class.'.php')){



                 throw new \Exception("Ошибка! Файл ".$path."".$class.".php"." не существует в данном приложении!");

             } else

             {

                 include_once(dirname(__FILE__).'/'.$path.''.$class.'.php');

             }



         }

     }
      // Получаем конфигурационные значения
      public static  function getConfig($value){
          return Wconfig::getInstance()->$value;
      }
public  static function getDb(){
    if (!self::$database)
               {
                  self::$database = self::createDbo();
         }

        return self::$database; // Возвращаем ссылку на подключение к базе данных
}
// Если нет текущего подключения к базе данных, то подключаемся
    private static function createDbo() {





        try
        {
            // Получаем параметры приложения для подключения к базе данных
            $host = self::getConfig('dbhost');
            $db   = self::getConfig('dbname');
            $user = self::getConfig('dbuser');
            $pass = self::getConfig('dbpassword');
            $charset = self::getConfig('charset');

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
           return $pdo = new PDO($dsn, $user, $pass, $opt);
         }
         catch (RuntimeException $e)
         {
                         if (!headers_sent())
                             {
                                 header('HTTP/1.1 500 Internal Server Error');
             }

             exit('Ошибка при подключении к базе даных: ' . $e->getMessage());
         }

   }


}

Factory::import('', 'wconfig'); // Импортируем файл с настройками

Factory::getDb(); // подключаемся к базе данных
Factory::import('Template/', 'index');// Подключаем шаблон (в дальнейшем сделать возможность выбора шаблона)

