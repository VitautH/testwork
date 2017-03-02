<?php
/**
 * Class Validation
 *  Проверка данных
 * Designed by Vitaut Hryharovich
 */
class Validation
{
    private $upload_dir;
    private $email;
    private $name;
    private $message;
private $img_url;

private $error;  // true|false
    public function Validation()
    {
        $this->error= false; // По-умолчанию ошибок нет


        if (!empty ($_POST['email']) and !empty($_POST['name']) and !empty ($_POST['message']) and !empty($_POST['g-recaptcha-response'])) { // Проверка на заполненность обязательных полей формы

            $this->upload_dir = Factory::getConfig('uploaddir'); // Получаем путь к  папке с загруженными изображениями
            // Обработка данных, проверка на e-mail
            if ($this->Valid_data()) {
                // Проверка на Капчу
                if (!$this->Valid_Captcha()) {
                    $this->error= true; // Есть ошибки
                    echo '<div class="alert alert-danger">
  <strong>Ошибка!</strong> Вы не прошли проверку от ReCaptcha.
</div>';
                }
    }




        }
        else {
            $this->error= true; // Есть ошибки
            echo '<div class="alert alert-danger">
  <strong>Ошибка!</strong> Вы заполнили не все данные.
</div>';
        }




        /*
         * Так как загрузка изображение не является обязательным для пользователя, то вывел  в отдельный блок
         *
         */
        if (!empty($_FILES["fileupload"]['name'])) {
            if (!$this->Upload_img()) {
                echo '<div class="alert alert-danger">
  <strong>Ошибка!</strong> Произошла ошибка загрузки изображения на сервер.
</div>';
            }
        }
                /*
                 * Передаём данные в Модель для сохранения их вбазе данных
                 */
                if (!$this->error) {
                    $action_add_message = Factory::load('Model/', 'Model_guest_book');
                    if ($action_add_message->Add_message($this->name, $this->email, $this->message, $this->img_url)) {
                        echo '<div class="alert alert-success">
Сообщение успешно добавлено!.
</div>';
                    }
                }
            }



    /*
    /*
     * Проверка прохождения капчи
     * return bool
     */
    private function Valid_Captcha()
    {



                $url = 'https://www.google.com/recaptcha/api/siteverify';
                // Подготавлеваем массив с данными
                $data = ['secret' => '6Lf78BYUAAAAAKXfCSASMVq9kvH9S-2LaKts5RWz',
                    'response' => $_POST['g-recaptcha-response'],
                    'remoteip' => $_SERVER['REMOTE_ADDR']];

                $options = [
                    'http' => [
                        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                        'method' => 'POST',
                        'content' => http_build_query($data)
                    ]
                ];

                $context = stream_context_create($options); // Создаём конкест для передачи заголовков и  массив данных на проверку
                $result = file_get_contents($url, false, $context); // Отправляем данные на проверку
                return (boolean)json_decode($result)->success;



    }

    /*
     * Проверка и загрузка изображения на сервер
     * return bool
     */

    private function Upload_img()
    {
        $myFile = $_FILES["fileupload"];


        // Проверяем тип изображения
        $fileType = @exif_imagetype($_FILES["fileupload"]["tmp_name"]);
        $allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
        if (!in_array($fileType, $allowed)) {
            return false;
        }

        $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
        $parts = pathinfo($name);

        $name = $parts["filename"] . "" . time() . "." . $parts["extension"];


        try {
            move_uploaded_file($myFile["tmp_name"], $this->upload_dir . $name);
            chmod($this->upload_dir . $name, 0644);
            $this->img_url = $name;
            return true;

        } catch (Exception $e) {
            return false;
        }


    }

    /*
       * Проверка и обработка данных
       * return bool
       */
    private function Valid_data()
    {


            $this->email = strip_tags($_POST['email']);
            $this->email = htmlspecialchars($this->email);
            $this->name = strip_tags($_POST['name']);
            $this->name = htmlspecialchars($this->name);

            $this->message = strip_tags($_POST['message']);
            $this->message = htmlspecialchars($this->message);
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $this->email = $_POST['email'];

            } else {
                echo '<div class="alert alert-danger">
  <strong>Ошибка!</strong> Вы ввели не верный e-mail.
</div>';
            }


    }
}